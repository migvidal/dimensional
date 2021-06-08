<?php

session_start();
include 'funciones.php';

/* Comprobar sesion */
if (!isset($_SESSION['id_usuario'])) {
    header("Location:".$_SERVER['HTTP_REFERER']);
}
/* END Comprobar sesion */

//comprobar formulario completado
if (!is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])) {
// comprobar formato archivo
    header('Location: upload.php');
}
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
//echo $extension;


// Check file size
if ($_FILES["archivo-modelo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Comprobar si error
if ($uploadOk == 0) {
    echo 'Error';
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
        <div class="modelo">
            <!-- previsualización -->
            <model-viewer class='mv' loading='lazy' src='<?php echo $target_file; ?>' alt='' camera-controls disable-zoom></model-viewer>
            <!-- /previsualización -->
        </div>
        <i>Mueve con el ratón para girar</i>
        <br>
        <br>
        <form action="realizar_upload.php" method="POST">
            <label for="titulo">Título del objeto: </label>
            <input type="text" name="titulo" id="titulo">
            <br>
            <label for="categoria">Categoría: </label>
            <?php include 'select_categorias.php'?>
            <br>
            <label for="miniatura">Miniatura: </label>
            <!-- miniatura -->
            <div id="miniatura-preview">
                <button type="button" id="downloadPoster">Crear miniatura</button>
                <!-- /miniatura -->
                <input type="submit" name="sub" value="Enviar">
        </form>
    </div>
    </div>
    </body>
    </html>

<?php

// Dar respuesta

// Comprobar que la extensión es .glb o .glTF
/*var_dump($_FILES["archivo-modelo"]["name"]);

    $check = getimagesize($_FILES["archivo-modelo"]["name"]);
    var_dump($check);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
// Insertar en BDD
/*$titulo = $_POST['titulo'];
$ruta = $target_file;
$miniatura = generarMiniatura();
$categ = $_POST['categoria'];
$usuario = $_POST['id_usuario'];
var_dump($titulo, $ruta, $categ, $usuario);*/
//insertModelo($titulo, $ruta, $miniatura, $categ, $usuario)


?>