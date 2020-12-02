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
                <label class="w3-text-brown"><b>Patente</b>
                <input class="w3-input w3-border w3-sand" name="patente" type="text" value="{{vehiculo.0.patente}}" required>
                </label>
            </p>

            <p>
                <label class="w3-text-brown"><b>Motor</b>
                <input class="w3-input w3-border w3-sand" name="motor" type="number" value="{{vehiculo.0.motor}}" required>
                </label>
            </p>

            <p>
                <label class="w3-text-brown"><b>Chasis</b>
                <input class="w3-input w3-border w3-sand" name="chasis" type="text" value="{{vehiculo.0.chasis}}" required>
                </label>
            </p>

            <p>
                <label class="w3-text-brown"><b>Modelo</b>
                <input class="w3-input w3-border w3-sand" name="modelo" type="text" value="{{vehiculo.0.modelo}}" required>
                </label>
            </p>

            <label class="w3-text-brown"><b>Marca</b>
            <select class="w3-select w3-border w3-sand" name="marca">
                <option value="{{vehiculo.0.marca}}" {{^vehiculo.0.marca}} disabled selected {{/vehiculo.0.marca}} >
                {{#vehiculo.0.marca}}
                    {{vehiculo.0.marca}}
                {{/vehiculo.0.marca}}
                {{^vehiculo.0.marca}}
                    Marca de Tractor
                {{/vehiculo.0.marca}}
                </option>
                <option value="IVECO">IVECO</option>
                <option value="SCANIA">SCANIA</option>
                <option value="M.BENZ">M.BENZ</option>
            </select>
            </label>

            <label class="w3-text-brown"><b>Acoplado</b>
                <select class="w3-select w3-border w3-sand" name="acoplado">
                    {{#vehiculo.0.fk_acoplado}}
                        <option value="{{vehiculo.0.fk_acoplado}}">{{vehiculo.0.fk_acoplado}}</option>
                    {{/vehiculo.0.fk_acoplado}}
                    <option value="Sin Asignar">Sin Asignar</option>
                    {{#acoplados}}
                        <option value="{{patente_acoplado}}">{{patente_acoplado}}</option>
                    {{/acoplados}}
                </select>
            </label>

            <p>
                <label class="w3-text-brown"><b>Posicion Actual</b>
                <input class="w3-input w3-border w3-sand" name="posicion" type="text" value="{{vehiculo.0.posicion_actual}}" required>
                </label>
            </p>

            <p>
                <label class="w3-text-brown"><b>Estado</b>
                <input class="w3-input w3-border w3-sand" name="estado" type="text" value="{{vehiculo.0.estado}}" required>
                </label>
            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}