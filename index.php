<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Inicio';
    include_once('includes/head.php');
    ?>
    <link rel="stylesheet" href="style-viejo.css">
</head>

<body>
<div class="wrapper">
    <!-- header nav -->
    <?php
    include_once 'includes/header.php';
    ?>

    <?php
    include('includes/mensaje_info.php');
    ?>

    <div class="hero">
        <p>El mundo en 3 dimensiones</p>
    </div>

    <section class="destacados">
        <h2>Destacados</h2>

        <?php
        include 'includes/tarjetas_inicio.php';
        ?>


    </section>

    <!-- categorias -->
    <?php
    include 'categorias-inicio.php';
    ?>
    <section class="about">
        <h2>Acerca de</h2>
        <p>Este es el lugar perfecto para compartir objetos 3D. Proyecto final de DAW. Creado por Miguel Vidal.</p>
    </section>
    <section class="faqs">
        <h2>FAQs</h2>
        <h3>¿Puedo descargar los archivos?</h3>
        <p>Los archivos sólo se pueden visualizar.</p>
        <h3>¿Qué tipos de formato se admiten?</h3>
        <p>El formato debe ser .glb.</p>
    </section>

    <?php
    include_once 'includes/footer.php';
    ?>
</div>
</body>

</html>