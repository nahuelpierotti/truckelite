{{> header}}
{{> navBar}}

<section class="w3-container w3-content" style="margin-top: 4em;">
    <h1 class="w3-text-blue w3-center">Graficos de comparación</h1>
    <article class="w3-panel w3-border w3-border-black">
        <h2>Comparación combustible</h2>
        <h4 >Combustible consumido previsto: {{combustibleConsumido.0.combustible_consumido_previsto}}</h4>
        <h4>Combustible consumido: {{combustibleConsumido.0.combustible_consumido}}</h4>
        <h4 class="w3-text-blue">Diferencia entre consumido real y consumido previsto: {{combustibleConsumidoDiferencia}}</h4>
        <h4>Costo combustible previsto: {{costosProforma.0.costo_combustible}}</h4>
        <h4>Costo combustible: {{costosYcargasReporte.0.costo_carga_combustible}}</h4>
        <h4 class="w3-text-blue">Diferencia entre costo real y costo previsto: {{costoCombustibleDiferencia}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2>Comparación kilometros</h2>
        <h4>Kilometros recorridos previstos: {{kmRecorridos.0.km_recorrido_previsto}}</h4>
        <h4>Kilometros recorridos: {{kmRecorridos.0.km_recorrido}}</h4>
        <h4 class="w3-text-blue">Diferencia entre kilometros recorridos previstos y reales: {{kmRecorridosDiferencia}}</h4>
    </article>
    <article class="w3-panel w3-border w3-border-black">
        <h2>Costos del viaje</h2>
        <h4>Costo viaticos previstos: {{costosProforma.0.viaticos}}</h4>
        <h4>Costo viaticos: {{costosYcargasReporte.0.costo_hospedaje}}</h4>
        <h4 class="w3-text-blue">Diferencia de costos de viaticos: {{viaticosDiferencia}}</h4>
        <h4>Costo pesajes previstos: {{costosProforma.0.pesajes}}</h4>
        <h4>Costos pesajes: {{costosYcargasReporte.0.pesajes}}</h4>
        <h4 class="w3-text-blue">Direfencia entre pesajes previstos y reales: {{pesajesDiferencia}}</h4>
        <h4>Costos peajes previstos: {{costosProforma.0.peajes}}</h4>
        <h4>Costos peajes: {{costosYcargasReporte.0.peajes}}</h4>
        <h4 class="w3-text-blue">Diferencia entre peajes previstos y reales: {{peajesDiferencia}}</h4>
        <h4>Monto extra previsto: {{costosProforma.0.extras}}</h4>
        <h4>Monto extra: {{extra}}</h4>
        <h4 class="w3-text-blue">Diferencia entre monto extra previsto y real: {{extraDiferencia}}</h4>
        <h4>FEE: {{costosProforma.0.fee}}</h4>
        <h4>Total previsto: {{costosProforma.0.total}}</h4>
        <h4>Total: {{total}}</h4>
        <h4 class="w3-text-blue">Dieferencia entre total previsto y real: {{totalDiferencia}}</h4>
    </article>
</section>


{{> footer}}