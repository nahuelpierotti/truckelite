<?php


class ReporteModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarReporte($idViaje,$lugarCargaCombustible,$costoCargaCombustible,$cantidadCargaCombustible,$lugarHospedaje,$costoHospedaje){
        return $this->database->execute("INSERT INTO Reporte (id_viaje,lugar_carga_combustible,
                                         costo_carga_combustible,cantidad_carga_combustible,lugar_hospedaje,
                                         costo_hospedaje) VALUES ($idViaje,'$lugarCargaCombustible',
                                         $costoCargaCombustible,$cantidadCargaCombustible,'$lugarHospedaje',
                                         $costoHospedaje)");
    }

    public function modificarPosicionVehiculo($idViaje,$posicionActual){
        $respuesta = $this->obtenerIdVehiculoDelViaje($idViaje);
        $idVehiculo = $respuesta[0]["id_vehiculo"];
        return $this->database->query("UPDATE Vehiculo SET posicion_actual='$posicionActual'
                                         WHERE id_vehiculo=$idVehiculo");
    }

    public function modificarCombustibleYKmEnViaje($idViaje,$combustibleConsumido,$kmRecorrido){
        $data= $this->obtenerValorDeCombustibleYKmSiNoSonNulos($idViaje);
        $combustibleConsumidoExistente=$data[0]["combustible_consumido"];
        $kmRecorridoExistente = $data[0]["km_recorrido"];
        if($combustibleConsumidoExistente!=NULL && $kmRecorridoExistente!=NULL){
            $resultado = $this->database->execute("UPDATE Viaje SET 
                                                   combustible_consumido=($combustibleConsumido + $combustibleConsumidoExistente),
                                                   km_recorrido=($kmRecorrido + $kmRecorridoExistente)
                                                   WHERE id_viaje=$idViaje");
        }else {
            $resultado = $this->database->execute("UPDATE Viaje SET combustible_consumido=$combustibleConsumido,
                                                   km_recorrido=$kmRecorrido
                                                   WHERE id_viaje=$idViaje");
        }
        return $resultado;
    }

    public function obtenerIdVehiculoDelViaje($idViaje){
        return $this->database->query("SELECT Ve.id_vehiculo
                                       FROM Vehiculo Ve JOIN Viaje V ON
                                       Ve.id_vehiculo=V.id_vehiculo
                                       WHERE V.id_viaje=$idViaje");
    }

    public function obtenerValorDeCombustibleYKmSiNoSonNulos($idViaje){
       return $this->database->query("SELECT combustible_consumido,
                                           km_recorrido FROM Viaje
                                           WHERE id_viaje=$idViaje");
    }
}