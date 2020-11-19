<?php

class ChoferModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarChofer($id)
    {
        $existe = $this->database->execute("SELECT id_usuario FROM Usuario WHERE id_usuario='$id'");
        if ($existe) {
            $this->database->query("INSERT INTO Chofer (id_usuario) VALUES($id)");
        }
    }
}