<?php
namespace RegistroDinamico\Controller;
use RegistroDinamico\Controller\RegistroDinamico; 

class Init{
	
	public function start(){
			$Registro = new RegistroDinamico();
			$Registro->init();
	}
}
