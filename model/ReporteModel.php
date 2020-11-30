<?php


class ReporteModel
{
    private $database;
    private $vehiculoModel;
    private $cargaModel;

    public function __construct($database,$vehiculoModel,$cargaModel)
    {
        $this->database = $database;
        $this->vehiculoModel = $vehiculoModel;
        $this->cargaModel = $cargaModel;
    }

    public function agregarReporte($id_viaje,$lugar_carga_combustible,$costo_carga_combustible,$cantidad_carga_combustible,$lugar_hospedaje,$costo_hospedaje){
        return $this->database->execute("INSERT INTO Reporte (id_viaje,lugar_carga_combustible,
                                         costo_carga_combustible,cantidad_carga_combustible,lugar_hospedaje,
                                         costo_hospedaje) VALUES ($id_viaje,'$lugar_carga_combustible',
                                         $costo_carga_combustible,$cantidad_carga_combustible,'$lugar_hospedaje',
                                         $costo_hospedaje)");
    }

    public function modificarPosicionVehiculo($id_viaje,$posicion_actual){
        $respuesta = $this->obtenerIdVehiculoDelViaje($id_viaje);
        $id_vehiculo = $respuesta[0]["id_vehiculo"];
        return $this->database->query("UPDATE Vehiculo SET posicion_actual='$posicion_actual'
                                         WHERE id_vehiculo=$id_vehiculo");
    }

    public function modificarCombustibleYKmEnViaje($id_viaje,$combustible_consumido,$km_recorrido){
        $data= $this->obtenerValorDeCombustibleYKmSiNoSonNulos($id_viaje);
        $combustibleConsumidoExistente=$data[0]["combustible_consumido"];
        $kmRecorridoExistente = $data[0]["km_recorrido"];
        if($combustibleConsumidoExistente!=NULL && $kmRecorridoExistente!=NULL){
            $resultado = $this->database->execute("UPDATE Viaje SET 
                                                   combustible_consumido=($combustible_consumido + $combustibleConsumidoExistente),
                                                   km_recorrido=($km_recorrido + $kmRecorridoExistente)
                                                   WHERE id_viaje=$id_viaje");
        }else {
            $resultado = $this->database->execute("UPDATE Viaje SET combustible_consumido=$combustible_consumido,
                                                   km_recorrido=$km_recorrido
                                                   WHERE id_viaje=$id_viaje");
        }
        return $resultado;
    }

    public function obtenerIdVehiculoDelViaje($id_viaje){
        return $this->database->query("SELECT Ve.id_vehiculo
                                       FROM Vehiculo Ve JOIN Viaje V ON
                                       Ve.id_vehiculo=V.id_vehiculo
                                       WHERE V.id_viaje=$id_viaje");
    }

    public function obtenerValorDeCombustibleYKmSiNoSonNulos($id_viaje){
       return $this->database->query("SELECT combustible_consumido,
                                           km_recorrido FROM Viaje
                                           WHERE id_viaje=$id_viaje");
    }
}