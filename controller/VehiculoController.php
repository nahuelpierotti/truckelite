<?php


class VehiculoController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render,$vehiculoModel){
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        if (!$_SESSION["titulo"]) header("Location: /truckelite/verVehiculos");
        $data = $_SESSION["usuario"];
        $data["action"] = $_SESSION["action"];
        $data["titulo"] = $_SESSION["titulo"];
        $data["mensaje"] = $_GET["msj"];
        $data["vehiculo"]  = $_SESSION["vehiculo"];
        unset($_SESSION["titulo"]);
        unset($_SESSION["action"]);
        unset($_SESSION["vehiculo"]);
        if($data["titulo"] == "Modificar Vehiculo") $_SESSION["patenteDestino"] = $data["vehiculo"][0]["fk_tractor"];
        echo $this->render->render("view/vehiculoView.php",$data);
    }

    public function agregarVehiculo(){
        $data = $this->vehiculoModel->agregarVehiculo($_POST["patente"], $_POST["posicion"], $_POST["estado"]);
        $_SESSION["action"] = "agregarVehiculo";
        $_SESSION["titulo"] = "Nuevo Vehiculo";
        if (!$data){
            header("Location: /truckelite/vehiculo?msj=No se pudo Agregar el Vehiculo");
        } else{
            header("Location: /truckelite/vehiculo?msj=Nuevo Vehiculo añadido");
        }

    }

    public function agregar(){
        $_SESSION["action"] = "agregarVehiculo";
        $_SESSION["titulo"] = "Nuevo Vehiculo";
        header("Location: /truckelite/vehiculo");
    }

    public function modificar(){
        $_SESSION["action"] = "modificarVehiculo";
        $_SESSION["titulo"] = "Modificar Vehiculo";
        $_SESSION["vehiculo"] = $this->vehiculoModel->buscarVehiculo($_GET["url"]);

        header("Location: /truckelite/vehiculo");
    }

    public function modificarVehiculo(){
        $data = $this->vehiculoModel->modificarVehiculo($_POST["patente"], $_POST["posicion"], $_POST["estado"], $_SESSION["patenteDestino"]);
        unset($_SESSION["patenteDestino"]);
        if (!$data) {
            header("Location: /truckelite/verVehiculos?msj=No se pudo modificar el vehiculo");
        }else{
            header("Location: /truckelite/verVehiculos?msj=El vehiculo se modifico correctamente");
        }
    }
}