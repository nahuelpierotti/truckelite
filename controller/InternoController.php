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


        if($data["rol"] != "Administrador") {
            $data["acciones"][0]["habilitar"] = false;
            $data["acciones"][2]["habilitar"] = false;
            $data["acciones"][3]["habilitar"] = false;
            $data["acciones"][4]["habilitar"] = false;
        }
    }
}