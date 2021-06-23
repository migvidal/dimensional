/* JAVASCRIPT GENERAL */


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
        console.dir(inputs);
    //this.submit;
}


