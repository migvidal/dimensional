<!doctype html>
<html lang="en">
<?php
$title = "Categorías";
require_once('includes/head.php'); ?>
<body>
<?php
include_once 'includes/header.php';
?>
<div class="wrapper">
    <h1>Categorías</h1>

    <?php

    include_once 'includes/menu-categorias.php';//menu lateral
    if (isset($_GET['id_categ'])) {
        $categoria = $_GET['id_categ'];
        include_once 'includes/tarjetas_inicio.php';
    }

    ?>

    <section id="result-categoria">

    </section>


</div>
</body>
</html>