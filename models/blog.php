<?php
namespace Model;

class Blog extends activeRecord {
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'imagen', 'tituloBlog', 'creadoBlog', 'vendedorid', 'descripcionBlog'];

     //Atributos
    public $id;
    public $imagen;
    public $tituloBlog;
    public $creadoBlog;
    public $vendedorid;
    public $descripcionBlog;

     //Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->tituloBlog = $args['tituloBlog'] ?? '';
        $this->creadoBlog = date('Y/m/d');
        $this->vendedorid = $args['vendedorid'] ?? '';
        $this->descripcionBlog = $args['descripcionBlog'] ?? '';
    }

    public function validar(){
        if(!$this->tituloBlog){
            self::$errores[] = "Por favor ingrese un titulo";
        }
        if(!$this->imagen){
            self::$errores[] = "Por favor ingrese una imagen";
        }
        if(!$this->descripcionBlog){
            self::$errores[] = "Por favor ingrese una descripcion";
        }
        if (!$this->vendedorid) {
            self::$errores[] = "Por favor eliga un vendedor";
        }

        return self::$errores;
    }
}