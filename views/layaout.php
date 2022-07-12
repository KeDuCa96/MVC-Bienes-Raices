<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($inicio)){
    $inicio = false;
}
$autenticado = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">

        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../../index.php">
                    <img src="/build/img/logo.svg" alt="logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" class="dark-mode-boton">

                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anucios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if ($autenticado) : ?>
                            <a href="/cerrar-sesion.php">Cerrar sesión</a>
                        <?php endif; ?>
                        <?php if (!$autenticado) : ?>
                            <a href="/login.php">Iniciar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!-- Cierre da barra -->
            <?php if ($inicio) : ?>
                <h1>Venta de Casas y Departamentos de lujo</h1>
            <?php endif; ?>
        </div>
    </header>

        <?php echo $contenido ?>

    <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
            <a href="/nosotros.php">Nosotros</a>
            <a href="/anuncio.php">Anucios</a>
            <a href="/blog.php">Blog</a>
            <a href="/contacto.php">Contacto</a>
        </nav>
    </div>

    <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
</footer>

<script src="/build/js/bundle.min.js"></script>
</body>

</html>