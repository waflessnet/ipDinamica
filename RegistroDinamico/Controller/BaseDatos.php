<?php
namespace RegistroDinamico\Controller;

class BaseDatos
{
    protected $conexion;
    protected $db;
 
    public function _construct()
    {
        $this->conexion = mysql_connect(HOST, USER, PASS);
        if ($this->conexion == 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        $this->db = mysql_select_db(DBNAME, $this->conexion);
        if ($this->db == 0) DIE("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);
 
        return true;
 
    }
 
    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }
 
    }
 
    	
    public function isCambioIp($ip,$servidor)
    {
        $query  =  mysql_query("SELECT ip FROM registro where servidor='$servidor' order by id desc limit 1", $this->conexion);
		$result =  mysqli_fetch_array($query); 
		
		if(!$result){
			return true;
		} 
		 if (!empty($ip) && $ip != $result['ip']){
		 	return true;
		 }	
		 return false; 
    }
	
	public function setIp($ip,$servidor){
		$query  = @mysql_query("INSERT INTO registro (NULL,'$ip','$servidor',NULL)");
		return true;
	}
    public function getUrl($servidor){
    	
    	 $query = @mysql_query("SELECT url FROM servidor WHERE servidor='$servidor'");
		 return mysqli_fetch_array($query);
		 
    }    
                
    
}