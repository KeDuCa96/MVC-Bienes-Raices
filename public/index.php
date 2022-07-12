<?php 
//Este ahora sera nuestro arvhico principal. Aqui vamos a llamar nuestros archivos interos de nuestro View Controller, llamaremos algunas URL y los metodos que vamos a usar.
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/admin', 'funcion_admin');
$router->get('/nosotros', 'funcion_nosotros');
$router->get('/blog', 'funcion_blog');


$router->comprobarRutas();