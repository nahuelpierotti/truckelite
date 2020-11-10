<?php
/*HELPERS*/
include_once("helper/MysqlDatabase.php");
include_once("helper/Renderer.php");
include_once("helper/UrlHelper.php");
/*MODEL*/
include_once("model/UsuarioModel.php");
/*CONTROLLER*/
include_once ("controller/LoginController.php");
include_once ("controller/InternoController.php");
include_once ("controller/ConsultarVehiculoController.php");
include_once ("controller/ModificarUsuarioController.php");
include_once("controller/HomeController.php");
include_once("controller/UsuarioController.php");
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
        return new LoginController($this->getRender());
    }

    public function getInternoController(){
        return new InternoController($this->getRender());
    }

    public function getConsultarVehiculoController(){
        return new ConsultarVehiculoController($this->getRender());
    }

    public function getModificarUsuarioController(){
        return new ModificarUsuarioController($this->getRender());
    }

    public function getUsuarioController(){
        return new UsuarioController($this->getUsuarioModel(),$this->getRender());
    }

    public function getHomeController(){
        return new HomeController($this->getRender());
    }
}