<?php
namespace ServicioInicio;
use RegistroDinamico\Controller\Client;
error_reporting(E_ALL);
ini_set('display_errors', 1);
// para server
define('HOST','xxxxxx');
define('USER','xxxxxx');
define('PASS','xxxxx');
define('DBNAME','xxxxx');
//echo "======================================================= <br>";
require_once("Autoloader.php"); 

$proceso  = new Client();
$proceso->call();
