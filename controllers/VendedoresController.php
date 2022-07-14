<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedores;

class VendedoresController{

    public static function read(Router $router){
        $vendedores = vendedores::all();

        $mensaje = $_GET['mensaje'] ?? null;

        $router->render('vendedores/vendedores', [
            'vendedores' => $vendedores,
            'mensaje' => $mensaje
        ]);
    }

    public static function create(Router $router){
        $vendedores = new Vendedores;
        $errores = Vendedores::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Nueva instancia
            $vendedores = new Vendedores($_POST['vendedores']);
            //validar
            $errores = $vendedores->validar();
            //No hay errores
            if (empty($errores)) {
                $vendedores->guardar();
            }
        }

        $router->render('vendedores/crear',[
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function update(Router $router){
        $id = validarIDurl('/vendedores');

        $vendedores = Vendedores::find($id);
        $errores = Vendedores::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Asignar valores
            $args = $_POST['vendedores'];
                // sincronizar
            $vendedores->sincronizar($args);
                //validacion
            $errores = $vendedores->validar();
                //verificamos que no tengamos errores
            if(empty($errores)){
                    //Guadramos
                $vendedores->guardar();
            }
        }
    
        $router->render('/vendedores/actualizar', [
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function delete(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
        
                if(validarTipoContenido($tipo)) {
                    //Compramos lo que vamos a eliminar
                    if($tipo === 'vendedor'){
                        $vendedor = vendedores::find($id);
                        $vendedor->eliminar();
                    }
                }
            }
        }
    }
}
