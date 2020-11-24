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
        if($_SESSION["usuario"]["rol"] != "Mecanico" && $_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data= $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        echo $this->render->render("view/mantenimientoView.php",$data);
    }

    public function agregarMantenimiento(){
        $id_mecanico= $this->mecanicoModel->obtenerIdDeMecanicoPorSuNombreYsuDni($_POST["nombreMecanico"],$_POST["dniMecanico"]);
        //En agregarMantenimiento le paso un id a mano, falta un metodo para buscar el id del vehiculo.
        $result =$this->mantenimientoModel->agregarMantenimiento($_POST["fecha"],$_POST["kmUnidad"],$_POST["costo"],$_POST["interno_externo"], $_POST["repuestos_cambiados"],$id_mecanico[0]["id_usuario"],$_POST["id_vehiculo"]);
        if(!$result) {
            header("Location: /truckelite/mantenimiento?msj=No se pudo agregar el mantenimiento ");
        }else{
            header("Location: /truckelite/mantenimiento?msj=Se agrego el mantenimiento de forma correcta ");
        }
    }
}