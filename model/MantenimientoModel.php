<?php

class MantenimientoModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarMantenimiento($kmUnidad, $costo, $interno_externo, $repuestos_cambiados, $id_mecanico, $id_vehiculo)
    {
        return $this->database->execute("INSERT INTO Mantenimiento (fecha_service,km_unidad,costo,interno_externo,repuestos_cambiados,id_mecanico,id_vehiculo) 
                                VALUES ( CURRENT_DATE, $kmUnidad, $costo, '$interno_externo', '$repuestos_cambiados',$id_mecanico,$id_vehiculo)");
    }

    public function listarMantenimiento(){
        return $this->database->query("SELECT fecha_service,km_unidad,costo,interno_externo,
                                        repuestos_cambiados,id_mantenimiento,id_mecanico,id_vehiculo,U.nombre
                                        FROM mantenimiento M JOIN usuario U WHERE U.id_usuario=id_mecanico");
    }

    public function modificarMantenimiento($km_unidad, $costo, $interno_externo, $repuestos_cambiados,$id_mantenimiento, $id_mecanico, $id_vehiculo)
    {
        return $this->database->execute("UPDATE Mantenimiento SET fecha_service= CURRENT_DATE,km_unidad=$km_unidad,
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

    public function vehiculosEnMantenimiento(&$data){
        $data["vehiculos"] = $this->database->query("SELECT T.patente, T.motor, T.chasis, T.modelo, T.marca, V.kilometraje
                                                     FROM Tractor T JOIN
                                                          Vehiculo V ON T.patente = V.fk_tractor
                                                     WHERE V.estado = FALSE");
    }
    public function finalizarMantenimiento($patente, $alarma){
        $result = $this->database->execute("UPDATE Vehiculo 
                                            SET alarma = $alarma,
                                                estado = TRUE
                                            WHERE fk_tractor = '$patente'");

        return $result ? "Se ha finalizado el mantenimiento al vehiculo." : "No se pudo realizar la operacion";
    }

    public function listarFechasServiceDelVehiculo($patente,&$data){
        $data["listaFechas"] = $this->database->query("SELECT M.fecha_service, M.repuestos_cambiados,V.fk_tractor
                                                       FROM Mantenimiento M JOIN Vehiculo V ON M.id_vehiculo = V.id_vehiculo
                                                       WHERE M.id_vehiculo = (SELECT id_vehiculo
                                                                              FROM Vehiculo 
                                                                              WHERE fk_tractor='$patente')");
    }

}