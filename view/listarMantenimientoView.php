{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de mantenimientos</h2>
    {{#mensaje}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
    {{/mensaje}}
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>Fecha service</th>
                <th>Km vehiculo</th>
                <th>Costo</th>
                <th>Interno o externo</th>
                <th>Repuestos cambiados</th>
                <th>ID mantenimiento</th>
                <th>ID mecanico</th>
                <th>Nombre mecanico</th>
                <th>ID vehiculo</th>
                <th>Accion</th>
            </tr>
            {{#listar}}
            <tr>
                <td>{{fecha_service}}</td>
                <td>{{km_unidad}}</td>
                <td>{{costo}}</td>
                <td>{{interno_externo}}</td>
                <td>{{repuestos_cambiados}}</td>
                <td>{{id_mantenimiento}}</td>
                <td>{{id_mecanico}}</td>
                <td>{{nombre}}</td>
                <td>{{id_vehiculo}}</td>
                <td><a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="modificarMantenimiento?url={{id_mantenimiento}}">
                        <i class='far fa-edit'></i></a>

                    <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red'
                       href="listarMantenimiento/eliminarMantenimiento?url={{id_mantenimiento}}">
                        <i class='fas fa-trash w3-hover-text-red'></i></a>
                </td>
            </tr>
            {{/listar}}
        </table>
    </div>
</div>
{{> footer}}