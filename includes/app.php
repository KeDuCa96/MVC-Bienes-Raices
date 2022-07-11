<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectamos la BD
$db = DB();

use Model\activeRecord;

activeRecord::setDB($db);