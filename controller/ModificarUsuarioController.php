<?php


class ModificarUsuarioController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        //session_start();
        if(!$_SESSION["usuario"]){
            header("Location: /truckelite");
        }
        echo $this->render->render("view/modificarUsuarioView.php");
    }

}