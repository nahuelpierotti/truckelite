<?php


class CostosModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function insertarCostos($viaticos, $peajes, $extras, $fee, $total, $idViaje){

        return $this->database->execute("INSERT INTO Proforma (viaticos, peajes, extras, fee, total, id_viaje)
                                         VALUES($viaticos, $peajes, $extras, $fee, $total, $idViaje)");
    }
}