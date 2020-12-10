{{> header}}

<section class="w3-content w3-container">
    <article>
        <div class="w3-center w3-container w3-content">
            <img src="view/img/logo.png" style="width: 20em;">
        </div>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h1 class="w3-text-blue w3-center">Proforma numero {{datosProforma.0.id}}</h1>
        <hr>
        <h4>Fecha de creación del viaje: {{datosProforma.0.fecha}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2 class="w3-text-blue">Datos del cliente</h2>
        <hr>
        <h4>Denominacion: {{datosProforma.0.denominacion}}</h4>
        <h4>Cuit: {{datosProforma.0.cuit}}</h4>
        <h4>Direccion: {{datosProforma.0.direccion}}</h4>
        <h4>Telefono: {{datosProforma.0.telefono}}</h4>
        <h4>Email: {{datosProforma.0.email}}</h4>
        <h4>Contacto1: {{datosProforma.0.contacto1}}</h4>
        <h4>Contacto2: {{datosProforma.0.contacto2}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2 class="w3-text-blue">Chofer asignado</h2>
        <hr>
        <h4>Nombre y Apellido: {{datosProforma.0.nombre}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2 class="w3-text-blue">Viaje</h2>
        <hr>
        <h4>Origen: {{datosProforma.0.origen}}</h4>
        <h4>Destino: {{datosProforma.0.destino}}</h4>
        <h4>Fecha de carga: {{datosProforma.0.fecha}}</h4>
        <h4>ETA: {{datosProforma.0.eta}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2 class="w3-text-blue">Carga</h2>
        <hr>
        <h4>Tipo de carga: {{datosProforma.0.descripcion}}</h4>
        <h4>Peso neto: {{datosProforma.0.peso}}</h4>
        <h4>Hazard: {{datosProforma.0.hazard}}</h4>
        <h4>Reefer: {{datosProforma.0.reefer}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2 class="w3-text-blue">Costo estimado</h2>
        <hr>
        <h4>Kilometros estimados: {{datosProforma.0.km_recorrido_previsto}}</h4>
        <h4>Combustible estimado: {{datosProforma.0.combustible_consumido_previsto}}</h4>
        <h4>ETD estimado: {{datosProforma.0.etd}}</h4>
        <h4>ETA estimado: {{datosProforma.0.eta}}</h4>
        <h4>Viaticos: ${{datosProforma.0.viaticos}}</h4>
        <h4>Costo combustible: ${{datosProforma.0.costo_combustible}}</h4>
        <h4>Peajes: ${{datosProforma.0.peajes}}</h4>
        <h4>Pesajes: ${{datosProforma.0.pesajes}}</h4>
        <h4>Extras: ${{datosProforma.0.extras}}</h4>
        <h4>Hazard: {{datosProforma.0.hazard}}</h4>
        <h4>Reefer: {{datosProforma.0.reefer}}</h4>
        <h4>Fee: ${{datosProforma.0.fee}}</h4>
        <hr>
        <div class="w3-left">
        <h3 class="w3-text-blue">TOTAL: ${{datosProforma.0.total}}</h3>
        </div>
        <div class="w3-right">
        <img class="" src="proforma/mostrarQr?viaje={{id_viaje}}" alt="">
        </div>
    </article>
    <br>
    <a href="proforma/exportarPdf?viaje={{id_viaje}}" class="w3-button w3-orange w3-large" target="_blank">Exportar a PDF</a>
    <br>
    <a href="/truckelite/interno" class="w3-text-blue w3-button w3-large">Ir al inicio</a>
</section>



{{> footer}}