<!-- Comprobar que el usuario viene de otra página  -->
<?php
require('includes/funciones.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('Location:login.php');
    exit();
}


?>

<!-- mostrar mensaje -->

<!doctype html>
<html lang="en">
<head>
<?php
$title = 'Información';
include('includes/head.php');
?>
</head>

<body>
<?php
include('includes/header-vacio.php');

include('includes/mensaje_info.php');
?>


</body>
</html>

<?php


?>
