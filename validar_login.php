<?php

include 'includes/funciones.php';
if (isset($_POST['user'], $_POST['pass'])) {

    /* obtener usuario */
    $datosUsuario = selectUsuarios($_POST['user']);


    /* si hay resultado, ver si pass coincide */
    if ($datosUsuario && strcmp($datosUsuario['pass'], $_POST['pass']) == 0) {
        /* si pass coincide, guardar sesion y mandar a la página destino */
        $_SESSION['user_id'] = $datosUsuario['id_usuario'];
        $_SESSION['nombre_usuario'] = $datosUsuario['nombre_usuario'];

        // mandar a destino
        if (isset($_SESSION['destino'])) {
            header('Location:' . $_SESSION['destino']);
            exit();
        } else {
            header('Location:index.php');
            exit();
        }
    }
}

/* si no existe o faltan datos por introducir */
// Mensaje de error
crearMensaje('Usuario o contraseña incorrectos', 3);
// Volver a login
header('Location: login.php');
exit();
?>