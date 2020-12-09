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
        $data["mensaje"] = isset($_SESSION["mensaje"])?$_SESSION["mensaje"]:"";
        $_SESSION["mensaje"] = "";
        echo $this->render->render("view/login.php", $data);
    }

    public function procesarLogin(){
        $data = $this->usuarioModel->conectarUsuario($_POST["nombre"],md5($_POST["clave"]));
        if(!$data){
            $_SESSION["mensaje"] = "Usuario y/o contraseña invalidos";
            header("Location: /truckelite");
        }else{
            $_SESSION["usuario"] = array("rol" => $data[0]["rol"], "user_name" => $data[0]["user_name"], "nomYape" => $data[0]["nombre"]);
            header("Location: /truckelite/interno");
        }
    }
}
