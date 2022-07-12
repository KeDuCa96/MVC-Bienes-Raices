<?php
namespace MVC;

Class Router {

    public $rutasGET =[];
    public $rutasPOST =[];

     public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas(){
        
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        //debuguear($urlActual);
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo 'ERROR 404';
        }
    }

        // Muestra una vista
    public function render($view){

        ob_start(); // Inicia un almacenamiento en memoria
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // limpiamos la memoria
        include __DIR__ . "/views/layaout.php";        
    }
}