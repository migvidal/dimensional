<?php
session_start();
include 'funciones.php';
if (isset($_POST['user'], $_POST['pass'])) {
    /* comparar con la BDD */
        /* obtener usuario */
        $datosUsuario = selectUsuarios($_POST['user']);

        /* si hay resultado, ver si pass coincide */
        if ($datosUsuario && strcmp($datosUsuario['pass'], $_POST['pass']) == 0) {
            /* si pass coincide, guardar sesion y mandar a la página destino */
            $_SESSION['id_usuario'] = $datosUsuario['id_usuario'];
            $_SESSION['nombre_usuario'] = $datosUsuario['nombre_usuario'];
            header('Location:'.$_SESSION['destino']);
        }
}
else
    /* si no existe o faltan datos por introducir, volver a login */
    header('Location: login.php');
?>