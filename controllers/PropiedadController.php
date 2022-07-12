<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;

class PropiedadController {
    public static function index(Router $router){ // Pasamos el objeto router para no perder referencias.

        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function create(Router $router){

        $propiedad = new Propiedad;
        $vendedor = Vendedores::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            debuguear('HOLA');
        }

        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedor
        ]);
    }

    public static function update(){
        echo "Actualizar propiedad";
    }
}