<?php
/* obtener datos */

require_once 'includes/funciones.php';

$campos = ['id_modelo', 'titulo', 'miniatura'];

if (isset($id_usuario)) {
    $resultado = selectModelo($campos, null, null, $id_usuario);
} else if (isset($categoria)) {
    $resultado = selectModelo($campos, null, $categoria, null);
} else {
    $resultado = selectModelo($campos, null, null, null);
}

?>



<div class="container wrapper-tarjetas">
    <ul class="row">

    <div id="model-list" class="row">
    <?php
    foreach ($resultado as $fila) {
        extract($fila);
        if (isset($id_modelo, $miniatura, $titulo)) {

            ?>


                <div class="col-sm-3">

                    <a class="card" href="modelo.php?id_modelo=<?php echo $id_modelo; ?>">
                        <img class="card-img-top" src="<?php echo $miniatura; ?>" alt="<?php echo $titulo; ?>">
                        <h5 class="h5 card-title"><?php echo $titulo; ?></h5>
                    </a>
                </div>


            <?php
        }
    }
    ?>
        <div id="model-list" class="row">
        </div>
</div>
