<?php

namespace Model;

class Nosotros extends activeRecord{
    protected static $tabla = 'nosotros';
    protected static $columnasDB = ['id','imagen','titulo','descripcion','creado'];

        //Atributos
    public $id;
    public $imagen;
    public $titulo;
    public $descripcion;
    public $creado;
        //Constructor
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Por favor ingrese un titulo";
        }
        if(!$this->imagen){
            self::$errores[] = "Por favor ingrese una imagen";
        }
        if(!$this->descripcion){
            self::$errores[] = "Por favor ingrese una descripcion";
        }

        return self::$errores;
    }
}