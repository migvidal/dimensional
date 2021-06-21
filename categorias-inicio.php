<!--seleccionar categorias-->
<?php
require_once 'includes/funciones.php';
$resultado = selectCategorias();
?>

<!--html-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-viejo.css">
</head>
<body>
<section class="categorias">
    <h2>Categorías</h2>
    <ul>
        <!-- generar tarjetas de categoria -->
        <?php
        foreach ($resultado as $fila) {
            extract($fila);
            ?>

            <li>
                <a class="tarjeta categoria"
                   href="categorias.php?id_categ=<?php echo $id_categ ?>"><?php echo $nombre_categ ?></a>
            </li>

            <?php
        }
        ?>
    </ul>

</section>
</body>
</html>
