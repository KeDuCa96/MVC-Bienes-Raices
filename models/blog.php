<?php
namespace Model;

class Blog extends activeRecord {
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'imagen', 'titulo', 'creado', 'vendedorid', 'descripcion'];

     //Atributos
    public $id;
    public $imagen;
    public $titulo;
    public $creado;
    public $vendedorid;
    public $descripcion;

     //Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorid = $args['vendedorid'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
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
        if (!$this->vendedorid) {
            self::$errores[] = "Por favor eliga un vendedor";
        }

        return self::$errores;
    }
}