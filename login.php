<?php
include_once ("header.php");
?>
<section class="w3-display-container">
    <img src="img/fondo-loginsvg.svg" style="min-width:500px" width="1500" height="auto">
    <form class="w3-display-topmiddle w3-padding w3-card w3-white  w3-border w3-round w3-mobile" style="width:40%; margin-top: 12em">
            <div class="w3-center w3-padding-16">
                <img src="img/user.svg" style="width: 20%;">
            </div>
            <label for="" class="lbl-nombre">Usuario</label>
            <input type="text" class="w3-input form-input-login">
            <label for="">Clave</label>
            <input type="password" class="w3-input form-input-login">
        <button class="w3-btn w3-blue w3-block w3-round w3-margin-bottom" style="margin-top: 2em">Log In</button>
        <p>¿Te olvidaste la clave? <a href="#cambiarClave" class="w3-text-blue link-estilo w3-hover-text-blue-grey">Cambiar clave</a><br>
        ¿No tenes cuenta?Registrate aca <a href="#registrar" class="w3-text-blue link-estilo w3-hover-text-blue-grey">Registrarse</a></p>
    </form>

</section>
<?php
include_once ("footer.php");
?>