<?php

include_once('includes/funciones.php');

if (!isset($_GET['u'])) {
    redirigirRefIndex();
}

$nombreUsuario = $_GET['u'];

/* obtener id usuario*/
$resultadoUsuario = selectUsuarios($nombreUsuario);
extract($resultadoUsuario);


?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $title = $nombreUsuario;
    include('includes/head.php');
    ?>
</head>
<body>
<div class="wrapper">
    <?php
    include('includes/header.php');
    include_once('includes/tarjetas_usuario.php');
    ?>
</div>
</body>
</html>
