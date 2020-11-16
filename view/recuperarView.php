{{> header}}
<section>
    <article class="w3-container w3-content w3-white">
        <div class="w3-center w3-container w3-content">
            <img src="view/img/logo.png" style="width: 20em;">
        </div>
        {{#mensaje}}
            <div class="w3-panel w3-grey w3-center w3-responsive">
                <p>{{mensaje}}</p>
            </div>
        <br>
        <br>
        <a class="w3-btn w3-blue w3-center w3-round" href="/truckelite">VOLVER</a>
        {{/mensaje}}
        {{^mensaje}}
        <div class="w3-panel w3-blue w3-center w3-responsive">
            <h3>Recupero de Clave</h3>
            <p>Ingresa el usuario y te enviaremos un email<br>
            para que puedas ingresar una nueva clave.</p>
        </div>
        <form action="recuperar/enviarCorreo" class="w3-container w3-content w3-padding w3-card w3-white  w3-border w3-round w3-mobile" style="width:40%; margin-top: 1em; margin-bottom: 1em;" method="POST">
            <div class="w3-center w3-padding-16">
                <img src="view/img/user.svg" style="width: 40%;">
            </div>
            <p>{{mensaje}}</p>
            <label for="" class="lbl-nombre">Ingrese Usuario</label>
            <input type="text" class="w3-input form-input-login" name="nombreUser" required>
            <br>
            <button class="w3-btn w3-blue w3-block w3-round w3-margin-bottom" style="margin-top: 2em">Enviar Email</button>
            <br>
            <a class="w3-btn w3-blue w3-center w3-round" href="/truckelite">VOLVER</a>
        </form>
        {{/mensaje}}
    </article>
</section>
