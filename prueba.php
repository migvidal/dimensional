<?php
$id_categ = 1;
$nombre_categ = 'patata';


echo json_decode(json_encode(array($id_categ, $nombre_categ)))[1];
?>
