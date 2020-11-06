<?php
include_once ("header.php");
?>
<div class="w3-container w3-display-container">
<div id="formularioUsuario" class="w3-card-4 w3-display-topmiddle">
        <div class="w3-container w3-blue">
        <h2>Consultar Vehiculo</h2>
    </div>
    <form class="w3-container" action="/action_page.php">
        <p>
            <label class="w3-text-brown"><b>ID Vehiculo</b></label>
            <input class="w3-input w3-border w3-sand" name="idVehiculo" type="text">
        </p>

        <select class="w3-select w3-border w3-sand" name="consultarVehiculo">
            <option value="" disabled selected>Opcion a consultar</option>
            <option value="posicionActual">Posicion Actual</option>
            <option value="Supervisor">Kilometros Recorridos</option>
            <option value="Mecanico">Combustible Consumido</option>
            <option value="Administrador">Tiempo Estimado</option>
        </select>

        <p>
            <button class="w3-btn w3-blue">Actualizar</button>
        </p>
    </form>
</div>
</div>
<?php
include_once ("footer.php");
?>