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

    public function agregarViaje($id_cliente,
                                 $combustible_consumido_previsto,                                 
								$origen,
                                 $tiempo_previsto,
                                 $km_recorrido_previsto,
                                 $id_chofer,
                                 $id_vehiculo,
                                 $eta,
                                 $etd){
        return $this->database->regresaId("
                            INSERT INTO Viaje (
                            id_cliente,
                            combustible_consumido_previsto,
                                               fecha,
                                               destino,
                                               origen,
                                               tiempo_previsto,
                                               km_recorrido_previsto,
                                               id_chofer,
                                               id_vehiculo,
                                               eta,
                                               etd,
                                               estado,
                                               combustible_consumido,
                                               km_recorrido,
                                               desviacion) 
                            VALUES ( 
                            '$id_cliente',
                            '$combustible_consumido_previsto',
                            CURRENT_DATE,
                            '--',
                            '$origen',
                            '$tiempo_previsto',
                            '$km_recorrido_previsto',
                            '$id_chofer',
                            '$id_vehiculo',
                            '$eta',
                            '$etd',
                            TRUE,
                            0,
                            0,
                            0)");

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
        return $this->database->query("SELECT V.id_viaje, V.combustible_consumido_previsto, V.km_recorrido_previsto,
                                              V.destino, V.origen, C.denominacion, Tc.descripcion, V.fecha,
                                              C.direccion as destino, V.origen, C.denominacion, Tc.descripcion, V.fecha,
                                              V.tiempo_previsto, U.nombre, Ve.fk_tractor
                                       FROM Viaje V JOIN Usuario U ON U.id_usuario = V.id_chofer JOIN
                                            Cliente C ON V.id_cliente = C.id JOIN
                                            Vehiculo Ve ON Ve.id_vehiculo = V.id_vehiculo JOIN
                                            Carga Car ON Car.id_viaje = V.id_viaje JOIN
                                            Tipo_carga Tc ON Car.tipo_carga = Tc.id");
    }

    public function listarViajesCriterio($criterio){
        $criterio = is_numeric($criterio) ? "WHERE V.id_viaje =" . $criterio : "WHERE V.destino = '$criterio'";

        return $this->database->query("SELECT V.id_viaje, V.combustible_consumido_previsto, V.km_recorrido_previsto,
                                              V.destino, V.origen, C.denominacion, Tc.descripcion, V.fecha,
                                              C.direccion as destino, V.origen, C.denominacion, Tc.descripcion, V.fecha,
                                              V.tiempo_previsto, U.nombre, Ve.fk_tractor
                                       FROM Viaje V JOIN Usuario U ON U.id_usuario = V.id_chofer JOIN
                                            Cliente C ON V.id_cliente = C.id JOIN
                                            Vehiculo Ve ON Ve.id_vehiculo = V.id_vehiculo JOIN
                                            Carga Car ON Car.id_viaje = V.id_viaje JOIN
                                            Tipo_carga Tc ON Car.tipo_carga = Tc.id
                                       $criterio");
    }

    public function eliminarViaje($id_viaje){
        return $this->database->execute("DELETE FROM viaje WHERE id_viaje= '$id_viaje'");
    }

    public function traerDatosCombustible($idViaje){
        return $this->database->query("SELECT combustible_consumido_previsto,
                                      combustible_consumido FROM Viaje
                                      WHERE id_viaje= $idViaje");
    }

    public function traerDatosKmRecorridos($idViaje){
        return $this->database->query("SELECT km_recorrido_previsto,
                                      km_recorrido FROM Viaje
                                      WHERE id_viaje= $idViaje");
    }

    public function cargarChoferesDisponibles(&$data){
        $data["choferes"] = $this->database->query("SELECT C.id_usuario, U.nombre
                                                    FROM Chofer C JOIN
                                                         Usuario U ON C.id_usuario = U.id_usuario
                                                    WHERE C.id_usuario NOT IN (SELECT id_chofer
                                                                               FROM Viaje
                                                                               WHERE estado = TRUE)");
    }

    public function cargarVehiculosDisponibles(&$data){
        $data["vehiculos"] = $this->database->query("SELECT id_vehiculo, fk_tractor
                                                     FROM Vehiculo
                                                     WHERE id_vehiculo NOT IN (SELECT id_vehiculo
                                                                               FROM Viaje
                                                                               WHERE estado = TRUE)");
    }

    public function cargarClientesDisponibles(&$data){
        $data["clientes"] = $this->database->query("SELECT id,denominacion
                                                     FROM Cliente
                                                     ");
    }

}