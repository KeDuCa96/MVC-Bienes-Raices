<?php
if (!isset($_SESSION)) {
    session_start();
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
        <!-- si inicio es true agregamos el string de inicio sino se queda vacio. Esto es un operador ternario, es como un if en una línea. Isset nos permite evaluar si una variable esta definida sino validamos con isset posiblemente tengamos un error visible en el HTML y creareemos vulnerabilidad a los atacantes. -->

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
                <!-- CREAMOS ESTA CONDICION PARA AGREGAR EL H1 UNICAMENTE AL INDEX. (Similiar a lo que hicimos la inicio del header) -->
                <h1>Venta de Casas y Departamentos de lujo</h1>
            <?php endif; ?>
        </div>
    </header>