{{> header}}
{{> navBar}}
<div class="w3-display-container">
    <div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Detallar Carga</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form action="carga/agregarCarga" method="post">

            <select class="w3-select w3-border w3-sand" name="tipo">
                <option value="1">Granel</option>
                <option value="2">Liquida</option>
                <option value="3">20 Pies</option>
                <option value="4">40 Pies</option>
                <option value="5">Jaula</option>
                <option value="6">CarCarrier</option>
            </select>

            <p>
                <label class="w3-text-brown"><b>Peso</b></label>
                <input class="w3-input w3-border w3-sand" name="peso" type="text" required>
            </p>

            <div>
                <p>Hazard</p>
                <input class="w3-radio" type="radio" name="hazard" value="true">
                <label>Si</label>
                <input class="w3-radio" type="radio" name="hazard" value="false" checked>
                <label>No</label>
            </div>

            <select class="w3-select w3-border w3-sand w3-margin-top" name="imoClass">
                <option value="" disabled selected>Elije ImoClass</option>
                <option value="NULL">no posee</option>
                <option value="1">Explosives</option>
                <option value="2">Flammable Gas</option>
                <option value="3">Flammable Liquids</option>
                <option value="4">Flammable Solids or Substances</option>
                <option value="5">Oxidizing substances and organic peroxides</option>
                <option value="6">Toxic substances</option>
                <option value="7">Radioactive Material</option>
                <option value="8">Corrosive substances</option>
                <option value="9">Miscellaneous dangerous substances and articles</option>
            </select>

            <div>
                <p>Reefer</p>
                <input class="w3-radio" type="radio" name="reefer" value="true">
                <label>Si</label>
                <input class="w3-radio" type="radio" name="reefer" value="false" checked>
                <label>No</label>
            </div>

            <p>
                <label class="w3-text-brown"><b>Temperatura</b></label>
                <input type="text" class="w3-input w3-border w3-sand" name="temperatura" >
            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}