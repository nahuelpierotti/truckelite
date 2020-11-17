<?php


class ModificarViajeController
{
    private $render;
    private $viajeModel;

    public function __construct($render,$viajeModel){
        $this->render = $render;
        $this->viajeModel = $viajeModel;
    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data["mensaje"] = $_SESSION["mensaje"];
        $data["acciones"] = $_SESSION["usuario"]["acciones"];
        $data["user_name"] = $_SESSION["usuario"]["user_name"];
        $this->viajeBuscado($data);
        $_SESSION["mensaje"] = "";
        echo $this->render->render("view/modificarViajeView.php",$data);
    }

    public function modificarViaje(){
        $data = $this->viajeModel->modificarViaje(
            $_POST["id_viaje"],
            $_POST["combustible_consumido"],
            $_POST["combustible_consumido_previsto"],
            $_POST["tipo_de_carga"],
            $_POST["fecha"],
            $_POST["destino"],
            $_POST["origen"],
            $_POST["desviacion"],
            $_POST["tiempo"],
            $_POST["tiempo_previsto"],
            $_POST["km_recorrido"],
            $_POST["km_recorrido_previsto"],
            $_POST["cliente"],
            $_POST["id_chofer"],
            $_POST["id_vehiculo"]
        );
        if (!$data) {
            $_SESSION["mensaje"] = "No se pudo modificar el viaje";
            header("Location: /truckelite/modificarViaje");
        } else {
            $_SESSION["mensaje"] = "El viaje se modifico correctamente";
            header("Location: /truckelite/modificarViaje");
        }

    }

    public function viajeBuscado(&$data){
        if(isset($_GET["url"])) {
            $data["viajeBuscado"] = $this->viajeModel->consultarViaje($_GET["url"]);
        }
    }
}