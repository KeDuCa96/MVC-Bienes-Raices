<main class="contenedor seccion">
    <h1>Crear Blog</h1>
    
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" action="/blog/crear" class="formulario" enctype="multipart/form-data">
        <?php include __DIR__. '/formulario.php'; ?>
        <input type="submit" value="Crear Blog" class="boton boton-verde">
    </form>
    <a href="/adminblog" class="boton boton-amarillo">Volver</a>
</main>