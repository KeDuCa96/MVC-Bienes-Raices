<main class="contenedor seccion">

    <h2>Blog</h2> 
    <?php incluirTemplate('panel-admin')?>

    <?php 
        if($mensaje){
            $mensaje = mostrarNotificacion(intval($mensaje));
            if($mensaje){?>
                <p class="alerta exito"><?php echo sani($mensaje);?> </p>
        <?php }
        }
    ?>
    
    <table class="propiedades">
        <thead> 
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <!-- <th>Vendedor</th> -->
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> 
        <?php foreach($blog as $blog): ?>
            <tr>
                <td> <?php echo $blog->id; ?> </td>
                <td> <?php echo $blog->titulo; ?> </td>
                <td> <img src="/imagenes/<?php echo $blog->imagen; ?>" alt="imagen blog" class="imagen-tabla"> </td> 
                <td> <?php echo $blog->descripcion; ?> </td>
                <!-- <td> <?php echo $blog->nombre." ".$blog->apellido; ?> </td> -->

                <td>
                <form method="POST" class="w-100" action="/blog/eliminar">
                    <input type="hidden" name="id" value="<?php echo $blog->id; ?>"> 
                    <input type="hidden" name="tipo" value="blog">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>

                    <a href="/blog/actualizar?id=<?php echo $blog->id; ?>" class="boton-amarillo-block">Actualizar</a> 
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/blog/crear" class="boton boton-verde">Nuevo Blog</a>
</main>