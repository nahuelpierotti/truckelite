<?php


class ConsultarVehiculoController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render, $vehiculoModel){
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] == "Chofer") header("Location: /truckelite");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        echo $this->render->render("view/consultarVehiculoView.php", $data);
    }

    public function procesarConsulta(){
        $msj = $this->vehiculoModel->consultarVehiculo($_POST["consultaVehiculo"], $_POST["patente"]);

        header("Location: /truckelite/consultarVehiculo?msj=$msj");
    }

}