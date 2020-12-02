{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de Vehiculos</h2>
    {{#mensaje}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
    {{/mensaje}}
    <div class="w3-responsive">
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
                <th>Accion</th>
            </tr>
            {{#listar}}
            <tr>
                <td>{{patente}}</td>
                <td>{{motor}}</td>
                <td>{{chasis}}</td>
                <td>{{modelo}}</td>
                <td>{{marca}}</td>
                <td>{{fk_acoplado}}{{^fk_acoplado}}Sin asignar{{/fk_acoplado}}</td>
                <td>{{posicion_actual}}</td>
                <td>{{estado}}</td>
                <td>
                    <a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="vehiculo/modificar?url={{patente}}">
                        <i class='far fa-edit'></i>
                    </a>
                    <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red' href="verVehiculos/eliminarVehiculo?url={{patente}}">
                        <i class='fas fa-trash w3-hover-text-red'></i>
                    </a>
                </td>
            </tr>
            {{/listar}}
        </table>
        <a class="w3-button w3-margin" href="vehiculo/agregar">Agregar Vehiculo</a>
    </div>
</div>
{{> footer}}

