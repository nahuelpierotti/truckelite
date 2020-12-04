<?php


class CostosController
{
    private $render;
    private $costosModel;

    public function __construct($render, $costosModel)
    {
        $this->costosModel = $costosModel;
        $this->render = $render;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        echo $this->render->render("view/costosView.php", $data);
    }

    public function agregarCostos(){
        $result = $this->costosModel->insertarCostos($_POST["viaticos"],
                                                     $_POST["costo_combustible"],
                                                     $_POST["peajes"],
                                                     $_POST["peajes"],
                                                     $_POST["extras"],
                                                     $_POST["fee"],
                                                     $_POST["total"],
                                                     $_SESSION["id_viaje"]);
        if ($result){
            header("Location: /truckelite/proforma");
        }else{
            header("Location: /truckelite/costos?msj=Fallo");
        }
    }
}