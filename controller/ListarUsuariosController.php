<?php

class ListarUsuariosController
{
    private $render;
    private $usuarioModel;

    public function __construct($render, $usuarioModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];

        $data["mensaje"] = $_GET["msj"];
        $this->listarUsuarios($data);

        echo $this->render->render("view/listarUsuariosView.php",$data);
    }

    public function listarUsuarios(&$data){
         $data["listar"] = $this->usuarioModel->listarUsuarios();
    }

    public function eliminarUsuario(){
        if (isset($_GET["url"])) {
            $data = $this->usuarioModel->eliminarUsuario($_GET["url"]);
            if (!$data) {
                header("Location: /truckelite/listarUsuarios?msj=No se pudo eliminar el usuario");

            } else {
                header("Location: /truckelite/listarUsuarios?msj:El usuario se elimino correctamente");
            }
        }
    }


}