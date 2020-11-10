<?php


class InternoController
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
        echo $this->render->render("view/internoView.php");
    }

}