<main class="contenedor seccion">

    <h2>Propiedades</h2>
<!--     <?php if ($_SESSION['rol'] === "1"): ?>
        <?php incluirTemplate('panel-admin')?>
    <?php endif; ?> -->
    <!-- Validamos si la creación fue correcta para dar un mensaje al usuario. -->
    
    <?php 
        if($resultado){
            $mensaje = mostrarNotificacion(intval($mensaje));
            if($mensaje){?>
                <p class="alerta exito"><?php echo sani($mensaje);?> </p>
        <?php }
        }
    ?>
    <!-- Creamos la tabla para mostrar los anuncios creados -->
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo propiedad</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Con esta etiqueta. Podemos diferncia el cuerpo de una tabla. 4. Mostrar los resultados. -->
            <?php foreach($propiedades as $propiedad): ?> <!-- Usamos foreach porque ahora objetos. -->
                <tr>
                        <!-- Aplicamos sintaxis de flecha ( para objetos) -->
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo; ?> </td>
                    <td>$<?php echo number_format($propiedad->precio); ?> </td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="propiedad imagen" class="imagen-tabla"> </td> <!--  Recordar que las imagenes nos guarda en BD, se guarda el nombre del archivo por eso primero apuntamos a la carpeta donde se guardó y luego al nombre de la imagen. -->
                    <td> <?php echo $propiedad->descripcion; ?> </td>
                    <td>
                        <!-- Utlizamos un form para el input de eliminar nos envie los datos via POST la información. -->
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>"> 
                            <input type="hidden" name="tipo" value="propiedad"> 
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a> <!-- Con este QueryString podremos mostrar por url el id de la propiedad a actualizar y esto nos ayudará a traernos la info de cada propiedad. -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
</main>
