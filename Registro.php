<?php
namespace ServicioInicio;
use RegistroDinamico\Controller\Init;
require_once("Autoloader.php"); 
echo "=======================================================";
echo "= Comenzo proceso  ";
$proceso  = new Init();
$proceso->start();
echo "= Termino proceso  "; 




