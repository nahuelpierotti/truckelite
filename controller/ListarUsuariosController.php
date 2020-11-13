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
        if ($_SESSION["usuario"]["rol"] != "administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $this->listarUsuarios($data);

        echo $this->render->render("view/listarUsuariosView.php",$data);
    }

    public function listarUsuarios(&$data){
         $data["listar"] = $this->usuarioModel->listarUsuarios();
         return $data;
    }


}