<?php
namespace Controllers;

use Model\Propiedad;
use Model\Blog;
use Model\Nosotros;
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
    public static function nosotros(Router $router){
        $nosotros = Nosotros::all();

        $router->render('paginas/nosotros',[
            'nosotros' => $nosotros
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarIDurl('/propiedades');
        $propiedades = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedades' => $propiedades
        ]);
    }
    public static function blog(Router $router){
        $blog = Blog::all();

        $router->render('paginas/blog',[
            'blog' => $blog
        ]);
    }

    public static function entrada(Router $router){
        $id = validarIDurl('/blog');
        $blog = Blog::find($id);

        $router->render('paginas/entrada', [
            'blog' => $blog
        ]);
    }

    public static function contacto(Router $router){

        
        $router->render('paginas/contacto', [

        ]);
    }
}