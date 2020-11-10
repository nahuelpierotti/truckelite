{{> header}}
{{> navBar}}
<div class="w3-container">
    {{#usuario}}
    <h2 class="w3-wide">Usuario: {{nombre}}</h2>
    Rol: {{rol}}
    {{/usuario}}
    {{^usuario}}
    <h2 class="w3-red">Error. <small>Usuario no encontrado.</small></h2>
    {{/usuario}}
</div>
{{> footer}}