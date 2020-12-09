<?php


class RegistrarViajeController
{
    private $render;
    private $viajeModel;
    private $cargaModel;
    private $costosModel;

    public function __construct($render,$viajeModel,$cargaModel,$costosModel)
    {
        $this->viajeModel = $viajeModel;
        $this->cargaModel = $cargaModel;
        $this->costosModel = $costosModel;
        $this->render = $render;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data["mensaje"] = $_SESSION["mensaje"];
        $data = $_SESSION["usuario"];
        unset($_SESSION["mensaje"]);
        $this->viajeModel->cargarChoferesDisponibles($data);
        $this->viajeModel->cargarVehiculosDisponiblesTanque($data);
        $this->viajeModel->cargarVehiculosDisponiblesGranel($data);
        $this->viajeModel->cargarVehiculosDisponiblesJaula($data);
        $this->viajeModel->cargarVehiculosDisponiblesJaulaArania($data);
        $this->viajeModel->cargarVehiculosDisponiblesCarCarrier($data);
        $this->viajeModel->cargarClientesDisponibles($data);
        echo $this->render->render("view/registrarViajeView.php", $data);
    }

    public function agregarViaje()
    {
        $id_viaje = $this->viajeModel->agregarViaje(
            $_POST["id_cliente"],
            $_POST["combustible_consumido_previsto"],
            $_POST["origen"],
            $_POST["destino"],
            $_POST["tiempo_previsto"],
            $_POST["km_recorrido_previsto"],
            $_POST["id_chofer"],
            $_POST["id_vehiculo"],
            $_POST["eta"],
            $_POST["etd"]
        );

        if ($id_viaje) {
            $_SESSION["id_viaje"] = $id_viaje;
            $result = $this->cargaModel->insertarCarga($_POST["tipo"],
                $_POST["peso"],
                $_POST["hazard"],
                $_POST["imoClass"],
                $_POST["reefer"],
                $_POST["temperatura"],
                $id_viaje);
            $result = $this->costosModel->insertarCostos($_POST["viaticos"],
                $_POST["costo_combustible"],
                $_POST["peajes"],
                $_POST["peajes"],
                $_POST["extras"],
                $_POST["fee"],
                $_POST["total"],
                $id_viaje);
            if ($result) {

                header("Location: /truckelite/proforma");
            }
        } else {
            $_SESSION["mensaje"] = "Error al registrar el viaje";
            header("Location: /truckelite/registrarViaje");
        }
    }


}