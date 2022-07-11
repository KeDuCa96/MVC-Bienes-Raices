<?php

function DB() : mysqli {
    $DB = new mysqli('localhost', 'root', '1234', 'bienes_raices'); // usamos new msqli porque es la forma de POO
    $DB->set_charset("utf8"); 

    // Verificamos si se conectó a la BD
    if(!$DB){
        echo "No se puedo conectar a la BD";
        exit;
    }
    return $DB;
}