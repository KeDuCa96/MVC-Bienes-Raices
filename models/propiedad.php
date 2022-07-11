<?php

namespace Model;

// Heredamos
class Propiedad extends activeRecord {

    // BD
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorid'];

    // Atributos
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorid;
    
    //Contrstuctor
    public function __construct($args = []) {
        // Los atributos public hacemos referencia con $this->
        $this->id = $args['id'] ?? NULL; //Si esta vacio el titulo, será un string vacio
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorid = $args['vendedorid'] ?? 1;
    }

        public function validar(){
        // Validamos el formulario
        if (!$this->titulo) {
            self::$errores[] = "Por favor ingrese un titulo a propiedad";
        }
        if (!$this->precio) {
            self::$errores[] = "Por favor ingrese el precio de la propiedad";
        }
        if (strlen(!$this->descripcion) >= 50) {
            self::$errores[] = "Por favor ingrese la descripción de la propiedad. Mínimo 50 caracteres.";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Por favor ingrese la cantidad de habitaciones";
        }
        if (!$this->wc) {
            self::$errores[] = "Por favor ingrese la cantidad de baños";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Por favor ingrese la cantidad de es estacionamientos";
        }
        if (!$this->vendedorid) {
            self::$errores[] = "Por favor eliga un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "Por favor agregue una imagen";
        }

        return self::$errores;
    }
}
