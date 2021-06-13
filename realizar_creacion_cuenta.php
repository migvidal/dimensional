<?php

include_once ('includes/funciones.php');

// recibir datos formulario
    //comprobar
if (!isset($_POST['nuevousuario'], $_POST['nuevapass'], $_POST['confirmapass'])) {
    header("Location:index.php");
    exit();
}


if (mempty($_POST['nuevousuario'], $_POST['nuevapass'], $_POST['confirmapass'])) {
    crearMensaje('Faltan datos', 3);
    header("Location:crear_cuenta.php");
    exit();
}
    //asignar
    $nuevoUsuario = $_POST['nuevousuario'];
    $nuevaPass = $_POST['nuevapass'];
    $confirmaPass = $_POST['confirmapass'];

// validar

    //usuario
    if ($nuevoUsuario == null) {
        crearMensaje('Falta el nombre de usuario', 3);
        header("Location:crear_cuenta.php");
        exit();
    }
    //contraseña
    if (strcmp($nuevaPass, $confirmaPass) !== 0) {
        crearMensaje('Las contraseñas no coinciden', 3);
        header("Location:crear_cuenta.php");
        exit();
    }
    //que no exista ya
    $usuarios = selectUsuarios();
    $yaExiste = false;
    foreach ($usuarios as $fila=>$datos) {

        if(strcmp($nuevoUsuario, $datos['nombre_usuario']) == 0) {
            $yaExiste = true;
        }
    }

// insertar en BDD
if (!$yaExiste) {
    insertUsuario($nuevoUsuario, $nuevaPass);

    // mensaje info
    crearMensaje('Cuenta creada con éxito',1);
    header("Location:mensaje_fullscreen.php");

} else {
    crearMensaje('El nombre de usuario ya existe', 3);
    header("Location:crear_cuenta.php");
    exit();
}

?>
