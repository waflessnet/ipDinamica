<?php
namespace RegistroDinamico\Controller;
use RegistroDinamico\Controller\BaseDatos;
use RegistroDinamico\Controller\Curl;
class RegistroDinamico {
	private $db;
	private $curl;
	
	public function __construct(){
		$this->db   = new BaseDatos();
		$this->curl = new Curl(); 
	}
	
	public function  init(){
		$ip       = $_SERVER['REMOTE_ADDR'];
		$servidor = $_GET['server'];
		if($this->db->isCambioIp($ip,$servidor)){
			// ejecutamos proceso de actualizacion para los dominios asociados a la maquina	
			$this->procesoDns($ip,$servidor);
				
		}else{
			// solo guardamos
			$this->db->setIp($ip,$servidor);
		}
		return true;
	}
	public function procesoDns($ip,$servidor){
		$urlDns = $this->db->getUrl($servidor);
		
		foreach ($urlDns as  $url) {
		  $this->curl->callUrl($url['url']);	 
		}
		 $this->db->desconectar(); 
	}
	
}
