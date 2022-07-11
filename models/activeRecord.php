<?php

namespace Model;

class activeRecord {
    //? Data Base
    // La base de datos solo debemos instanciarla una vez para optimizar recursos.
    protected static $db; // Usamos Static porque si usamos varios objetos todos requieren la misma conexión.
    protected static $columnasDB = []; 
    protected static $tabla = ''; // ActiveRecord no se usa para hacer inserciones, tenemos que heredarlo siempre.

    // Validación o errores
    protected static $errores = [];

    //* Conectamos la BD 
    //Como es protectec solo podemos acceder desde la clase
    public static function setDB($dataBase) {
        self::$db = $dataBase; // Para hacer referencia a los atributos static usamos self, en los atributos static sí usamos el $
    }

    //? Guardar || Update
    public function guardar()
    {
        if (!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Creando nuevo registro
            $this->crear();
        }
    }

    //? Crear ||Create
    public function crear(){
        //Sanitizamos
        $atributos = $this->sanitizarAtributos();

        // query
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos)); //JOin crea un string apartir de un arreglo. Toma dos parametros, primero el arreglo y luego el arreglo
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";
        //debuguear($query);
        $resultado = self::$db->query($query); // Pasamos el query a la BD, usamo self porque es static y con la función flecha pasamos el query.

        // Mensaje de exito o errores
        if ($resultado) {
            // Redireccionamos
            header('Location: /admin?mensaje=1');
        }
    }

    public function actualizar(){
        //Sanitizamos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?mensaje=2');
        }
    }

    // Eliminar un registro
    public function eliminar(){
        // Delete propierti
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        //debuguear($query);
        $resultado = self::$db->query($query);
        //debuguear($query);
        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?mensaje=3');
        }
    }
    // Identificamos y unimos los atributos de la BD.
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) { // Recorremos las columnas
            if ($columna === 'id') continue; // Ignoramos el ID ya que no es necesario este se inserta solo siempre que creamos un nuevo registro. Continue = cuando se cumple la condición deja de ejectuar el if y sigue al siguiente elemento del foreach. Basicamente lo ignora y no lo agrega a atributos.
            $atributos[$columna] = $this->$columna; // unimos o asignamos los valores
        }
        return $atributos;
    }

    // Encargado de sanitizar
    public function sanitizarAtributos()
    {
        //Mapeamos las columnas con el objeto en memoria
        //Obtenemos atributos
        $atributos = $this->atributos();
        $sanitizado = [];

        // recorremos y sanitizamos
        foreach ($atributos as $key => $value) { // Recorremos. Es importante mantener la referencia de llave y del valor.
            //Sanitizamos
            $sanitizado[$key] = self::$db->escape_string($value); // Limpiamos la entrada. en POO solo usamos escape_string. Solo Sanitizamos los valores, no las llaves.
        }
        return $sanitizado;
    }

    // Subida de archivos
    public function setImagen($imagen){
        // Eliminar imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        // Asignamos al atributo imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Eliminar imanges
    public function borrarImagen()
    {
        //Comprobamos si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // validación
    public static function getErrores() { // seguimos la forma de get and set
        return static::$errores;
    }

    public function validar() {
        // Validamos el formulario
        static::$errores = []; //Siempre que validemos, limpiamos el arreglo y creamos nuevos errores.
        return static::$errores;
    }

    //? Read||Listar
    // Llistamos todas las propiedades
    public static function all(){
        $query = "SELECT * FROM ". static::$tabla; //Static hereda el metodo y va a buscar este atributo en la clase en la cual se este herdando. 
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Obtiene determinado numero de registo
    public static function get($cantidad){
        $query = "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad;  
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Buscar propiedades por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado); //Array_shift nos retorna el primer elemento de un arreglo
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultadoPropiedad = self::$db->query($query);

        //Iterar
        $array =  []; // Arreglo reutilizable
        while ($registroDB = $resultadoPropiedad->fetch_assoc()) {
            $array[] = static::crearObjeto($registroDB);
        }

        // Liberar memoria
        $resultadoPropiedad->free(); // podemos ignorar esto, pero ayudamos el servidor liberando memoria

        // Retornar
        return $array;
    }

    // convertimos de arreglos a obejtos ya que active records solo acepta objetos
    protected static function crearObjeto($registroDB)
    {
        $objeto = new static; // new static = Creamos un objeto en la clase que se esta heredando

        foreach ($registroDB as $key => $value) {
            if (property_exists($objeto, $key)) { //property_exists nos confirma que la propiedad exista. compara el objeto con su key.
                $objeto->$key = $value; // le asingamos los valores
            }
        }
        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario. El POST se va a encargar de leer el objeto que esta en memoria y va a ir mapenado cada una de las propieaades.
    public function sincronizar($args = [])
    {
        // Recorremos el arreglo en memoria($_POST) para asignarle valores 
        foreach ($args as $key => $value) {
            //Re escribimos los atributos
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value; //Usamos variable key porque sino seria un atributo de la case.
            }
        }
    }
}