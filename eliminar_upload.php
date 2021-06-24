<?php

include('includes/funciones.php');

/*
Comprobar que se ha llegado mediante un formulario
y que la sesión está iniciada
*/

if (!isset($_SESSION['user_id'], $_POST['submit'])) {
    crearMensaje('No puedes acceder', 2);
    header('Location:index.php');
    exit();
}
// 1 - Eliminar registro BDD
if (isset($_POST['id_modelo'])) {
    eliminarArchivo($_POST['id_modelo'], null, null);
}

// 2 - Eliminar archivo modelo
if (isset($_POST['ruta_modelo'])) {
    eliminarArchivo(null, $_POST['ruta_modelo'], null);
}
// 3 - Eliminar miniatura
if (isset($_POST['ruta_miniatura'])) {
    eliminarArchivo(null, null, $_POST['ruta_miniatura']);
}

// Mandar al mensaje fullscreen
header('Location:mensaje_fullscreen.php');
exit();

?>
