<?php

//? Definimos las constantes.
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT']. '/imagenes/');

/* Usamos un poco de typescript para buenas practicas en el codigo */
function incluirTemplate(string  $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";    //* Llamamos la constante definidad en app.php. Recordar que la constante trae la dirección que encontró php con la ayuda de __DIR__
}


function limitar_cadena($cadena, $limite, $sufijo)
{
    // Si la longitud es mayor que el límite...
    if (strlen($cadena) > $limite) {
        // Entonces corta la cadena y ponle el sufijo
        return substr($cadena, 0, $limite) . $sufijo;
    }

    // Si no, entonces devuelve la cadena normal
    return $cadena;
}

function siAutenticado(): string
{
    session_start();

    //* Como esta definido como true sí existe.
    $rol = $_SESSION['rol'];

    if($_SESSION['login']){
        if($rol === "0") {
            return "0"; //Admin
        }
        if( $rol === "1") {
            return "1"; //SuperAdmin
        }
    }else{
        header('Location: /');
    }
}

// En POO podemos usar funciones y clases sin nigun problema. Las clases normalmente se usan para interactuar en la BD.

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapar o Sanitizar HTML
function sani($html) : string{
    $sani = htmlspecialchars($html);
    return $sani;
}

//Validare tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad', 'blog','nosotros'];

    return in_array($tipo, $tipos); //Buscar string o valor dentro de un arreglo
}

//Muestra los mensajes
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminadodo correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarIDurl(string $url){
        // Validamos que el ID que nos dan por URL sea valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: ${url}");
    }

    return $id;
}