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
        $licencia = isset($_POST["licencia"]) ? $_POST["licencia"] : NULL;
        $usuarioAModificar = $this->usuarioModel->buscarUsuario($_POST["idUsuario"]);
        $clave = $usuarioAModificar[0]["clave"] != $_POST["clave"] ? md5($_POST["clave"]) : $_POST["clave"];
        $data = $this->usuarioModel->modificarUsuario($_POST["idUsuario"],
                                                      $_POST["dni"],
                                                      $_POST["nombreYapellido"],
                                                      $_POST["telefono"],
                                                      $_POST["mail"],
                                                      $clave,
                                                      $_POST["rol"],
                                                      $licencia);
        if (!$data) {
            header("Location: /truckelite/modificarUsuario?msj=No se pudo modificar el usuario");
        } else {
            header("Location: /truckelite/listarUsuarios?msj=El usuario se modifico correctamente");
        }

    }

    public function usuarioBuscado(&$data){
        if(isset($_GET["url"])) {
            $data["usuarioBuscado"] = $this->usuarioModel->buscarUsuario($_GET["url"]);
        }
    }

}