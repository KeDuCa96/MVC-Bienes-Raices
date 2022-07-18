<main class="contenedor seccion">
    <h1>Actualizar Blog</h1>

    <?php foreach($errores as $error): ?> 
        <div class="alerta error">
            <?php echo $error; ?>
        </div>  
    <?php endforeach; ?>

    <!-- Creamos el formulario para poder CREAR-->
    <form method="POST" class="formulario" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar Blog" class="boton boton-verde">
    </form>
    <a href="/adminblog" class="boton boton-amarillo">Volver</a>
</main>