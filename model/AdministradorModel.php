<?php

class AdministradorModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarAdministrador($id)
    {
        return $this->database->execute("INSERT INTO Administrador (id_usuario) VALUES($id)");

    }

    public function eliminarAdministrador($id){
       return $this->database->execute("DELETE FROM Administrador WHERE id_usuario= $id");
    }
}