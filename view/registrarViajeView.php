{{> header}}
{{> navBar}}

<div class="w3-display-container">
    <div id="formularioUsuario" class="w3-container w3-content w3-card-4 w3-padding" style="margin-bottom: 4em;">
        <div class="w3-blue">
            <h2 class="w3-padding">Registrar Viaje</h2>
        </div>
        {{#mensaje}}
        <p class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">{{mensaje}}</p>
        {{/mensaje}}
        <form id="formViaje" class="" action="registrarViaje/agregarViaje" method="post">
            <div id="seccion_carga">
                <!-- Carga -->
                <div class="w3-blue">
                    <h4 class="w3-padding">Detallar Carga</h4>
                </div>
                <br>
                <label class="w3-text-brown"><b>Tipo de Carga</b></label>
                <select class="w3-select w3-border w3-sand" name="tipo" id="tipo_carga">
                    <option value="1">Granel</option>
                    <option value="2">Liquida</option>
                    <option value="3">20 Pies</option>
                    <option value="4">40 Pies</option>
                    <option value="5">Jaula</option>
                    <option value="6">CarCarrier</option>
                </select>

                <p>
                    <label class="w3-text-brown"><b>Peso</b></label>
                    <input class="w3-input w3-border w3-sand" name="peso" id=peso type="number" min="0" required>
                </p>

                <div>
                    <p>Hazard</p>
                    <input class="w3-radio" type="radio" name="hazard" value="true" onclick="mostrarYocultar();" checked>
                    <label>Si</label>
                    <input class="w3-radio" type="radio" name="hazard" value="false" onclick="mostrarYocultar();">
                    <label>No</label>
                </div>

                <select class="w3-select w3-border w3-sand w3-margin-top" name="imoClass" id="imoClass" onChange="showSubClass(this)">
                    <option value="-1" selected>Elije ImoClass</option>
                    <option value="1">Explosives</option>
                    <option value="2">Flammable Gas</option>
                    <option value="3">Flammable Liquids</option>
                    <option value="4">Flammable Solids or Substances</option>
                    <option value="5">Oxidizing substances and organic peroxides</option>
                    <option value="6">Toxic substances</option>
                    <option value="7">Radioactive Material</option>
                    <option value="8">Corrosive substances</option>
                    <option value="9">Miscellaneous dangerous substances and articles</option>
                </select>
                <div id="subClass1"  class="w3-margin-top">
                    <select class="w3-select w3-border w3-sand w3-margin-top" name="subClass1" >
                        <option value="" disabled selected>Elije la subClass de la clase 1</option>
                        <option value="1">SubClass 1.1</option>
                        <option value="2">SubClass 1.2</option>
                        <option value="3">SubClass 1.3</option>
                        <option value="4">SubClass 1.4</option>
                        <option value="5">SubClass 1.5</option>
                        <option value="6">SubClass 1.6</option>
                    </select>
                </div>
                <select class="w3-select w3-border w3-sand w3-margin-top" name="subClass2" id="subClass2">
                    <option value="" disabled selected>Elije la subClass de la clase 2</option>
                    <option value="7">SubClass 2.1 Flammable gases</option>
                    <option value="8">SubClass 2.2 Non-flammable, non-toxic gases</option>
                    <option value="9">SubClass 2.3 Toxic gases</option>
                </select>
                <select class="w3-select w3-border w3-sand w3-margin-top" name="subClass4" id="subClass4">
                    <option value="" disabled selected>Elije la subClass de la clase 4</option>
                    <option value="10">Subclass 4.1 Flammable solids, self-reactive substances, and desensitized explosives</option>
                    <option value="11">Subclass 4.2 Spontaneously flammable substances</option>
                    <option value="12">Subclass 4.3 Substances that emit flammable gases when they come in contact with water</option>
                </select>
                <select class="w3-select w3-border w3-sand w3-margin-top" name="subClass5" id="subClass5">
                    <option value="" disabled selected>Elije la subClass de la clase 5</option>
                    <option value="13">Subclass 5.1 Oxidizing substances</option>
                    <option value="14">Subclass 6.2. Infectious substances</option>
                </select>
                <select class="w3-select w3-border w3-sand w3-margin-top" name="subClass6" id="subClass6">
                    <option value="" disabled selected>Elije la subClass de la clase 6</option>
                    <option value="13">Subclass 6.1. Toxic substances</option>
                    <option value="14">Subclass 5.2. Organic peroxides</option>
                </select>
                <select class="w3-select w3-border w3-sand w3-margin-top" name="subClass7" id="subClass7">
                    <option value="" disabled selected>Elije la subClass de la clase 7</option>
                    <option value="17">Category I</option>
                    <option value="18">Category II</option>
                    <option value="19">Category III</option>
                    <option value="20">Category IV</option>
                </select>

                <div>
                    <p>Reefer</p>
                    <input class="w3-radio" type="radio" name="reefer" value="true" onclick="mostrarYocultar();" checked>
                    <label>Si</label>
                    <input class="w3-radio" type="radio" name="reefer" value="false" onclick="mostrarYocultar();">
                    <label>No</label>
                </div>

                <p id="temperatura">
                    <label class="w3-text-brown"><b>Temperatura</b></label>
                    <input type="number" class="w3-input w3-border w3-sand" name="temperatura" id="temperatura">
                </p>
                <br>
                <button class="w3-btn w3-grey w3-right" id="siguiente1" >SIGUIENTE</button>

            </div>

            <div id="seccion_viaje" style="display: none">
                <div class="w3-blue">
                    <h4 class="w3-padding">Detalles Viaje</h4>
                </div>
            <label class="w3-text-brown"><b>Cliente</b>
                <select class="w3-select w3-border w3-sand" name="id_cliente">
                    {{#clientes}}
                    <option value="{{id}}">{{denominacion}}</option>
                    {{/clientes}}
                </select>
            </label>
            <p>
                <label class="w3-text-brown"><b>Combustible Consumido Previsto</b></label>
                <input class="w3-input w3-border w3-sand" name="combustible_consumido_previsto" id="combustible_consumido_previsto" type="number" min="0" value="{{viajeBuscado.0.combustible_consumido_previsto}}">
            </p>
            <p>
                <label class="w3-text-brown"><b>Origen</b></label>
                <input class="w3-input w3-border w3-sand" name="origen" id="origen" type="text" value="{{viajeBuscado.0.origen}}">
            </p>
            <p>
                <label class="w3-text-brown"><b>Destino</b></label>
                <input class="w3-input w3-border w3-sand" name="destino" id="destino" type="text" value="{{viajeBuscado.0.destino}}">
            </p>
            <p>
                <label class="w3-text-brown"><b>Tiempo Previsto</b></label>
                <input class="w3-input w3-border w3-sand" name="tiempo_previsto" id="tiempo_previsto" type="time" value="{{viajeBuscado.0.tiempo_previsto}}">
            </p>

            <p>
                <label class="w3-text-brown"><b>KM Recorridos Previsto</b></label>
                <input class="w3-input w3-border w3-sand" name="km_recorrido_previsto" id="km_recorrido_previsto" type="number" min="0" value="{{viajeBuscado.0.km_recorrido_previsto}}">
            </p>

            <label class="w3-text-brown"><b>Choferes disponibles</b>
                <select class="w3-select w3-border w3-sand" name="id_chofer" id="id_chofer">
                    <option value="" disabled selected>Sin Asignar</option>
                    {{#choferes}}
                    <option  value="{{id_usuario}}">{{nombre}}</option>
                    {{/choferes}}
                </select>
            </label>

            <label class="w3-text-brown"><b>Vehiculos Disponibles</b>
                <div id="vehiculos_liquido" style="display: none">
                <select class="w3-select w3-border w3-sand" name="id_vehiculo" id="vehiculosTanque">
                    <option value="" disabled selected>Sin Asignar</option>
                    {{#vehiculosTanque}}
                    <option value="{{id_vehiculo}}"  data-name="{{tipo_acoplado}}">{{fk_tractor}} (Acoplado: {{tipo_acoplado}})</option>
                    {{/vehiculosTanque}}
                </select>
                </div>
                <div id="vehiculos_granel">
                <select class="w3-select w3-border w3-sand" name="id_vehiculo" id="vehiculosGranel">
                    <option value="" disabled selected>Sin Asignar</option>
                    {{#vehiculosGranel}}
                    <option value="{{id_vehiculo}}"  data-name="{{tipo_acoplado}}">{{fk_tractor}} (Acoplado: {{tipo_acoplado}})</option>
                    {{/vehiculosGranel}}
                </select>
                </div>
                <div id="vehiculos_jaula" style="display: none">
                    <select class="w3-select w3-border w3-sand" name="id_vehiculo" id="vehiculosJaulaArania">
                        <option value="" disabled selected>Sin Asignar</option>
                        {{#vehiculosJaula}}
                        <option value="{{id_vehiculo}}"  data-name="{{tipo_acoplado}}">{{fk_tractor}} (Acoplado: {{tipo_acoplado}})</option>
                        {{/vehiculosJaula}}
                    </select>
                </div>
                <div id="vehiculos_jaulaArania" style="display: none">
                <select class="w3-select w3-border w3-sand" name="id_vehiculo" id="vehiculosJaulaArania">
                    <option value="" disabled selected>Sin Asignar</option>
                    {{#vehiculosJaulaArania}}
                    <option value="{{id_vehiculo}}"  data-name="{{tipo_acoplado}}">{{fk_tractor}} (Acoplado: {{tipo_acoplado}})</option>
                    {{/vehiculosJaulaArania}}
                </select>
                </div>
                <div id="vehiculos_carcarrier" style="display: none">
                <select class="w3-select w3-border w3-sand" name="id_vehiculo" id="vehiculosCarCarrier">
                    <option value="" disabled selected>Sin Asignar</option>
                    {{#vehiculosCarCarrier}}
                    <option value="{{id_vehiculo}}"  data-name="{{tipo_acoplado}}">{{fk_tractor}} (Acoplado: {{tipo_acoplado}})</option>
                    {{/vehiculosCarCarrier}}
                </select>
                </div>
            </label>

            <p>
                <label class="w3-text-brown"><b>Tiempo estimado de partida</b></label>
                <input class="w3-input w3-border w3-sand" name="etd"  id="etd" type="date" value="{{viajeBuscado.0.etd}}">
            </p>
            <p>
                <label class="w3-text-brown"><b>Tiempo estimado de arribo</b></label>
                <input class="w3-input w3-border w3-sand" name="eta" id="eta" type="date" value="{{viajeBuscado.0.eta}}">
            </p>
                <button class="w3-btn w3-grey  w3-right" id="siguiente2" >SIGUIENTE</button>
                <button class="w3-btn w3-grey w3-left" id="atras1" >ATRAS</button>
            </div>

            <div id="seccion_costos" style="display: none">
            <!-- costos -->
            <div class="w3-blue">
                <h4 class="w3-padding">Costos Estimados</h4>
            </div>

            <p>
                <label class="w3-text-brown"><b>Viaticos</b></label>
                <input class="w3-input w3-border w3-sand" name="viaticos" type="number" min="0" id="viaticos" required oninput="calcular()">

            </p>

            <p>
                <label class="w3-text-brown"><b>Costo combustible</b></label>
                <input class="w3-input w3-border w3-sand" name="costo_combustible" type="number" min="0" id="costo_combustible" required oninput="calcular()">

            </p>

            <p>
                <label class="w3-text-brown"><b>Peajes</b></label>
                <input class="w3-input w3-border w3-sand" name="peajes" type="number" min="0" id="peajes" required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Pesajes</b></label>
                <input class="w3-input w3-border w3-sand" name="pesajes" type="number" min="0" id="pesajes"  required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Extras</b></label>
                <input class="w3-input w3-border w3-sand" name="extras" type="number" min="0" id="extras" required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Fee</b></label>
                <input class="w3-input w3-border w3-sand" name="fee" type="number" min="0" id="fee" required oninput="calcular()">
            </p>

            <p>
                <label class="w3-text-brown"><b>Total</b></label>
                <input class="w3-input w3-border w3-sand" name="total" type="number" min="0" id="total" required>
            </p>
            <p>
                <button class="w3-btn w3-blue w3-right" id="agregar_viaje">Agregar Viaje</button>
                <button class="w3-btn w3-grey w3-left" id="atras2" >ATRAS</button>
            </p>
            </div>
        </form>
    </div>
</div>
{{> footer}}