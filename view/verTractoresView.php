{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de Tractores</h2>
    {{#mensajeTractor}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensajeTractor}}</p>
    {{/mensajeTractor}}
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>Patente</th>
                <th>Motor</th>
                <th>Chasis</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Acoplado</th>
                <th>Accion</th>
            </tr>
            {{#listar}}
            <tr>
                <td>{{patente}}</td>
                <td>{{motor}}</td>
                <td>{{chasis}}</td>
                <td>{{modelo}}</td>
                <td>{{marca}}</td>
                <td>{{fk_acoplado}}{{^fk_acoplado}}No tiene asignado{{/fk_acoplado}}</td>
                <td><a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="tractor/modificar?url={{patente}}">
                        <i class='far fa-edit'></i></a>

                    <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red'
                       href="verTractores/eliminarTractor?url={{patente}}">
                        <i class='fas fa-trash w3-hover-text-red'></i></a>
                </td>
            </tr>
            {{/listar}}
        </table>
        <a class="w3-button w3-margin" href="tractor/agregar">Agregar Tractor</a>
    </div>
</div>
{{> footer}}
