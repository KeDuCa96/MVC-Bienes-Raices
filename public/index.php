<?php 
//Este ahora sera nuestro arvhico principal. Aqui vamos a llamar nuestros archivos interos de nuestro View Controller, llamaremos algunas URL y los metodos que vamos a usar.
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresController;
use Controllers\PaginasController;

$router = new Router();
    //Routs propiedades
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'create']);
$router->post('/propiedades/crear', [PropiedadController::class, 'create']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'update']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'update']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'delete']);
    //Routs vendedores
$router->get('/vendedores', [VendedoresController::class, 'read']);
$router->get('/vendedores/crear', [VendedoresController::class, 'create']);
$router->post('/vendedores/crear', [VendedoresController::class, 'create']);
$router->get('/vendedores/actualizar', [VendedoresController::class, 'update']);
$router->post('/vendedores/actualizar', [VendedoresController::class, 'update']);
$router->post('/vendedores/eliminar', [VendedoresController::class, 'delete']);
   // Estaticas, libres o publicas
$router->get('/',[PaginasController::class, 'index']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/propiedades',[PaginasController::class, 'propiedades']);
$router->get('/propiedad',[PaginasController::class, 'propiedad']);
$router->get('/blog',[PaginasController::class, 'blog']);
$router->get('/entrada',[PaginasController::class, 'entrada']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->post('/contacto',[PaginasController::class, 'contacto']);

$router->comprobarRutas();