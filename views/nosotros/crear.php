<main class="contenedor seccion">
    <h1>Crear Nosotros</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" action="/nosotros/crear" class="formulario" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php' ?>
        <input type="submit" value="Crear nosotros" class="boton boton-verde">
    </form>
    <a href="/adminNosotros" class="boton boton-amarillo">Volver</a>
</main>