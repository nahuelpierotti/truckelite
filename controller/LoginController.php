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
        session_start();
        //$nameUser = $_POST["nombre"];
        //$claveUser = $_POST["clave"];
        $data = $this->usuarioModel->consultarUsuario($_POST["nombre"],$_POST["clave"]);
        $_SESSION["usuario"] = $data[0]["user_name"];
        if(!$data[0]){
            session_destroy();
            header("Location: /truckelite");
        }else{
            header("Location: /truckelite/interno");
        }
    }
}
//Notice: session_start(): A session had already been started - ignoring in C:\xampp\htdocs\truckelite\controller\InternoController.php on line 13