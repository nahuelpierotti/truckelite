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

<!-- Header -->
<header class="w3-display-container w3-center w3-grayscale-min header imgHome">
    <h1 class="w3-margin w3-jumbo w3-text-white">TRUCK ELITE</h1>
    <p class="w3-xlarge w3-text-white">Web de camiones</p>
    <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">About us</button>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <A name="viajes"><h1>Viajes</h1></A>
            <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</h5>

            <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class="w3-third w3-center">
            <i class="fas fa-map-marked-alt w3-padding-64 w3-text-blue"></i>
        </div>
    </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container animado">
    <div class="w3-content">
        <div class="w3-third w3-center">
            <i class="fas fa-address-book w3-padding-64 w3-text-blue w3-margin-right"></i>
        </div>

        <div class="w3-twothird ">
            <A name="empleados"><h1>Plantel empleados</h1></A>
            <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</h5>

            <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div>

<!--Third Grid-->
<div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <A name="flota"><h1>Flota</h1></A>
            <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</h5>

            <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class="w3-third w3-center">
            <i class="fas fa-truck-moving w3-padding-64 w3-text-blue"></i>
        </div>
    </div>
</div>
<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<div class="w3-row  w3-margin-top">
    <div class="w3-third w3-center w3-container w3-white w3-large w3-black w3-text-white w3-border-right w3-padding-16" style="height:250px; padding-left: 2em;">
        <h2>Acciones</h2>
        <a href="#" class="w3-hover-text-blue" style="text-decoration: none;"><p><i class="far fa-edit" style="width:30px"></i>Modificar Usuario</p></a>
        <a href="#" class="w3-hover-text-blue" style="text-decoration: none;"><p><i class="far fa-edit" style="width:30px"></i>Actualizar datos del viaje</p></a>
        <a href="#" class="w3-hover-text-blue" style="text-decoration: none;"><p><i class="far fa-eye" style="width: 30px"></i>Consultar vehiculo</p></a>
    </div>
    <div class="w3-third w3-center w3-large w3-black w3-text-white w3-border-right w3-padding-16" style="height:250px">
        <h2 class="w3-margin-bottom">Follow us</h2>
        <a class="w3-button w3-large w3-border w3-border-white w3-hover-blue" href="javascript:void(0)" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a class="w3-button w3-large w3-border w3-border-white w3-hover-blue" href="javascript:void(0)" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a class="w3-button w3-large w3-border w3-border-white w3-hover-red" href="javascript:void(0)" title="Google +"><i class="fab fa-google-plus-g"></i></a>
        <a class="w3-button w3-large w3-border w3-border-white w3-hover-purple" href="javascript:void(0)" title="Instagram"><i class="fab fa-instagram"></i></a>
    </div>
    <div class="w3-third w3-center w3-large w3-black w3-text-white w3-padding-16" style="height:250px">
        <h2>Terminos y condiciones</h2>
            <ul class="w3-ul">
                <a href="#" style="text-decoration: none;" class="w3-hover-text-blue"><li>Condiciones general</li></a>
                <a href="#" style="text-decoration: none;" class="w3-hover-text-blue"><li>Politicas de seguridad</li></a>
                <a href="#" style="text-decoration: none;" class="w3-hover-text-blue"><li>Politicas de privacidad</li></a>
            </ul>
    </div>
</div>

<script src="js/javascript.js"></script>

</body>
</html>