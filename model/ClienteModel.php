<?php

class ClienteModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarCliente($denominacion, $cuit, $direccion, $telefono, $mail, $contacto1, $contacto2, $idViaje){

        return $this->database->execute("INSERT INTO Cliente (denominacion,cuit,direccion,telefono,email,contacto1,contacto2,id_viaje) 
                                VALUES ('$denominacion', 
                                         $cuit, 
                                         '$direccion', 
                                         $telefono, 
                                         '$mail', 
                                         '$contacto1' , 
                                         '$contacto2',
                                         $idViaje)");
    }
}