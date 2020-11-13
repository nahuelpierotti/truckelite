{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de usuarios</h2>
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>ID</th>
                <th>Dni</th>
                <th>Nombre de usuario</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Mail</th>
                <th>Clave</th>
                <th>Accion</th>
            </tr>
            {{#listar}}
            <tr>
                <td>{{id_usuario}}</td>
                <td>{{dni}}</td>
                <td>{{user_name}}</td>
                <td>{{rol}}</td>
                <td>{{nombre}}</td>
                <td>{{telefono}}</td>
                <td>{{mail}}</td>
                <td>{{clave}}</td>
                <td><a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="modificarUsuario?url={{id_usuario}}">
                        <i class='far fa-edit'></i></a>

                <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red'
                       href="#eliminarUsuario">
                        <i class='fas fa-trash w3-hover-text-red'></i></a>
                </td>
            </tr>
            {{/listar}}
        </table>
    </div>
</div>
{{> footer}}