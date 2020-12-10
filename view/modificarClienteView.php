{{> header}}
{{> navBar}}
<div class="w3-display-container">
    <div id="formularioCliente" class="w3-container w3-content w3-card-4 w3-padding"
         style="margin-bottom: 4em;margin-top: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Actualizar Cliente</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form class="" action="modificarCliente/modificarCliente" method="post">

            <input class="w3-input w3-border w3-sand" name="id" type="text"
                           value="{{clienteBuscado.0.id}}" required>
            <p>
                <label class="w3-text-brown"><b>Denominacion</b>
                    <input class="w3-input w3-border w3-sand" name="denominacion" type="text"
                           value="{{clienteBuscado.0.denominacion}}" required>
                </label>
            </p>
            <p>
                <label class="w3-text-brown"><b>CUIT</b>
                    <input class="w3-input w3-border w3-sand" name="cuit" type="text"
                           value="{{clienteBuscado.0.cuit}}" required>
                </label>
            </p>
            <p>
                <label class="w3-text-brown"><b>Direccion</b>
                    <input class="w3-input w3-border w3-sand" name="direccion" type="text"
                           value="{{clienteBuscado.0.direccion}}" required>
                </label>
            </p>
            <p>
                <label class="w3-text-brown"><b>Telefono</b>
                    <input class="w3-input w3-border w3-sand" name="telefono" type="text"
                           value="{{clienteBuscado.0.telefono}}" required>
                </label>
            </p>
            <p>
                <label class="w3-text-brown"><b>Email</b>
                    <input class="w3-input w3-border w3-sand" name="mail" type="text" value="{{clienteBuscado.0.email}}" required>
                </label>
            </p>

            <p>
                <label class="w3-text-brown"><b>Contacto1</b>
                    <input class="w3-input w3-border w3-sand" name="contacto1" type="text"
                           value="{{clienteBuscado.0.contacto1}}" required>
                </label>
            </p>
            <p>
                <label class="w3-text-brown"><b>Contacto2</b>
                    <input class="w3-input w3-border w3-sand" name="contacto2" type="text"
                           value="{{clienteBuscado.0.contacto2}}" required>
                </label>
            </p>
            <br>
            <p>
                <button class="w3-btn w3-blue">Actualizar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}