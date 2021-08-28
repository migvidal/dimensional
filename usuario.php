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
<?php
include('includes/header.php');
?>
<div class="wrapper">

    <h1>Perfil de <?php echo $nombreUsuario; ?></h1>

    <?php
    include_once('includes/tarjetas_inicio.php');
    ?>
</div>
</body>
</html>
