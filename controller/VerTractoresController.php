<?php


class VerTractoresController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render,$vehiculoModel){
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensajeTractor"] = $_GET["msj"];
        $this->listarTractores($data);

        echo $this->render->render("view/verTractoresView.php",$data);
    }

    private function listarTractores(&$data){
        $data["listar"] = $this->vehiculoModel->listarTractor();
    }

    public function eliminarTractor(){
        if (isset($_GET["url"])) {
            $data = $this->vehiculoModel->eliminarTractor($_GET["url"]);
            if (!$data){
                header("Location: /truckelite/verTractores?msj=No se pudo eliminar el tractor");
            } else{
                header("Location: /truckelite/verTractores?msj=El tractor se elimino correctamente");
            }
        }else{
            header("Location: /truckelite/verTractores");
        }
    }
}