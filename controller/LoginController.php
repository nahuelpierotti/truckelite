<?php


class LoginController
{
    private $render;
    private $usuarioModel;

    public function __construct($render,$usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
        $this->render = $render;
    }

    public function execute()
    {
        session_start();
        $data["mensaje"] = $_SESSION["mensaje"];
        echo $this->render->render("view/login.php", $data);
    }

    public function procesarLogin(){
        session_start();
        $data["usuario"] = $this->usuarioModel->conectarUsuario($_POST["nombre"],$_POST["clave"]);
        if(!$data["usuario"]){
            $_SESSION["mensaje"] = "Usuario y/o contraseña invalidos";
            header("Location: /truckelite");
        }else{

            $_SESSION["logueado"]=1;
            $_SESSION["usuario"] = $data;
            header("Location: /truckelite/interno");
        }
    }
}
