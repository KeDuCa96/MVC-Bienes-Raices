<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){
        
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                    // Usuarios existe
                $resultado = $auth->existeUsuario();
                if(!$resultado) {
                    $errores = Admin::getErrores();
                }else{
                    // Verificar password
                
                    // Autenticar usuario
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout(){
        echo "desde logout";
    }
}