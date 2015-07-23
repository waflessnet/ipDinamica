<?php
namespace ServicioInicio;
use RegistroDinamico\Controller\Init;
error_reporting(E_ALL);
ini_set('display_errors', 1);
// solo para pruebas.
define('HOST','172.16.2.13');
define('USER','prueba');
define('PASS','prueba');
define('DBNAME','prueba');
//echo "======================================================= <br>";
require_once("Autoloader.php"); 

//echo "= Comenzo proceso  <br>";
$proceso  = new Init();
$proceso->start();
//echo "<br>= Termino proceso  "; 




