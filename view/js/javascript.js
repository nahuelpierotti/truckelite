function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function showLicencia(elemento) {
    if (elemento.value == "Chofer") {
        divLicencia = document.getElementById("licencia");
        divLicencia.style.setProperty('display', 'block', 'important');
    } else {
        divLicencia = document.getElementById("licencia");
        divLicencia.style.setProperty('display', 'none', 'important');
    }
}

function showSubClass(elemento){
    switch (elemento.value){
        case "1":
            selSubClass =  document.getElementById("subClass1");
            selSubClass2 =  document.getElementById("subClass2");
            selSubClass4 =  document.getElementById("subClass4");
            selSubClass5 =  document.getElementById("subClass5");
            selSubClass6 =  document.getElementById("subClass6");
            selSubClass7 =  document.getElementById("subClass7");
            selSubClass.style.setProperty('display', 'block', 'important');
            selSubClass2.style.setProperty('display', 'none', 'important');
            selSubClass4.style.setProperty('display', 'none', 'important');
            selSubClass5.style.setProperty('display', 'none', 'important');
            selSubClass6.style.setProperty('display', 'none', 'important');
            selSubClass7.style.setProperty('display', 'none', 'important');
            break;
        case "2":
            selSubClass =  document.getElementById("subClass2");
            selSubClass1 =  document.getElementById("subClass1");
            selSubClass4 =  document.getElementById("subClass4");
            selSubClass5 =  document.getElementById("subClass5");
            selSubClass6 =  document.getElementById("subClass6");
            selSubClass7 =  document.getElementById("subClass7");
            selSubClass.style.setProperty('display', 'block', 'important');
            selSubClass1.style.setProperty('display', 'none', 'important');
            selSubClass4.style.setProperty('display', 'none', 'important');
            selSubClass5.style.setProperty('display', 'none', 'important');
            selSubClass6.style.setProperty('display', 'none', 'important');
            selSubClass7.style.setProperty('display', 'none', 'important');
            break;
        case "4":
            selSubClass1 =  document.getElementById("subClass1");
            selSubClass2 =  document.getElementById("subClass2");
            selSubClass =  document.getElementById("subClass4");
            selSubClass5 =  document.getElementById("subClass5");
            selSubClass6 =  document.getElementById("subClass6");
            selSubClass7 =  document.getElementById("subClass7");
            selSubClass.style.setProperty('display', 'block', 'important');
            selSubClass1.style.setProperty('display', 'none', 'important');
            selSubClass2.style.setProperty('display', 'none', 'important');
            selSubClass5.style.setProperty('display', 'none', 'important');
            selSubClass6.style.setProperty('display', 'none', 'important');
            selSubClass7.style.setProperty('display', 'none', 'important');
            break;
        case "5":
            selSubClass1 =  document.getElementById("subClass1");
            selSubClass2 =  document.getElementById("subClass2");
            selSubClass4 =  document.getElementById("subClass4");
            selSubClass =  document.getElementById("subClass5");
            selSubClass6 =  document.getElementById("subClass6");
            selSubClass7 =  document.getElementById("subClass7");
            selSubClass.style.setProperty('display', 'block', 'important');
            selSubClass1.style.setProperty('display', 'none', 'important');
            selSubClass2.style.setProperty('display', 'none', 'important');
            selSubClass4.style.setProperty('display', 'none', 'important');
            selSubClass6.style.setProperty('display', 'none', 'important');
            selSubClass7.style.setProperty('display', 'none', 'important');
            break;
        case "6":
            selSubClass1 =  document.getElementById("subClass1");
            selSubClass2 =  document.getElementById("subClass2");
            selSubClass4 =  document.getElementById("subClass4");
            selSubClass5 =  document.getElementById("subClass5");
            selSubClass =  document.getElementById("subClass6");
            selSubClass7 =  document.getElementById("subClass7");
            selSubClass.style.setProperty('display', 'block', 'important');
            selSubClass1.style.setProperty('display', 'none', 'important');
            selSubClass2.style.setProperty('display', 'none', 'important');
            selSubClass4.style.setProperty('display', 'none', 'important');
            selSubClass5.style.setProperty('display', 'none', 'important');
            selSubClass7.style.setProperty('display', 'none', 'important');
            break;
        case "7":
            selSubClass1 =  document.getElementById("subClass1");
            selSubClass2 =  document.getElementById("subClass2");
            selSubClass4 =  document.getElementById("subClass4");
            selSubClass5 =  document.getElementById("subClass5");
            selSubClass6 =  document.getElementById("subClass6");
            selSubClass =  document.getElementById("subClass7");
            selSubClass.style.setProperty('display', 'block', 'important');
            selSubClass1.style.setProperty('display', 'none', 'important');
            selSubClass2.style.setProperty('display', 'none', 'important');
            selSubClass4.style.setProperty('display', 'none', 'important');
            selSubClass5.style.setProperty('display', 'none', 'important');
            selSubClass6.style.setProperty('display', 'none', 'important');
            break;
        default:
            selSubClass1 =  document.getElementById("subClass1");
            selSubClass2 =  document.getElementById("subClass2");
            selSubClass4 =  document.getElementById("subClass4");
            selSubClass5 =  document.getElementById("subClass5");
            selSubClass6 =  document.getElementById("subClass6");
            selSubClass7 =  document.getElementById("subClass7");
            selSubClass1.style.setProperty('display', 'none', 'important');
            selSubClass2.style.setProperty('display', 'none', 'important');
            selSubClass4.style.setProperty('display', 'none', 'important');
            selSubClass5.style.setProperty('display', 'none', 'important');
            selSubClass6.style.setProperty('display', 'none', 'important');
            selSubClass7.style.setProperty('display', 'none', 'important');
            break;
    }
}

function calcular(){
    var viaticos = parseFloat(document.getElementById("viaticos").value);
    var peajes = parseFloat(document.getElementById("peajes").value);
    var extras = parseFloat(document.getElementById("extras").value);
    var fee = parseFloat(document.getElementById("fee").value);

    document.getElementById("total").value= viaticos + peajes + extras + fee;
}

var x = document.getElementById("position");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById("position").value = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    document.getElementById("position").value = "Latitude: " + position.coords.latitude +
        " Longitude: " + position.coords.longitude;
}

var animado = document.getElementsByClassName("animado")

function mostrarScroll() {
    let scrollTop = document.documentElement.scrollTop;
    for (var i = 0; i < animado.length; i++) {
        let alturaObjsAnimado = animado[i].offsetTop;
        if (alturaObjsAnimado - 500 < scrollTop) {
            animado[i].style.setProperty('opacity', '1', 'important');
            animado[i].classList.add("animadoArriba");
        }
    }
}

window.addEventListener('scroll', mostrarScroll);