<fieldset>

<legend>Información General</legend>

<label for="titulo">Titulo:</label>
<input type="text" id="titulo" name=nosotros[tituloNosotros] placeholder="Titulo nosotros" value="<?php echo $nosotros->tituloNosotros ?>">

<label for="imagen">Imagen:</label>
<input type="file" id="imagen" name=nosotros[imagen] accept="image/jpeg, image/png">

<!-- Mostramos imagen -->
<?php if($nosotros->imagen){ ?>
    <img src="/imagenes/<?php echo $nosotros->imagen ?>" class="imagen-admin">
<?php } ?>


<label for="descripcion">Descripcion:</label>
<textarea id="descripcion" name=nosotros[descripcionNosotros] maxlength="500"><?php echo $nosotros->descripcionNosotros ?></textarea>
<p id="contador">0/500</p>

</fieldset>