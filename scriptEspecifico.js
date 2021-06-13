/* JAVASCRIPT ESPECÍFICO */

/*
* generar poster
*/

form = document.forms[0];
let btnCrearPoster = document.querySelector('button#downloadPoster');
let btnSubmit = form.querySelector('input[type=submit]');

function downloadPosterToDataURL() {
    let modelViewer = document.querySelector('.mv');
    let miniaturaPreview = document.getElementById('miniatura-preview');
    let imagen = document.getElementById('poster-generado');
    if (imagen != null) {
        miniaturaPreview.removeChild(imagen);
    }
    const url = modelViewer.toDataURL();
    const a = document.createElement("a");
    a.href = url;
    a.id = 'botonCrearMiniatura';
    a.download = "modelViewer_toDataURL.png";

    let image = new Image();
    image.src = url;
    image.id = 'poster-generado';

    miniaturaPreview.appendChild(image);
    URL.revokeObjectURL(url);
}

function incluirImagen() {
    console.log('a');
    let miniaturaPreview = document.getElementById('miniatura-preview');
    let imagen = document.getElementById('poster-generado');
    if (imagen != null) {
        miniaturaPreview.removeChild(imagen);
    }
    console.log(form);
    const url = modelViewer.toDataURL();
    let output = url.replace(/^data:image\/(png|jpg);base64,/, "");
    const a = document.createElement("a");
    a.href = url;
    a.id = 'botonCrearMiniatura';
    a.download = "modelViewer_toDataURL.png";

    let image = new Image();
    image.src = url;
    image.id = 'poster-generado';

    let inputOculto = document.createElement('input');
    inputOculto.hidden = true;
    inputOculto.setAttribute('type', 'text');
    inputOculto.setAttribute('id', 'miniatura');
    inputOculto.setAttribute('name', 'miniatura');
    inputOculto.setAttribute('value', output);
    console.log(inputOculto);
    form.appendChild(inputOculto);

    URL.revokeObjectURL(url);
    form.submit();

}

btnCrearPoster.addEventListener('click', downloadPosterToDataURL);
modelViewer.addEventListener('model-visibility', downloadPosterToDataURL);
form.addEventListener('submit', function (evt) {evt.preventDefault();});
form.addEventListener('submit', incluirImagen);
