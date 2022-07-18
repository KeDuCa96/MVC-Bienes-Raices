document.addEventListener('DOMContentLoaded', function(){

    eventListeners();

    darkMode();

    contadorDeCaracteres();
    
    borraMensaje();

    //mostrarContrasena();
});

function darkMode(){
 
    let miStorage = window.localStorage; //Objeto para controlar el Local-Storage de Windows. Localstorage nos permite hacer CRUD a datos locales.
    let PrefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); //DEVUELVE VERDADERO SI EL VALOR POR DEFECTO DEL SISTEMA ES DARK
    
    if (miStorage.getItem('oscuro')==null) { // LE PREGUNTAMOS SI TIENEN LA VARIABLE OSCURO ALMACENADA. COMO NO LA TIENE PROCEDE...
        if (PrefiereDarkMode.matches) { //COMO EL VALOR POR DEFECTO DEL SISTEMA ES OSCURO LE ASIGNAMOS ESE VALOR
            miStorage.setItem('oscuro',1); //CREAMOS ESA VARIABLE EN STORAGE CON VALOR 1=OSCURO
            document.body.classList.add('dark-mode'); // LE AGREGAMOS LA CLASE AL BODY.
        }else{ //POR DEFECTO EL SSITEMA ESTA EN CLARO , DEVUELVE FALSO
            miStorage.setItem('oscuro',0); //CREAMOS ESA VARIABLE EN STORAGE CON VALOR 0=CLARO
            document.body.classList.remove('dark-mode'); // ELMINAMOS LA CLASE DEL BODY.
        }
    }else{ //SI TIENE LA VARIABLE YA CREADA Y ALMACENADA
        if (miStorage.getItem('oscuro')==1) { //VERIFICAMOS SI EL VALOR ES 1 =OSCURO
            document.body.classList.add('dark-mode'); //PONEMOS MODO OSCURO
        }else{                                     //SI EL VALOR ES BLANCO
            document.body.classList.remove('dark-mode'); //PONENMOS MODO CLARO
        }
    }
 
    PrefiereDarkMode.addEventListener('change',function(){ //FUNCION SI EXISTE CAMBIO EN PREFERENCIA DE TEMA POR EL USARIO
        if (PrefiereDarkMode.matches) { //EL TEMA SIGUE SIENDO OSCURO
            miStorage.setItem('oscuro',1); //NUEVO VALOR PARA OSCURO=1
            document.body.classList.add('dark-mode');
        }else{ //TEMA BLANCO
            miStorage.setItem('oscuro',0); //NUEVO VALOR PARA OSCURO=0
            document.body.classList.remove('dark-mode');
        }
    })
 
    const botonDarkMode=document.querySelector('.dark-mode-boton'); //EVENTO PARA EL BOTON
    botonDarkMode.addEventListener('click',function(){ //AÑÁDIMOS EVENTO
        if (document.body.classList.contains('dark-mode')) { //SI CAMBIAMOS A MODO CLARO
            miStorage.setItem('oscuro',0); //NUEVO VALOR PARA STORAGE OSCURO=0 
            document.body.classList.remove('dark-mode'); //
        }else{ //SI CAMBIAMOS A MODO OSCURO
            miStorage.setItem('oscuro',1); //NUEVO VALOR PARA STORAGE OSCURO=1
            document.body.classList.add('dark-mode');
        }
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

        // Muestra campos adicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]'); //Seleccionamos todos los input que tengan el name contacto.
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

/*      if(navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    }else {
        navegacion.classList.add('mostrar');
    } */

    navegacion.classList.toggle('mostrar'); /* Este codigo hace la misma función del if, pero se recomeinda usar cuando tengamos mas exp */
}


function contadorDeCaracteres() {
    const descripcion = document.getElementById('descripcion');
    let contador = document.getElementById('contador');

    if(descripcion){
        descripcion.addEventListener('input', function (e) {
            const target = e.target;
            const longitudMax = target.getAttribute('maxlength');
            const longitudActu = target.value.length;
            contador.innerHTML = `${longitudActu}/${longitudMax}`;
        })
    }
}

/* Borrar aletar o errores cada cierto tiempo */
document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    if(window.innerWidth <= 768){
        temporaryClass(document.querySelector('.navegacion'), 'visibilidadTemporal', 500);
    }
 
    //Eliminar texto de confirmación de CRUD en admin/index.php
    borraMensaje();
});

 
function borraMensaje() {
      
    const errores = document.querySelectorAll('.alerta');
    
    if(errores.length !==null){
        errores.forEach( error => {
            setTimeout(() => {
                error.remove();
            }, 5000)
        } )
    }
}

function mostrarContrasena(){
    const tipo = document.getElementById('password');
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        <br> </br>
        <label for="Telefono"">Número de teléfono</label>
        <input type=" tel" placeholder="Número de contacto" id="Telefono" name="contacto[telefono]" >
        
        <p>Elija la fecha y la hora</p>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML = `
        <br></br>
        <label for="E-mail"">E-mail</label>
        <input type=" email" placeholder="Tu Email" id="E-mail" name="contacto[email]" >

        <p>Elija la fecha y la hora</p>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">        
        `;
    }

}