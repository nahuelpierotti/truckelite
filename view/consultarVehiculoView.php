{{> header}}
{{> navBar}}
<div class="w3-container w3-display-container">
<div id="formularioUsuario" class="w3-container w3-content w3-card-4" style="margin-bottom: 4em;">
        <div class=" w3-blue">
        <h2 class="w3-container">Consultar Vehiculo</h2>
    </div>



    <form action="consultarVehiculo/procesarConsulta" method="post">
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}

        <p>
            <label class="w3-text-brown"><b>Ingrese patente de vehiculo a consultar</b></label>
            <input class="w3-input w3-border w3-sand" name="patente" type="text" required>
        </p>

        <select class="w3-select w3-border w3-sand" name="consultaVehiculo">
            <option value="" disabled selected>Opcion a consultar</option>
            <option value="posicionActual">Posicion Actual</option>
            <option value="kilometros">Kilometros Recorridos</option>
            <option value="combustible">Combustible Consumido</option>
            <option value="tiempo">Tiempo En Viaje</option>
        </select>

        <p>
            <button class="w3-btn w3-blue">Consultar</button>
        </p>
    </form>
</div>
</div>
{{> footer}}