<?php

class ListarClientesController
{
    private $render;
    private $clienteModel;

    public function __construct($render, $clienteModel)
    {
        $this->render = $render;
        $this->clienteModel = $clienteModel;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Supervisor" && $_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensaje"] = $_GET["msj"];
        $this->listarClientes($data);
        echo $this->render->render("view/listarClientesView.php",$data);
    }

    public function eliminarCliente(){
        if (isset($_GET["url"])) {
            $data = $this->clienteModel->eliminarCliente($_GET["url"]);
            if (!$data) {
                header("Location: /truckelite/listarClientes?msj=No se pudo eliminar el cliente ");
            } else {
                header("Location: /truckelite/listarClientes?msj=Se elimino el cliente correctamente");
            }
        }

    }

    public function listarClientes(&$data){
        $data["listar"] = $this->clienteModel->listarClientes();
    }
}