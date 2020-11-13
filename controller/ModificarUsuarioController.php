<?php


class ModificarUsuarioController
{
    private $render;
    private $usuarioModel;

    public function __construct($render,$usuarioModel){
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
    }

    public function execute(){
        if($_SESSION["usuario"]["rol"] != "administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $this->usuarioBuscado($data);
        echo $this->render->render("view/modificarUsuarioView.php",$data);
    }

    public function modificarUsuario(){
        $data = $this->usuarioModel->modificarUsuario($_POST["idUsuario"], $_POST["dni"], $_POST["nombreYapellido"], $_POST["telefono"], $_POST["mail"], $_POST["clave"], $_POST["rol"]);
        if (!$data) {
            $_SESSION["mensaje"] = "ERROR";
            header("Location: /truckelite/modificarUsuario");
        } else {
            $_SESSION["mensaje"] = "El usuario se modifico correctamente";
            header("Location: /truckelite/modificarUsuario");
        }

    }

    public function usuarioBuscado(&$data){
        if(isset($_GET["url"])) {
            $data["usuarioBuscado"] = $this->usuarioModel->buscarUsuario($_GET["url"]);
        }
        return $data;
    }

}