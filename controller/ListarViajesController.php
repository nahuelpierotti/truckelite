<?php


class ListarViajesController
{
    private $render;
    private $viajeModel;

    public function __construct($render, $viajeModel)
    {
        $this->render = $render;
        $this->viajeModel = $viajeModel;
    }

    public function execute()
    {

        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensajeEliminar"] = $_SESSION["mensajeEliminar"];
        unset($_SESSION["mensajeEliminar"]);
        if(isset($_POST["criterio"])) $this->listarViajesCriterio($data,$_POST["criterio"]);
        if(isset($_POST["all"])) $this->listarViajes($data);
        echo $this->render->render("view/listarViajesView.php",$data);
    }

    public function listarViajes(&$data){
        $data["listar"] = $this->viajeModel->listarViajes();
    }

    public function listarViajesCriterio(&$data,$criterio){
        $data["listar"] = $this->viajeModel->listarViajesCriterio($criterio);
    }

    public function eliminarViaje(){
        if (isset($_GET["url"])) {
            $data = $this->viajeModel->eliminarViaje($_GET["url"]);
            if (!$data) {
                $_SESSION["mensajeEliminar"] = "No se pudo eliminar el viaje";

            } else {
                $_SESSION["mensajeEliminar"] = "El viaje se elimino correctamente";
            }
        }
        header("Location: /truckelite/listarViajes");
    }

    public function verProforma(){
        $_SESSION["id_viaje"] = $_GET["viajeSeleccionado"];
        header("Location: /truckelite/proforma");
    }

}