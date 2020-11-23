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