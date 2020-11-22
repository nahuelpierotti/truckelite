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
        if ($_SESSION["usuario"]["rol"] != "Mecanico" && $_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        $this->listarMantenimiento($data);
        echo $this->render->render("view/listarMantenimientoView.php",$data);
    }

    public function eliminarMantenimiento(){
        if (isset($_GET["url"])) {
            $data = $this->mantenimientoModel->eliminarMantenimiento($_GET["url"]);
            if (!$data) {
                header("Location: /truckelite/listarMantenimiento?msj=No se pudo eliminar el mantenimiento ");
            } else {
                header("Location: /truckelite/listarMantenimiento?msj=Se elimino el mantenimiento correctamente");
            }
        }

    }

    public function listarMantenimiento(&$data){
        $data["listar"] = $this->mantenimientoModel->listarMantenimiento();
    }
}