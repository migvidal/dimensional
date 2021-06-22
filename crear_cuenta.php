<?php
require_once('includes/funciones.php');
?>
<!--formulario crear cuenta-->
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
include_once('includes/header-vacio.php');
?>
<div class="wrapper">

    <div class="formulario-centrado">
        <h1>Bienvenido</h1>
        <h3>Introduce los siguientes datos para crear tu cuenta</h3>
        <form action="realizar_creacion_cuenta.php" method="post">
            <label for="user">Nombre de usuario </label>
            <input type="text" name="nuevousuario" id="nuevousuario">
            <br>
            <label for="nuevapass">Contraseña </label>
            <input type="text" name="nuevapass" id="nuevapass">
            <br>
            <label for="confirmapass">Confirmar contraseña </label>
            <input type="text" name="confirmapass" id="confirmapass">
            <br>
            <input type="submit" value="Crear cuenta">
        </form>
        <span>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></span>
        <?php include('includes/mensaje_info.php'); ?>
    </div>
</div>
</body>

</html>

