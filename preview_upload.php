<?php


include 'includes/funciones.php';

/* Mensajes error */
mostrarMensaje();


/* Comprobar sesion */
if (!isset($_SESSION['user_id'])) {
    crearMensaje('Primero debes iniciar sesión', 2);
    header("Location:login.php");
    exit();
}

//comprobar si hay archivo
if (!is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])) {
    crearMensaje('No has seleccionado ningún archivo', 3);
    header('Location: upload.php');
    exit();
}
$archivoModelo = $_FILES["archivo-modelo"];

// obtener datos
$carpetaDestino = "./modelos/";
$archivoDestino = $carpetaDestino . basename($_FILES["archivo-modelo"]["name"]);
$extension = pathinfo($_FILES["archivo-modelo"]["name"], PATHINFO_EXTENSION);

/* Comprobar archivo */
// extensión
if (strcmp($extension, 'glb') != 0) {
    crearMensaje('Extensión incorrecta', 3);
    header('Location: upload.php');
    exit();
}
// tamaño
if ($_FILES["archivo-modelo"]["size"] > 30000000) { //3MB
    crearMensaje('Archivo demasiado grande', 3);
    header('Location: upload.php');
    exit();
}


/* Subir */
if (is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])) {
    $rutaModelo = "modelos/" . time() . "." . $extension;
    move_uploaded_file($_FILES["archivo-modelo"]["tmp_name"], $rutaModelo);
}
$_SESSION['ruta_modelo'] = $rutaModelo;
?>

<!-- Formulario -->
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = "Preview - Dimesional";
    include_once('includes/head.php');
    ?>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script src="scriptPreviewUpload.js" defer></script>
</head>
<body>
<?php
include_once 'includes/header.php';
?>
<div class="wrapper">
    <h1>Datos</h1>
    <div class="modelo preview">
        <!-- previsualización -->
        <model-viewer class='mv' loading='lazy' src='<?php echo $rutaModelo; ?>' alt='Modelo' camera-controls
                      disable-zoom></model-viewer>
        <!-- /previsualización -->
        <i>Mueve con el ratón para girar</i>
    </div>

    <div id="datos-subida">
        <form action="realizar_upload.php" method="POST">
            <fieldset>
                <label for="titulo">Título del objeto: </label>
                <input type="text" name="titulo" id="titulo">
                <br>
                <label for="categoria">Categoría: </label>
                <?php include 'includes/select_categorias.php' ?>
                <br>
            </fieldset>
            <fieldset id="miniatura-preview">
                <legend>Miniatura:</legend>
                <button type="button" id="downloadPoster" class="compact">Generar miniatura</button>
                <!-- /miniatura -->
            </fieldset>

            <input type="submit" name="sub" value="Subir">
        </form>
        <!-- miniatura -->
    </div>
    <form action="eliminar_upload.php" method="POST">
        <input type="submit" name="submit" value="Cancelar">
    </form>
</div>
</body>
</html>
