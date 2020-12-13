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

    public function mostrarVehiculo($idVehiculo, &$data){
        $data["vehiculos"] = $this->database->query("SELECT T.patente, T.motor, T.chasis, T.modelo, T.marca, T.fk_acoplado, V.posicion_actual, V.estado, V.kilometraje 
                                                     FROM Tractor T JOIN 
                                                          Vehiculo V ON T.patente = V.fk_tractor
                                                     WHERE v.id_vehiculo = $idVehiculo");
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
        return $this->database->query("SELECT T.patente, T.motor, T.chasis, T.modelo, T.marca, T.fk_acoplado, V.posicion_actual, V.estado, V.kilometraje, V.alarma, V.id_vehiculo 
                                       FROM Tractor T JOIN 
                                            Vehiculo V ON T.patente = V.fk_tractor  
                                       WHERE T.patente = '$patente'");
    }

    public function agregarAcoplado($patente, $tipo, $chasis){
        return $this->database->execute("INSERT INTO Acoplado(patente_acoplado, tipo, chasis_acoplado)
                                         VALUES('$patente' , '$tipo', '$chasis')");
    }

    public function agregarVehiculo($patente, $motor, $chasis, $modelo, $marca, $acoplado, $posicion, $kilometraje, $alarma){
        if ($acoplado != "Sin Asignar"){
            $sql = "INSERT INTO Tractor(patente,motor,chasis,modelo,marca,fk_acoplado)
                                 VALUES('$patente','$motor','$chasis','$modelo','$marca','$acoplado');";
        }else{
            $sql = "INSERT INTO Tractor(patente, motor, chasis, modelo, marca)
                                 VALUES('$patente', '$motor', '$chasis', '$modelo', '$marca');";
        }

        $sql .= "INSERT INTO Vehiculo(fk_tractor, posicion_actual, estado, kilometraje, alarma)
                             VALUES('$patente', '$posicion', TRUE, $kilometraje, $alarma);";

        return $this->database->transaccion($sql) ? "Nuevo Vehiculo añadido" : "No se pudo Agregar el Vehiculo";
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
        if($result && $patente != $patenteDestino) $this->updatePatente($patente, $patenteDestino, $mensaje);

        return $mensaje;
    }

    public function eliminarAcoplado($patente){
        return $this->database->execute("DELETE FROM Acoplado WHERE patente_acoplado = '$patente'");
    }

    public function eliminarVehiculo($patente){
        $sql = "DELETE FROM Vehiculo WHERE fk_tractor = '$patente';";
        $sql .= "DELETE FROM Tractor WHERE patente = '$patente';";

        return $mensaje = $this->database->transaccion($sql) ? "El vehiculo se borro de forma exitosa." : "No se pudo realizar la operacion ";
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

    private function updateDatosTractor($acoplado, $motor, $chasis, $modelo, $marca, $patenteDestino, &$mensaje)
    {
        $acoplado = ($acoplado != "Sin Asignar") ? "fk_acoplado = '$acoplado'" : "fk_acoplado = NULL";

        $result = $this->database->execute("UPDATE Tractor 
                                            SET motor = '$motor', 
                                                chasis ='$chasis', 
                                                modelo = '$modelo',
                                                marca = '$marca',
                                                $acoplado
                                                WHERE patente = '$patenteDestino'");

        $mensaje = ($result) ? $mensaje . "motor, chasis, modelo, marca, acoplado se actualizaron." : "No se pudo realizar ninguna actualizacion.";
        return $result;
    }

    private function updateDatosVehiculo($posicion, $kilometraje, $alarma, $patenteDestino, &$mensaje)
    {
        $result = $this->database->execute("UPDATE Vehiculo
                                            SET posicion_actual = '$posicion',
                                                kilometraje = $kilometraje,
                                                alarma = $alarma
                                            WHERE fk_tractor = '$patenteDestino'");
        $mensaje = ($result) ? $mensaje . " Posicion, kilometraje y alarma se actualizaron." : $mensaje . " Posicion, kilometraje, alarma y patente no se pudieron actualizar.";

        return $result;
    }

    private function updatePatente($patente, $patenteDestino, &$mensaje)
    {
        $vehiculo = $this->buscarVehiculo($patenteDestino);

        $id = $vehiculo[0]['id_vehiculo'];
        $posicion = $vehiculo[0]['posicion_actual'];
        $kilometraje = $vehiculo[0]["kilometraje"];
        $alarma = $vehiculo[0]['alarma'];
        $estado = $vehiculo[0]['estado'];

        $sql = "DELETE FROM Vehiculo WHERE fk_tractor = '$patenteDestino';";

        $sql .= "UPDATE Tractor SET patente = '$patente' WHERE patente = '$patenteDestino';";

        $sql .= "INSERT INTO Vehiculo(id_vehiculo,fk_tractor,posicion_actual,kilometraje,alarma,estado) 
                 VALUES($id,'$patente','$posicion',$kilometraje,$alarma,$estado);";

        return $mensaje = $this->database->transaccion($sql) ? "Todos los campos fueron modificados" : $mensaje . "Patente no se pudo modificar.";
    }

    //METODOS POSIBLES A BORRAR

    public function obtenerIdVehiculoPorSuPatente($patente){
        return $this->database->query("SELECT id_vehiculo FROM Vehiculo WHERE fk_tractor='$patente'");
    }

}