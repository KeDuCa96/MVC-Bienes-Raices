<?php
namespace MVC;

Class Router {

    public $rutasGET =[];
    public $rutasPOST =[];

     public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        //debuguear($urlActual);
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            //debuguear($this);
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo 'ERROR 404';
        }
    }

        // Muestra una vista
    public function render($view, $datos = [] ){

        foreach($datos as $key => $value){
            $$key = $value; //$$ quiere decir variable de variable, mantiene el nombre, pero no pierde el valor. Una variable variable toma el valor de una variable y lo trata como el nombre de una variable.
        }

        ob_start(); // Inicia un almacenamiento en memoria
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // limpiamos la memoria
        include __DIR__ . "/views/layaout.php";        
    }
}