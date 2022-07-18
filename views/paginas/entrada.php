<main class="contenedor seccion contenido-centrado">
    <h1> <?php echo $blog->titulo; ?> </h1>

    <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="anuncio">

    <div class="texto-entrada">
        <p>Escrito el: <span> <?php echo $blog->creado; ?> </span></span></p
        <p> <?php echo $blog->descripcion; ?> </p>
    </div>

</main>