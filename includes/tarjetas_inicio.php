<?php
/* obtener datos */

require_once 'includes/funciones.php';

$campos = ['id_modelo', 'titulo', 'miniatura'];

if (isset($id_usuario)) {
    $resultado = selectModelo($campos, null, null, $id_usuario);
} else {
    $resultado = selectModelo($campos, null, null, null);
}

?>

<div class="wrapper-tarjetas">

    <?php
    foreach ($resultado as $fila) {//TODO poner random
        extract($fila);
        if (isset($id_modelo, $miniatura, $titulo)) {

            ?>

            <a class="tarjeta tarjeta-modelo" href="modelo.php?id_modelo=<?php echo $id_modelo; ?>">
                <img height="200" width="200" src="<?php echo $miniatura; ?>" alt="<?php echo $titulo; ?>">
                <h5><?php echo $titulo; ?></h5>
            </a>

            <?php
        }
    }
    ?>
</div>
