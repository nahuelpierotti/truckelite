{{> header}}
{{> navBar}}
<div class="w3-display-container">
    <div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Costos Estimados</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form  action="costos/agregarCostos" method="post">

            <p>
                <label class="w3-text-brown"><b>Viaticos</b></label>
                <input class="w3-input w3-border w3-sand" name="viaticos" type="number" id="viaticos" required oninput="calcular()">

            </p>

            <p>
                <label class="w3-text-brown"><b>Peajes</b></label>
                <input class="w3-input w3-border w3-sand" name="peajes" type="number" id="peajes" required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Extras</b></label>
                <input class="w3-input w3-border w3-sand" name="extras" type="number" id="extras" required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Fee</b></label>
                <input class="w3-input w3-border w3-sand" name="fee" type="number" id="fee" required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Total</b></label>
                <input class="w3-input w3-border w3-sand" name="total" type="number" id="total" required>
            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}