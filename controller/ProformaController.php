<?php
include('helper/phpqrcode/qrlib.php');
require('third-party/fpdf/fpdf.php');
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
        $data["id_viaje"]= $_GET["id_viaje"]!=null ? $_GET["id_viaje"]: $_SESSION["id_viaje"];
        //unset($_SESSION["id_viaje"]);
        $this->mostrarProforma($data);
        echo $this->render->render("view/proformaView.php", $data);
    }

    public function mostrarProforma(&$data){
        $data["datosProforma"] = $this->proformaModel->traerDatosProforma($data["id_viaje"]);
        $data["datosProforma"][0]["hazard"] = $data["datosProforma"][0]["hazard"] ? $this->proformaModel->traerHazard($data["id_viaje"]) : "No tiene.";
    }

    public function mostrarQr(){
        $viaje= $_GET["viaje"];
        QRcode::png("localhost/truckelite/cargarDatosViaje?id_viaje=".$viaje);
    }

    public function exportarPdf(){
        $viaje= $_GET["viaje"];
        $data["id_viaje"]= $viaje;
        $this->mostrarProforma($data);
        $pdf=$this->proformaModel->exportarProformaPDF($data,$viaje);

        echo $this->render->render("view/proformaView.php", $pdf);
    }
}