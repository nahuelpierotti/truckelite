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
        $data["mensaje"] = $_GET["msj"];
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
            header("Location: /truckelite/costos?msj=La carga se registro correctamente. Proceda a ingresar los costos.");
        }else{
            header("Location: /truckelite/carga?msj= Fallo al ingresar la carga. Vuelva a ingresar los datos.");
        }
    }
}