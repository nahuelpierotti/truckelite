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
        $this->listarVehiculos($data);

        echo $this->render->render("view/verVehiculosView.php",$data);
    }

    private function listarVehiculos(&$data){
        $data["listar"] = $this->vehiculoModel->listarVehiculos();
    }

    public function eliminarVehiculo(){
        if (isset($_GET["url"])) {
            $data = $this->vehiculoModel->eliminarVehiculo($_GET["url"]);
            if (!$data){
                header("Location: /truckelite/verVehiculos?msj=No se pudo eliminar el vehiculo");
            } else{
                header("Location: /truckelite/verVehiculos?msj=El vehiculo se elimino correctamente");
            }
        }else{
            header("Location: /truckelite/verVehiculos");
        }
    }
}