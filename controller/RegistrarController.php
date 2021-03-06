<?php
include_once ("helper/EmailSender.php");

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
        $data["mensaje"] = $_SESSION["mensaje"];
        $_SESSION["mensaje"] = "";
        echo $this->render->render("view/registrarView.php", $data);
    }

    public function registrarUsuario()
    {
        $result = $this->usuarioModel->agregarUsuario($_POST["dni"], $_POST["nombreUser"], $_POST["nombreYapellido"], $_POST["telefono"], $_POST["mail"], md5($_POST["clave"]));
        if ($result){
            $envio=new EmailSender();
            $pudo_enviar=$envio->enviar_email_registracion($_POST["mail"],$_POST["nombreYapellido"]);
            $_SESSION["mensaje"] = "Registro exitoso. Espere que el administrador le de el alta";
            header("Location: /truckelite");
        }else{
            $_SESSION["mensaje"] = "Error al registrase algun dato ya se encuentra en uso";
            header("Location: /truckelite/registrar");
        }

    }

}