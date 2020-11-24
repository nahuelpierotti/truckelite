<?php

class SupervisorModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarSupervisor($id)
    {
        return $this->database->execute("INSERT INTO Supervisor (id_usuario) VALUES($id)");
    }

    public function eliminarSupervisor($id){
        return $this->database->execute("DELETE FROM Supervisor WHERE id_usuario= $id");
    }
}