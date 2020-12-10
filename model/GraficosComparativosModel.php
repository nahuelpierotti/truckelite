<?php

class GraficosComparativosModel
{
    private $database;
    private $viajeModel;
    private $reporteModel;
    private $proformaModel;

    public function __construct($database,$viajeModel,$reporteModel,$proformaModel)
    {
        $this->database = $database;
        $this->viajeModel = $viajeModel;
        $this->reporteModel = $reporteModel;
        $this->proformaModel = $proformaModel;

    }

    public function traerDatosDeLosGraficos(&$data){
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
        $this->calculoTiempo($data);
    }

    //CONSULTAS CON BASE DE DATOS
    public function traerDatosDelViaje($idViaje,&$data){
        $data["combustibleConsumido"] = $this->viajeModel->traerDatosCombustible($idViaje);
        $data["kmRecorridos"] = $this->viajeModel->traerDatoskmRecorridos($idViaje);
        $data["costosProforma"] = $this->proformaModel->traerCostos($idViaje);
        $data["costosYcargasReporte"] = $this->reporteModel->obtenerCostosYcargasTotales($idViaje);
        $data["tiempoViaje"] =$this->viajeModel->traerTimepoPrevistoYreal($idViaje);

    }
    //LOGICA
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

        if($data["kmRecorridosDiferencia"] < 0){
            $desviacion = $data["kmRecorridosDiferencia"] * (-1);
            $this->viajeModel->agregarDesviacion($_GET["url"],$desviacion);
        }
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
        if($costoHospedaje) {
            $resultado = $viaticos - $costoHospedaje;
            if($resultado < 0){
                $data["extra"]= $resultado * (-1);
            }
        }
    }

    public function calculoExtraDiferencia(&$data){
        $extrasPrevisto = $data["costosProforma"][0]["extras"];
        $extras = ($data["extra"]) ? $data["extra"] : 0;
        $data["extraDiferencia"] = $extrasPrevisto - $extras;
    }

    public function calculoTotal(&$data){
        $fee = $data["costosProforma"][0]["fee"];
        $costoHospedaje = $data["costosYcargasReporte"][0]["costo_hospedaje"];
        $costoCombustible = $data["costosYcargasReporte"][0]["costo_carga_combustible"];
        $peajes = $data["costosYcargasReporte"][0]["peajes"];
        $pesajes = $data["costosYcargasReporte"][0]["pesajes"];
        $extras = ($data["extra"]) ? $data["extra"] : 0;

        $data["total"] = $fee + $extras + $costoHospedaje + $costoCombustible + $peajes + $pesajes;
    }

    public function calculoTotalDiferencia(&$data){
        $totalPrevisto = $data["costosProforma"][0]["total"];
        $total = $data["total"];
        $data["totalDiferencia"] = $totalPrevisto - $total;
    }

    public function calculoTiempo(&$data){
        $tiempoPrevisto = $data["tiempoViaje"][0]["tiempo_previsto"];
        $tiempoReal = $data["tiempoViaje"][0]["tiempo"];
        $data["tiempoViajeDiferencia"] = $tiempoPrevisto - $tiempoReal;
    }
}