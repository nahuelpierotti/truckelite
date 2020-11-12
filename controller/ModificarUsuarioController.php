<?php


class ModificarUsuarioController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] != "administrador") header("Location: /truckelite/interno");
        echo $this->render->render("view/modificarUsuarioView.php",$_SESSION["usuario"]);
    }

}