<?php

class MecanicoModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarMecanico($id)
    {
        return $this->database->execute("INSERT INTO Mecanico (id_usuario) VALUES($id)");

    }

    public function obtenerIdDeMecanicoPorSuNombre($nombre)
    {
       return $this->database->query("SELECT U.id_usuario FROM usuario U JOIN mecanico M WHERE nombre='$nombre'");
    }

    public function obtenerNombreMecanicoPorSuId($id)
    {
        return $this->database->query("SELECT U.nombre FROM usuario U JOIN mecanico M WHERE U.id_usuario='$id'");
    }

    public function eliminarMecanico($id){
        return $this->database->execute("DELETE FROM Mecanico WHERE id_usuario= $id");
    }
}