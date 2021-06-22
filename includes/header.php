<nav id='barra-menu'>
    <div class="wrapper">
        <ul>
            <li><a id="index" href='index.php'>Dimensional</a></li>
            <li><a id="categ" href='categorias.php'>Categorías</a></li>
            <li><a id="about" href='about.php'>Acerca de</a></li>
            <!--<li><a id="buscar" href='#'>Buscar</a></li>-->
            <li class="opcion-usuario"><a id="upload" href='upload.php'>Subir</a></li>

            <?php if (isset($_SESSION['user_id'])) {
                ?>

                <li class="opcion-usuario"><b><?php echo $_SESSION['nombre_usuario']; ?></b>

                    <a href="usuario.php?u=<?php echo $_SESSION['nombre_usuario']; ?>">Perfil</a></li>
                <li class="opcion-usuario"><a href='logout.php'>Cerrar sesión</a></li>

            <?php } else { ?>
                <li class="opcion-usuario"><a href='login.php'>Login</a></li>

            <?php } ?>


        </ul>

    </div>
</nav>
