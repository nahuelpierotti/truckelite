<?php


class InternoController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        if($_SESSION["logueado"] !=1){
            header("Location: /truckelite");
        }
        //session_start();
        echo $this->render->render("view/internoView.php",$_SESSION["usuario"]);
    }

}