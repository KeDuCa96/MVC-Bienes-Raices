<?php

namespace Controllers;

use MVC\Router;
use Model\Blog;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController {
    public static function create(Router $router){
        $blog = new Blog;
        $vendedor = Vendedores::all();
        $errores = blog::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $blog = new blog($_POST['blog']);
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";

            if($_FILES['blog']['tmp_name']['imagen']){
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }

            $errores = $blog->validar();

            if(empty($errores)){
                //creamos caperta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar imagen en servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); // save es funcion de intervention
                //Guardar base de datos
                $blog->guardar();
            }
        }

        $router->render('blog/crear', [
            'blog' => $blog,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function read(Router $router){
        $blog = blog::all();

        $mensaje = $_GET['mensaje'] ?? null;

        $router->render('blog/admin', [
            'blog' => $blog,
            'mensaje' => $mensaje
        ]);
    }
    public static function update(Router $router){
        $id = validarIDurl('/admin');

        $blog = Blog::find($id);
        $vendedor = Vendedores::all();
        $errores = blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['blog'];

            $blog->sincronizar($args);
            $errores = $blog->validar();

            $nombreImagen = md5(uniqid(rand(), true)).".jpg";
            if($_FILES['blog']['tmp_name']['imagen']){
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }

            if(empty($errores)) {
                if($_FILES['blog']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES.$nombreImagen);
                }
                // Guardamos
                $blog->guardar();
            }
        }

        $router->render('/blog/actualizar', [
            'blog' => $blog,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id =$_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {

                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    if($tipo === 'blog'){
                        $blog = Blog::find($id);
                        $blog->eliminar();
                    }
                }
            }
        }    
    }

}