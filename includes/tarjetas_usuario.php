<?php
/* obtener datos */

require_once 'includes/funciones.php';

$campos = ['id_modelo', 'titulo', 'miniatura'];
$resultado = selectModelo($campos, null, null, $id_usuario);


foreach ($resultado as $fila) {//TODO poner límite, arreglar subrayado rojo
    extract($fila);

    ?>

    <a class="tarjeta tarjeta-modelo" href="modelo.php?id_modelo=<?php echo $id_modelo; ?>">
        <img height="200" width="200" src="<?php echo $miniatura; ?>" alt="<?php echo $titulo; ?>">
        <h5><?php echo $titulo; ?></h5>
    </a>

    <?php
}
?>