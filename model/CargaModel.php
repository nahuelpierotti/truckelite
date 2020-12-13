<?php


class CargaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function insertarCarga($tipo, $peso, $hazard, $imoClass,$subClass, $reefer, $temperatura, $idViaje){
        return $this->database->execute("INSERT INTO Carga (tipo_carga, peso, hazard, imo_class, imo_subclass, reefer, temperatura, id_viaje)
                                                     VALUES($tipo, '$peso', $hazard, $imoClass,$subClass, $reefer,$temperatura, $idViaje)");
    }
}