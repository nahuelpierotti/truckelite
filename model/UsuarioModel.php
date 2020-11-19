<?php


class UsuarioModel
{
    private $database;
    private $mecanicoModel;
    private $supervisorModel;
    private $choferModel;
    private $administradorModel;

    public function __construct($database,$mecanicoModel,$choferModel,$supervisorModel,$administradorModel)
    {
        $this->database = $database;
        $this->mecanicoModel=$mecanicoModel;
        $this->choferModel=$choferModel;
        $this->supervisorModel=$supervisorModel;
        $this->administradorModel=$administradorModel;
    }

    public function conectarUsuario($usuario,$clave){
        return $this->database->query("SELECT * FROM Usuario where user_name = '$usuario' && clave = '$clave'");
    }

    public function agregarUsuario($dni, $nombreUser, $nombreYapellido, $telefono, $mail, $clave){
        return $this->database->execute("INSERT INTO Usuario (dni,user_name,nombre,telefono,mail,clave) 
                                VALUES ( $dni, '$nombreUser', '$nombreYapellido', $telefono, '$mail', '$clave')");
    }

    public function modificarUsuario($id,$dni,$nombreYapellido,$telefono,$mail,$clave, $rol){
        $resultadoPorModificar = $this->database->execute("UPDATE Usuario SET dni= '$dni',rol = '$rol', nombre='$nombreYapellido', telefono= '$telefono', mail= '$mail', clave= '$clave' WHERE id_usuario= $id");
        switch ($rol){
            case "Mecanico":
                $this->mecanicoModel->agregarMecanico($id);
                break;
            case "Chofer":
                $this->choferModel->agregarChofer($id);
                break;
            case "Supervisor":
                $this->supervisorModel->agregarSupervisor($id);
                break;
            case "Administrador":
                $this->administradorModel->agregarAdministrador($id);
                break;
        }
        return $resultadoPorModificar;
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

    public function obtenerEmailUsuario($usuario){
        $user= $this->database->query("SELECT id_usuario,dni,user_name,rol,nombre,telefono,mail,clave FROM Usuario where user_name = '$usuario'");
        return $user;
    }

    public function actualizarClave($id,$clave){
        return $this->database->execute("UPDATE Usuario SET clave= md5('$clave') WHERE id_usuario= $id");
    }

    public function obtenerIdDeMecanicoPorSuNombre($nombre){
        return $this->database->query("SELECT id_usuario FROM Usuario WHERE nombre='$nombre' ");
    }
}