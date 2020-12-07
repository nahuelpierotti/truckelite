<?php


class VerVehiculosController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render,$vehiculoModel){
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        $this->vehiculoModel->listarVehiculos($data);

        echo $this->render->render("view/verVehiculosView.php",$data);
    }

    public function eliminarVehiculo(){
        if (isset($_GET["url"])) {
            $mensaje = $this->vehiculoModel->eliminarVehiculo($_GET["url"]);
            header("Location: /truckelite/verVehiculos?msj=$mensaje");
        }else{
            header("Location: /truckelite/verVehiculos");
        }
    }
}