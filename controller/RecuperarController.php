<?php
include_once ("helper/EmailSender.php");

class RecuperarController
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
        echo $this->render->render("view/recuperarView.php", $data);
    }

    public function enviarCorreo()
    {
        $usuario = $this->usuarioModel->obtenerEmailUsuario($_POST["nombreUser"]);

        if ($usuario){
            $envio=new EmailSender();
            $pudo_enviar=$envio->enviar_email_recupero($usuario[0]["mail"],$usuario[0]["id_usuario"]);

            if($pudo_enviar=="ok") {
                $dominio=substr($usuario[0]["mail"],(strpos($usuario[0]["mail"], "@")),strlen($usuario[0]["mail"]));
                $email_visible = substr($usuario[0]["mail"], 0, 3)."***".$dominio;
                $_SESSION["mensaje"] = "Se envio un email al correo: " . $email_visible;
                header("Location: /truckelite/recuperar");
            }else{
                $_SESSION["mensaje"] = "Hubo un error en el envio del correo.Intenta nuevamente mas tarde ".$pudo_enviar;
                header("Location: /truckelite/recuperar");
            }
        }else{
            $_SESSION["mensaje"] = "No se encontraron usuarios registrados ";
            header("Location: /truckelite/recuperar");
        }

    }


}