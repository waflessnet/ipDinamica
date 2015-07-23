<?php
namespace RegistroDinamico\Controller;

class BaseDatos
{
    protected $conexion;
    protected $db;
 
    public function __construct()
    {
        $this->conexion = mysql_connect(HOST, USER, PASS);
        if ($this->conexion == 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        $this->db = mysql_select_db(DBNAME, $this->conexion);
        if ($this->db == 0) DIE("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);
 	    @mysql_query("SET NAMES 'utf8'");
        return true;
 
    }
 
    public function desconectar()
    {
        if ($this->conexion) {
            mysql_close($this->conexion);
        }
 
    }
 
    	
    public function isCambioIp($ip,$servidor)
    {
        $query  =  mysql_query("SELECT ip FROM registro where servidor='$servidor' order by fechaIngreso desc limit 1", $this->conexion);
		$result =  mysql_fetch_array($query,MYSQL_ASSOC); 
		if(!$result){
			return true;
		} 
		 if (!empty($ip) && $ip != $result['ip']){
		 	return true;
		 }	
		 
		 return false; 
    }
	
	public function setIp($ip,$servidor){
		$sql = "INSERT INTO registro (ip,servidor) values  ('$ip','$servidor')";
		$query  = mysql_query($sql,$this->conexion); 
		return true;
	}
    public function getUrl($servidor){
    	 //$return = array();
    	 $query = mysql_query("SELECT url FROM servidor WHERE servidor='$servidor'",$this->conexion);
		 //var_dump("SELECT url FROM servidor WHERE servidor='$servidor'");
		 return $query;
		 
    }    
                
    
}