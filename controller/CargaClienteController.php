<?php

class CargaClienteController
{
    private $render;
    private $clienteModel;

    public function __construct($render, $clienteModel)
    {
        $this->clienteModel = $clienteModel;
        $this->render = $render;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Administrador" && $_SESSION["usuario"]["rol"] != "Supervisor") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        echo $this->render->render("view/cargaClienteView.php",$data);
    }

    public function cargarCliente(){
        $result = $this->clienteModel->agregarCliente($_POST["denominacion"],
                                                      $_POST["cuit"],
                                                      $_POST["direccion"],
                                                      $_POST["telefono"],
                                                      $_POST["mail"],
                                                      $_POST["contacto1"],
                                                      $_POST["contacto2"],
                                                      $_SESSION["id_viaje"]);
        if($result){
            header("Location: /truckelite/carga");
        }else{
            header("Location: /truckelite/cargaCliente?msj=El cliente no se pudo cargar al sistema");
        }
    }
}