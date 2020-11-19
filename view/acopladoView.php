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
        <form class="" action="acoplado/{{action}}" method="post">

            <p>
                <label class="w3-text-brown"><b>Patente</b></label>
                <input class="w3-input w3-border w3-sand" name="patente" type="text" value="{{acoplado.0.patente_acoplado}}">

            </p>

            <p>
                <label class="w3-text-brown"><b>Tipo</b></label>
                <input class="w3-input w3-border w3-sand" name="tipo" type="text" value="{{acoplado.0.tipo}}" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Chasis</b></label>
                <input class="w3-input w3-border w3-sand" name="chasis" type="text" value="{{acoplado.0.chasis_acoplado}}" required>
            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}
