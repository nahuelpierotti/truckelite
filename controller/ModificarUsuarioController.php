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
        $data["mensaje"] = $_GET["msj"];
        $data["acciones"] = $_SESSION["usuario"]["acciones"];
        $data["user_name"] = $_SESSION["usuario"]["user_name"];
        $this->usuarioBuscado($data);
        echo $this->render->render("view/modificarUsuarioView.php",$data);
    }

    public function modificarUsuario(){
        if(isset($_POST["licencia"])){
            $licencia = $_POST["licencia"];
        }else{
            $licencia = NULL;
        }
        $data = $this->usuarioModel->modificarUsuario($_POST["idUsuario"], $_POST["dni"], $_POST["nombreYapellido"], $_POST["telefono"], $_POST["mail"], $_POST["clave"], $_POST["rol"],$licencia);
        if (!$data) {
            header("Location: /truckelite/modificarUsuario?msj=No se pudo modificar el usuario");
        } else {
            header("Location: /truckelite/modificarUsuario?msj=El usuario se modifico correctamente");
        }

    }

    public function usuarioBuscado(&$data){
        if(isset($_GET["url"])) {
            $data["usuarioBuscado"] = $this->usuarioModel->buscarUsuario($_GET["url"]);
        }
    }

}