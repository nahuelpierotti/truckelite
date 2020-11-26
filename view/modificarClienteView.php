{{> header}}
{{> navBar}}

<div class="w3-container w3-content">
    <div id="formularioMantenimiento" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;margin-top: 6em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Modificar cliente</h2>
        </div>
        <form class="" action="modificarCliente/modificarCliente" method="post">

            <p>
                <input class="w3-hide" type="text" value="{{clienteBuscado.0.id}}" name="id">
            </p>

            <p>
                <label class="w3-text-brown"><b>Denominacion</b></label>
                <input class="w3-input w3-border w3-sand" id="denominacion" type="text" value="{{clienteBuscado.0.denominacion}}" name="denominacion">
            </p>

            <p>
                <label class="w3-text-brown"><b>Cuit</b></label>
                <input class="w3-input w3-border w3-sand" name="cuit" type="number" value="{{clienteBuscado.0.cuit}}">

            </p>

            <p>
                <label class="w3-text-brown"><b>Direccion</b></label>
                <input class="w3-input w3-border w3-sand" name="direccion" type="text" value="{{clienteBuscado.0.direccion}}">

            </p>

            <p>
                <label class="w3-text-brown"><b>Telefono</b></label>
                <input class="w3-input w3-border w3-sand" name="telefono" type="number" value="{{clienteBuscado.0.telefono}}">

            </p>

            <p>
                <label class="w3-text-brown"><b>Email</b></label>
                <input class="w3-input w3-border w3-sand" name="email" type="text" value="{{clienteBuscado.0.email}}">

            </p>

            <p>
                <label class="w3-text-brown"><b>Contacto 1</b></label>
                <input class="w3-input w3-border w3-sand" name="contacto1" type="text" value="{{clienteBuscado.0.contacto1}}">

            </p>

            <p>
                <label class="w3-text-brown"><b>Contacto 2</b></label>
                <input class="w3-input w3-border w3-sand" name="contacto2" type="text" value="{{clienteBuscado.0.contacto2}}">

            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>

{{> footer}}