<?php

namespace Model;

class Admin extends activeRecord {
    
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password', 'rol'];

     //Atributos
    public $id;
    public $email;
    public $password;
    public $rol;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->rol = $args['rol'] ?? '';
    }
}