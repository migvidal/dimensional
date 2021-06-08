<?php
session_start();


/* Comprobar sesion */
if (!isset($_SESSION['id_usuario'])) {
    header("Location:".$_SERVER['HTTP_REFERER']);
}
/* END Comprobar sesion */


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
    include 'header.php';
    ?>

        <h1>Seleccionar archivo</h1>

        <form action="preview_upload.php" method="post" enctype="multipart/form-data">
            <label for="categoria">Categoría: </label>
            <?php include 'select_categorias.php'?>
            <br>

            <label for="archivo-modelo">Archivo (solo extensiones .x o .y): </label>
            <input type="file" name="archivo-modelo" id="archivo-modelo">
            <input type="submit" name="submit" value="Subir">
        </form>