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
        if ($licencia != NULL) {
            $this->database->execute("INSERT INTO Chofer (id_usuario,Licencia) VALUES($id,'$licencia')");
        }
    }

    public function eliminarChofer($id){
        return $this->database->execute("DELETE FROM Chofer WHERE id_usuario= $id");
    }
}