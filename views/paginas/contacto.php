<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="img/webp">
        <source srcset="build/img/destacada3.jpg" type="img/jepg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="POST">

        <fieldset>
            <legend>Información Personal</legend>
                <label for="Nombre"">Nombre</label>
                <input type=" text" placeholder="Tu nombre" id="Nombre" name="contacto[nombre]" required>

                <label for="E-mail"">E-mail</label>
                <input type=" email" placeholder="Tu Email" id="E-mail" name="contacto[email]" required>

                <label for="Telefono"">Teléfono</label>
                <input type=" tel" placeholder="Número de contacto" id="Telefono" name="contacto[telefono]" required>

                <label for="Mensaje">Mensaje:</label>
                <textarea id=" Mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>

            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o compra</label>
            <select name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected>---Seleccione---</option> /
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" placeholder="Precio o presupuesto" id="presupuesto" name="contacto[precio]" required>

        </fieldset>

        <fieldset>

            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" value="telefono" checked id="contactar-telefono" required> <!-- name es importante porque es la forma con que podremos seleccionar desde php -->
                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contacto]" value="email" checked id="contactar-email" required>
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]"> <!-- Con el min y max dpodemos decirle al usuario o cliente las horas disponibles para contactar -->
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>