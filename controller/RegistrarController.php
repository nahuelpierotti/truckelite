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
        session_start();
        $this->usuarioModel->agregarUsuario($_POST["dni"], $_POST["nombreUser"], $_POST["nombreYapellido"], $_POST["telefono"], $_POST["mail"], $_POST["clave"]);
        $_SESSION["mensaje"] = "Registro exitoso. Espere que el administrador le de el alta";
        header("Location: /truckelite");
    }

}