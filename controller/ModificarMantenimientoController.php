<?php


class ModificarMantenimientoController
{
    private $render;
    private $mantenimientoModel;
    private $mecanicoModel;
    private $vehiculoModel;


    public function __construct($render,$mantenimientoModel,$mecanicoModel, $vehiculoModel){
        $this->render = $render;
        $this->mantenimientoModel = $mantenimientoModel;
        $this->mecanicoModel = $mecanicoModel;
        $this->vehiculoModel = $vehiculoModel;

    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] != "Mecanico" && $_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data["acciones"] = $_SESSION["usuario"]["acciones"];
        $data["user_name"] = $_SESSION["usuario"]["user_name"];
        $this->mantenimientoBuscado($data);

        echo $this->render->render("view/ModificarMantenimientoView.php",$data);
    }

    public function modificarMantenimiento(){
        $id_mecanico= $this->mecanicoModel->obtenerIdDeMecanicoPorSuNombreYsuDni($_POST["nombreMecanico"],$_POST["dniMecanico"]);
        $idVehivulo = $this->vehiculoModel->obtenerIdVehiculoPorSuPatente($_POST["patente_vehiculo"]);
        $data = $this->mantenimientoModel->modificarMantenimiento($_POST["kmUnidad"],$_POST["costo"],$_POST["interno_externo"], $_POST["repuestos_cambiados"], $_POST["id_mantenimiento"],$id_mecanico[0]["id_usuario"],$idVehivulo[0]["id_vehiculo"]);
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
            $nombreYdni= $this->mecanicoModel->obtenerNombreMecanicoYsuDniPorSuId($id_mecanico);
            $data["mantenimientoBuscado"][0]["nombre"]= $nombreYdni[0]["nombre"];
            $data["mantenimientoBuscado"][0]["dni"]= $nombreYdni[0]["dni"];
            $data["patente"] = $this->vehiculoModel->obtenerPatentePorIdVehiculo($data["mantenimientoBuscado"][0]["id_vehiculo"]);
        }
    }

}