<?php

class ClienteModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarClientes(){
        return $this->database->query("SELECT * FROM cliente");
    }

    public function agregarCliente($denominacion, $cuit, $direccion, $telefono, $mail, $contacto1, $contacto2){

        return $this->database->execute("INSERT INTO Cliente (denominacion,cuit,direccion,telefono,email,contacto1,contacto2) 
                                VALUES ('$denominacion', 
                                         $cuit, 
                                         '$direccion', 
                                         $telefono, 
                                         '$mail', 
                                         '$contacto1' , 
                                         '$contacto2');");
    }

    public function eliminarCliente($id){
        return $this->database->execute("DELETE FROM cliente WHERE id= $id");
    }

    public function buscarCliente($id){
        return $this->database->query("SELECT id,denominacion,cuit,direccion,telefono,email,contacto1,contacto2 FROM Cliente WHERE id=$id ");
    }

    public function modificarCliente($id,
                                     $denominacion,
                                     $cuit,
                                     $direccion,
                                     $telefono,
                                     $mail,
                                     $contacto1,
                                     $contacto2){
    return $this->database->execute("UPDATE Cliente SET denominacion= '$denominacion',cuit = '$cuit', direccion='$direccion', telefono= '$telefono', email= '$mail', contacto1= '$contacto1', contacto2='$contacto2' WHERE id= $id");

    }
}