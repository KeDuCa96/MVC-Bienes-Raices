<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo blog" value="<?php echo sani($blog->titulo); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="blog[imagen]" accept="image/jpeg, image/png">

    <!-- Mostramos imagen -->
    <?php if ($blog->imagen) { ?>
        <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-admin">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="blog[descripcion]" maxlength="500"><?php echo sani($blog->descripcion); ?></textarea>
    <p id="contador">0/100</p>
</fieldset>
<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor"></label>
    <select name="blog[vendedorid]" id="vendedorid">
        <option selected value="">---Seleccione un vendedor---</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <!-- Hacemos referencia a un objeto por active record -->
            <option <?php echo $blog->vendedorid === $vendedor->id ? 'selected' : '' ?> value="<?php echo sani($vendedor->id) ?>"> <?php echo sani($vendedor->nombre) . " " . sani($vendedor->apellido); ?> </option>
        <?php } ?>
    </select>
</fieldset>