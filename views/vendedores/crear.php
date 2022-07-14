<main class="contenedor seccion">
    <h1>Crear vendedor</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data" action="/vendedores/crear">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Crear Vendedor" class="boton boton-verde">
    </form>
    <a href="/vendedores" class="boton boton-verde">Volver</a>
</main>