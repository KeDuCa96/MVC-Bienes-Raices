<main class="contenedor seccion">

    <h1>Vendedores</h1>  
    <?php incluirTemplate('panel-admin')?>

    <?php 
        if($mensaje){
            $mensaje = mostrarNotificacion(intval($mensaje));
            if($mensaje){?>
                <p class="alerta exito"><?php echo sani($mensaje);?> </p>
        <?php }
        }
    ?>  
    <!-- Tabla para propiedades -->
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre; ?> </td>
                    <td> <?php echo $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?> </td>
                    <td>

                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>"> 
                            <input type="hidden" name="tipo" value="vendedor"> 
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/vendedores/crear" class="boton boton-verde">Nuevo vendedor</a>
</main>

