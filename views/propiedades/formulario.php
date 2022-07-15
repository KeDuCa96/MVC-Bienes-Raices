<fieldset>
    <legend>Información General</legend>

    <!-- Llamamos la función de sanitizar y el parametro será el atributo con función de flecha -->
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo sani($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" value="<?php echo sani($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">

    <!-- Mostramos imagen -->
    <?php if($propiedad->imagen){ ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-admin">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="propiedad[descripcion]" maxlength="300"><?php echo sani($propiedad->descripcion); ?></textarea>
    <p id="contador">0/300</p>
</fieldset>

<!-- información de la propiedad -->
<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Indique la cantidad de habitaciones" min="1" max="9" value="<?php echo sani($propiedad->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Indique la cantidad de baños" min="1" max="9" value="<?php echo sani($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Indique la cantidad de estacionamientos/parqueaderos" max="9" value="<?php echo sani($propiedad->estacionamiento); ?>">

</fieldset>

<!-- Información del vendedor -->

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor"></label>
    <select name="propiedad[vendedorid]" id="vendedor">
        <option selected value="">---Seleccione un vendedor---</option>
        <?php foreach($vendedores as $vendedor){ ?>
            <!-- Hacemos referencia a un objeto por active record -->
            <option <?php echo $propiedad->vendedorid === $vendedor->id ? 'selected' : '' ?> value="<?php echo sani($vendedor->id)?>"> <?php echo sani($vendedor->nombre) . " " . sani($vendedor->apellido); ?> </option>
        <?php } ?>
    </select>

</fieldset>