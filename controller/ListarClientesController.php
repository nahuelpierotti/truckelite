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
        if ($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $data["mensajeEliminar"] = $_SESSION["mensajeEliminar"];
        $this->listarClientes($data);

        echo $this->render->render("view/listarClientesView.php", $data);
    }

    public function listarClientes(&$data)
    {
        $data["listar"] = $this->clienteModel->listarClientes();
    }

    public function eliminarCliente()
    {
        if (isset($_GET["url"])) {
            $data = $this->clienteModel->eliminarCliente($_GET["url"]);
            if (!$data) {
                $_SESSION["mensajeEliminar"] = "No se pudo eliminar el cliente";

            } else {
                $_SESSION["mensajeEliminar"] = "El cliente se elimino correctamente";
            }
        }
        header("Location: /truckelite/listarClientes");
    }
}
