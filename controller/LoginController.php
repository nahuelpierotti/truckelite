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
        echo $this->render->render("view/login.php");
    }

    public function procesarLogin(){
        $data["usuario"] = $this->usuarioModel->consultarUsuario($_POST["nombre"],$_POST["clave"]);

        if(!$data["usuario"]){
            //session_destroy();
            header("Location: /truckelite");
        }else{
            session_start();
            $_SESSION["logueado"]=1;
            $_SESSION["usuario"] = $data;
            header("Location: /truckelite/interno");
        }
    }
}
