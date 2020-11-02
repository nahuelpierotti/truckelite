function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

let animado = document.querySelectorAll(".animado");

function mostrarScroll() {
    let scrollTop = document.documentElement.scrollTop;
    for (var i = 0; i < animado.length; i++) {
        let alturaObjsAnimado = animado[i].offsetTop;
        if(alturaObjsAnimado - 500 < scrollTop){
            animado[i].style.opacity = 1;
            animado[i].classList.add("animadoArriba");
        }
    }
}
window.addEventListener('scroll',mostrarScroll);