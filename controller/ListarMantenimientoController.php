<?php

class ListarMantenimientoController
{
    private $render;
    private $mantenimientoModel;

    public function __construct($render, $mantenimientoModel)
    {
        $this->render = $render;
        $this->mantenimientoModel = $mantenimientoModel;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Mecanico") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $this->listarMantenimiento($data);

        echo $this->render->render("view/listarMantenimientoView.php",$data);
    }

    public function eliminarMantenimiento(){
        if (isset($_GET["url"])) {
            $data = $this->mantenimientoModel->eliminarMantenimiento($_GET["url"]);
            if (!$data) {
                $_SESSION["mensajeEliminar"] = "No se pudo eliminar el mantenimiento";

            } else {
                $_SESSION["mensajeEliminar"] = "El mantenimiento se elimino correctamente";
            }
        }
        header("Location: /truckelite/listarMantenimiento");
    }

    public function listarMantenimiento(&$data){
        $data["listar"] = $this->mantenimientoModel->listarMantenimiento();
    }
}