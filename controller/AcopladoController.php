<?php


class AcopladoController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render,$vehiculoModel){
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function execute(){
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        if (!$_SESSION["titulo"]) header("Location: /truckelite/verAcoplados");
        $data = $_SESSION["usuario"];
        $data["action"] = $_SESSION["action"];
        $data["titulo"] = $_SESSION["titulo"];
        $data["mensaje"] = $_GET["msj"];
        $data["acoplado"]  = $_SESSION["acoplado"];
        unset($_SESSION["titulo"]);
        unset($_SESSION["action"]);
        unset($_SESSION["acoplado"]);
        if($data["titulo"] == "Modificar Acoplado") $_SESSION["patenteDestino"] = $data["acoplado"][0]["patente_acoplado"];
        echo $this->render->render("view/acopladoView.php",$data);
    }

    public function agregarAcoplado(){
        $data = $this->vehiculoModel->agregarAcoplado($_POST["patente"], $_POST["tipo"], $_POST["chasis"]);
        $_SESSION["action"] = "agregarAcoplado";
        $_SESSION["titulo"] = "Nuevo Acoplado";
        if (!$data) {
            header("Location: /truckelite/acoplado?msj=No se pudo agregar el acoplado");
        } else {
            header("Location: /truckelite/acoplado?msj=Nuevo Acoplado añadido");
        }
    }

    public function agregar(){
        $_SESSION["action"] = "agregarAcoplado";
        $_SESSION["titulo"] = "Nuevo Acoplado";
        header("Location: /truckelite/acoplado");
    }

    public function modificar(){
        $_SESSION["action"] = "modificarAcoplado";
        $_SESSION["titulo"] = "Modificar Acoplado";
        $_SESSION["acoplado"] = $this->vehiculoModel->buscarAcoplado($_GET["url"]);

        header("Location: /truckelite/acoplado");
    }

    public function modificarAcoplado(){
        $data = $this->vehiculoModel->modificarAcoplado($_POST["patente"], $_POST["tipo"], $_POST["chasis"], $_SESSION["patenteDestino"]);
        unset($_SESSION["patenteDestino"]);
        if (!$data) {
            header("Location: /truckelite/verAcoplados?msj=No se pudo modificar el acoplado");
        } else {
            header("Location: /truckelite/verAcoplados?msj=El acoplado se modifico correctamente");
        }

    }

}