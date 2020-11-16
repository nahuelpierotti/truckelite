<?php


class ClaveNuevaController
{
    private $render;
    private $usuarioModel;

    public function __construct($render,$usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
        $this->render = $render;
    }

    public function execute()
    {
        $data["id_usuario"] =$_GET["u"];
        echo $this->render->render("view/claveNuevaView.php",$data);
    }
    public function actualizar(){
        $clave=$_POST["clave"];
        $clave2=$_POST["clave2"];
        $id_usuario=$_POST["id_usuario"];
        if($clave==$clave2){
            $this->usuarioModel->actualizarClave($id_usuario,$clave);
            $_SESSION["mensaje"] = "La contraseña se actualizo correctamente!";
            header("Location: /truckelite/recuperar");

        }
    }
}