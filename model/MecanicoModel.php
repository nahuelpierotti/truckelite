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

    public function obtenerIdDeMecanicoPorSuNombreYsuDni($nombre,$dni)
    {
       return $this->database->query("SELECT U.id_usuario FROM usuario U JOIN mecanico M WHERE nombre='$nombre'AND dni=$dni");
    }

    public function obtenerNombreMecanicoYsuDniPorSuId($id)
    {
        return $this->database->query("SELECT U.nombre,U.dni FROM usuario U JOIN mecanico M WHERE U.id_usuario='$id'");
    }

    public function eliminarMecanico($id){
        return $this->database->execute("DELETE FROM Mecanico WHERE id_usuario= $id");
    }
}