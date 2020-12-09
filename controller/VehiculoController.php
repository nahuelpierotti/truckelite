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
        if($data["titulo"] == "Modificar Vehiculo") $_SESSION["patenteDestino"] = $data["vehiculo"][0]["patente"];
        $this->vehiculoModel->cargarAcopladosDisponibles($data);
        echo $this->render->render("view/vehiculoView.php",$data);
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
        $mensaje = $this->vehiculoModel->modificarVehiculo($_POST["patente"],
                                                           $_POST["motor"],
                                                           $_POST["chasis"],
                                                           $_POST["modelo"],
                                                           $_POST["marca"],
                                                           $_POST["acoplado"],
                                                           $_POST["posicion"],
                                                           $_POST["kilometraje"],
                                                           $_POST["alarma"],
                                                           $_SESSION["patenteDestino"]);
        unset($_SESSION["patenteDestino"]);
        header("Location: /truckelite/verVehiculos?msj=$mensaje");
    }

    public function agregarVehiculo(){
        $mensaje = $this->vehiculoModel->agregarVehiculo($_POST["patente"],
                                                         $_POST["motor"],
                                                         $_POST["chasis"],
                                                         $_POST["modelo"],
                                                         $_POST["marca"],
                                                         $_POST["acoplado"],
                                                         $_POST["posicion"],
                                                         $_POST["kilometraje"],
                                                         $_POST["alarma"]);
        $_SESSION["action"] = "agregarVehiculo";
        $_SESSION["titulo"] = "Nuevo Vehiculo";

        header("Location: /truckelite/vehiculo?msj=$mensaje");
    }
}