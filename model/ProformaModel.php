<?php


class ProformaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function traerDatosProforma($idViajeModel){
        return $this->database->query("
           SELECT V.fecha,V.origen,C.direccion as destino,V.etd,V.eta,
           V.km_recorrido_previsto,V.combustible_consumido_previsto,
           V.km_recorrido,V.combustible_consumido,V.etd_real,V.eta_real,
           C.denominacion,C.cuit,C.direccion,C.telefono,C.email,C.contacto1,
           C.contacto2,P.id,P.viaticos,P.peajes,P.pesajes,P.extras,P.fee,P.total,
           P.costo_combustible,U.nombre,Tc.descripcion,Car.peso,Car.hazard,Car.reefer,Car.temperatura
           FROM Usuario U JOIN Viaje V ON U.id_usuario=V.id_chofer JOIN 
           Cliente C ON V.id_cliente=C.id
           JOIN   Proforma P ON V.id_viaje=P.id_viaje JOIN
           Carga Car ON V.id_viaje=Car.id_viaje JOIN
           Tipo_carga Tc ON Car.tipo_carga=Tc.id
           WHERE V.id_viaje=$idViajeModel");
    }

    public function traerCostos($idViaje){
        return $this->database->query("SELECT costo_combustible,viaticos,
                                        peajes,pesajes,extras,fee,total
                                        FROM Proforma
                                        WHERE id_viaje= $idViaje");
    }

    public function exportarProformaPDF($data,$viaje){
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
        $pdf->Cell(0,10,'Peajes: $'.$data["datosProforma"][0]["peajes"],0,1,'L');
        $pdf->Cell(0,10,'Pesajes: $'.$data["datosProforma"][0]["pesajes"],0,1,'L');
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
        return $pdf;
    }

    public function traerHazard($idViajeModel){
        $data = $this->database->query("SELECT IC.tipo,IC.id
                                        FROM Carga C JOIN
                                             Imo_class IC ON IC.id = C.imo_class 
                                        WHERE C.id_viaje = $idViajeModel");
        $hazard  = $data[0]["tipo"];
        $idImoClass = $data[0]["id"];

        $data = $this->database->query("SELECT tipo
                                        FROM Imo_subclass
                                        WHERE id_class = $idImoClass");

        $hazard .= $data[0]["tipo"] ? " y " . $data[0]["tipo"] : ".";

        return $hazard;
    }
}