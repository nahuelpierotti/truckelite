<?php
/*HELPERS*/
include_once("helper/MysqlDatabase.php");
include_once("helper/Renderer.php");
include_once("helper/UrlHelper.php");
/*MODEL*/
include_once ("model/InternoModel.php");
include_once("model/UsuarioModel.php");
include_once("model/MecanicoModel.php");
include_once("model/SupervisorModel.php");
include_once("model/ChoferModel.php");
include_once("model/AdministradorModel.php");
include_once ("model/VehiculoModel.php");
include_once("model/ViajeModel.php");
include_once("model/MantenimientoModel.php");
include_once("model/ClienteModel.php");
include_once ("model/CargaModel.php");
include_once ("model/CostosModel.php");
include_once ("model/ProformaModel.php");
include_once ("model/ReporteModel.php");
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
include_once ("controller/MantenimientoController.php");
include_once ("controller/ListarMantenimientoController.php");
include_once ("controller/ModificarMantenimientoController.php");
include_once ("controller/VerAcopladosController.php");
include_once ("controller/AcopladoController.php");
include_once ("controller/VerVehiculosController.php");
include_once ("controller/VehiculoController.php");
include_once ("controller/CargaClienteController.php");
include_once ("controller/CargaController.php");
include_once ("controller/CostosController.php");
include_once ("controller/ProformaController.php");
include_once ("controller/CargarDatosViajeController.php");
include_once ("controller/GraficosComparativosController.php");
include_once ("controller/VehiculosEnTallerController.php");

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
        $mecanicoModel = $this->getMecanicoModel();
        $choferModel = $this->getchoferModel();
        $supervisorModel = $this->getSupervisorModel();
        $administradorModel = $this->getAdministradorModel();
        return new UsuarioModel($database,$mecanicoModel,$choferModel,$supervisorModel,$administradorModel);
    }

    public function getMecanicoModel(){
        $database = $this->getDatabase();
        return new MecanicoModel($database);
    }

    public function getChoferModel(){
        $database = $this->getDatabase();
        return new ChoferModel($database);
    }

    public function getSupervisorModel(){
        $database = $this->getDatabase();
        return new SupervisorModel($database);
    }

    public function getAdministradorModel(){
        $database = $this->getDatabase();
        return new AdministradorModel($database);
    }

    public function getViajeModel(){
        $database = $this->getDatabase();
        return new ViajeModel($database);
    }

    public function getMantenimientoModel(){
        $database = $this->getDatabase();
        return new MantenimientoModel($database);
    }

    public function getVehiculoModel(){
        $database = $this->getDatabase();
        return new VehiculoModel($database);
    }

    public function getClienteModel(){
        $database = $this->getDatabase();
        return new ClienteModel($database);
    }

    public function getCargaModel(){
        $database = $this->getDatabase();
        return new CargaModel($database);
    }

    public function getCostosModel(){
        $database = $this->getDatabase();
        return new CostosModel($database);
    }

    public function getProformaModel(){
        $database = $this->getDatabase();
        return new ProformaModel($database);
    }

    public function getReporteModel(){
        $database = $this->getDatabase();
        return new ReporteModel($database);
    }

    public function getInternoModel(){
        $database = $this->getDatabase();
        return new InternoModel($database);
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
        $internoModel = $this->getInternoModel();
        return new InternoController($this->getRender(),$internoModel);
    }

    public function getConsultarVehiculoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new ConsultarVehiculoController($this->getRender(),$vehiculoModel);
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

    public function getMantenimientoController(){
        $mantenimientoModel = $this->getMantenimientoModel();
        $mecanicoModel = $this->getMecanicoModel();
        $vehiculoModel = $this->getVehiculoModel();
        return new MantenimientoController($this->getRender(),$mantenimientoModel,$mecanicoModel,$vehiculoModel);
    }

    public function getListarMantenimientoController(){
        $mantenimientoModel = $this->getMantenimientoModel();
        return new ListarMantenimientoController($this->getRender(),$mantenimientoModel);
    }

    public function getModificarMantenimientoController(){
        $mantenimientoModel = $this->getMantenimientoModel();
        $mecanicoModel = $this->getMecanicoModel();
        return new ModificarMantenimientoController($this->getRender(),$mantenimientoModel,$mecanicoModel);
    }

    public function getVerAcopladosController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VerAcopladosController($this->getRender(),$vehiculoModel);
    }

    public function getAcopladoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new AcopladoController($this->getRender(),$vehiculoModel);
    }

    public function getVerVehiculosController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VerVehiculosController($this->getRender(), $vehiculoModel);
    }

    public function getVehiculoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VehiculoController($this->getRender(),$vehiculoModel);
    }

    public function getCargaClienteController(){
        $clienteModel = $this->getClienteModel();
        return new CargaClienteController($this->getRender(),$clienteModel);
    }

    public function getCargaController(){
        $cargaModel = $this->getCargaModel();
        return new CargaController($this->getRender(),$cargaModel);
    }

    public function getCostosController(){
        $costosModel = $this->getCostosModel();
        return new CostosController($this->getRender(),$costosModel);
    }

    public function getProformaController(){
        $proformaModel = $this->getProformaModel();
        return new ProformaController($this->getRender(),$proformaModel);
    }

    public function getCargarDatosViajeController(){
        $reporteModel = $this->getReporteModel();
        return new CargarDatosViajeController($this->getRender(),$reporteModel);
    }

    public function getGraficosComparativosController(){
        $reporteModel = $this->getReporteModel();
        $viajeModel = $this->getViajeModel();
        $proformaModel = $this->getProformaModel();
        return new GraficosComparativosController($this->getRender(),$reporteModel,$viajeModel,$proformaModel);
    }

    public function getVehiculosEnTallerController(){
        $mantenimientoModel = $this->getMantenimientoModel();
        return new VehiculosEnTallerController($this->getRender(),$mantenimientoModel);
    }
}
