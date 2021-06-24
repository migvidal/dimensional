/* JAVASCRIPT ESPECÍFICO */

/*
* generar poster
*/

form = document.forms[0];
var btnCrearPoster = document.querySelector('button#downloadPoster');
var modelViewer = document.getElementsByTagName('model-viewer')[0];

//let btnSubmit = form.querySelector('input[type=submit]');

function downloadPosterToDataURL() {
    let miniaturaPreview = document.getElementById('miniatura-preview');
    let miniatura = document.getElementById('poster-generado');

    if (miniatura != null) {
        miniaturaPreview.removeChild(miniatura);
    }
    const url = modelViewer.toDataURL();
    /*const a = document.createElement("a");
    a.href = url;
    a.id = 'botonCrearMiniatura';
    a.download = "modelViewer_toDataURL.png";*/

    let image = new Image();
    image.src = url;
    image.id = 'poster-generado';

    miniaturaPreview.insertBefore(image, document.getElementById('downloadPoster'));
    URL.revokeObjectURL(url);
}

function incluirImagen() {
    // selectores
    let miniaturaPreview = document.getElementById('miniatura-preview');
    let miniatura = document.getElementById('poster-generado');

    // si ya existe el nodo imagen, quitarlo
    if (miniatura != null) {
        miniaturaPreview.removeChild(miniatura);
    }
    // hacer instantánea del model-viewer
    const url = modelViewer.toDataURL();

    // modificar url para que la entienda el servidor
    let output = url.replace(/^data:image\/(png|jpg);/, "base64");
    output = output.replace(/^data:image\/(png|jpg);/, "");


    // esto sobra
    /*const a = document.createElement("a");
    a.href = url;
    a.id = 'botonCrearMiniatura';
    a.download = "modelViewer_toDataURL.png";*/

    // crear imagen
    let image = new Image();
    image.src = url;
    image.id = 'poster-generado';

    // adjuntar al formulario
    let inputOculto = document.createElement('input');
    inputOculto.hidden = true;
    inputOculto.setAttribute('type', 'text');
    inputOculto.setAttribute('id', 'miniatura');
    inputOculto.setAttribute('name', 'miniatura');
    inputOculto.setAttribute('value', url);
    form.appendChild(inputOculto);

    URL.revokeObjectURL(url);
    form.submit();

}

btnCrearPoster.addEventListener('click', downloadPosterToDataURL);
modelViewer.addEventListener('model-visibility', downloadPosterToDataURL);
form.addEventListener('submit', function (evt) {
    evt.preventDefault();
});
form.addEventListener('submit', incluirImagen);