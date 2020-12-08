<?php


class VehiculoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarAcoplado(){
        return $this->database->query("SELECT * FROM Acoplado");
    }

    public function listarVehiculos(&$data){
        $data["vehiculos"] = $this->database->query("SELECT T.patente, T.motor, T.chasis, T.modelo, T.marca, T.fk_acoplado, V.posicion_actual, V.estado, V.kilometraje 
                                       FROM Tractor T JOIN 
                                            Vehiculo V ON T.patente = V.fk_tractor ");
    }

    public function obtenerPatentePorIdVehiculo($idVehiculo){
        return $this->database->query("SELECT fk_tractor
                                       FROM Vehiculo
                                       WHERE id_vehiculo = $idVehiculo");
    }

    public function buscarAcoplado($patente){
        return $this->database->query("SELECT * FROM Acoplado WHERE patente_acoplado = '$patente'");
    }

    public function cargarAcopladosDisponibles(&$data){
        $data["acoplados"] = $this->database->query("SELECT patente_acoplado
                                                     FROM Acoplado A LEFT JOIN
                                                          Tractor T ON T.fk_acoplado = A.patente_acoplado
                                                     WHERE T.fk_acoplado IS NULL");
    }

    public function buscarVehiculo($patente){
        return $this->database->query("SELECT T.patente, T.motor, T.chasis, T.modelo, T.marca, T.fk_acoplado, V.posicion_actual, V.estado, V.kilometraje, V.alarma 
                                       FROM Tractor T JOIN 
                                            Vehiculo V ON T.patente = V.fk_tractor  
                                       WHERE T.patente = '$patente'");
    }

    public function agregarAcoplado($patente, $tipo, $chasis){
        return $this->database->execute("INSERT INTO Acoplado(patente_acoplado, tipo, chasis_acoplado)
                                         VALUES('$patente' , '$tipo', '$chasis')");
    }

    public function agregarVehiculo($patente, $motor, $chasis, $modelo, $marca, $acoplado, $posicion, $kilometraje, $alarma){
        $result = $this->agregarTractor($patente, $motor, $chasis, $modelo,$marca, $acoplado);
        if ($result){
            $result = $this->database->execute("INSERT INTO Vehiculo(fk_tractor, posicion_actual, estado, kilometraje, alarma)
                                                VALUES('$patente', '$posicion', TRUE, $kilometraje, $alarma)");
            if (!$result) $this->database->execute("DELETE FROM Tractor WHERE patente = '$patente'");
        }
        return $result;
    }

    public function modificarAcoplado($patente , $tipo, $chasis, $patenteDestino){
        return $this->database->execute("UPDATE Acoplado SET 
                                         patente_acoplado = '$patente', 
                                         tipo = '$tipo', 
                                         chasis_acoplado ='$chasis' 
                                         WHERE patente_acoplado = '$patenteDestino'");
    }

    public function modificarVehiculo($patente, $motor, $chasis, $modelo, $marca, $acoplado, $posicion, $kilometraje, $alarma, $patenteDestino){
        $mensaje = "Los campos: ";
        $result = $this->updateDatosTractor($acoplado, $motor, $chasis, $modelo, $marca, $patenteDestino,$mensaje);
        if ($result) $result = $this->updateDatosVehiculo($posicion, $kilometraje, $alarma, $patenteDestino, $mensaje);
        if($result && $patente != $patenteDestino) $this->updatePatente($patente, $patenteDestino, $motor, $chasis, $modelo, $marca, $acoplado, $posicion, $kilometraje, $alarma, $mensaje);

        return $mensaje;
    }

    public function eliminarAcoplado($patente){
        return $this->database->execute("DELETE FROM Acoplado WHERE patente_acoplado = '$patente'");
    }

    public function eliminarVehiculo($patente){
        $result = $this->database->execute("DELETE FROM Vehiculo WHERE fk_tractor = '$patente'");
        if ($result) $result = $this->database->execute("DELETE FROM Tractor WHERE patente = '$patente'");

        return $mensaje = ($result) ? "El vehiculo se borro de forma exitosa." : "No se pudo realizar la operacion ";
    }

    public function consultarVehiculo($consulta ,$patente){
        $result = "El vehiculo no se encuentra en ningun viaje.";
        switch ($consulta){
            case "posicionActual":
                $result = $this->database->query("SELECT concat('[',replace(posicion_actual,' ',''),']')as posicion_actual  FROM Vehiculo WHERE fk_tractor = '$patente'");
                $result = $result ? $result[0]["posicion_actual"] : "Patente Inexistente";
                break;

            case "kilometros":
                $result = $this->database->query("SELECT km_recorrido
                                                  FROM Viaje
                                                  WHERE id_vehiculo = (SELECT id_vehiculo
                                                                       FROM Vehiculo
                                                                       WHERE fk_tractor = '$patente')");
                if ($result){
                    $result = "La cantidad de kilometros reales recorridos en el viaje es " . $result[0]["km_recorrido"] . " km";
                }
                break;

            case "combustible":
                $result = $this->database->query("SELECT combustible_consumido
                                                  FROM Viaje
                                                  WHERE id_vehiculo = (SELECT id_vehiculo
                                                                       FROM Vehiculo
                                                                       WHERE fk_tractor = '$patente')");
                if ($result){
                    $result = "La cantidad de combustible consumido en el viaje es " . $result[0]["combustible_consumido"] . " lts";
                }
                break;

            case "tiempo":
                $result = $this->database->query("SELECT tiempo
                                                  FROM Viaje
                                                  WHERE id_vehiculo = (SELECT id_vehiculo
                                                                       FROM Vehiculo
                                                                       WHERE fk_tractor = '$patente')");
                if ($result){
                    $result = "El vehiculo lleva en viaje " . $result[0]["tiempo"] . " hrs";
                }
                break;
        }

        return $result;
    }

    //METODOS PRIVADOS PARA EL FUNCIONAMIENTO DE VEHICULO
    private function agregarTractor($patente, $motor, $chasis, $modelo, $marca, $acoplado){
        if ($acoplado != "Sin Asignar"){
            $result = $this->database->execute("INSERT INTO Tractor(patente, motor, chasis, modelo, marca, fk_acoplado)
                                                VALUES('$patente', '$motor', '$chasis', '$modelo', '$marca', '$acoplado')");
        }else{
            $result = $this->database->execute("INSERT INTO Tractor(patente, motor, chasis, modelo, marca)
                                                VALUES('$patente', '$motor', '$chasis', '$modelo', '$marca')");
        }
        return $result;
    }

    private function updateDatosTractor($acoplado, $motor, $chasis, $modelo, $marca, $patenteDestino, &$mensaje)
    {
        if ($acoplado != "Sin Asignar") {
            $result = $this->database->execute("UPDATE Tractor 
                                                SET motor = '$motor', 
                                                    chasis ='$chasis', 
                                                    modelo = '$modelo',
                                                    marca = '$marca',
                                                    fk_acoplado = '$acoplado'
                                                WHERE patente = '$patenteDestino'");
        } else {
            $result = $this->database->execute("UPDATE Tractor 
                                                SET motor = '$motor', 
                                                    chasis ='$chasis', 
                                                    modelo = '$modelo',
                                                    marca = '$marca',
                                                    fk_acoplado = NULL
                                                WHERE patente = '$patenteDestino'");
        }
        $mensaje = ($result) ? $mensaje . "motor, chasis, modelo, marca, acoplado se actualizaron." : "No se pudo realizar ninguna actualizacion.";
        return $result;
    }

    private function updateDatosVehiculo($posicion, $kilometraje, $alarma, $patenteDestino, &$mensaje)
    {
        $result = $this->database->execute("UPDATE Vehiculo
                                            SET posicion_actual = '$posicion',
                                                kilometraje = $kilometraje,
                                                alarma = $alarma,
                                            WHERE fk_tractor = '$patenteDestino'");
        $mensaje = ($result) ? $mensaje . " Posicion, kilometraje y alarma se actualizaron." : $mensaje . " Posicion, kilometraje, alarma y patente no se pudieron actualizar.";

        return $result;
    }

    private function updatePatente($patente, $patenteDestino, $motor, $chasis, $modelo, $marca, $acoplado, $posicion, $kilometraje, $alarma, &$mensaje)
    {
        $vehiculo = $this->buscarVehiculo($patenteDestino);
        $result = $this->eliminarVehiculo($patenteDestino);
        if ($result) {
            $result = $this->database->execute("UPDATE Tractor
                                                SET patente = '$patente'
                                                WHERE patente = '$patenteDestino'");
            if ($result) {
                $this->agregarVehiculo($patente, $motor, $chasis, $modelo, $marca, $acoplado, $posicion, $kilometraje, $alarma);
                $mensaje = "Todos los campos fueron actualizados";
            } else {
                $this->agregarVehiculo($vehiculo[0]["patente"],
                    $vehiculo[0]["motor"],
                    $vehiculo[0]["chasis"],
                    $vehiculo[0]["modelo"],
                    $vehiculo[0]["marca"],
                    $vehiculo[0]["fk_acoplado"],
                    $vehiculo[0]["posicion_actual"],
                    $vehiculo[0]["kilometraje"],
                    $vehiculo[0]["alarma"]);
            }
        }

        return $result;
    }

    //METODOS POSIBLES A BORRAR

    public function modificarTractor($patente, $motor, $chasis, $modelo, $marca, $acoplado, $patenteDestino){
        if($acoplado){
            $result = $this->database->execute("UPDATE Tractor SET patente = '$patente', 
                                                motor = '$motor', 
                                                chasis ='$chasis', 
                                                modelo = '$modelo',
                                                marca = '$marca',
                                                fk_acoplado = '$acoplado'
                                                WHERE patente = '$patenteDestino'");
        }else{
            $result = $this->database->execute("UPDATE Tractor SET patente = '$patente', 
                                                motor = '$motor', 
                                                chasis ='$chasis', 
                                                modelo = '$modelo',
                                                marca = '$marca',
                                                fk_acoplado = NULL
                                                WHERE patente = '$patenteDestino'");
        }
        return $result;
    }

    public function listarTractor(){
        return $this->database->query("SELECT * FROM Tractor");
    }

    public function buscarTractor($patente){
        return $this->database->query("SELECT * FROM Tractor WHERE patente = '$patente'");
    }

    public function obtenerIdVehiculoPorSuPatente($patente){
        return $this->database->query("SELECT id_vehiculo FROM Vehiculo WHERE fk_tractor='$patente'");
    }

}