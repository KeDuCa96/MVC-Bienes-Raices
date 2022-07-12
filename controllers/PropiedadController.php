<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;

class PropiedadController {
    public static function index(Router $router){ // Pasamos el objeto router para no perder referencias.

        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function create(){
        echo "Crear propiedad";
    }

    public static function update(){
        echo "Actualizar propiedad";
    }
}