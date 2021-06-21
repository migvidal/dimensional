<?php require_once 'includes/funciones.php' ?>


<?php
/* seleccionar categorias */
$resultado = selectCategorias();
?>

<!--html-->
<select name="categoria" id="categoria">
    <?php
    foreach ($resultado as $fila) {
        extract($fila);
        ?>
        <option value="<?php echo $id_categ; ?>"><?php echo $nombre_categ; ?></option>

        <?php
    }
    ?>
</select>