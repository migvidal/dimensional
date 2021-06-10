<?php

session_start();

/* Comprobar sesion */
if (!isset($_SESSION['id_usuario'])) {
    header("Location:index.php");
}
/* END Comprobar sesion */

session_destroy();

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location:'.$_SERVER['HTTP_REFERER']);
} header('Location:index.php');

?>
