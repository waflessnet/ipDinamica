<?php
namespace ServicioInicio;
use RegistroDinamico\Controller\Client;
require_once("Autoloader.php"); 
$proceso  = new Client();
$proceso->call();
