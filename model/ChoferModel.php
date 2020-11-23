<?php

class ChoferModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarChofer($id,$licencia)
    {
        $existe = $this->database->execute("SELECT id_usuario FROM Usuario WHERE id_usuario='$id'");
        if ($existe && $licencia != NULL) {
            $this->database->query("INSERT INTO Chofer (id_usuario,Licencia) VALUES($id,'$licencia')");
        }
    }
}