<?php

namespace Controllers;

use MVC\Router;
use Model\Nosotros;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class NosotrosController
{
    public static function read(Router $router)
    {
        $nosotros = Nosotros::all();

        $mensaje = $_GET['mensaje'] ?? null;

        $router->render('nosotros/admin', [
            'nosotros' => $nosotros,
            'mensaje' => $mensaje

        ]);
    }

    public static function create(Router $router){
        $nosotros = new Nosotros($_POST);
        // Metodos
        $vendedor = Vendedores::all();
        $errores = Nosotros::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nosotros = new Nosotros($_POST['nosotros']);

            $nombreImagen = md5(uniqid(rand(), true)) . "jpg";
            if ($_FILES['nosotros']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['nosotros']['tmp_name']['imagen'])->fit(800, 600);
                $nosotros->setImagen($nombreImagen);
            }
            
            $errores = $nosotros->validar();

            if (empty($errores)) {
                //Creamos carpeta para imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                $image->save(CARPETA_IMAGENES . $nombreImagen);
                $nosotros->guardar();
            }
        }

        $router->render('nosotros/crear',[
            'nosotros' => $nosotros,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function update(Router $router){
        $id = validarIDurl('/admin');

        $nosotros = Nosotros::find($id);
        $errores = Nosotros::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['nosotros'];

            $nosotros->sincronizar($args);
            $errores = $nosotros->validar();

            $nombreImagen = md5(uniqid(rand(), true)).".jpg";
            if($_FILES['nosotros']['tmp_name']['imagen']){
                $image = Image::make($_FILES['nosotros']['tmp_name']['imagen'])->fit(800,600);
                $nosotros->setImagen($nombreImagen);
            }

            if(empty($errores)) {
                if($_FILES['nosotros']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES.$nombreImagen);
                }
                // Guardamos
                $nosotros->guardar();
            }

            $nosotros->guardar();

        }

        $router->render('/nosotros/actualizar', [
            'nosotros' => $nosotros,
            'errores' => $errores
        ]);
    }

    public static function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    if ($tipo === 'nosotros') {
                        $nosotros = Nosotros::find($id);
                        $nosotros->eliminar();
                    }
                }
            }
        }
    }
}