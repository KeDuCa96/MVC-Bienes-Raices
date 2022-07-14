<main class="contenedor seccion">
    <h1>Crear Propiedad</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data" action="/propiedades/crear">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
</main>