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

    public function modificarUsuario($id,$dni,$nombreYapellido,$telefono,$mail,$clave, $rol){
        return $this->database->execute("UPDATE Usuario SET dni= '$dni',rol = '$rol', nombre='$nombreYapellido', telefono= '$telefono', mail= '$mail', clave= '$clave' WHERE id_usuario= $id");
    }

    public function listarUsuarios(){
        return $this->database->query("SELECT * FROM Usuario");
    }

    public function buscarUsuario($id){
        return $this->database->query("SELECT id_usuario,dni,user_name,rol,nombre,telefono,mail,clave FROM Usuario WHERE id_usuario=$id ");
    }

    public function eliminarUsuario($id){
        return $this->database->execute("DELETE FROM Usuario WHERE id_usuario= $id");
    }

}