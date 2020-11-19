<?php


class TractorController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render,$vehiculoModel){
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        if (!$_SESSION["titulo"]) header("Location: /truckelite/verTractores");
        $data = $_SESSION["usuario"];
        $data["action"] = $_SESSION["action"];
        $data["titulo"] = $_SESSION["titulo"];
        $data["mensaje"] = $_GET["msj"];
        $data["tractor"]  = $_SESSION["tractor"];
        unset($_SESSION["titulo"]);
        unset($_SESSION["action"]);
        unset($_SESSION["tractor"]);
        if($data["titulo"] == "Modificar Tractor") $_SESSION["patenteDestino"] = $data["tractor"][0]["patente"];
        echo $this->render->render("view/tractorView.php",$data);
    }

    public function agregarTractor(){
        $data = $this->vehiculoModel->agregarTractor($_POST["patente"], $_POST["motor"], $_POST["chasis"], $_POST["modelo"], $_POST["marca"], $_POST["acoplado"]);
        $_SESSION["action"] = "agregarTractor";
        $_SESSION["titulo"] = "Nuevo Tractor";
        if (!$data){
            header("Location: /truckelite/tractor?msj=No se pudo Agregar el Tractor");
        } else{
            header("Location: /truckelite/tractor?msj=Nuevo Tractor añadido");
        }

    }

    public function agregar(){
        $_SESSION["action"] = "agregarTractor";
        $_SESSION["titulo"] = "Nuevo Tractor";
        header("Location: /truckelite/Tractor");
    }

    public function modificar(){
        $_SESSION["action"] = "modificarTractor";
        $_SESSION["titulo"] = "Modificar Tractor";
        $_SESSION["tractor"] = $this->vehiculoModel->buscarTractor($_GET["url"]);

        header("Location: /truckelite/tractor");
    }

    public function modificarTractor(){
        $data = $this->vehiculoModel->modificarTractor($_POST["patente"],
                                                       $_POST["motor"],
                                                       $_POST["chasis"],
                                                       $_POST["modelo"],
                                                       $_POST["marca"],
                                                       $_POST["acoplado"],
                                                       $_SESSION["patenteDestino"]);
        unset($_SESSION["patenteDestino"]);
        if (!$data) {
            header("Location: /truckelite/verTractores?msj=No se pudo modificar el tractor");
        }else{
            header("Location: /truckelite/verTractores?msj=El tractor se modifico correctamente");
        }
    }
}