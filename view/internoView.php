{{> header}}
{{> navBar}}
<!-- Header -->
<header class="w3-display-container w3-center w3-grayscale-min header imgHome">
    <h1 class="w3-margin w3-jumbo w3-text-white">TRUCK ELITE</h1>
    <h1 class="w3-margin w3-jumbo w3-text-white">Bienvenido <strong>{{nomYape}}</strong></h1>
    <p class="w3-xlarge w3-text-white">Web de camiones</p>
</header>
<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <A name="alarma"><h1>Alarmas</h1></A>
            {{#alarmaVehiculo}}
            <div class="w3-card-4 w3-light-gray">
                <p>Patente:{{fk_tractor}} Kilometraje:{{kilometraje}}km Alarma:{{alarma}}km</p>
                <a href="interno/EnvioAlTaller?id={{fk_tractor}}">Realizar Mantenimiento</a>
            </div>
            {{/alarmaVehiculo}}
            {{^alarmaVehiculo}}
            <p>No hay alarmas activas.</p>
            {{/alarmaVehiculo}}
        </div>
        <div class="w3-third w3-center">
            <i class="fas fa-map-marked-alt w3-padding-64 w3-text-blue"></i>
        </div>
    </div>
</div>
<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content w3-responsive">
            <table class="w3-table-all">
                <tr>
                    <th>Patente</th>
                    <th>Motor</th>
                    <th>Chasis</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Acoplado</th>
                    <th>Posicion Actual</th>
                    <th>Estado</th>
                    <th>Kilometraje</th>
                </tr>
                {{#vehiculos}}
                <tr>
                    <td>{{patente}}</td>
                    <td>{{motor}}</td>
                    <td>{{chasis}}</td>
                    <td>{{modelo}}</td>
                    <td>{{marca}}</td>
                    <td>{{fk_acoplado}}{{^fk_acoplado}}Sin asignar{{/fk_acoplado}}</td>
                    <td>{{#estado}}{{posicion_actual}}{{/estado}}{{^estado}}{{posicion_actual}}{{/estado}}</td>
                    <td>{{#estado}}En Condiciones{{/estado}}{{^estado}}En mantenimiento{{/estado}}</td>
                    <td>{{kilometraje}}km</td>
                </tr>
                {{/vehiculos}}
            </table>
        {{^vehiculos}}
        <p>No hay vehiculos en el sistema que pueda ver.</p>
        {{/vehiculos}}
        </div>
    </div>
</div>

{{> footer}}
