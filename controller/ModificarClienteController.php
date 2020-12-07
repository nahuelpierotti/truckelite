<?php


class ModificarClienteController
{
    private $render;
    private $clienteModel;


    public function __construct($render,$clienteModel)
    {
        $this->clienteModel = $clienteModel;
        $this->render = $render;
    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data["mensaje"] = $_GET["msj"];
        $data["acciones"] = $_SESSION["usuario"]["acciones"];
        $data["denominacion"] = $_SESSION["usuario"]["user_name"];
        $this->clienteBuscado($data);
        echo $this->render->render("view/modificarClienteView.php",$data);
    }

    public function modificarCliente(){
        $data = $this->clienteModel->modificarCliente($_POST["id"],
            $_POST["denominacion"],
            $_POST["cuit"],
            $_POST["direccion"],
            $_POST["telefono"],
            $_POST["mail"],
            $_POST["contacto1"],
            $_POST["contacto2"]);
        if (!$data) {
            header("Location: /truckelite/modificarCliente?msj=No se pudo modificar el cliente");
        } else {
            header("Location: /truckelite/modificarCliente?msj=El cliente se modifico correctamente");
        }

    }

    public function clienteBuscado(&$data){
        if(isset($_GET["url"])) {
            $data["clienteBuscado"] = $this->clienteModel->buscarCliente($_GET["url"]);
        }
    }

}