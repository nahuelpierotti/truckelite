<?php


class InternoController
{
    private $render;
    private $internoModel;

    public function __construct($render,$internoModel){
        $this->render = $render;
        $this->internoModel = $internoModel;
    }

    public function execute(){
        if(!$_SESSION["usuario"]["rol"]){
            $_SESSION["mensaje"] = "Todavia no le dieron el alta para utilizar el sistema.";
            header("Location: /truckelite");
        }
        $data = $_SESSION["usuario"];
        $this->internoModel->cargarAcciones($data);
        $_SESSION["usuario"]["acciones"] = $data["acciones"];
        $this->internoModel->listarVehiculosConAlarmasActivadas($data);

        echo $this->render->render("view/internoView.php",$data);
    }

    public function EnvioAlTAller(){
        $this->internoModel->llevarAlService($_GET["id"]);
        header("Location: /truckelite/interno");
    }

}