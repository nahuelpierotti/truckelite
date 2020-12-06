<?php


class ReporteModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarReporte($idViaje,$peajes,$pesajes,$lugarCargaCombustible,$costoCargaCombustible,$cantidadCargaCombustible,$lugarHospedaje,$costoHospedaje){
        $estadoViaje = $this->obtenerEstadoDeViaje($idViaje);
        if($estadoViaje[0]["estado"]) {
            $resultado = $this->database->execute("INSERT INTO Reporte (id_viaje,peajes,pesajes,
                                         lugar_carga_combustible,costo_carga_combustible,
                                         cantidad_carga_combustible,lugar_hospedaje,
                                         costo_hospedaje) VALUES ($idViaje,$peajes,$pesajes,
                                         '$lugarCargaCombustible',
                                         $costoCargaCombustible,$cantidadCargaCombustible,'$lugarHospedaje',
                                         $costoHospedaje)");
        }
        return $resultado;
    }

    public function modificarPosicionVehiculo($idViaje,$posicionActual){
        $estadoViaje = $this->obtenerEstadoDeViaje($idViaje);
        if($estadoViaje[0]["estado"]) {
            $respuesta = $this->obtenerIdVehiculoDelViaje($idViaje);
            $idVehiculo = $respuesta[0]["id_vehiculo"];
            $resultado = $this->database->query("UPDATE Vehiculo SET posicion_actual='$posicionActual'
                                         WHERE id_vehiculo=$idVehiculo");
        }
        return $resultado;
    }

    public function modificarCombustibleYKmEnViaje($idViaje,$combustibleConsumido,$kmRecorrido){
        $estadoViaje = $this->obtenerEstadoDeViaje($idViaje);
        if($estadoViaje[0]["estado"]) {
            $data = $this->obtenerValorDeCombustibleYKmSiNoSonNulos($idViaje);
            $combustibleConsumidoExistente = $data[0]["combustible_consumido"];
            $kmRecorridoExistente = $data[0]["km_recorrido"];
            if ($combustibleConsumidoExistente != NULL && $kmRecorridoExistente != NULL) {
                $resultado = $this->database->execute("UPDATE Viaje SET 
                                                   combustible_consumido=($combustibleConsumido + $combustibleConsumidoExistente),
                                                   km_recorrido=($kmRecorrido + $kmRecorridoExistente)
                                                   WHERE id_viaje=$idViaje");
            } else {
                $resultado = $this->database->execute("UPDATE Viaje SET combustible_consumido=$combustibleConsumido,
                                                   km_recorrido=$kmRecorrido
                                                   WHERE id_viaje=$idViaje");
            }
        }
        return $resultado;
    }

    public function modificarKmEnVehiculo($idViaje,$kmRecorrido){
        $estadoViaje = $this->obtenerEstadoDeViaje($idViaje);
        if($estadoViaje[0]["estado"]) {
            $id = $this->obtenerIdVehiculoDelViaje($idViaje);
            $idVehiculo = $id[0]["id_vehiculo"];
            $resultado = $this->database->execute("UPDATE Vehiculo 
                                       SET kilometraje =kilometraje + $kmRecorrido
                                       WHERE id_vehiculo =$idVehiculo");
        }
        return $resultado;
    }

    public function obtenerCostosYcargasTotales($idViaje){
        return $this->database->query("SELECT SUM(costo_carga_combustible)costo_carga_combustible,
                                       SUM(costo_hospedaje)costo_hospedaje,
                                       SUM(peajes)peajes,
                                       SUM(pesajes)pesajes,
                                       SUM(cantidad_carga_combustible)cantidad_carga_combustible 
                                       FROM Reporte
                                       WHERE id_viaje = $idViaje");
    }

    public function modificarEstadoViaje($idViaje, $estadoViaje){
        if($estadoViaje == "Viaje finalizado"){
            $resultado = $this->database->execute("UPDATE Viaje 
                                                 SET estado = FALSE
                                                 WHERE id_viaje = $idViaje");
        }else{
            $resultado = $this->database->execute("UPDATE Viaje 
                                                 SET estado = TRUE
                                                 WHERE id_viaje = $idViaje");
        }
        return $resultado;
    }

    private function obtenerIdVehiculoDelViaje($idViaje){
        return $this->database->query("SELECT Ve.id_vehiculo
                                       FROM Vehiculo Ve JOIN Viaje V ON
                                       Ve.id_vehiculo=V.id_vehiculo
                                       WHERE V.id_viaje=$idViaje");
    }

    private function obtenerValorDeCombustibleYKmSiNoSonNulos($idViaje){
       return $this->database->query("SELECT combustible_consumido,
                                           km_recorrido FROM Viaje
                                           WHERE id_viaje=$idViaje");
    }

    public function obtenerEstadoDeViaje($idViaje){
        return $this->database->query("SELECT estado
                                       FROM Viaje
                                       WHERE id_viaje = $idViaje");
    }

}