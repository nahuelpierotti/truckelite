<!DOCTYPE html>
<html lang="es">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-blue w3-card w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-blue"
           href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
        <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
        <a href="#viajes" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Viajes</a>
        <a href="#empleados" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Plantel
            empleados</a>
        <a href="#flota" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Flota</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Reportes</a>

        <div class="w3-dropdown-hover w3-hide-small">
            <a class="w3-button w3-hide-small w3-padding-large w3-hover-white">Acciones <i
                        class="fa fa-caret-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="modificarUsuario.php" class="w3-bar-item w3-button w3-hover-blue">Modificar Usuario</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-blue">Actualizar datos del viaje</a>
                <a href="consultarVehiculo.php" class="w3-bar-item w3-button w3-hover-blue">Consultar vehiculo</a>
            </div>
        </div>

        <div class="w3-dropdown-hover w3-hide-small w3-right">
            <a class="w3-button w3-hide-small w3-padding-large w3-hover-white"><i
                        class="fas fa-user" style="width: 30px"></i>user</a>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="#logOut"
                   class="w3-bar-item w3-button w3-hover-blue w3-padding-large">Log Out</a>
            </div>
        </div>

    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-blue">Viajes</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-blue">Panel empleados</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-blue">Flota</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-blue">Reportes</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-blue">Log Out <i
                    class="fas fa-sign-out-alt w3-right"></i></a>
    </div>
</div>

