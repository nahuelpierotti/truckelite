<?php


class MantenimientoController
{
    private $render;
    private $mantenimientoModel;
    private $mecanicoModel;

    public function __construct($render, $mantenimientoModel,$mecanicoModel)
    {
        $this->mantenimientoModel = $mantenimientoModel;
        $this->render = $render;
        $this->mecanicoModel = $mecanicoModel;
    }

    public function execute()
    {
        if($_SESSION["usuario"]["rol"] != "Mecanico" ) header("Location: /truckelite/interno");
        $data= $_SESSION["usuario"];
        //$_SESSION["mensaje"] = "";
        echo $this->render->render("view/mantenimientoView.php",$data);
    }

    public function agregarMantenimiento(){
        $id_mecanico= $this->mecanicoModel->obtenerIdDeMecanicoPorSuNombre($_POST["nombreMecanico"]);
        //En agregarMantenimiento le paso un id a mano, falta un metodo para buscar el id del vehiculo.
        $this->mantenimientoModel->agregarMantenimiento($_POST["fecha"],$_POST["kmUnidad"],$_POST["costo"],$_POST["interno_externo"], $_POST["repuestos_cambiados"], $_POST["id_mantenimiento"],$id_mecanico[0]["id_usuario"],$_POST["id_vehiculo"]);
        header("Location: /truckelite/mantenimiento ");
    }
}