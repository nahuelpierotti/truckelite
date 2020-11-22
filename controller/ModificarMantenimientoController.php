<?php


class ModificarMantenimientoController
{
    private $render;
    private $mantenimientoModel;
    private $mecanicoModel;


    public function __construct($render,$mantenimientoModel,$mecanicoModel){
        $this->render = $render;
        $this->mantenimientoModel = $mantenimientoModel;
        $this->mecanicoModel = $mecanicoModel;

    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] != "Mecanico" && $_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        //$data["mensaje"] = $_GET["msj"];
        $data["acciones"] = $_SESSION["usuario"]["acciones"];
        $data["user_name"] = $_SESSION["usuario"]["user_name"];
        $this->mantenimientoBuscado($data);

        echo $this->render->render("view/ModificarMantenimientoView.php",$data);
    }

    public function modificarMantenimiento(){
        $id_mecanico= $this->mecanicoModel->obtenerIdDeMecanicoPorSuNombre($_POST["nombreMecanico"]);
        $data = $this->mantenimientoModel->modificarMantenimiento($_POST["fecha"],$_POST["kmUnidad"],$_POST["costo"],$_POST["interno_externo"], $_POST["repuestos_cambiados"], $_POST["id_mantenimiento"],$id_mecanico[0]["id_usuario"],$_POST["id_vehiculo"]);
        if (!$data) {

            header("Location: /truckelite/listarMantenimiento?msj=No se pudo modificar el mantenimiento");
        } else {

            header("Location: /truckelite/listarMantenimiento?msj=El mantenimiento se modifico correctamente");
        }

    }

    public function mantenimientoBuscado(&$data){
        if(isset($_GET["url"])) {
            $data["mantenimientoBuscado"] = $this->mantenimientoModel->buscarMantenimiento($_GET["url"]);
            $id_mecanico = $data["mantenimientoBuscado"][0]["id_mecanico"];
            $nombre= $this->mecanicoModel->obtenerNombreMecanicoPorSuId($id_mecanico);
            $data["mantenimientoBuscado"][0]["id_mecanico"]= $nombre[0]["nombre"];
        }
    }

}