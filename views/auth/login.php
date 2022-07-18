<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesión</h1>

    <form method="POST" class="formulario" action="/login">
        <fieldset>

            <legend>Iniciar sesión</legend>

            <?php foreach ($errores as $error) : ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <label for="E-mail"">E-mail</label>
                <input type=" email" name="email" placeholder="Ingrese su E-mail" id="E-mail">

                <label for="password"">Contraseña</label>
                <input type=" password" name="password" placeholder="Ingrese su contraseña" id="password">
                    <button type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Iniciar sesión">

    </form>
</main>