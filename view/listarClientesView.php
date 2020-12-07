{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de Clientes</h2>
    {{#mensajeEliminar}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensajeEliminar}}</p>
    {{/mensajeEliminar}}
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>ID</th>
                <th>Denominacion</th>
                <th>CUIT</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Contacto1</th>
                <th>Contacto2</th>
                <th>Accion</th>
            </tr>
            {{#listar}}
            <tr>
                <td>{{id}}</td>
                <td>{{denominacion}}</td>
                <td>{{cuit}}</td>
                <td>{{direccion}}</td>
                <td>{{telefono}}</td>
                <td>{{email}}</td>
                <td>{{contacto1}}</td>
                <td>{{contacto2}}</td>
                <td><a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="modificarCliente?url={{id}}">
                        <i class='far fa-edit'></i></a>

                    <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red'
                       href="listarClientes/eliminarCliente?url={{id}}">
                        <i class='fas fa-trash w3-hover-text-red'></i></a>
                </td>
            </tr>
            {{/listar}}
        </table>
    </div>
</div>
{{> footer}}
