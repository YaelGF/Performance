<?php
 header('Content-Type: text/html; charset=UTF-8'); 
?>
<?php
 
class funciones_BD 
{ 
    private $db;
 
    //Constructor
    function __construct() 
	{
        require_once 'connectbd.php';
		
		//Connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    //Destructor
    function __destruct() 
	{
 
    }
 
    /**
     * Agregar registro de evento
     */
    public function addRegistro($idOrigen,$idTipoRegistro,$Nombre,$Correo,$Telefono,$Empresa,$Mensaje,$FechaRegistro) 
	{
		mysql_query("SET NAMES 'utf8'");
		
		//$result = mysql_query("INSERT INTO contacto_web(idOrigen,idTipoRegistro,Nombre,Correo,Telefono,Empresa,Mensaje,FechaRegistro) VALUES('$idOrigen','$idTipoRegistro','$Nombre','$Correo','$Telefono','$Empresa','$Mensaje','$FechaRegistro')");

        $result = true;
		
        if ($result) 
		{
            return true;
        } 
		else 
		{
            return false;
        }
    } 
 
	/**
     * Recuperar Nombre de Origen
     */
    public function origen($idOrigen) 
	{
		mysql_query("SET NAMES 'utf8'");		
        $result = mysql_query("SELECT Descripcion from origen_web WHERE idOrigen=$idOrigen");

		$evento="";
		
		if (mysql_num_rows($result) > 0){
			$fila=mysql_fetch_array($result);
			$evento=$fila['Descripcion'];
		}
		
		return $evento;	
    }
}
 
?>
