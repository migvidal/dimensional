<?php

require_once ('includes/funciones.php');


if (!isset($_GET['id_modelo'])) {
    header('Location:index.php');
    exit();
}

/* obtener datos */

// modelo
$campos = ['titulo', 'ruta', 'miniatura', 'usuario'];
$resultadoModelo = selectModelo($campos, 'modelo', $_GET['id_modelo'], null);
foreach ($resultadoModelo as $fila) {
    extract($fila);
}


// usuario

$resultadoUsuario = selectUsuarios($usuario);
extract($resultadoUsuario);


/* /obtener datos */
?>



<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Modelo';
    include_once ('includes/head.php');
    ?>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</head>

<body>
<div class="wrapper">



    <?php
    include_once 'includes/header.php';
    //include_once 'includes/visor_modelo.php';

    ?>
    <div class="wrapper">

        <div class="modelo">
            <model-viewer loading='lazy' src='<?php echo $ruta; ?>' alt='<?php echo $titulo ?>' auto-rotate camera-controls poster='<?php echo $miniatura; ?>'></model-viewer>
        </div>

        <div class="info-modelo">
            <h1><?php echo $titulo; ?></h1>
            <h5><?php echo "Autor: $nombre_usuario";?></h5>
        </div>
        <div class="controles-modelo">

            <?php
            /* Mostrar botón de 'borrar' si el usuario es el autor */
            if (isset($_SESSION['user_id']) && $usuario == $_SESSION['user_id']) {
                ?>
                <form action="eliminar_upload.php" method="post">
                    <input hidden class="display-none" type="text" name="id_modelo"
                           value="<?php echo $_GET['id_modelo']; ?>">
                    <input class="btn-eliminar" name="submit" type="submit" value="Eliminar">
                </form>
                <?php
            }
            ?>
        </div>

        <?php
        /*} else echo 'Error';*/
        ?>

    </div>

    <?php
    include_once 'includes/footer.php';
    ?>
</div>
</body>

</html>