<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" id="index" href='index.php'>
            <img id="logo" src="img/logo-con-nombre.png" alt="Dimensional" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" id="categ" href='categorias.php'>Categorías</a></li>
                <li class="nav-item"><a class="nav-link" id="about" href='about.php'>Acerca de</a></li>
                <!--<li><a id="buscar" href='#'>Buscar</a></li>-->
                <li class="nav-item"><a class="nav-link" id="upload" href='upload.php'>Subir</a></
                >

                <?php if (isset($_SESSION['user_id'])) {
                    ?>

                    <li class="nav-item opcion-usuario">

                        <a class="nav-link" href="usuario.php?u=<?php echo $_SESSION['nombre_usuario']; ?>">
                            <b><?php echo $_SESSION['nombre_usuario']; ?></b>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href='logout.php'>Cerrar sesión</a></li>

                <?php } else { ?>
                    <li class="btn btn-primary me-auto"><a class="nav-link text-white" id="" href='login.php'>Iniciar
                            sesión</a></li>

                <?php } ?>

            </ul>
        </div>

    </div>
</nav>
<script src="script.js"></script>
