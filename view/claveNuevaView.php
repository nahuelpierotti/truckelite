{{> header}}
<section>
    <article class="w3-container w3-content w3-white">
        <div class="w3-center w3-container w3-content">
            <img src="view/img/logo.png" style="width: 20em;">
        </div>
        <form action="claveNueva/actualizar" class="w3-container w3-content w3-padding w3-card w3-white  w3-border w3-round w3-mobile" style="width:40%; margin-top: 1em; margin-bottom: 1em;" method="POST">
            <div class="w3-center w3-padding-16">
                <img src="view/img/user.svg" style="width: 40%;">
            </div>
            <div class="w3-panel w3-blue w3-center w3-responsive">
                <h3>Cambio de Clave</h3>
                <p>Ingresa por duplicado la clave nueva.</p>
            </div>
            <input type="hidden" name="id_usuario" value="{{id_usuario}}">

            <label for="">Clave Nueva</label>
            <input type="password" class="w3-input form-input-login" name="clave" required>
            <label for="">Vuelva a Ingresar la Clave</label>
            <input type="password" class="w3-input form-input-login" name="clave2" required>

            <button class="w3-btn w3-blue w3-block w3-round w3-margin-bottom" style="margin-top: 2em">Enviar</button>

        </form>
    </article>
</section>