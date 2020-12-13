<?php

class CargarDatosViajeController
{
    private $render;
    private $reporteModel;

    public function __construct($render, $reporteModel)
    {
        $this->reporteModel = $reporteModel;
        $this->render = $render;
    }

    public function execute()
    {
        if (isset($_GET["id_viaje"])) $_SESSION["id_viaje"] = $_GET["id_viaje"];
        if (!$this->reporteModel->validarChofer($_SESSION["id_viaje"],$_SESSION["usuario"]["user_name"])) header("Location: /truckelite/interno");
        if(isset($_GET["msj"])) $data["mensaje"] = $_GET["msj"];
        $data = $_SESSION["usuario"];
        $data["id_viaje"] = $_SESSION["id_viaje"];
        $data["estado"] = $this->reporteModel->obtenerEstadoDeViaje($data["id_viaje"]);
        echo $this->render->render("view/cargarDatosViajeView.php",$data);
    }

    public function cargarReporte(){
        $mensaje = $this->reporteModel->agregarReporte($_POST["id_viaje"],
                                                       $_POST["peajes"],
                                                       $_POST["pesajes"],
                                                       $_POST["lugar_carga_combustible"],
                                                       $_POST["costo_carga_combustible"],
                                                       $_POST["cantidad_carga_combustible"],
                                                       $_POST["lugar_hospedaje"],
                                                       $_POST["costo_hospedaje"],
                                                       $_POST["posicion_actual"],
                                                       $_POST["combustible_consumido"],
                                                       $_POST["km_recorrido"],
                                                       $_POST["tiempo"],
                                                       $_POST["estadoViaje"]);

        header("Location: /truckelite/cargarDatosViaje?msj=$mensaje");
    }
}
