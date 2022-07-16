<main class="contenedor seccion contenido-centrado">
    <h1> <?php echo $blog->tituloBlog; ?> </h1>

    <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="anuncio">

    <div class="texto-entrada">
        <p>Escrito el: <span> <?php echo $blog->creadoBlog; ?> </span></span></p
        <p> <?php echo $blog->descripcionBlog; ?> </p>
    </div>

</main>