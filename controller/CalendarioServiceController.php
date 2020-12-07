<?php


class CalendarioServiceController
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
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor" && $_SESSION["usuario"]["rol"] != "Mecanico") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        if(isset($_GET["url"])) {
            $this->mantenimientoModel->listarFechasServiceDelVehiculo($_GET["url"],$data);
        }
        //die(var_dump($data["listaFechas"]));
        echo $this->render->render("view/calendarioServiceView.php", $data);
    }
}
