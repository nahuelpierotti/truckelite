<?php


class UsuarioModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function conectarUsuario($usuario,$clave){
        return $this->database->query("SELECT * FROM Usuario where user_name = '$usuario' && clave = '$clave'");
    }

    public function agregarUsuario($dni, $nombreUser, $nombreYapellido, $telefono, $mail, $clave){
        return $this->database->execute("INSERT INTO Usuario (dni,user_name,nombre,telefono,mail,clave) 
                                VALUES ( $dni, '$nombreUser', '$nombreYapellido', $telefono, '$mail', '$clave')");
    }

}