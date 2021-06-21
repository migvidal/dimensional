<nav id='barra-menu'>
    <ul>
        <li><a id="index" href='index.php'>Dimensional</a></li>
        <li><a id="categ" href='categorias.php'>Categorías</a></li>
        <li><a id="about" href='about.php'>Acerca de</a></li>
        <li><a id="buscar" href='#'>Buscar</a></li>
        <li><a id="upload" href='upload.php'>Subir</a></li>
        <li>
            <?php if (isset($_SESSION['user_id'])) {
                ; ?>
                <ul>
                    <li><b><?php echo $_SESSION['nombre_usuario']; ?></b></li>

                    <li><a href="usuario.php?u=<?php echo $_SESSION['nombre_usuario']; ?>">Perfil</a></li>
                    <li><a href='logout.php'>Cerrar sesión</a></li>
                </ul>
            <?php } else { ?>
                <a href='login.php'>Login</a>
            <?php } ?>
        </li>

    </ul>
</nav>
