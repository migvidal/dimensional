<?php
include_once('includes/funciones.php');
$datosMensaje = mostrarMensaje();
if ($datosMensaje) {
    ?>

    <div class="wrapper">
        <div class="<?php echo $datosMensaje[1]; ?>">
            <?php echo $datosMensaje[0]; ?>
        </div>
    </div>
    <?php
}
?>