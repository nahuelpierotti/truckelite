{{> header}}
{{> navBar}}
<div class="w3-display-container">
<div id="formularioUsuario" name="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
    <div class="w3-blue">
        <h2 class="w3-padding">Actualizar Usuario</h2>
    </div>
    {{#mensaje}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
    {{/mensaje}}
    <form class="" action="modificarUsuario/modificarUsuario" method="post">


        <p>
            <label class="w3-text-brown"><b>ID Usuario</b></label>
            <input class="w3-input w3-border w3-sand" name="idUsuario" type="text" value="{{usuarioBuscado.0.id_usuario}}">

        </p>


        </p>
        
        <p>
            <label class="w3-text-brown"><b>Nombre y Apellido</b></label>
            <input class="w3-input w3-border w3-sand" name="nombreYapellido" type="text" value="{{usuarioBuscado.0.nombre}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>Email</b></label>
            <input class="w3-input w3-border w3-sand" name="mail" type="text" value="{{usuarioBuscado.0.mail}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>Contraseña</b></label>
            <input class="w3-input w3-border w3-sand" name="clave" type="password" value="{{usuarioBuscado.0.clave}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>DNI</b></label>
            <input class="w3-input w3-border w3-sand" name="dni" type="number" value="{{usuarioBuscado.0.dni}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>Telefono</b></label>
            <input class="w3-input w3-border w3-sand" name="telefono" type="number" value="{{usuarioBuscado.0.telefono}}">
        </p>

        <select class="w3-select w3-border w3-sand" name="rol">
            <option value="{{usuarioBuscado.0.rol}}"
                    {{^usuarioBuscado.0.rol}}
                        disabled selected
                    {{/usuarioBuscado.0.rol}} >
                {{#usuarioBuscado.0.rol}}
                    {{usuarioBuscado.0.rol}}
                {{/usuarioBuscado.0.rol}}
                {{^usuarioBuscado.0.rol}}
                    Rol de Empleado
                {{/usuarioBuscado.0.rol}}
            </option>
            <option value="Chofer">Chofer</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Mecanico">Mecanico</option>
            <option value="Administrador">Administrador</option>
        </select>
        <p>
            <button class="w3-btn w3-blue">Actualizar</button>
        </p>
    </form>
</div>
</div>
{{> footer}}