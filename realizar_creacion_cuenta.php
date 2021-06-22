<?php

include_once('includes/funciones.php');

/* Recibir datos formulario */

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
//retirar tags y guardar en variables
$nuevoUsuario = strip_tags($_POST['nuevousuario']);
$nuevaPass = strip_tags($_POST['nuevapass']);
$confirmaPass = strip_tags($_POST['confirmapass']);


/* Validar */

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
//que el usuario no exista ya
$usuarios = selectUsuarios();
$yaExiste = false;
foreach ($usuarios as $fila => $datos) {

    if (strcmp($nuevoUsuario, $datos['nombre_usuario']) == 0) {
        $yaExiste = true;
    }
}

/* Insertar en BDD */
if (!$yaExiste) {
    insertUsuario($nuevoUsuario, $nuevaPass);

    // éxito
    crearMensaje('Cuenta creada con éxito', 1);
    header("Location:mensaje_fullscreen.php");

} else {

    // error
    crearMensaje('El nombre de usuario ya existe', 3);
    header("Location:crear_cuenta.php");
    exit();
}

?>
