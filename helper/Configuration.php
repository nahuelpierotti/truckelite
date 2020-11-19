<?php
/*HELPERS*/
include_once("helper/MysqlDatabase.php");
include_once("helper/Renderer.php");
include_once("helper/UrlHelper.php");
/*MODEL*/
include_once("model/UsuarioModel.php");
include_once ("model/VehiculoModel.php");
include_once("model/ViajeModel.php");
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
include_once("controller/RegistrarViajeController.php");
include_once ("controller/ListarViajesController.php");
include_once ("controller/ModificarViajeController.php");
include_once ("controller/VerAcopladosController.php");
include_once ("controller/AcopladoController.php");
include_once ("controller/VerTractoresController.php");
include_once ("controller/TractorController.php");
include_once ("controller/VerVehiculosController.php");
include_once ("controller/VehiculoController.php");
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

    public function getViajeModel(){
        $database = $this->getDatabase();
        return new ViajeModel($database);
    }

    public function getVehiculoModel(){
        $database = $this->getDatabase();
        return new VehiculoModel($database);
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

    public function getRegistrarViajeController(){
        $viajeModel = $this->getViajeModel();
        return new RegistrarViajeController($this->getRender(),$viajeModel);
    }
    public function getListarViajesController(){
        $viajeModel = $this->getViajeModel();
        return new ListarViajesController($this->getRender(),$viajeModel);
    }
    public function getModificarViajeController(){
        $viajeModel = $this->getViajeModel();
        return new ModificarViajeController($this->getRender(),$viajeModel);
    }

    public function getVerAcopladosController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VerAcopladosController($this->getRender(),$vehiculoModel);
    }

    public function getAcopladoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new AcopladoController($this->getRender(),$vehiculoModel);
    }

    public function getVerTractoresController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VerTractoresController($this->getRender(),$vehiculoModel);
    }

    public function getTractorController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new TractorController($this->getRender(),$vehiculoModel);
    }

    public function getVerVehiculosController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VerVehiculosController($this->getRender(), $vehiculoModel);
    }

    public function getVehiculoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VehiculoController($this->getRender(),$vehiculoModel);
    }
}
