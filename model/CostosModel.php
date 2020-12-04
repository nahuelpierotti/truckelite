<?php


class CostosModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function insertarCostos($viaticos,$costoCombustible, $peajes,$pesajes, $extras, $fee, $total, $idViaje){

        return $this->database->execute("INSERT INTO Proforma (viaticos,costo_combustible, peajes, pesajes,extras, fee, total, id_viaje)
                                         VALUES($viaticos,$costoCombustible,$peajes,$pesajes,$extras, $fee, $total, $idViaje)");
    }
}