<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router){ // Pasamos el objeto router para no perder referencias.
        $propiedades = Propiedad::all();

        $mensaje = $_GET['mensaje'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'mensaje' => $mensaje
        ]);
    }

    public static function create(Router $router){

        $propiedad = new Propiedad;
        $vendedor = Vendedores::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);
            //Hasheamos la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . " .jpg";
            //Setear la imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                // resize(cortar y dar nuevo tamaño) a la imagen con intervention
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); // = llamamos la clase::funcion de intervention, buscamos el nombre en $_FILES y en el servidor->efecto(alto x ancho en pixeles); Este el archivo unico creado con intervention mas no el nombre.
                $propiedad->setImagen($nombreImagen); // le pasamos el nombre el nombre al atributo de imagen
            }

            $errores = $propiedad->validar();
            //Valiamos que no tengamos errores
            if (empty($errores)) {
                //creamos caperta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar imagen en servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); // save es funcion de intervention
                //Guardar base de datos
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function update(Router $router){
        $id = validarIDurl('/admin');

        $propiedad = Propiedad::find($id);
        $vendedor = Vendedores::all();
        $errores = Propiedad::getErrores();

        $router->render('/propiedades/actualizar',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);
    }
}
