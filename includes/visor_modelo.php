<!-- MEJOR INCLUIR DATOS DEL MODELO FUERA DE MODEL -->


<?php
/* obtener datos */

require_once 'includes/funciones.php';

if (isset($_GET['id_modelo'])) {
    $campos = ['titulo', 'ruta', 'miniatura', 'usuario'];
    $resultado = selectModelo($campos, 'modelo', $_GET['id_modelo'], null);


    /*if (!$resultado) {
        header('Location:index.php');
    }*/

    foreach ($resultado as $fila) {
        extract($fila);
    }
    ?>

    <div class="modelo">
        <model-viewer loading='lazy' src='<?php echo $rutaModelo; ?>' alt='<?php echo $titulo ?>' auto-rotate
                      camera-controls poster='<?php echo $miniatura; ?>'></model-viewer>
        <h1><?php echo $titulo; ?></h1>
    </div>
    <div class="info-modelo">
        <h5></h5>
    </div>
    <div class="controles-modelo">

        <?php
        /* Mostrar botón de 'borrar' si el usuario es el autor */
        if (isset($_SESSION['user_id']))
            if (strcmp($usuario, $_SESSION['user_id']) == 0) {
                ?>
                <button>Borrar</button>
                <?php
            }
        ?>
    </div>

    <?php
} else echo 'Error';
?>