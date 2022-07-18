<fieldset>

<legend>Información General</legend>

<label for="titulo">Titulo:</label>
<input type="text" id="titulo" name=nosotros[titulo] placeholder="Titulo nosotros" value="<?php echo $nosotros->titulo ?>">

<label for="imagen">Imagen:</label>
<input type="file" id="imagen" name=nosotros[imagen] accept="image/jpeg, image/png">

<!-- Mostramos imagen -->
<?php if($nosotros->imagen){ ?>
    <img src="/imagenes/<?php echo $nosotros->imagen ?>" class="imagen-admin">
<?php } ?>


<label for="descripcion">Descripcion:</label>
<textarea id="descripcion" name=nosotros[descripcion] maxlength="500"><?php echo $nosotros->descripcion ?></textarea>
<p id="contador">0/500</p>

</fieldset>