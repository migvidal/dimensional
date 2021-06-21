<?php
include 'includes/funciones.php';


/* Comprobar sesion y variables */
if (!isset(
    $_SESSION['user_id'],
    $_SESSION['ruta_modelo'],
    $_POST['titulo'],
    $_POST['categoria'],
    $_POST['miniatura'])
) {

    crearMensaje('Faltan datos', 3);
    header("Location:upload.php");
    exit();
}

if (mempty($_POST['titulo'],
    $_POST['categoria'],
    $_POST['miniatura'])
) {
    crearMensaje('Error inesperado. Inténtalo de nuevo.', 2);
    header("Location:upload.php");
    exit();
}
/* END Comprobar sesion y variables */
// PrepararDatos
$categ = $_POST['categoria'];
$idUsuario = $_SESSION['user_id'];
$titulo = $_POST['titulo'];
$rutaModelo = $_SESSION['ruta_modelo'];
// END PrepararDatos

// comprobar título
$tituloIncorrecto = textoIncorrecto($titulo);
if ($tituloIncorrecto) {
    crearMensaje("Título incorrecto: $tituloIncorrecto", 3);
    header('Location:upload.php');
    exit();
}


$encodedData = $_POST['miniatura'];

list($type, $encodedData) = explode(';', $encodedData);
list(, $encodedData) = explode(',', $encodedData);
$decodedData = base64_decode($encodedData);


//3rem($encodedData, $miniatura);

// guardar miniatura
$rutaMiniatura = "miniaturas/" . time() . ".png";

file_put_contents($rutaMiniatura, $decodedData);
// END guardar miniatura

// Insertar en BDD
$resultado = insertModelo($titulo, $rutaModelo, $rutaMiniatura, $categ, $idUsuario);

// gestionar errores
if (!$resultado) {
    eliminarArchivo($resultado, $rutaModelo, $rutaMiniatura);
    crearMensaje('Ha habido un error. Inténtalo más tarde.', 2);
} else {
    crearMensaje('Objeto subido!', 1);
}
header('Location:upload.php');


?>