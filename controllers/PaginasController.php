<?php
namespace Controllers;

use Model\Propiedad;
use Model\Blog;
use MVC\Router;

class PaginasController {
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $blog = Blog::get(2);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'blog' => $blog,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(){
        echo 'nosotros';
    }
    public static function propiedades(){
        echo 'propiedades';
    }
    public static function propiedad(){
        echo 'propiedad';
    }
    public static function blog(){
        echo 'blog';
    }
    public static function entrada(){
        echo 'entrada';
    }
    public static function contacto(){
        echo 'contacto';
    }
}