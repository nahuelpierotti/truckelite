{{> header}}
{{> navBar}}
<div class="w3-display-container">
    <div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Registrar Viaje</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form class="" action="registrarViaje/agregarViaje" method="post">

            <p>
                <label class="w3-text-brown"><b>Combustible Consumido Previsto</b></label>
                <input class="w3-input w3-border w3-sand" name="combustible_consumido_previsto" type="text" value="{{viajeBuscado.0.combustible_consumido_previsto}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Fecha</b></label>
                <input class="w3-input w3-border w3-sand" name="fecha" type="date" value="{{viajeBuscado.0.fecha}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Destino</b></label>
                <input class="w3-input w3-border w3-sand" name="destino" type="text" value="{{viajeBuscado.0.destino}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Origen</b></label>
                <input class="w3-input w3-border w3-sand" name="origen" type="text" value="{{viajeBuscado.0.origen}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Tiempo Previsto</b></label>
                <input class="w3-input w3-border w3-sand" name="tiempo_previsto" type="time" value="{{viajeBuscado.0.tiempo_previsto}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>KM Recorridos Previsto</b></label>
                <input class="w3-input w3-border w3-sand" name="km_recorrido_previsto" type="text" value="{{viajeBuscado.0.km_recorrido_previsto}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Id Chofer</b></label>
                <input class="w3-input w3-border w3-sand" name="id_chofer" type="number" value="{{viajeBuscado.0.id_chofer}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>Id Vehiculo</b></label>
                <input class="w3-input w3-border w3-sand" name="id_vehiculo" type="number" value="{{viajeBuscado.0.id_vehiculo}}">
            </p>

            <p>
                <button class="w3-btn w3-blue">Agregar Viaje</button>
            </p>
        </form>
    </div>
</div>
{{> footer}}