<?php
include('helper/phpqrcode/qrlib.php');

class ProformaController
{
    private $render;
    private $proformaModel;

    public function __construct($render, $proformaModel)
    {
        $this->proformaModel = $proformaModel;
        $this->render = $render;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        //$data["mensaje"] = $_GET["msj"];
        $data["id_viaje"]= $_SESSION["id_viaje"];
        $this->mostrarProforma($data);
        echo $this->render->render("view/proformaView.php", $data);
    }

    public function mostrarProforma(&$data){
        $data["datosProforma"] = $this->proformaModel->traerDatosProforma($_SESSION["id_viaje"]);
    }

    public function mostrarQr(){
        $viaje= $_GET["viaje"];
        QRcode::png("localhost/truckelite/cargarDatosViaje?id_viaje=".$viaje);
    }
}