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
    }

    public function mostrarQr(){
        $viaje= $_GET["viaje"];
        QRcode::png("localhost/truckelite/cargarDatosViaje?id_viaje=".$viaje);
    }

    public function exportarPdf(){
        $viaje= $_GET["viaje"];
        $data["id_viaje"]= $viaje;
        $this->mostrarProforma($data);

        $pdf = new FPDF();
        $pdf->AddPage();
        // Logo
        $pdf->Image('view/img/logo.png',80,-2,50);
        $pdf->Ln(30);
        // Titulo
        $pdf->SetFont('Helvetica','B',18);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"Proforma Numero: ".$data["datosProforma"][0]["id"],0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0,10,'Fecha Creacion del Viaje: '.$data["datosProforma"][0]["fecha"],0,4,'C');
        // Cliente
        $pdf->SetFont('Helvetica','B',14);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"Datos del Cliente",0,1,'L');
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0,10,'Denominacion: '.$data["datosProforma"][0]["denominacion"],0,1,'L');
        $pdf->Cell(0,10,'CUIT: '.$data["datosProforma"][0]["cuit"],0,1,'L');
        $pdf->Cell(0,10,'Direccion: '.$data["datosProforma"][0]["direccion"],0,1,'L');
        $pdf->Cell(0,10,'Telefono: '.$data["datosProforma"][0]["telefono"],0,1,'L');
        $pdf->Cell(0,10,'Email: '.$data["datosProforma"][0]["email"],0,1,'L');
        $pdf->Cell(0,10,'Contacto 1: '.$data["datosProforma"][0]["contacto1"],0,1,'L');
        $pdf->Cell(0,10,'Contacto 2: '.$data["datosProforma"][0]["contacto2"],0,1,'L');
        $pdf->Ln(5);
        // Chofer
        $pdf->SetFont('Helvetica','B',14);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"Chofer Asignado",0,1,'L');
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0,10,'Nombre y Apellido: '.$data["datosProforma"][0]["nombre"],0,1,'L');
        $pdf->Ln(5);
        //Viaje
        $pdf->SetFont('Helvetica','B',14);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"Viaje",0,1,'L');
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0,10,'Origen: '.$data["datosProforma"][0]["origen"],0,1,'L');
        $pdf->Cell(0,10,'Destino: '.$data["datosProforma"][0]["destino"],0,1,'L');
        $pdf->Cell(0,10,'Fecha de Carga: '.$data["datosProforma"][0]["fecha"],0,1,'L');
        $pdf->Cell(0,10,'ETA: '.$data["datosProforma"][0]["eta"],0,1,'L');
        $pdf->Ln(5);
        //Carga
        $pdf->SetFont('Helvetica','B',14);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"Carga",0,1,'L');
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0,10,'Tipo de Carga: '.$data["datosProforma"][0]["descripcion"],0,1,'L');
        $pdf->Cell(0,10,'Peso Neto: '.$data["datosProforma"][0]["peso"],0,1,'L');
        $pdf->Cell(0,10,'Hazard: '.$data["datosProforma"][0]["hazard"],0,1,'L');
        $pdf->Cell(0,10,'Reefer: '.$data["datosProforma"][0]["reefer"],0,1,'L');
        $pdf->Ln(5);
        //Costo Estimado
        $pdf->SetFont('Helvetica','B',14);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"Costo Estimado",0,1,'L');
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0,10,'Kilometros Estimados: '.$data["datosProforma"][0]["km_recorrido_previsto"],0,1,'L');
        $pdf->Cell(0,10,'Combustible Estimado: '.$data["datosProforma"][0]["combustible_consumido_previsto"],0,1,'L');
        $pdf->Cell(0,10,'ETD Estimado: '.$data["datosProforma"][0]["etd"],0,1,'L');
        $pdf->Cell(0,10,'ETA Estimado: '.$data["datosProforma"][0]["eta"],0,1,'L');
        $pdf->Cell(0,10,'Viaticos: $'.$data["datosProforma"][0]["viaticos"],0,1,'L');
        $pdf->Cell(0,10,'Peaje y Pasajes: $'.$data["datosProforma"][0]["peajes"],0,1,'L');
        $pdf->Cell(0,10,'Extras: $'.$data["datosProforma"][0]["extras"],0,1,'L');
        $pdf->Cell(0,10,'Hazard: '.$data["datosProforma"][0]["hazard"],0,1,'L');
        $pdf->Cell(0,10,'Reefer: '.$data["datosProforma"][0]["reefer"],0,1,'L');
        $pdf->Cell(0,10,'Fee: $'.$data["datosProforma"][0]["fee"],0,1,'L');
        $pdf->Ln(5);
        $pdf->SetFont('Helvetica','B',14);
        $pdf->SetTextColor(33,150,243);
        $pdf->Cell(0,10,"TOTAL: $".$data["datosProforma"][0]["total"],0,1,'L');
        $pdf->Ln(5);
        QRcode::png("localhost/truckelite/cargarDatosViaje?id_viaje=".$viaje,"qr_img.png");
        $pdf->Image("qr_img.png", 150,100,40, 40, "png");
        $pdf->Output();
        echo $this->render->render("view/proformaView.php", $pdf);
    }
}