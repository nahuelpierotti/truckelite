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
        $data["mensaje"] = $_SESSION["mensaje"];
        $_SESSION["mensaje"] = "";
        echo $this->render->render("view/registrarViajeView.php", $data);
    }
    public function agregarViaje()
    {
        $result = $this->viajeModel->agregarViaje(
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
        if ($result){
            $_SESSION["mensaje"] = "Registro exitoso. El viaje fue dado de alta";
            header("Location: /truckelite/registrarViaje");
        }else{
            $_SESSION["mensaje"] = "Error al registrar el viaje";
            header("Location: /truckelite/registrarViaje");
        }
    }


}