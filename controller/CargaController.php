<?php


class CargaController
{
    private $render;
    private $cargaModel;

    public function __construct($render, $cargaModel)
    {
        $this->cargaModel = $cargaModel;
        $this->render = $render;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        echo $this->render->render("view/cargaView.php", $data);
    }

    public function agregarCarga(){
        $result = $this->cargaModel->insertarCarga($_POST["tipo"],
                                                   $_POST["peso"],
                                                   $_POST["hazard"],
                                                   $_POST["imoClass"],
                                                   $_POST["reefer"],
                                                   $_POST["temperatura"],
                                                   $_SESSION["id_viaje"]);
        if ($result){
            die("se cargo exitosamente");
        }else{
            die("fallo");
        }
    }
}