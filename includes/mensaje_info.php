<div class="wrapper">

<?php
    switch ($tipoMensaje) {
        case 1:
            $class = 'mensaje-exito';
            break;
        case 2:
            $class = 'mensaje-info';
            break;
        case 3:
            $class = 'mensaje-error';
            break;
        default:
            $class = 'mensaje-generico';
            break;
    }
?>

    <div class="<?php echo $class; ?>">
        <?php echo $mensaje; ?>
    </div>
</div>
