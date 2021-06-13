

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Dimensional</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <!-- header nav -->
        <?php
            include_once 'includes/header.php';
        ?>

        <?php
        include ('includes/mensaje_info.php');
        ?>

        <div class="hero">
            <h2>Hero</h2>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis doloremque aliquid quae similique aliquam quaerat totam enim eaque ratione libero? Aperiam harum quasi pariatur molestiae quis maxime, ex obcaecati dolorum.</p>
        </section>
        <section class="faqs">
            <h2>FAQs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quibusdam ratione eius, fugit maiores autem ipsa dignissimos aliquam optio doloribus facere perspiciatis mollitia animi culpa nostrum id laboriosam maxime corporis.</p>
        </section>

        <?php
            include_once 'includes/footer.php';
        ?>
    </div>
</body>

</html>