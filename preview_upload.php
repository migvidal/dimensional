<?php


include 'includes/funciones.php';

/* Mensajes error */
mostrarMensaje();


/* Comprobar sesion */
if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
    crearMensaje('Primero debes iniciar sesión', 2);
}
/* END Comprobar sesion */

//comprobar formulario completado
if (!is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])) {
    header('Location: upload.php');
}
$archivoModelo = $_FILES["archivo-modelo"];



// sanitize y filter
// ...

// cosas
$target_dir = "modelos/";
$target_file = $target_dir . basename($_FILES["archivo-modelo"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// obtener datos
$extension = pathinfo($_FILES["archivo-modelo"]["name"], PATHINFO_EXTENSION);


// mensaje error y volver
if (strcmp($extension, 'glb') != 0 ) {
    $_SESSION['mensaje'] = 'Extensión incorrecta';
    $_SESSION['tipo-mensaje'] = 3;
    header('Location: upload.php');
}


// Check file size
if ($_FILES["archivo-modelo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Comprobar si error
if ($uploadOk == 0) {
    $_SESSION['mensaje'] = 'Error al subir archivo';
    $_SESSION['tipo-mensaje'] = 3;
    header('Location: upload.php');
} else {
    //subir
    if(is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])){
        $rutaModelo = "modelos/".time().".".$extension;
        move_uploaded_file($_FILES["archivo-modelo"]["tmp_name"], $rutaModelo);
    }
}

// datos
$_SESSION['ruta_modelo'] = $rutaModelo;
?>



    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Preview - Dimesional</title>
        <link rel="stylesheet" href="style.css">
        <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
        <script src="script.js" defer></script>
    </head>
    <body>
    <div class="wrapper">
        <h1>Datos</h1>
        <div class="modelo preview">
            <!-- previsualización -->
            <model-viewer class='mv' loading='lazy' src='<?php echo $target_file; ?>' alt='' camera-controls disable-zoom></model-viewer>
            <!-- /previsualización -->
            <i>Mueve con el ratón para girar</i>
        </div>

        <br>
        <br>
        <form id="datos-subida" action="realizar_upload.php" method="POST">
            <label for="titulo">Título del objeto: </label>
            <input type="text" name="titulo" id="titulo">
            <br>
            <label for="categoria">Categoría: </label>
            <?php include 'includes/select_categorias.php'?>
            <br>
            <label for="miniatura">Miniatura: </label>

                <input type="submit" name="sub" value="Enviar">
        </form>
        <!-- miniatura -->
        <div id="miniatura-preview">
            <button type="button" id="downloadPoster">Crear miniatura</button>
            <!-- /miniatura -->
        </div>
        <form action="eliminar_upload.php" method="POST">
            <input type="submit" name="submit" value="Cancelar">
        </form>
    </div>
    </body>
    </html>
