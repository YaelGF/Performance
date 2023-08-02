<?php

function conexion()
{
	 $con = mysql_connect("192.168.100.164","pachuca","INTranet1Mysql");
	 if (!$con)
	 {
		die('Could not connect: ' . mysql_error());
	 }
	
	 mysql_select_db("sigsa_contacto", $con);
	 return($con);
}

?>