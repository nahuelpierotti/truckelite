<?php


class UsuarioModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function consultarUsuario($usuario,$clave){
        return $this->database->query("SELECT * FROM usuario where user_name = '$usuario' && clave = '$clave'");
    }

    public function agregarUsuario($id,$dni,$nombreUser,$rol,$nombreYapellido,$telefono,$mail,$clave){

        $this->database->query("INSERT INTO usuario (dni,user_name,rol,nombre,telefono,mail,clave) 
                                VALUES ('".$dni."','".$nombreUser."','".$rol."','".$nombreYapellido."','".$telefono."','".$mail."','".$clave."')");
    }

}