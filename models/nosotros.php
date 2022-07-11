<?php

namespace App;

class Nosotros extends activeRecord{
    protected static $tabla = 'nosotros';
    protected static $columnasDB = ['id','imagen','tituloNosotros','descripcionNosotros','creadoNosotros'];

        //Atributos
    public $id;
    public $imagen;
    public $tituloNosotros;
    public $descripcionNosotros;
    public $creadoNosotros;
        //Constructor
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->tituloNosotros = $args['tituloNosotros'] ?? '';
        $this->descripcionNosotros = $args['descripcionNosotros'] ?? '';
        $this->creadoNosotros = date('Y/m/d');
    }

    public function validar(){
        if(!$this->tituloNosotros){
            self::$errores[] = "Por favor ingrese un titulo";
        }
        if(!$this->imagen){
            self::$errores[] = "Por favor ingrese una imagen";
        }
        if(!$this->descripcionNosotros){
            self::$errores[] = "Por favor ingrese una descripcion";
        }

        return self::$errores;
    }
}