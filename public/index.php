<?php 
//Este ahora sera nuestro arvhico principal. Aqui vamos a llamar nuestros archivos interos de nuestro View Controller, llamaremos algunas URL y los metodos que vamos a usar.
require_once __DIR__ . '/../includes/app.php';

use Controllers\BlogController;
use Controllers\LoginController;
use Controllers\NosotrosController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresController;
use Controllers\PaginasController;

$router = new Router();
        // Privadas
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
    //Routes Blog
$router->get('/adminblog', [BlogController::class, 'read']);
$router->get('/blog/crear', [BlogController::class, 'create']);
$router->post('/blog/crear', [BlogController::class, 'create']);
$router->get('/blog/actualizar', [BlogController::class, 'update']);
$router->post('/blog/actualizar', [BlogController::class, 'update']);
$router->post('/blog/eliminar', [BlogController::class, 'delete']);
    //Routes Blog
$router->get('/adminNosotros', [NosotrosController::class, 'read']);
$router->get('/nosotros/crear', [NosotrosController::class, 'create']);
$router->post('/nosotros/crear', [NosotrosController::class, 'create']);
$router->get('/nosotros/actualizar', [NosotrosController::class, 'update']);
$router->post('/nosotros/actualizar', [NosotrosController::class, 'update']);
$router->post('/nosotros/eliminar', [NosotrosController::class, 'delete']);


       // Estaticas, libres o publicas
$router->get('/',[PaginasController::class, 'index']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/propiedades',[PaginasController::class, 'propiedades']);
$router->get('/propiedad',[PaginasController::class, 'propiedad']);
$router->get('/blog',[PaginasController::class, 'blog']);
$router->get('/entrada',[PaginasController::class, 'entrada']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->post('/contacto',[PaginasController::class, 'contacto']);

        // Login y autenticacion
$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);

$router->comprobarRutas();