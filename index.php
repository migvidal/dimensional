<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Inicio';
    include_once('includes/head.php');
    ?>
</head>

<body>

<!-- header nav -->
<?php
include_once 'includes/header.php';
?>
<div class="hero">

        <h1>El mundo en 3 dimensiones</h1>
</div>
<div class="wrapper">

    <?php
    include('includes/mensaje_info.php');
    ?>


    <section class="destacados">
        <h2>Últimos</h2>

        <?php
        include 'includes/tarjetas_inicio.php';
        ?>


    </section>

    <!-- categorias -->
    <?php
    include 'includes/categorias-inicio.php';
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