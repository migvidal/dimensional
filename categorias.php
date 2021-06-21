<!doctype html>
<html lang="en">
<?php
$title = "Categorías";
require_once('includes/head.php'); ?>
<body>
<div class="wrapper">

    <?php

    include_once 'includes/header.php';
    include_once 'includes/menu-categorias.php';//menu lateral
    if (isset($_GET['id_categ'])) {
        $categoria = $_GET['id_categ'];
        /*3rem($categoria);*/
        include_once 'includes/resultados-categoria.php';
    }

    include_once 'includes/footer.php';
    ?>

    <section id="result-categoria">

    </section>


</div>
</body>
</html>