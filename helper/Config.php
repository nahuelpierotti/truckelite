<?php
include_once("Renderer.php");
include_once("third-party/mustache/src/Mustache/Autoloader.php");

class Config{
    private $config;

    public function __construct($configPath){
        $this->config = parse_ini_file($configPath,true);
    }

    public function get($section,$key){
        return $this->config[$section][$key];
    }

    public static function getRender(){
        return new Renderer('view/partial',);
    }

}