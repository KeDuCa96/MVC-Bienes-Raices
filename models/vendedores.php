<?php

namespace Model;

// Heredamos
class Vendedores extends activeRecord {
    //BD
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];
    
    // Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    //Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? NULL; 
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        // Validamos el formulario
        if (!$this->nombre) {
            self::$errores[] = "Por favor ingrese un nombre";
        }

        if (!$this->apellido) {
            self::$errores[] = "Por favor ingrese un apellido";
        }

        if (!$this->telefono) {
            self::$errores[] = "Por favor ingrese un telefono";
        }
        
        if(!preg_match('/[0-9]{9}/', $this->telefono) or strlen($this->telefono) > 10) { // Expresion regular (busca un patron dentro de un texto)
            self::$errores[] = "Formato no valido";
        }

        return self::$errores;
    }
}