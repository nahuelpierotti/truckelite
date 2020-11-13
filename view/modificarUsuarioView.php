{{> header}}
{{> navBar}}
<div class="w3-display-container">
<div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
    <div class="w3-blue">
        <h2 class="w3-padding">Actualizar Usuario</h2>
    </div>
    <form class="" action="modificarUsuario/modificarUsuario" method="post">
        <p class="w3-text-red">{{mensaje}}</p>

        <p>
            <label class="w3-text-brown"><b>ID Usuario</b></label>
            <input class="w3-input w3-border w3-sand" name="idUsuario" type="text" value="{{#usuarioBuscado}}{{id_usuario}}{{/usuarioBuscado}}">

        </p>
        
        <p>
            <label class="w3-text-brown"><b>Nombre y Apellido</b></label>
            <input class="w3-input w3-border w3-sand" name="nombreYapellido" type="text" value="{{#usuarioBuscado}}{{nombre}}{{/usuarioBuscado}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>Email</b></label>
            <input class="w3-input w3-border w3-sand" name="mail" type="text" value="{{#usuarioBuscado}}{{mail}}{{/usuarioBuscado}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>Contraseña</b></label>
            <input class="w3-input w3-border w3-sand" name="clave" type="password" value="{{#usuarioBuscado}}{{clave}}{{/usuarioBuscado}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>DNI</b></label>
            <input class="w3-input w3-border w3-sand" name="dni" type="number" value="{{#usuarioBuscado}}{{dni}}{{/usuarioBuscado}}">
        </p>

        <p>
            <label class="w3-text-brown"><b>Telefono</b></label>
            <input class="w3-input w3-border w3-sand" name="telefono" type="number" value="{{#usuarioBuscado}}{{telefono}}{{/usuarioBuscado}}">
        </p>

        <select class="w3-select w3-border w3-sand" name="rol">
            <option value="" disabled selected>Rol de Empleado</option>
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