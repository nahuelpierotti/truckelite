<?php

class GraficosComparativosController
{
    private $render;
    private $graficoModel;


    public function __construct($render, $graficoModel)
    {
        $this->graficoModel = $graficoModel;
        $this->render = $render;
    }

    public function execute()
    {
        if ($_SESSION["usuario"]["rol"] != "Administrador") header("Location: /truckelite/interno");
        $data = $_SESSION["usuario"];
        $this->mostrarGraficoComparativo($data);
        echo $this->render->render("view/graficosComparativosView.php", $data);
    }

    public function mostrarGraficoComparativo(& $data){
        if(isset($_GET["url"])){
            $this->graficoModel->traerDatosDelViaje($_GET["url"],$data);
            $this->graficoModel->traerDatosDeLosGraficos($data);
        }
    }


}