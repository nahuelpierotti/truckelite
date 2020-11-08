<?php
include_once ("helper/Config.php");
$render = Config::getRender();

echo $render->render("view/consultarVehiculoView.php");