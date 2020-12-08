{{> header}}

<div class="w3-display-container">
    <div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Registrar datos reales del Viaje</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form class="" action="cargarDatosViaje/cargarReporte" method="post">

            <p>
                <input class="w3-input w3-border w3-sand w3-hide" name="id_viaje" type="number" value="{{id_viaje}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Combustible Consumido</b></label>
                <input class="w3-input w3-border w3-sand" name="combustible_consumido" type="number" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Cantidad cargado de combustible</b></label>
                <input class="w3-input w3-border w3-sand" name="cantidad_carga_combustible" type="number" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Costo de combustible cargado</b></label>
                <input class="w3-input w3-border w3-sand" name="costo_carga_combustible" type="number" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Lugar donde cargo combustible</b></label>
                <input class="w3-input w3-border w3-sand" name="lugar_carga_combustible" type="text" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Costo de peajes</b></label>
                <input class="w3-input w3-border w3-sand" name="peajes" type="text" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Costo de pesajes</b></label>
                <input class="w3-input w3-border w3-sand" name="pesajes" type="text" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Ubicacion actual</b></label>
                <input class="w3-input w3-border w3-sand" name="posicion_actual" id="position" type="text" required>
            </p>

            <a class="w3-button w3-blue w3-hover-text-blue" onclick="getLocation()">Mi ubicacion</a>

            <p>
                <label class="w3-text-brown"><b>KM Recorridos</b></label>
                <input class="w3-input w3-border w3-sand" name="km_recorrido" type="number" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Lugar de hospedaje</b></label>
                <input class="w3-input w3-border w3-sand" name="lugar_hospedaje" type="text" value="Ninguno" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Costo hospedaje</b></label>
                <input class="w3-input w3-border w3-sand" name="costo_hospedaje" type="number" required>
            </p>

            <p>
                <label class="w3-text-brown"><b>Indica el estado del viaje</b></label>
                <select class="w3-select w3-border w3-sand" name="estadoViaje" id="estadoViaje" >
                    {{#estado}}
                        <option value="En viaje">En viaje</option>
                        <option value="Viaje finalizado">Finalizar viaje</option>
                    {{/estado}}
                    {{^estado}}
                        <option value="Viaje finalizado">Viaje finalizado</option>
                        <option value="En viaje">En viaje</option>
                    {{/estado}}
                </select>
            </p>

            <p>
                <button class="w3-btn w3-blue">Agregar reporte</button>
            </p>
        </form>
    </div>
</div>

{{> footer}}