<?php


class CargaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function insertarCarga($tipo, $peso, $hazard, $imoClass,$subClass, $reefer, $temperatura, $idViaje){
        if($hazard=='false'){
            return $this->database->execute("INSERT INTO Carga (tipo_carga, peso, hazard,reefer, temperatura, id_viaje)
             VALUES($tipo, '$peso',0,  $reefer,$temperatura, $idViaje)");
        }else{
            return $this->database->execute("INSERT INTO Carga (tipo_carga, peso, hazard, imo_class, imo_subclass, reefer, temperatura, id_viaje)
             VALUES($tipo, '$peso', $hazard, $imoClass,$subClass, $reefer,$temperatura, $idViaje)");
        }
    }
}