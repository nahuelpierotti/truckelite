<?php
/*HELPERS*/
include_once("helper/MysqlDatabase.php");
include_once("helper/Renderer.php");
include_once("helper/UrlHelper.php");
/*MODEL*/
include_once("model/UsuarioModel.php");
/*CONTROLLER*/
include_once ("controller/LoginController.php");
include_once ("controller/LogOutController.php");
include_once ("controller/RegistrarController.php");
include_once ("controller/InternoController.php");
include_once ("controller/ConsultarVehiculoController.php");
include_once ("controller/ModificarUsuarioController.php");
include_once ("controller/ListarUsuariosController.php");
include_once ("controller/RecuperarController.php");
include_once ("controller/ClaveNuevaController.php");
/*OTROS*/
include_once("third-party/mustache/src/Mustache/Autoloader.php");
include_once("Router.php");

class Configuration{

    private function getConfig(){
        return parse_ini_file("config/config.ini");
    }

    private function getDatabase(){
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"],
            $config["port"]
        );
    }

    public static function getRender(){
        return new Renderer('view/partial');
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }

    /*MODEL*/
    public function getUsuarioModel(){
        $database = $this->getDatabase();
        return new UsuarioModel($database);
    }

    /*CONTROLLER*/
    public function getLoginController(){
        $usuarioModel = $this->getUsuarioModel();
        return new LoginController($this->getRender(),$usuarioModel);
    }

    public function getLogOutController(){
        //$usuarioModel = $this->getUsuarioModel();
        return new LogOutController($this->getRender());
    }

    public function getRegistrarController(){
        $usuarioModel = $this->getUsuarioModel();
        return new RegistrarController($this->getRender(),$usuarioModel);
    }

    public function getInternoController(){
        return new InternoController($this->getRender());
    }

    public function getConsultarVehiculoController(){
        return new ConsultarVehiculoController($this->getRender());
    }
    public function getListarUsuariosController(){
        $usuarioModel = $this->getUsuarioModel();
        return new ListarUsuariosController($this->getRender(),$usuarioModel);
    }

    public function getModificarUsuarioController(){
        $usuarioModel = $this->getUsuarioModel();
        return new ModificarUsuarioController($this->getRender(),$usuarioModel);
    }
    public function getRecuperarController(){
        $usuarioModel = $this->getUsuarioModel();
        return new RecuperarController($this->getRender(),$usuarioModel);
    }

    public function getClaveNuevaController(){
        $usuarioModel = $this->getUsuarioModel();
        return new ClaveNuevaController($this->getRender(),$usuarioModel);
    }
}
