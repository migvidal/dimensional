<?php

include('includes/funciones.php');

/*
Comprobar que se ha llegado mediante un formulario
y que la sesión está iniciada
*/

if (!isset($_SESSION['user_id'], $_POST['submit'])) {
    header('Location:index.php');
    exit();
}
// 1 - Eliminar registro BDD
if (isset($_POST['id_modelo'])) {
    deleteModelo($_POST['id_modelo']);
    // todo gestionar
}

// 2 - Eliminar archivo modelo
if (isset($_POST['ruta_modelo'])) {
    if (unlink($_POST['ruta_modelo'])) {
        $mensaje = "Archivo eliminado";
        $tipoMensaje = 2;
    } else {
        $mensaje = "Error al eliminar el archivo";
        $tipoMensaje = 3;
    }
}
// 3 - Eliminar miniatura
if (isset($_POST['ruta_miniatura'])) {
    if (unlink($_POST['ruta_miniatura'])) {
        $mensaje = "Archivo eliminado";
        $tipoMensaje = 2;
    } else {
        $mensaje = "Error al eliminar el archivo";
        $tipoMensaje = 3;
    }
}

// mensaje info
crearMensaje($mensaje, $tipoMensaje);

// redireccionar a index
header( "Location:index.php" );
exit();

?>
