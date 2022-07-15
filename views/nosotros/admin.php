<main class="contenedor seccion">

    <h2>Nosotros</h2>
    <?php incluirTemplate('panel-admin') ?>
    <!-- Mensaje de errores -->
    <?php
    $mensaje = mostrarNotificacion(intval($mensaje));
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo sani($mensaje); ?> </p>
    <?php }; ?>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($nosotros as $nosotros) : ?>
                <tr>
                    <td> <?php echo $nosotros->tituloNosotros; ?> </td>
                    <td> <img src="/imagenes/<?php echo $nosotros->imagen; ?>" alt="imagen Nosotros" class="imagen-tabla"> </td>
                    <td> <?php echo $nosotros->descripcionNosotros; ?> </td>
                    <td>

                        <form method="POST" class="w-100" action="/nosotros/eliminar">
                            <input type="hidden" name="id" value="<?php echo $nosotros->id; ?>">
                            <input type="hidden" name="tipo" value="nosotros">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/nosotros/actualizar?id=<?php echo $nosotros->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/nosotros/crear" class="boton boton-verde">Nuevo nosotros</a>
</main>