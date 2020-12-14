{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Acoplados</h2>
    {{#mensajeAcoplado}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensajeAcoplado}}</p>
    {{/mensajeAcoplado}}
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>Patente</th>
                <th>Tipo</th>
                <th>Chasis</th>
                <th>Accion</th>
            </tr>
            {{#listar}}
                <tr>
                <td>{{patente_acoplado}}</td>
                <td>{{tipo}}</td>
                <td>{{chasis_acoplado}}</td>
                <td><a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="acoplado/modificar?url={{patente_acoplado}}">
                        <i class='far fa-edit'></i></a>

                <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red'
                       href="verAcoplados/eliminarAcoplado?url={{patente_acoplado}}">
                        <i class='fas fa-trash w3-hover-text-red'></i></a>
                </td>
            </tr>
            {{/listar}}
        </table>
        <a class="w3-button w3-margin" href="acoplado/agregar">Agregar Acoplado</a>
    </div>
</div>
{{> footer}}