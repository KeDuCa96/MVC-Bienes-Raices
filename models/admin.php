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

    public function validar(){
        if(!$this->email){
            self::$errores[] = 'El Email es obligatorio';
        }

        if(!$this->password){
            self::$errores[] = 'El Password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario(){
            //Revisar si el usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);
        //debuguear($query);
        if(!$resultado->num_rows){
            self::$errores[] = 'El usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);
        if(!$autenticado){
            self::$errores[] = 'El Password es incorrecto';
        }

        return $autenticado;
    }

    public function autenticar(){
        session_start();
            //completamos arreglo
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}