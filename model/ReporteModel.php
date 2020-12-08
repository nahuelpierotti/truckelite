<?php


class ReporteModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerEstadoDeViaje($idViaje){
        $result = $this->database->query("SELECT estado
                                          FROM Viaje
                                          WHERE id_viaje = $idViaje");
        return $result ? $result[0]["estado"] : FALSE ;
    }

    private function modificarEstadoViaje($estadoViaje){
        return ($estadoViaje == "Viaje Finalizado") ? "estado = FALSE" : "estado = TRUE";
    }

    public function agregarReporte($idViaje,
                                   $fecha,
                                   $peajes,
                                   $pesajes,
                                   $lugarCargaCombustible,
                                   $costoCargaCombustible,
                                   $cantidadCargaCombustible,
                                   $lugarHospedaje,
                                   $costoHospedaje,
                                   $posicionActual,
                                   $combustibleConsumido,
                                   $kmRecorrido,
                                   $estadoViaje){
        $mensaje = "No se pudo realizar la operacion.";
        $condicion = $this->obtenerEstadoDeViaje($idViaje);

        if ($condicion){
            $estadoNuevo = $this->modificarEstadoViaje($estadoViaje);

            //ACTUALIZA EN VEHICULO POSICION Y KILOMETRAJE
            $sql = "UPDATE Vehiculo 
                    SET posicion_actual = '$posicionActual',
                        kilometraje = kilometraje + $kmRecorrido
                    WHERE id_vehiculo = (SELECT id_vehiculo
                                         FROM Viaje
                                         WHERE id_viaje = $idViaje);";

            //ACTUALIZA EN VIAJE COMBUSTIBLE , KM Y ESTADO
            $sql .= "UPDATE Viaje 
                     SET combustible_consumido = combustible_consumido + $combustibleConsumido,
                         km_recorrido = km_recorrido + $kmRecorrido,
                         $estadoNuevo
                     WHERE id_viaje = $idViaje;";

            //INSERTA UN NUEVO REPORTE
            $sql .= "INSERT INTO Reporte(id_viaje, fecha, peajes, pesajes, lugar_carga_combustible, 
                                     costo_carga_combustible,cantidad_carga_combustible,lugar_hospedaje,costo_hospedaje) 
                     VALUES ($idViaje, CURRENT_DATE, $peajes, $pesajes, '$lugarCargaCombustible',
                             $costoCargaCombustible, $cantidadCargaCombustible, '$lugarHospedaje',$costoHospedaje);";


            //EJECUTA TODAS LAS QUERYS ANIDADAS SI UNA QUERY NO SE PUDO REALIZAR REVIERTE LOS CAMBIOS REALIZADOS POR LAS QUERYS ANTERIORES
            if ($this->database->transaccion($sql)) $mensaje = "Operacion exitosa.";

        }

        return $mensaje;
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

}