<?php
require_once 'includes/funciones.php';

//select

$resultado = selectCategorias();
?>

<!-- html -->
<nav class='menu-categorias'>
    <ul>
        <?php foreach ($resultado as $fila) {
            extract($fila); ?>
            <li><a href='categorias.php?id_categ=<?php echo $id_categ; ?>'>
                    <?php echo $nombre_categ; ?>
                </a></li>

        <?php } ?>

    </ul>
</nav>

<!-- /html -->

