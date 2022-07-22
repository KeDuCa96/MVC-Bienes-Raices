<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php
    if ($mensaje) { ?>
        <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>
    <?php }; ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="img/webp">
        <source srcset="build/img/destacada3.jpg" type="img/jepg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el formulario de contacto</h2>
    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">

        <fieldset>
            <legend>Información Personal</legend>
                <label for="Nombre"">Nombre</label>
                <input data-cy="input-nombre" type=" text" placeholder="Tu nombre" id="Nombre" name="contacto[nombre]" required>

                <label for="Mensaje">Mensaje:</label>
                <textarea data-cy="input-mensaje" id=" Mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>

            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o compra</label>
            <select data-cy="input-opciones" name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected>---Seleccione---</option> /
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input data-cy="input-precio" type="number" placeholder="Precio o presupuesto" id="presupuesto" name="contacto[precio]" required>

        </fieldset>

        <fieldset>

            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" name="contacto[contacto]" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" name="contacto[contacto]" value="email" id="contactar-email" required>
            </div>

            <div id="contacto"></div>


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>