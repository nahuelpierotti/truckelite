{{> header}}
{{> navBar}}


<div class="w3-container" style="margin-top: 4em; margin-bottom: 2em;">
    <h2>Lista de vehiculos en mantenimiento</h2>
    {{#mensaje}}
    <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
    {{/mensaje}}
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th>Patente</th>
                <th>Motor</th>
                <th>Chasis</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Kilometraje</th>
                <th>Finalizar Mantenimiento</th>
            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{patente}}</td>
                <td>{{motor}}</td>
                <td>{{chasis}}</td>
                <td>{{modelo}}</td>
                <td>{{marca}}</td>
                <td>{{kilometraje}}km</td>
                <td>
                    Nueva alarma
                    <form action="vehiculosEnTaller/terminarMantenimiento" method="post">
                        <input class=" w3-border w3-sand" name="alarma" type="number" required">
                        <input type="hidden" name="patente" value="{{patente}}">
                    <button class='w3-panel w3-button w3-blue w3-round-xxlarge w3-hover-text-blue'>
                        <i class='fas fa-check'></i>
                    </button>
                    </form>
                </td>
                {{/vehiculos}}
            </tr>
        </table>
        {{^vehiculos}}
        <p>No hay vehiculos en mantenimiento.</p>
        {{/vehiculos}}
    </div>
</div>
{{> footer}}
