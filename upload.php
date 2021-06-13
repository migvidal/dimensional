<?php

require_once ('includes/funciones.php');

/* Comprobar sesion */
checkSesion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir - Dimensional</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="wrapper">
    <!-- header nav -->
    <?php
    include_once 'includes/header.php';
    ?>

    <h1>Seleccionar archivo</h1>

    <form action="preview_upload.php" method="post" enctype="multipart/form-data">
        <label for="archivo-modelo">Archivo (solo extensiones .x o .y): </label>
        <input type="file" name="archivo-modelo" id="archivo-modelo">
        <input type="submit" name="submit" value="Subir">
    </form>
</div>

<!-- Mensajes error -->
<?php include('includes/mensaje_info.php'); ?>

</body>
</html>
