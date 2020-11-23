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
        $existe = $this->database->execute("SELECT id_usuario FROM Usuario WHERE id_usuario='$id'");
        if ($existe) {
            $this->database->query("INSERT INTO Administrador (id_usuario) VALUES($id)");
        }
    }

    public function eliminarAdministrador($id){
        $this->database->query("DELETE FROM Administrador WHERE id_usuario= $id");
    }
}