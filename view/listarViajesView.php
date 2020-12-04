{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de viajes</h2>
    {{#mensajeEliminar}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensajeEliminar}}</p>
    {{/mensajeEliminar}}
    <br>
    <div class="w3-row">
        <form class="example" method="post" action="listarViajes">
            <input type="text" placeholder="Busque por id o destino" name="criterio" id="criterio">
            <button class="w3-btn w3-light-blue" type="submit"><i class="fa fa-search"></i> Buscar </button>
        </form>
    </div>
    <div class="w3-row">
        <form class="example" method="post" action="listarViajes">
            <input type="hidden"  name="all" id="all">
            <button class="w3-btn w3-grey" type="submit"> Traer Todos </button>
        </form>
    </div>
    <div class="w3-responsive w3-margin-top">
        <table class="w3-table w3-table-all">
            <tr>
                <th>ID Viaje</th>
                <th>Comb. Prev.</th>
                <th>Tipo Carga</th>
                <th>Fecha</th>
                <th>Destino</th>
                <th>Origen</th>
                <th>Tiempo Prev.</th>
                <th>Km Prev</th>
                <th>Cliente</th>
                <th>Chofer</th>
                <th>Vehiculo</th>
                <th>Accion</th>
            </tr>
            {{#listar}}
            <tr>
                <td><a href="listarViajes/verProforma?viajeSeleccionado={{id_viaje}}">{{id_viaje}}</a></td>
                <td>{{combustible_consumido_previsto}}</td>
                <td>{{descripcion}}</td>
                <td>{{fecha}}</td>
                <td>{{destino}}</td>
                <td>{{origen}}</td>
                <td>{{tiempo_previsto}}</td>
                <td>{{km_recorrido_previsto}}</td>
                <td>{{denominacion}}</td>
                <td>{{nombre}}</td>
                <td>{{fk_tractor}}</td>
                <td><a class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue' href="modificarViaje?url={{id_viaje}}">
                        <i class='far fa-edit'></i></a>

                    <a class='w3-panel w3-button w3-orange w3-round-xxlarge w3-hover-text-red'
                       href="graficosComparativos?url={{id_viaje}}">
                        <i class="far fa-eye"></i></a>

                    <a class='w3-panel w3-button w3-red w3-round-xxlarge w3-hover-text-red'
                       href="listarViajes/eliminarViaje?url={{id_viaje}}">
                        <i class='fas fa-trash w3-hover-text-red'></i></a>
                </td>
            </tr>
            {{/listar}}
        </table>
    </div>
</div>
{{> footer}}
