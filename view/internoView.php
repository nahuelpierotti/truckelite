{{> header}}
{{> navBar}}
<!-- Header -->
<header class="w3-display-container w3-center w3-grayscale-min header imgHome">
    <h1 class="w3-margin w3-jumbo w3-text-white">TRUCK ELITE</h1>
    <h1 class="w3-margin w3-jumbo w3-text-white">Bienvenido <strong>{{nomYape}}</strong></h1>
    <p class="w3-xlarge w3-text-white">Web de camiones</p>
    <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">About us</button>
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
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container animado">
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
                    <td>{{posicion_actual}}</td>
                    <td>{{#estado}}En Condiciones{{/estado}}{{^estado}}En el taller{{/estado}}</td>
                    <td>{{kilometraje}}km</td>
                </tr>
                {{/vehiculos}}
            </table>

        </div>
    </div>
</div>
<!--Third Grid-->
<div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <A name="flota"><h1>Flota</h1></A>
            <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</h5>
            <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="w3-third w3-center">
            <i class="fas fa-truck-moving w3-padding-64 w3-text-blue"></i>
        </div>
    </div>
</div>
<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>
{{> footer}}
