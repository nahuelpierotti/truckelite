<?php


class UsuarioModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function consultarUsuario($usuario,$clave){
        $sql="SELECT * FROM usuario where user_name = '".$usuario."' and clave='".$clave."'";
        return $this->database->query($sql);
    }

    public function registrarUsuario($usuario,$clave,$nombre){
        return $this->database->query("SELECT user_name FROM Usuario where user_name = '$usuario' && $clave = '$clave'");
    }
}