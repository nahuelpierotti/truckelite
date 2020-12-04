<?php

class GraficosComparativosController
{
    private $render;
    private $reporteModel;
    private $viajeModel;
    private $proformaModel;


    public function __construct($render, $reporteModel,$viajeModel,$proformaModel)
    {
        $this->reporteModel = $reporteModel;
        $this->viajeModel = $viajeModel;
        $this->proformaModel = $proformaModel;
        $this->render = $render;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        //$data["mensaje"] = $_GET["msj"];
        //$data["id_viaje"] = $_GET["id_viaje"];
        $this->mostrarGraficoComparativo($data);
        $this->calculoCombustibleConsumido($data);
        $this->calculoCostoCombustible($data);
        $this->calculoKmRecorridos($data);
        $this->calculoViaticos($data);
        $this->calculoPeajes($data);
        $this->calculoPesajes($data);
        $this->calculoExtra($data);
        $this->calculoExtraDiferencia($data);
        $this->calculoTotal($data);
        $this->calculoTotalDiferencia($data);
        echo $this->render->render("view/graficosComparativosView.php", $data);
    }

    public function mostrarGraficoComparativo(& $data){
        if(isset($_GET["url"])){
            $data["combustibleConsumido"] = $this->viajeModel->traerDatosCombustible($_GET["url"]);
            $data["kmRecorridos"] = $this->viajeModel->traerDatoskmRecorridos($_GET["url"]);
            $data["costosProforma"] = $this->proformaModel->traerCostos($_GET["url"]);
            $data["costosYcargasReporte"] = $this->reporteModel->obtenerCostosYcargasTotales($_GET["url"]);
        }
    }

    public function calculoCombustibleConsumido(& $data){
        $combustiblePrevisto = $data["combustibleConsumido"][0]["combustible_consumido_previsto"];
        $combustibleReal = $data["combustibleConsumido"][0]["combustible_consumido"];
        $data["combustibleConsumidoDiferencia"] = $combustiblePrevisto - $combustibleReal;
    }

    public function calculoCostoCombustible(& $data){
        $costoPrevisto = $data["costosProforma"][0]["costo_combustible"];
        $costoReal = $data["costosYcargasReporte"][0]["costo_carga_combustible"];
        $data["costoCombustibleDiferencia"] = $costoPrevisto - $costoReal;
    }

    public function calculoKmRecorridos(& $data){
        $kmPrevisto = $data["kmRecorridos"][0]["km_recorrido_previsto"];
        $kmReal = $data["kmRecorridos"][0]["km_recorrido"];
        $data["kmRecorridosDiferencia"] = $kmPrevisto - $kmReal;
    }

    public function calculoViaticos(& $data){
        $viaticoPrevisto = $data["costosProforma"][0]["viaticos"];
        $viaticoReal = $data["costosYcargasReporte"][0]["costo_hospedaje"];
        $data["viaticosDiferencia"] = $viaticoPrevisto - $viaticoReal;
    }

    public function calculoPesajes(&$data){
        $pesajesPrevisto = $data["costosProforma"][0]["pesajes"];
        $pesajesReal = $data["costosYcargasReporte"][0]["pesajes"];
        $data["pesajesDiferencia"] = $pesajesPrevisto - $pesajesReal;
    }

    public function calculoPeajes(&$data){
        $peajesPrevisto = $data["costosProforma"][0]["peajes"];
        $peajesReal = $data["costosYcargasReporte"][0]["peajes"];
        $data["peajesDiferencia"] = $peajesPrevisto - $peajesReal;
    }

    public function calculoExtra(&$data){
        $viaticos = $data["costosProforma"][0]["viaticos"];
        $costoHospedaje = $data["costosYcargasReporte"][0]["costo_hospedaje"];
        $data["extra"] = $viaticos - $costoHospedaje;
    }

    public function calculoExtraDiferencia(&$data){
        $extrasPrevisto = $data["costosProforma"][0]["extras"];
        $extras = $data["extra"];
        $data["extraDiferencia"] = $extrasPrevisto - $extras;
    }

    public function calculoTotal(&$data){
        $fee = $data["costosProforma"][0]["fee"];
        $costoHospedaje = $data["costosYcargasReporte"][0]["costo_hospedaje"];
        $costoCombustible = $data["costosYcargasReporte"][0]["costo_carga_combustible"];
        $peajes = $data["costosYcargasReporte"][0]["peajes"];
        $pesajes = $data["costosYcargasReporte"][0]["pesajes"];
        $extras = $data["extra"];
        $data["total"] = $fee + $extras + $costoHospedaje + $costoCombustible + $peajes + $pesajes;
    }

    public function calculoTotalDiferencia(&$data){
        $totalPrevisto = $data["costosProforma"][0]["total"];
        $total = $data["total"];
        $data["totalDiferencia"] = $totalPrevisto - $total;
    }
}