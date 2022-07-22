<div class="contenedor-anuncios" data-cy="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad){ ?>

        <div class="anuncio" data-cy="anuncio">

            <img data-cy="imagen-propiedad" loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">

            <div class="contenido-anuncio" data-cy="contenido-anuncio">
                <h3> <?php echo $propiedad->titulo; ?> </h3>
                <p> <?php echo limitar_cadena($propiedad->descripcion, 50, "..."); ?> </p>
                <p class="precio"> $ <?php echo number_format($propiedad->precio); ?> </p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p> <?php echo $propiedad->wc; ?> </p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p> <?php echo $propiedad->estacionamiento; ?> </p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p> <?php echo $propiedad->habitaciones; ?> </p>
                    </li>
                </ul>

                <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>

            </div> <!-- .contenido-anuncion -->
        </div> <!-- anucion -->
    <?php } ?>
</div> <!-- .contenido -->
