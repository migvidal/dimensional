<?php
include 'funciones.php';
session_start();

/* Comprobar sesion y variables */
if (!isset(
    $_SESSION['id_usuario'],
    $_SESSION['ruta_modelo'],
    $_POST['titulo'],
    $_POST['categoria'],
    $_POST['miniatura'])
) {
    header("Location:index.php");
}
/* END Comprobar sesion y variables */
// PrepararDatos
$categ = $_POST['categoria'];
$idUsuario = $_SESSION['id_usuario'];
$titulo = $_POST['titulo'];
$ruta = $_SESSION['ruta_modelo'];
// END PrepararDatos


if (!textoCorrecto($titulo)) {
    header('Location:preview_upload.php');
}




$miniatura = $decocedData = base64_decode($_POST['miniatura']);

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