<?php


class UsuarioController
{
    private $render;
    private $model;
    public function __construct($model, $render){
        $this->model = $model;
        $this->render = $render;
    }

    public function validar()
    {
        $data["usuario"] = $this->model->consultarUsuario($_POST["usuario"],$_POST["clave"]);
        $_SESSION["user"]=$data["usuario"];
        echo $this->render->render("view/principalView.php",$data);
    }
}