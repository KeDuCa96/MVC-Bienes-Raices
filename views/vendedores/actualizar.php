<main class="contenedor seccion">
    <h1>Actualizar vendedor</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
        <?php require __DIR__ . '/formulario.php' ?>
        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>
    <a href="/admin/vendedores/index-vendedores.php" class="boton boton-amarillo">Volver</a>
</main>