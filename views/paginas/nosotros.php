<main class="contenedor seccion">
    <h1>Conoce sobre nosotros</h1>
    <?php foreach ($nosotros as $nosotros){?>
    <div class="seccion-nosotros">
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

<section class="contenedor seccion">
    <h1>Más sobre nosotros</h1> <!-- agregamos información sobre nosotros -->
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorem totam aut sequi nihil, numquam cumque molestias illo, suscipit quod odio adipisci inventore iste doloribus excepturi in quidem assumenda ex.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorem totam aut sequi nihil, numquam cumque molestias illo, suscipit quod odio adipisci inventore iste doloribus excepturi in quidem assumenda ex.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorem totam aut sequi nihil, numquam cumque molestias illo, suscipit quod odio adipisci inventore iste doloribus excepturi in quidem assumenda ex.</p>
        </div>
    </div>
</section>