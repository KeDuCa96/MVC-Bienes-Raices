<!-- Este archivo ahora será nuestro archivo principal donde llamaremos funciones, clases  y BD -->

<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectamos la BD
$db = DB();

use App\activeRecord;

activeRecord::setDB($db);