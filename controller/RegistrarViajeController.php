<?php


class RegistrarViajeController
{
    private $render;
    private $viajeModel;

    public function __construct($render,$viajeModel)
    {
        $this->viajeModel = $viajeModel;
        $this->render = $render;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data["mensaje"] = $_SESSION["mensaje"];
        $data = $_SESSION["usuario"];
        unset($_SESSION["mensaje"]);
        echo $this->render->render("view/registrarViajeView.php", $data);
    }

    public function agregarViaje()
    {
        $result = $this->viajeModel->agregarViaje(
            $_POST["combustible_consumido_previsto"],
            $_POST["fecha"],
            $_POST["destino"],
            $_POST["origen"],
            $_POST["tiempo_previsto"],
            $_POST["km_recorrido_previsto"],
            $_POST["id_chofer"],
            $_POST["id_vehiculo"]
        );
        if ($result){
            $_SESSION["id_viaje"] = $this->viajeModel->recuperarIdViaje($_POST["id_chofer"] ,$_POST["fecha"]);
            header("Location: /truckelite/cargaCliente?msj=El viaje se cargo satisfactoriamente. Procesada a ingresar el cliente");
        }else{
            $_SESSION["mensaje"] = "Error al registrar el viaje";
            header("Location: /truckelite/registrarViaje");
        }
    }

}