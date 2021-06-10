<?php
session_start();
include_once ('includes/funciones.php');

// recibir datos formulario
    //comprobar
if (!isset(
    $_POST['nuevousuario'],
    $_POST['nuevapass'],
    $_POST['confirmapass'])
) {
    header("Location:crear_cuenta.php");
}
    //asignar
    $nuevoUsuario = $_POST['nuevousuario'];
    $nuevaPass = $_POST['nuevapass'];
    $confirmaPass = $_POST['confirmapass'];

// validar

    //usuario
    if ($nuevoUsuario == null) {
        header("Location:crear_cuenta.php");
    }
    //contraseña
    if (strcmp($nuevaPass, $confirmaPass) !== 0) {
        header("Location:crear_cuenta.php");
    }
    //que no exista ya
    $usuarios = selectUsuarios();
    $yaExiste = false;
    foreach ($usuarios as $fila=>$datos) {

        if(strcmp($nuevoUsuario, $datos['nombre_usuario']) == 0) {
            // vuelta y mensaje error
            header("Location:crear_cuenta.php");
            $yaExiste = true;
        }
    }

// insertar en BDD
if (!$yaExiste) {
    insertUsuario($nuevoUsuario, $nuevaPass);

    // mensaje info
    $esInfo = true;
    $mensaje = 'Cuenta creada con éxito';
    include_once ('includes/mensaje_info_fullscreen.php');

}

?>
