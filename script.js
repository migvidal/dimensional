/* JAVASCRIPT GENERAL */

/* Destacar enlace actual */
let urlActual = document.URL.replace('http://', '');
let selector = "a[href='" + urlActual + "']";
let enlacesActuales = document.querySelectorAll(selector);
console.log(enlacesActuales);
enlacesActuales.forEach((enlace) => enlace.classList.toggle('actual'));


/* Header */
let btnMenu = document.getElementById("btn-menu");
let menu = document.getElementById("barra-menu");
btnMenu.onclick = function () {
    menu.classList.toggle('minimizado');
}


/* Formularios */


// Confirmar eliminar
let formEliminar = document.forms[0];
let inputs = formEliminar.querySelector('input');

//formEliminar.addEventListener('submit', confirmarEliminar);
function confirmarEliminar(evt) {
    evt.preventDefault();
    let result = confirm("¿Estás seguro de que quieres eliminar este objeto?");
    if (result)
        this.submit();
}


