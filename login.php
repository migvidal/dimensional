<?php
session_start();

/* Comprobar sesion */
if (isset($_SESSION['id_usuario'])) {
    header("Location:".$_SERVER['HTTP_REFERER']);
}
/* END Comprobar sesion */

$_SESSION['destino'] = $_SERVER['HTTP_REFERER']; /* php al que el usuario iba */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="validar_login.php" method="POST">
        <label for="user">Usuario: </label>
        <input type="text" name="user" id="user">
        <br>
        <label for="pass">Contraseña: </label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>

