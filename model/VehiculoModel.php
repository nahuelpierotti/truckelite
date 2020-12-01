<?php


class VehiculoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarTractor(){
        return $this->database->query("SELECT * FROM Tractor");
    }

    public function listarAcoplado(){
        return $this->database->query("SELECT * FROM Acoplado");
    }

    public function listarVehiculos(){
        return $this->database->query("SELECT * FROM Vehiculo");
    }

    public function buscarAcoplado($patente){
        return $this->database->query("SELECT * FROM Acoplado WHERE patente_acoplado = '$patente'");
    }

    public function buscarTractor($patente){
        return $this->database->query("SELECT * FROM Tractor WHERE patente = '$patente'");
    }

    public function buscarVehiculo($patente){
        return $this->database->query("SELECT * FROM Vehiculo WHERE fk_tractor = '$patente'");
    }

    public function agregarAcoplado($patente, $tipo, $chasis){
        return $this->database->execute("INSERT INTO Acoplado(patente_acoplado, tipo, chasis_acoplado)
                                        VALUES('$patente' , '$tipo', '$chasis')");
    }

    public function agregarTractor($patente, $motor, $chasis, $modelo, $marca, $acoplado){
        if ($acoplado){
            $result = $this->database->execute("INSERT INTO Tractor(patente, motor, chasis, modelo, marca, fk_acoplado)
                                        VALUES('$patente', '$motor', '$chasis', '$modelo', '$marca', '$acoplado')");
        }else{
            $result = $this->database->execute("INSERT INTO Tractor(patente, motor, chasis, modelo, marca)
                                        VALUES('$patente', '$motor', '$chasis', '$modelo', '$marca')");
        }
        return $result;
    }

    public function agregarVehiculo($patente, $posicion, $estado){
        return $this->database->execute("INSERT INTO Vehiculo(fk_tractor, posicion_actual, estado)
                                        VALUES('$patente', '$posicion', '$estado')");
    }

    public function modificarAcoplado($patente , $tipo, $chasis, $patenteDestino){
        return $this->database->execute("UPDATE Acoplado SET 
                                         patente_acoplado = '$patente', 
                                         tipo = '$tipo', 
                                         chasis_acoplado ='$chasis' 
                                         WHERE patente_acoplado = '$patenteDestino'");
    }

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

    public function modificarVehiculo($patente , $posicion, $estado, $patenteDestino){
        return $this->database->execute("UPDATE Vehiculo SET fk_tractor = '$patente',
                                  posicion_actual = '$posicion',
                                  estado = '$estado'
                                  WHERE fk_tractor = '$patenteDestino'");
    }

    public function eliminarAcoplado($patente){
        $this->desacoplar($patente);
        return $this->database->execute("DELETE FROM Acoplado WHERE patente_acoplado = '$patente'");
    }

    public function eliminarTractor($patente){
        $this->eliminarVehiculo($patente);
        return $this->database->execute("DELETE FROM Tractor WHERE patente = '$patente'");
    }

    public function eliminarVehiculo($patente){
        return $this->database->execute("DELETE FROM Vehiculo WHERE fk_tractor = '$patente'");
    }

    private function desacoplar($patenteAcoplado){
        $existe = $this->database->execute("SELECT fk_acoplado FROM Tractor WHERE fk_acoplado = '$patenteAcoplado'");
        if($existe){
            $this->database->execute("UPDATE Tractor SET 
                                     fk_acoplado = NULL
                                     WHERE fk_acoplado = '$patenteAcoplado'");
        }
    }

    public function obtenerIdVehiculoPorSuPatente($patente){
        return $this->database->query("SELECT id_vehiculo FROM Vehiculo WHERE fk_tractor='$patente'");
    }

    public function consultarVehiculo($consulta ,$patente){

        switch ($consulta){
            case "posicionActual":
                $result = $this->database->query("SELECT posicion_actual FROM Vehiculo WHERE fk_tractor = '$patente'");
                $result = $result ? "La posicion del vehiculo es: " . $result[0]["posicion_actual"] : "Patente Inexistente";
                break;

            case "kilometros":
                $result = $this->database->query("SELECT km_recorrido
                                                  FROM Viaje
                                                  WHERE id_vehiculo = (SELECT id_vehiculo
                                                                       FROM Vehiculo
                                                                       WHERE fk_tractor = '$patente')");
                if ($result){
                    $result = "La cantidad de kilometros reales recorridos en el viaje es " . $result[0]["km_recorrido"] . " km";
                }else{
                    $result = "El vehiculo no se encuentra en ningun viaje.";
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
                }else{
                    $result = "El vehiculo no se encuentra en ningun viaje.";
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
                }else{
                    $result = "El vehiculo no se encuentra en ningun viaje.";
                }
                break;
        }

        return $result;
    }

}