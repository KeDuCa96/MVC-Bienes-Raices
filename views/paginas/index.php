<main class="contenedor seccion">
    <h2 data-cy='heading-nosotros'>Más sobre nosotros</h2> <!-- agregamos información sobre nosotros -->
    <div class="iconos-nosotros" data-cy="iconos-nosotros">
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
</main>

<section class="seccion contenedor" data-cy="seccion contenedor">
    <!-- Sección de ventas -->
    <!-- Estos seccion los usamos siempre que tengamos un heading que nos lleva a una nueva ssción  -->
    <h2 data-cy="heading-propiedades">Propiedades en venta</h2>

    <!-- Agregamos el template de anuncions -->

    <?php
    $limite = 3;
    include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde" data-cy="todas-propiedades">Ver todas</a>
    </div>
</section>

<section data-cy="heading-contacto" class="imagen-contacto">
    <h2 >Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor de porndrá en contacto contigo</p>
    <a href="/contacto" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <!-- testimoniales -->
    <section class="blog" data-cy="blog">
        <h3>Nuestro blog</h3>
        <?php
    $limite = 2;
    include 'listadoBlog.php';
    ?>

    </section>

    <section class="testimoniales" data-cy="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote class="testimonio">
                Muy buena atención, cumplieron con lo que prometieron. Recomendados. Llegaron a la hora pactada, dejaron la casa limpia, los acabados son lo mejor. No me arrepiento de adquirir el servicio.
            </blockquote>
            <p>- Kevin Durán</p>
        </div>
    </section>
</div>