{{> header}}
{{> navBar}}

<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de fechas del service</h2>
    {{#mensaje}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
    {{/mensaje}}
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>Fecha</th>
                <th>Repuesto cambiado</th>
                <th>Patente</th>
            </tr>
            {{#listaFechas}}
            <tr>
                <td>{{fecha_service}}</td>
                <td>{{repuestos_cambiados}}</td>
                <td>{{fk_tractor}}</td>
            </tr>
            {{/listaFechas}}
        </table>
        {{^listaFechas}}
        <p>No hay fechas service cargadas de este vehiculo.</p>
        {{/listaFechas}}

    </div>
</div>

{{> footer}}
