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
        if($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data["mensaje"] = $_SESSION["mensaje"];
        $data["acciones"] = $_SESSION["usuario"]["acciones"];
        $data["user_name"] = $_SESSION["usuario"]["user_name"];
        $this->usuarioBuscado($data);
        $_SESSION["mensaje"] = "";
        echo $this->render->render("view/modificarUsuarioView.php",$data);
    }

    public function modificarUsuario(){
        $data = $this->usuarioModel->modificarUsuario($_POST["idUsuario"], $_POST["dni"], $_POST["nombreYapellido"], $_POST["telefono"], $_POST["mail"], $_POST["clave"], $_POST["rol"]);
        if (!$data) {
            $_SESSION["mensaje"] = "No se pudo modificar el usuario";
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
    }

}