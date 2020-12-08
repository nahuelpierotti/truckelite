<?php


class MantenimientoController
{
    private $render;
    private $mantenimientoModel;
    private $mecanicoModel;
    private $vehiculoModel;

    public function __construct($render, $mantenimientoModel,$mecanicoModel,$vehiculoModel)
    {
        $this->mantenimientoModel = $mantenimientoModel;
        $this->render = $render;
        $this->mecanicoModel = $mecanicoModel;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute()
    {
        if($_SESSION["usuario"]["rol"] != "Mecanico" && $_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data= $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        echo $this->render->render("view/mantenimientoView.php",$data);
    }

    public function agregarMantenimiento(){
        $idMecanico= $this->mecanicoModel->obtenerIdDeMecanicoPorSuNombreYsuDni($_POST["nombreMecanico"],$_POST["dniMecanico"]);
        $idVehivulo = $this->vehiculoModel->obtenerIdVehiculoPorSuPatente($_POST["patente_vehiculo"]);
        $result =$this->mantenimientoModel->agregarMantenimiento($_POST["kmUnidad"],$_POST["costo"],$_POST["interno_externo"], $_POST["repuestos_cambiados"],$idMecanico[0]["id_usuario"],$idVehivulo[0]["id_vehiculo"]);
        if(!$result) {
            header("Location: /truckelite/mantenimiento?msj=No se pudo agregar el mantenimiento ");
        }else{
            header("Location: /truckelite/mantenimiento?msj=Se agrego el mantenimiento de forma correcta ");
        }
    }
}