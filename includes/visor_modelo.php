<?php
/* obtener datos */

require_once 'includes/funciones.php';

if (isset($_GET['id_modelo'])) {
    $campos = ['titulo', 'ruta', 'miniatura'];
    $resultado = selectModelo($campos, 'modelo', $_GET['id_modelo'], null);



/*if (!$resultado) {
    header('Location:index.php');
}*/

foreach ($resultado as $fila) {
    extract($fila);
}
?>

<div class="modelo">
    <model-viewer loading='lazy' src='<?php echo $ruta ?>' alt='<?php echo $titulo ?>' auto-rotate camera-controls poster='<?php echo $miniatura ?>'></model-viewer>
    <h1><?php echo $titulo ?></h1>
</div>

<?php
    } else echo 'Error';
?>