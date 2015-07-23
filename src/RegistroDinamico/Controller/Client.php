<?php
namespace RegistroDinamico\Controller;
use RegistroDinamico\Controller\Curl;
use RegistroDinamico\Controller\RegistroDinamico;
class Client {
	
	public function call(){
		 $curl 	  = new Curl();
		 $response = $curl->callUrlServer(); 
		 $this->prcResponse($response);
		 
	}
	public function prcResponse($response){
		$curl 	  = new Curl();
		$urls = @json_decode($response);
		//var_dump($urls->urls);
		//exit;
		if(!empty($urls) && isset($urls->urls) && $urls->estado==1) 
		{
			foreach ($urls->urls as $value) {
				echo "procesando : ".$value->url."\n"; 
				$curl->callCurl($value->url);
			}
			
		}	
		//
		
	}
}
