<div class="wrapper">

    <?php if ($esInfo) { //true si es info, false si es error
        $class = 'mensaje-info';
    } else {
        $class = 'mensaje-error';
    }?>

    <div class="<?php echo $class; ?>">
        <?php echo $mensaje; ?>
    </div>
</div>
