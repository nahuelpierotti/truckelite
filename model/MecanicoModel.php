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
        $existe = $this->database->execute("SELECT id_usuario FROM Usuario WHERE id_usuario='$id'");
        if ($existe) {
            $this->database->query("INSERT INTO Mecanico (id_usuario) VALUES($id)");
        }
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
        $this->database->query("DELETE FROM Mecanico WHERE id_usuario= $id");
    }
}