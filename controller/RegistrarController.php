<?php


class RegistrarController
{
    private $render;
    private $usuarioModel;

    public function __construct($render,$usuarioModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
    }

    public function execute()
    {
        echo $this->render->render("view/registrarView.php");
    }

    public function registrarUsuario()
    {
        $id= 2;
        $rol= "usuario";
        $this->usuarioModel->agregarUsuario($id,$_POST["dni"],$_POST["nombreUser"],$rol,$_POST["nombreYapellido"],$_POST["telefono"],$_POST["mail"],$_POST["clave"]);
        header("Location: /truckelite");
    }

}