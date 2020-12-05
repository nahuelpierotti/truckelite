<?php


class VehiculosEnTallerController
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
        $this->mantenimientoModel->vehiculosEnMantenimiento($data);
        echo $this->render->render("view/vehiculosEnTallerView.php",$data);
    }

    public function terminarMantenimiento(){
        $msj = $this->mantenimientoModel->finalizarMantenimiento($_POST["patente"],$_POST["alarma"]);
        header("Location: /truckelite/vehiculosEnTaller?msj=$msj");
    }
}