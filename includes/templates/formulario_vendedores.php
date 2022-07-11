<fieldset>

<legend>Información General</legend>

<label for="nombre">Nombre</label>
<input type="text" id="nombre" name="vendedores[nombre]" placeholder="Nombre " value="<?php echo sani($vendedores->nombre); ?>">

<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="vendedores[apellido]" placeholder="Apellido " value="<?php echo sani($vendedores->apellido); ?>">

<label for="telefono">Telefono:</label>
<input type="number" id="telefono" name="vendedores[telefono]"  placeholder="Telefono " value="<?php echo sani($vendedores->telefono); ?>">

</fieldset>