<?php


class ConsultarVehiculoController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        if(!$_SESSION["usuario"]["rol"]) header("Location: /truckelite");
        echo $this->render->render("view/consultarVehiculoView.php", $_SESSION["usuario"]);
    }

}