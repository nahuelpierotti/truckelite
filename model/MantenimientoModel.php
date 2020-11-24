<?php

class MantenimientoModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarMantenimiento($fecha, $kmUnidad, $costo, $interno_externo, $repuestos_cambiados, $id_mecanico, $id_vehiculo)
    {
        return $this->database->execute("INSERT INTO Mantenimiento (fecha_service,km_unidad,costo,interno_externo,repuestos_cambiados,id_mecanico,id_vehiculo) 
                                VALUES ( '$fecha', $kmUnidad, $costo, '$interno_externo', '$repuestos_cambiados',$id_mecanico,$id_vehiculo)");
    }

    public function listarMantenimiento(){
        return $this->database->query("SELECT fecha_service,km_unidad,costo,interno_externo,
                                        repuestos_cambiados,id_mantenimiento,id_mecanico,id_vehiculo,U.nombre
                                        FROM mantenimiento M JOIN usuario U WHERE U.id_usuario=id_mecanico");
    }

    public function modificarMantenimiento($fecha_service, $km_unidad, $costo, $interno_externo, $repuestos_cambiados,$id_mantenimiento, $id_mecanico, $id_vehiculo)
    {
        return $this->database->execute("UPDATE Mantenimiento SET fecha_service='$fecha_service',km_unidad=$km_unidad,
                                        costo=$costo,interno_externo='$interno_externo',repuestos_cambiados='$repuestos_cambiados',
                                        id_mecanico=$id_mecanico,id_vehiculo=$id_vehiculo
                                        WHERE id_mantenimiento='$id_mantenimiento'");
    }

    public function eliminarMantenimiento($id)
    {
        return $this->database->execute("DELETE FROM Mantenimiento WHERE id_mantenimiento= $id");
    }

    public function buscarMantenimiento($id){
        return $this->database->query("SELECT fecha_service,km_unidad,costo,interno_externo,repuestos_cambiados,id_mantenimiento,id_mecanico,id_vehiculo FROM Mantenimiento WHERE id_mantenimiento=$id ");
    }

}