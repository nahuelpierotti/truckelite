<?php


class ViajeModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function consultarViaje($id_viaje){
        return $this->database->query("SELECT * FROM viaje where id_viaje = '$id_viaje'");
    }

    public function agregarViaje($combustible_consumido_previsto,
                                 $fecha,
                                 $destino,
                                 $origen,
                                 $tiempo_previsto,
                                 $km_recorrido_previsto,
                                 $id_chofer,
                                 $id_vehiculo){
        return $this->database->execute("
                            INSERT INTO Viaje (combustible_consumido_previsto,
                            fecha,
                            destino,
                            origen,
                            tiempo_previsto,
                            km_recorrido_previsto,
                            id_chofer,
                            id_vehiculo) 
                            VALUES ( 
                            '$combustible_consumido_previsto',
                            '$fecha',
                            '$destino',
                            '$origen',
                            '$tiempo_previsto',
                            '$km_recorrido_previsto',
                            '$id_chofer',
                            '$id_vehiculo')");
    }

    public function modificarViaje(
        $id_viaje,
        $combustible_consumido,
        $combustible_consumido_previsto,
        $tipo_de_carga,
        $fecha,
        $destino,
        $origen,
        $desviacion,
        $tiempo,
        $tiempo_previsto,
        $km_recorrido,
        $km_recorrido_previsto,
        $cliente,
        $id_chofer,
        $id_vehiculo
    ){
        return $this->database->execute("UPDATE viaje SET 
                                id_viaje='$id_viaje',
                                combustible_consumido='$combustible_consumido',
                                combustible_consumido_previsto='$combustible_consumido_previsto',
                                tipo_de_carga='$tipo_de_carga',
                                fecha='$fecha',
                                destino='$destino',
                                origen='$origen',
                                desviacion='$desviacion',
                                tiempo='$tiempo',
                                tiempo_previsto='$tiempo_previsto',
                                km_recorrido='$km_recorrido',
                                km_recorrido_previsto='$km_recorrido_previsto',
                                cliente='$cliente',
                                id_chofer='$id_chofer',
                                id_vehiculo='$id_vehiculo'
                                WHERE id_viaje='$id_viaje'");
    }

    public function listarViajes(){
        return $this->database->query("SELECT * FROM Viaje");
    }

    public function listarViajesCriterio($criterio){
        return $this->database->query("SELECT * FROM viaje where id_viaje like  '%$criterio%' or cliente like '%$criterio%'");
    }

    public function eliminarViaje($id_viaje){
        return $this->database->execute("DELETE FROM viaje WHERE id_viaje= '$id_viaje'");
    }

    public function recuperarIdViaje($id_chofer,$fecha){
        $result = $this->database->query("SELECT id_viaje
                                       FROM Viaje
                                       WHERE fecha = '$fecha' && id_chofer = $id_chofer");

        return $result[0]["id_viaje"];
    }
}