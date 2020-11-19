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
        <form class="" action="tractor/{{action}}" method="post">

            <p>
                <label class="w3-text-brown"><b>Patente</b></label>
                <input class="w3-input w3-border w3-sand" name="patente" type="text" value="{{tractor.0.patente}}" required>

            </p>

            <p>
                <label class="w3-text-brown"><b>Motor</b></label>
                <input class="w3-input w3-border w3-sand" name="motor" type="text" value="{{tractor.0.motor}}" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Chasis</b></label>
                <input class="w3-input w3-border w3-sand" name="chasis" type="text" value="{{tractor.0.chasis}}" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Modelo</b></label>
                <input class="w3-input w3-border w3-sand" name="modelo" type="text" value="{{tractor.0.modelo}}" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Marca</b></label>
                <input class="w3-input w3-border w3-sand" name="marca" type="text" value="{{tractor.0.marca}}" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Acoplado</b></label>
                <input class="w3-input w3-border w3-sand" name="acoplado" type="text" value="{{tractor.0.fk_acoplado}}">
            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}
