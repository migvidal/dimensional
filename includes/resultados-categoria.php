<!--TODO unificar tarjetas -->
<?php
/* obtener datos */

require_once 'includes/funciones.php';

if (isset($categoria)) {
    $campos = ['id_modelo', 'titulo', 'miniatura'];
    $resultado = selectModelo($campos, null, $categoria, null);


    /* mostrar html */
    foreach ($resultado as $fila) {//TODO poner límite, arreglar subrayado rojo
        extract($fila);
        echo "<a class='tarjeta tarjeta-modelo' href='modelo.php?id_modelo=$id_modelo'>
        <img height='200' width='200' src='$miniatura' alt='$titulo'>
        <h5>$titulo</h5>
    </a>";
    }
} else echo 'Error';
?>