<?php

include('includes/funciones.php');

// Comprobar que se ha llegado de un POST y que sesión iniciada
if (!isset($_SESSION['user_id'], $_POST['submit'])) {
    header('Location:index.php');
    exit();
}
// 1 - Eliminar registro BDD
if (isset($_POST['id_modelo'])) {
    deleteModelo($_SESSION['id_modelo']);
}

// 2 - Eliminar archivo modelo
if (isset($_POST['ruta_modelo'])) {
    if (unlink($_SESSION['ruta_modelo'])) {
        $mensaje = "Archivo eliminado";
        $tipoMensaje = 2;
    } else {
        $mensaje = "Error al eliminar archivo";
        $tipoMensaje = 3;
    }
}

// mensaje info
crearMensaje($mensaje, $tipoMensaje);

// redireccionar a index
header( "Location:index.php" );
exit();

?>
