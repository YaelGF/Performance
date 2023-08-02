<?php
//Inicio la sesión
session_start();
$_SESSION["contacto_valido"]=0;
$_SESSION["empleado"]="";

include 'conexion.php';
$con=conexion();

$usu = mysql_real_escape_string($_POST["usu"]);
$pass = mysql_real_escape_string($_POST["pass"]);

mysql_query("SET NAMES 'utf8'");
$sql = "SELECT Nombre FROM empleado_web e WHERE e.Usuario='$usu' AND e.Password='$pass'";

if ($resultado = mysql_query($sql, $con)){
	if (mysql_num_rows($resultado) > 0){		
		$_SESSION["contacto_valido"]=1;
		$fila=mysql_fetch_array($resultado);
		$_SESSION["empleado"]=$fila['Nombre'];
		echo true;		
	}
}
else{
	$_SESSION["contacto_valido"]=0;
	$_SESSION["empleado"]="";
	echo false;	
}
mysql_close($con);

?>