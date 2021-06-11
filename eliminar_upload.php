<?php

include('includes/funciones.php');

if (!isset($_SESSION['id_usuario'], $_SESSION['ruta_modelo'], $_POST['submit'])) {
    header('Location:index.php');
}

// eliminar archivo modelo
if (unlink($_SESSION['ruta_modelo'])) {
    $mensaje = "Archivo eliminado";
} else {
    $mensaje = "Error al eliminar archivo";
}

// mensaje info
$esInfo = false;
include ('includes/mensaje_info.php');

// redireccionar a upload
header( "refresh:2;url=upload.php" );


?>
