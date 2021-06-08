<?php
/*session_start();
*/?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav id='barra-menu'>
        <ul>
            <li><a href='index.php'>Dimensional</a></li>
            <li><a href='categorias.php'>Categorías</a></li>
            <li><a href='#'>Acerca de</a></li>
            <li><a href='#'>Buscar</a></li>
            <li><a href='upload.php'>Subir</a></li>
            <li>
            <?php if (isset($_SESSION['id_usuario'])) {; ?>
                    <ul>
                        <li><b><?php echo $_SESSION['nombre_usuario']; ?></b></li>
                        <li><a href='logout.php'>Cerrar sesión</a></li>
                    </ul>
            <?php } else { ?>
                <a href='login.php'>Login</a>
            <?php } ?>
            </li>

        </ul>
    </nav>

</body>

</html>