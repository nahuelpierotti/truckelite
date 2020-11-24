{{> header}}
{{> navBar}}

<div class="w3-container w3-content">
    <div id="formularioMantenimiento" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;margin-top: 6em;">
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <div class="w3-blue">
            <h2 class="w3-padding">Registrar Mantenimiento</h2>
        </div>
        <form class="" action="mantenimiento/agregarMantenimiento" method="post">

            <p>
                <label class="w3-text-brown"><b>Fecha service</b></label>
                <input id="date" type="date" value="2017-06-01" name="fecha" class="">
            </p>

            <p>
                <label class="w3-text-brown"><b>Km unidad</b></label>
                <input class="w3-input w3-border w3-sand" name="kmUnidad" type="number" value="">

            </p>

            <p>
                <label class="w3-text-brown"><b>Costo</b></label>
                <input class="w3-input w3-border w3-sand" name="costo" type="number" value="">

            </p>

            <p>
                <label class="w3-text-brown"><b>Service interno/externo</b></label>
                <input class="w3-input w3-border w3-sand" name="interno_externo" type="text" value="">

            </p>

            <select class="w3-select w3-border w3-sand" name="repuestos_cambiados">
                <option value="" disabled selected> Lista repuestos</option>
                <option value="Aceite">Aceite</option>
                <option value="Motor">Motor</option>
                <option value="Frenos">Frenos</option>
                <option value="Embrague">Embrague</option>
                <option value="Transmision de correas">Transmision de correas</option>
                <option value="Soporte de cabina">Soporte de cabina</option>
                <option value="Espejos">Espejos</option>
                <option value="Puertas">Puertas</option>
                <option value="Techo">Techo</option>
                <option value="Guardabarros">Guardabarros</option>
                <option value="Enganche de romolque">Enganche de remolque</option>
                <option value="Montante de puerta">Montante de puerta</option>
                <option value="Piso de carroceria">Piso de corroceria</option>
                <option value="Parrilla delantera">Parrilla delantera</option>
                <option value="Revestimiento trasero">Revestimiento trasero</option>
                <option value="Amortiguacion cabina">Amortiguacion cabina</option>
                <option value="Neumaticos">Neumaticos</option>
                <option value="Traccion de las ruedas">Traccion de las ruedas</option>
                <option value="Caja de cambios">Caja de cambios</option>
                <option value="Piezas de servicio y mantenimiento">Piezas de servicio y mantenimiento</option>
                <option value="Sistema de seguridad">Sistema de seguridad</option>
                <option value="Sistema de escape">Sistema de escape</option>
                <option value="Sistema hidraulico">Sistema hidraulico</option>
                <option value="Sistema de cierre">Sistema de cierre</option>
                <option value="Sistema electrico">Sistema electrico</option>
                <option value="Calefaccion/ventilacioin">Calefaccion/ventilacion</option>
                <option value="Aire acondicionado">Aire acondicionado</option>
            </select>

            <p>
                <label class="w3-text-brown"><b>Dni mecanico</b></label>
                <input class="w3-input w3-border w3-sand" name="dniMecanico" type="number" value="">

            </p>

            <p>
                <label class="w3-text-brown"><b>Nombre mecanico</b></label>
                <input class="w3-input w3-border w3-sand" name="nombreMecanico" type="text" value="">

            </p>

            <p>
                <label class="w3-text-brown"><b>Patente vehiculo</b></label>
                <input class="w3-input w3-border w3-sand" name="id_vehiculo" type="text" value="">

            </p>

            <p>
                <button class="w3-btn w3-blue">Enviar</button>
            </p>
        </form>
    </div>
</div>

{{> footer}}