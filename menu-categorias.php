<?php
require_once 'funciones.php';

//select
$campos = ['id_categ', 'nombre_categ'];
$resultado = selectModelo($campos, 'categoria', null, null);

//html
$listaHTML = "<nav class='menu-categorias'><ul>";
foreach ($resultado as $fila) {
    extract($fila);
    $listaHTML .= "<li><a href='categorias.php?id_categ=$id_categ'>$nombre_categ</a></li>";
}
$listaHTML .= "</ul></nav>";
echo $listaHTML;

?>
