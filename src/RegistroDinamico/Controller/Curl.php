<?php 
namespace RegistroDinamico\Controller;

class Curl {
	
	 public function callCurl($url,$agent=NULL){
	 	//echo $url."<br>";
		$agent = (!$agent)?'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)':$agent;
		
		$ch = \curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		return $result; 
	 }
	 
	 public function callUrlServer(){
	 	$url   = "http://172.16.1.177/registro/Registro.php?server=uno";
	 	$agent ='RegistroDinamico v0.1';
		
		$ch = \curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		return $result; 
	 }
}
