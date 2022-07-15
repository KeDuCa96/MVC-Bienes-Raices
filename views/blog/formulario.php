<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="tituloBlog" name="blog[tituloBlog]" placeholder="Titulo blog" value="<?php echo sani($blog->tituloBlog); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="blog[imagen]" accept="image/jpeg, image/png">

    <!-- Mostramos imagen -->
    <?php if($blog->imagen){ ?>

        <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-admin">

    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcionBlog" name="blog[descripcionBlog]" maxlength="100"><?php echo sani($blog->descripcionBlog); ?></textarea>
    <p id="contador">0/100</p>

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