<?php

//Inicio la sesión
session_start();
$variable=$_SESSION["contacto_valido"];

//Verifico si es un usuario autenticado
if ($variable !=1)
{	
	header("Location:index.php");	
	exit();
}

?>