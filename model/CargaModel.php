<?php


class CargaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function insertarCarga($tipo, $peso, $hazard, $imoClass, $reefer, $temperatura, $idViaje){
        if($temperatura == ""){
            $result = $this->database->execute("INSERT INTO Carga (tipo_carga, peso, hazard, imo_class, reefer, id_viaje)
                                         VALUES($tipo, '$peso', $hazard, $imoClass, $reefer, $idViaje)");
        }else{
            $result = $this->database->execute("INSERT INTO Carga (tipo_carga, peso, hazard, imo_class, reefer, temperatura, id_viaje)
                                         VALUES($tipo, '$peso', $hazard, $imoClass, $reefer, '$temperatura', $idViaje)");
        }

        return $result;
    }
}