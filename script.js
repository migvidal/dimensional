/* JAVASCRIPT GENERAL */


/* Variables generales */


/* Formularios */
// Confirmar eliminar
let formEliminar = document.forms[0];
let inputs = formEliminar.querySelector('input');

//formEliminar.addEventListener('submit', confirmarEliminar);
function confirmarEliminar (evt) {
    evt.preventDefault();
    let result = confirm("¿Estás seguro de que quieres eliminar este objeto?");
    if (result)
        console.dir(inputs);
        //this.submit;
}

