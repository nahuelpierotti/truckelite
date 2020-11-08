{{> header}}
<div class="w3-display-container">
<div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
    <div class="w3-blue">
        <h2 class="w3-padding">Actualizar Usuario</h2>
    </div>
    <form class="" action="/action_page.php">
        <p>
            <label class="w3-text-brown"><b>ID Usuario</b></label>
            <input class="w3-input w3-border w3-sand" name="idUsuario" type="text">
        </p>
        
        <p>
            <label class="w3-text-brown"><b>Nombre</b></label>
            <input class="w3-input w3-border w3-sand" name="nombre" type="text">
        </p>
        
        <p>
            <label class="w3-text-brown"><b>Apellido</b></label>
            <input class="w3-input w3-border w3-sand" name="apellido" type="text">
        </p>

        <p>
            <label class="w3-text-brown"><b>Email</b></label>
            <input class="w3-input w3-border w3-sand" name="email" type="text">
        </p>

        <p>
            <label class="w3-text-brown"><b>Contraseña</b></label>
            <input class="w3-input w3-border w3-sand" name="contraseña" type="text">
        </p>

        <p>
            <label class="w3-text-brown"><b>DNI</b></label>
            <input class="w3-input w3-border w3-sand" name="dni" type="number">
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