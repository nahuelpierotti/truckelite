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
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Chofer") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        $data["id_viaje"]= $_GET["id_viaje"];
        echo $this->render->render("view/cargarDatosViajeView.php",$data);
    }

    public function cargarReporte(){
        $resultadoAgregarReporte= $this->reporteModel->agregarReporte($_POST["id_viaje"],
                                                                      $_POST["peajes"],
                                                                      $_POST["pesajes"],
                                                                      $_POST["lugar_carga_combustible"],
                                                                      $_POST["costo_carga_combustible"],
                                                                      $_POST["cantidad_carga_combustible"],
                                                                      $_POST["lugar_hospedaje"],
                                                                      $_POST["costo_hospedaje"]);
        $resultadoModificarUbicacionVehiculo = $this->reporteModel->modificarPosicionVehiculo($_POST["id_viaje"],
                                                                                              $_POST["posicion_actual"]);
        $resultadoModificarCombustibleYKmDeViaje = $this->reporteModel->modificarCombustibleYKmEnViaje($_POST["id_viaje"],
                                                                                                       $_POST["combustible_consumido"],
                                                                                                       $_POST["km_recorrido"]);
        if(!$resultadoAgregarReporte && !$resultadoModificarUbicacionVehiculo && !$resultadoModificarCombustibleYKmDeViaje ){
            header("Location: /truckelite/cargarDatosViaje?msj=ERROR");
        }else{
            header("Location: /truckelite/cargarDatosViaje?msj=AGREGADO");
        }

    }
}
