<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="titulo-propiedad"> <?php echo $propiedades->titulo; ?> </h1>

    <img loading="lazy" src="/imagenes/<?php echo $propiedades->imagen; ?>" alt="anuncio">

    <div class="resumen-propiedad">
        <p class="precio"> $ <?php echo number_format($propiedades->precio); ?> </p>

        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                <p> <?php echo $propiedades->wc; ?> </p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p> <?php echo $propiedades->estacionamiento; ?> </p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                <p> <?php echo $propiedades->habitaciones; ?> </p>
            </li>
        </ul>

        <p> <?php echo $propiedades->descripcion; ?> </p>
    </div>
    </div>
</main>