<?php


class InternoModel
{
    private $database;
    private $vehiculoModel;

    public function __construct($database,$vehiculoModel)
    {
        $this->database = $database;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function cargarAcciones(&$data){
        $data["acciones"][0] = array("name" => "Consultar Vehiculo" , "habilitar" => true, "url" => "consultarVehiculo");
        $data["acciones"][1] = array("name" => "Usuarios" , "habilitar" => true, "url" => "listarUsuarios");
        $data["acciones"][2] = array("name" => "Registrar Viaje" , "habilitar" => true, "url" => "registrarViaje");
        $data["acciones"][3] = array("name" => "Viajes" , "habilitar" => true, "url" => "listarViajes");
        $data["acciones"][4] = array("name" => "Acoplados" , "habilitar" => true, "url" => "verAcoplados");
        $data["acciones"][5] = array("name" => "Vehiculos" , "habilitar" => true, "url" => "verVehiculos");
        $data["acciones"][6] = array("name" => "Mantenimientos" , "habilitar" => true, "url" => "listarMantenimiento");
        $data["acciones"][7] = array("name" => "Clientes" , "habilitar" => true, "url" => "listarClientes");
        $data["acciones"][8] = array("name" => "Registrar Cliente" , "habilitar" => true, "url" => "registrarCliente");

        if($data["rol"] != "Administrador") {
            $data["acciones"][1]["habilitar"] = false;
        }

        if ($data["rol"] != "Administrador" && $data["rol"] != "Supervisor"){
            $data["acciones"][2]["habilitar"] = false;
            $data["acciones"][3]["habilitar"] = false;
            $data["acciones"][4]["habilitar"] = false;
            $data["acciones"][5]["habilitar"] = false;
            $data["acciones"][7]["habilitar"] = false;
            $data["acciones"][8]["habilitar"] = false;

        }
        if($data["rol"] != "Administrador" && $data["rol"] != "Mecanico"){
            $data["acciones"][6]["habilitar"] = false;
        }

        if($data["rol"] == "Chofer"){
            $data["acciones"][0]["habilitar"] = false;
        }
    }

    public function listarVehiculosConAlarmasActivadas(&$data){
        if($data["rol"] != "Chofer"){
            $data["alarmaVehiculo"] = $this->database->query("SELECT fk_tractor, kilometraje, alarma
                                                              FROM Vehiculo
                                                              WHERE kilometraje > alarma && estado = TRUE");
        }else{
            $user = $data["user_name"];
            $data["alarmaVehiculo"] = $this->database->query("SELECT fk_tractor, kilometraje, alarma
                                                              FROM Vehiculo
                                                              WHERE estado = TRUE && kilometraje > alarma && id_vehiculo = (SELECT id_vehiculo
                                                                                                                           FROM Viaje
                                                                                                                           WHERE id_chofer = (SELECT id_usuario
                                                                                                                                              FROM Usuario
																                                                                              WHERE user_name = '$user'))");
        }

    }

    public function llevarAlService($patente){
        return $this->database->execute("UPDATE Vehiculo 
                                         SET estado = false
                                         WHERE fk_tractor = '$patente'");
    }

    public function listarVehiculosSegunElRol(&$data){
        if ($data["rol"] != "Chofer") {
            $this->vehiculoModel->listarVehiculos($data);
        }else{
            $user = $data["user_name"];
            $idVehiculo = $this->obtenerIdVehiculo($user);
            if($idVehiculo != NULL) {
                $this->vehiculoModel->mostrarVehiculo($idVehiculo[0]["id_vehiculo"], $data);
            }
        }
    }

    private function obtenerIdVehiculo($user){
        return $this->database->query("SELECT id_vehiculo
                                                  FROM Viaje
                                                  WHERE estado = TRUE AND id_chofer = (SELECT id_usuario
                                                                                       FROM Usuario
                                                                                       WHERE user_name = '$user')");
    }
}