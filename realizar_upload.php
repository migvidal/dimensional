<?php
include 'includes/funciones.php';


/* Comprobar sesion y variables */
if (!isset(
    $_SESSION['id_usuario'],
    $_SESSION['ruta_modelo'],
    $_POST['titulo'],
    $_POST['categoria'],
    $_POST['miniatura'])
) {
    crearMensaje('Faltan datos, 2');
    header("Location:index.php");
}
/* END Comprobar sesion y variables */
// PrepararDatos
$categ = $_POST['categoria'];
$idUsuario = $_SESSION['id_usuario'];
$titulo = $_POST['titulo'];
$ruta = $_SESSION['ruta_modelo'];
// END PrepararDatos

// mensaje error y volver
if (!textoCorrecto($titulo)) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $_SESSION['mensaje'] = 'Título incorrecto';
        $_SESSION['tipo-mensaje'] = 3;
        header('Location:'.$_SERVER['HTTP_REFERER']); //preview_upload
    } else {
        header('Location:index.php');
    }
}




$miniatura = base64_decode($_POST['miniatura']);

var_dump($categ, $idUsuario, $titulo, $ruta, $miniatura);

// guardar miniatura
$rutaMiniatura = "miniaturas/".time().".png";
file_put_contents( $rutaMiniatura, $miniatura);
// END guardar miniatura

// Insertar en BDD
$resultado = insertModelo($titulo, $ruta, $rutaMiniatura, $categ, $idUsuario);
// END Insertar en BDD
echo $resultado;

// gestionar errores




?>