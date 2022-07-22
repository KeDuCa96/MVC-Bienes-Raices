<main class="contenedor seccion">
    <h1 data-cy="heading-nosotros">Conoce sobre nosotros</h1>
    <?php foreach ($nosotros as $nosotros){?>
    <div class="seccion-nosotros" data-cy="seccion-nosotros">
        <div class="nosotros">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $nosotros->imagen ?>" alt="Sobre Nosotros">
        </div>

        <div class="texto-nosotros">
            <blockquote>
                <?php echo $nosotros->titulo ?>
            </blockquote>
            <p> <?php echo $nosotros->descripcion ?> </p>
        </div>
    </div>
<?php } ?>
</main>