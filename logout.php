<?php



/* Comprobar sesion */
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
    exit();
}
/* END Comprobar sesion */

session_destroy();

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit();
}
header('Location:index.php');
exit();

?>
