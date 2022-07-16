<?php foreach ($blog as $blog){ ?>
    <article class="entrada-blog">
        <div class="imagen">
            <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="texto de Entrada blog">
        </div>

        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $blog->id; ?>">
                <h4> <?php echo $blog->tituloBlog; ?> </h4>
                <p>Escrito el: <span> <?php echo $blog->creadoBlog; ?> </span></span></p>
                <p> <?php echo limitar_cadena($blog->descripcionBlog, 50, "...") ?> </p>
            </a>
        </div>
    </article>
<?php } ?>