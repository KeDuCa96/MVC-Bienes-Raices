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
                <input type=" text" placeholder="Tu nombre" id="Nombre" name="contacto[nombre]" >

                <label for="Mensaje">Mensaje:</label>
                <textarea id=" Mensaje" name="contacto[mensaje]" ></textarea>
        </fieldset>

        <fieldset>

            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o compra</label>
            <select name="contacto[tipo]" id="opciones" >
                <option value="" disabled selected>---Seleccione---</option> /
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" placeholder="Precio o presupuesto" id="presupuesto" name="contacto[precio]" >

        </fieldset>

        <fieldset>

            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" value="telefono" checked id="contactar-telefono" > <!-- name es importante porque es la forma con que podremos seleccionar desde php -->
                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contacto]" value="email" checked id="contactar-email" >
            </div>

            <div id="contacto"></div>


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>