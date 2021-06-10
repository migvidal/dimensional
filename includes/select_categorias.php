<?php require_once 'includes/funciones.php' ?>


    <?php
    /* seleccionar categorias */
    $campos = ['id_categ', 'nombre_categ'];
    $resultado = selectModelo($campos, 'categoria', null, null);
    ?>

    <!--html-->
<select name="categoria" id="categoria">
    <?php
    foreach ($resultado as $fila) {
        extract($fila);
    ?>
        <option value="<?php echo $id_categ;?>"><?php echo $nombre_categ; ?></option>

    <?php
    }
    ?>
</select>