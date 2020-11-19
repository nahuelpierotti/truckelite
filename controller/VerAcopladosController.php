<?php


class VerAcopladosController
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
            $data["mensajeAcoplado"] = $_GET["msj"];
            $this->listarAcoplados($data);

            echo $this->render->render("view/verAcopladosView.php",$data);
    }

    private function listarAcoplados(&$data){
        $data["listar"] = $this->vehiculoModel->listarAcoplado();
    }

    public function eliminarAcoplado(){
        if (isset($_GET["url"])) {
            $data = $this->vehiculoModel->eliminarAcoplado($_GET["url"]);
            if (!$data) {
                header("Location: /truckelite/verAcoplados?msj=No se pudo eliminar el acoplado");
            } else {
                header("Location: /truckelite/verAcoplados?msj=El acoplado se elimino correctamente");
            }
        }else{
            header("Location: /truckelite/verAcoplados");
        }
    }
}