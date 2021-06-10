<?php
session_start();

/* Comprobar sesion */
if (isset($_SESSION['id_usuario'])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        // si se ha iniciado sesión, regresa a la página
        header('Location:'.$_SERVER['HTTP_REFERER']);
        // o vuelve al index
    } header('Location:index.php');
}
/* END Comprobar sesion */

// referer en sesión
if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['destino'] = $_SERVER['HTTP_REFERER']; /* php al que el usuario iba */
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="formulario-centrado">
        <h1>Login</h1>
        <form action="validar_login.php" method="POST">
            <label for="user">Usuario </label>
            <input type="text" name="user" id="user">
            <br>
            <label for="pass">Contraseña </label>
            <input type="text" name="pass" id="pass">
            <input type="submit" value="Iniciar sesión">
        </form>
        <span>No tienes cuenta? <a href="crear_cuenta.php">Crear cuenta</a></span>
    </div>
</div>
</body>
</html>

