<?php


class InternoController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        if(!$_SESSION["usuario"]["rol"]){
            $_SESSION["mensaje"] = "Todavia no le dieron el alta para utilizar el sistema.";
            header("Location: /truckelite");
        }
        $data = $_SESSION["usuario"];
        $this->cargarAcciones($data);
        $_SESSION["usuario"]["acciones"] = $data["acciones"];

        echo $this->render->render("view/internoView.php",$data);
    }

    private function cargarAcciones(&$data){
        $data["acciones"][0] = array("name" => "Modificar Usuario" , "habilitar" => true, "url" => "modificarUsuario");
        $data["acciones"][1] = array("name" => "Consultar Vehiculo" , "habilitar" => true, "url" => "consultarVehiculo");
        $data["acciones"][2] = array("name" => "Listar Usuarios" , "habilitar" => true, "url" => "listarUsuarios");
        $data["acciones"][3] = array("name" => "Registrar Viaje" , "habilitar" => true, "url" => "registrarViaje");
        $data["acciones"][4] = array("name" => "Listar Viajes" , "habilitar" => true, "url" => "listarViajes");
        $data["acciones"][5] = array("name" => "Ver Acoplados" , "habilitar" => true, "url" => "verAcoplados");
        $data["acciones"][6] = array("name" => "Ver Vehiculos" , "habilitar" => true, "url" => "verVehiculos");
        $data["acciones"][7] = array("name" => "Mantenimineto" , "habilitar" => true, "url" => "mantenimiento");
        $data["acciones"][8] = array("name" => "Listar Mantenimiento" , "habilitar" => true, "url" => "listarMantenimiento");
        $data["acciones"][9] = array("name" => "Registrar Clientes" , "habilitar" => true, "url" => "cargaCliente");
        $data["acciones"][10] = array("name" => "Listar Clientes" , "habilitar" => true, "url" => "listarClientes");

        if($data["rol"] != "Administrador") {
            $data["acciones"][0]["habilitar"] = false;
            $data["acciones"][2]["habilitar"] = false;
        }

        if ($data["rol"] != "Administrador" && $data["rol"] != "Supervisor"){
            $data["acciones"][3]["habilitar"] = false;
            $data["acciones"][4]["habilitar"] = false;
            $data["acciones"][5]["habilitar"] = false;
            $data["acciones"][6]["habilitar"] = false;
        }
        if($data["rol"] != "Administrador" && $data["rol"] != "Mecanico"){
            $data["acciones"][7]["habilitar"] = false;
            $data["acciones"][8]["habilitar"] = false;
        }
    }
}