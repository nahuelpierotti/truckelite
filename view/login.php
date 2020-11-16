{{> header}}
<section>
    <article class="w3-container w3-content w3-padding-16">
    <div class="w3-container w3-content w3-center w3-white ">
        <img src="view/img/logo.png" style="width: 20em;">
    </div>
    <form action="login/procesarLogin" class="w3-container w3-content w3-padding w3-card w3-white  w3-border w3-round w3-mobile" style="width:40%; margin-top: 1em;margin-bottom: 1em;" method="POST">
            <div class="w3-center w3-padding-16">
                <img src="view/img/user.svg" style="width: 40%;">
            </div>
            <p class="w3-text-red">{{mensaje}}</p>
            <label for="" class="lbl-nombre">Usuario</label>
            <input type="text" class="w3-input form-input-login" name="nombre">
            <label for="">Clave</label>
            <input type="password" class="w3-input form-input-login" name="clave">
        <button class="w3-btn w3-blue w3-block w3-round w3-margin-bottom" style="margin-top: 2em">Log In</button>
        <p>¿Te olvidaste la clave? <a href="recuperar" class="w3-text-blue link-estilo w3-hover-text-blue-grey">Cambiar clave</a><br>
        ¿No tenes cuenta?Registrate aca <a href="registrar" class="w3-text-blue link-estilo w3-hover-text-blue-grey">Registrarse</a></p>
    </form>
    </article>
</section>