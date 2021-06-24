<nav id='barra-menu' class="minimizado">
    <div class="wrapper">
        <ul class="menu-flex">
            <li class="index"><a id="index" href='index.php'>
                    <img id="logo" src="img/logo-con-nombre.png" alt="Dimensional">
                </a></li>
            <li><a id="categ" href='categorias.php'>Categorías</a></li>
            <li><a id="about" href='about.php'>Acerca de</a></li>
            <!--<li><a id="buscar" href='#'>Buscar</a></li>-->
            <li><a id="upload" href='upload.php'>Subir</a></li>

            <?php if (isset($_SESSION['user_id'])) {
                ?>

                <li class="opcion-usuario">

                    <a href="usuario.php?u=<?php echo $_SESSION['nombre_usuario']; ?>">
                        <b><?php echo $_SESSION['nombre_usuario']; ?></b>
                    </a>
                </li>
                <li><a href='logout.php'>Cerrar sesión</a></li>

            <?php } else { ?>
                <li id="li-btn-login" ><a id="btn-login" href='login.php'>Iniciar sesión</a></li>

            <?php } ?>

            <li id="btn-menu" onclick=""><button>menú</button></li>
        </ul>

    </div>
</nav>
<script src="script.js"></script>
