<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categoría - Dimensional</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">

        <?php
        include_once 'header.php';
        include_once 'menu-categorias.php';//menu lateral
        if (isset($_GET['id_categ'])) {
            $categoria = $_GET['id_categ'];
            /*var_dump($categoria);*/
            include_once 'resultados-categoria.php';
        }

        include_once 'footer.php';
        ?>

        <section id="result-categoria">

        </section>


    </div>
</body>
</html>