{{> header}}
<section>
    <article class="w3-container w3-content w3-white">
        <div class="w3-center w3-container w3-content">
            <img src="view/img/logo.png" style="width: 20em;">
        </div>
        <form action="registrar/registrarUsuario" class="w3-container w3-content w3-padding w3-card w3-white  w3-border w3-round w3-mobile" style="width:40%; margin-top: 1em" method="POST">
            <div class="w3-center w3-padding-16">
                <img src="view/img/user3.png" style="width: 20%;">
            </div>
            <label for="" class="lbl-nombre">Nombre y apellido</label>
            <input type="text" class="w3-input form-input-login" name="nombreYapellido">
            <label for="" class="lbl-nombre">Nombre de usuario</label>
            <input type="text" class="w3-input form-input-login" name="nombreUser">
            <label for="">Clave</label>
            <input type="password" class="w3-input form-input-login" name="clave">
            <label for="" class="lbl-nombre">Dni</label>
            <input type="text" class="w3-input form-input-login" name="dni">
            <label for="" class="lbl-nombre">Mail</label>
            <input type="text" class="w3-input form-input-login" name="mail">
            <label for="" class="lbl-nombre">Telefono</label>
            <input type="text" class="w3-input form-input-login" name="telefono">
            <button class="w3-btn w3-blue w3-block w3-round w3-margin-bottom" style="margin-top: 2em">Registrarse</button>
            <p>¿Ya tenes cuenta?Logueate aca <a href="login" class="w3-text-blue link-estilo w3-hover-text-blue-grey">Log In</a></p>
        </form>
    </article>
</section>
{{> footer}}