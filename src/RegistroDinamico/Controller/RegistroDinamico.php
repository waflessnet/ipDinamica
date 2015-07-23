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
			$url = $this->procesoDns($ip,$servidor);
			$this->db->setIp($ip,$servidor);
			    echo json_encode(array('estado'=>1,'urls'=>$url));
			}else{
			// solo guardamos
			 	echo json_encode(array('estado'=>0));
			$this->db->setIp($ip,$servidor);
		}
		//end
		$this->db->desconectar();
		return true;
	}
	public function procesoDns($ip,$servidor){
		$urls = array();
		$urlDns = $this->db->getUrl($servidor);
		if(!$urlDns)
			return array();
		while ($fila = mysql_fetch_array($urlDns, MYSQL_ASSOC)) {
			   $urls[] = array('url'=>$fila['url']);
		 }
		return $urls;
	}
	
	
	
}
