{{> header}}
{{> navBar}}
<div class="w3-display-container">
    <div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">{{titulo}}</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form class="" action="vehiculo/{{action}}" method="post">

            <p>
                <label class="w3-text-brown"><b>Patente</b></label>
                <input class="w3-input w3-border w3-sand" name="patente" type="text" value="{{vehiculo.0.fk_tractor}}" required>

            </p>

            <p>
                <label class="w3-text-brown"><b>Posicion Actual</b></label>
                <input class="w3-input w3-border w3-sand" name="posicion" type="text" value="{{vehiculo.0.posicion_actual}}" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Estado</b></label>
                <input class="w3-input w3-border w3-sand" name="estado" type="text" value="{{vehiculo.0.estado}}" required>
            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}