{{> header}}
{{> navBar}}

<section>
    <article class="w3-container w3-content w3-white">

        <form action="cargaCliente/cargarCliente" class="w3-container w3-content w3-padding w3-card w3-white  w3-border w3-round w3-mobile" style="width:40%; margin-top: 4em; margin-bottom: 1em;" method="POST">
            <h2 class="w3-center w3-blue">Cargar cliente al sistema</h2>
            <div class="w3-center w3-padding-16">
                <img src="view/img/client.svg" style="width: 40%;">
            </div>
            <p class="w3-panel w3-pale-blue w3-leftbar w3-border-blue">{{mensaje}}</p>
            <label for="" class="lbl-nombre">Denominacion</label>
            <input type="text" class="w3-input form-input-login" name="denominacion" required>
            <label for="" class="lbl-nombre">Cuit</label>
            <input type="number" class="w3-input form-input-login" name="cuit" required>
            <label for="">Direccion</label>
            <input type="text" class="w3-input form-input-login" name="direccion" required>
            <label for="" class="lbl-nombre">Telefono</label>
            <input type="number" class="w3-input form-input-login" name="telefono" required>
            <label for="" class="lbl-nombre">Email</label>
            <input type="text" class="w3-input form-input-login" name="mail" required>
            <label for="" class="lbl-nombre">Contacto1</label>
            <input type="text" class="w3-input form-input-login" name="contacto1" >
            <label for="" class="lbl-nombre">Contacto2</label>
            <input type="text" class="w3-input form-input-login" name="contacto2" >
            <button class="w3-btn w3-blue w3-block w3-round w3-margin-bottom" style="margin-top: 2em">Agregar cliente</button>
        </form>
    </article>
</section>

{{> footer}}