<?php
	header('Content-Type: text/html; charset=UTF-8');
	header("Content-Type: application/vnd.ms-excel");header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=SIGSA_Registros_Formulario_ID_10.xls");
?>
<HTML LANG="es">
<title>Exportación a Excel</title>
</head>
<body>
<?php 
	//Inicio la sesión
	session_start();
	$tipoOrigen = $_SESSION["tipoOrigen"];	
	include 'conexion.php';
	$con=conexion();
	mysql_query("SET NAMES 'utf8'");
	$result=mysql_query("call sp_getRegistrosForm('".$tipoOrigen."')",$con); 
?>

<table border=1 align="center" cellpadding="1" cellspacing="1">
 <tr>
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">ID Registro</span></td>
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Fecha de Registro</span></td> 
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Nombre Completo</span></td> 
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Correo</span></td>
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Número de Teléfono</span></td> 
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Nombre de la Empresa</span></td> 
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Comentario</span></td>
 <td  bgcolor="#002060"><span style="color:#FFFFFF; font-weight:bold; font-size: 10pt; text-align:center;">Origen</span></td>
</TR>

 <?php

while($row = mysql_fetch_array($result)) 
{
 printf("<tr>
 <td>%s</td>
 <td>%s</td>
 <td>%s</td>
 <td>%s</td>
 <td>%s</td>
 <td>%s</td>
 <td>%s</td>
 <td>%s</td> 
 </tr>", $row["ID_Registro"],$row["Fecha_Registro"],$row["Nombre"],$row["Correo"],$row["Telefono"],$row["Empresa"],$row["Mensaje"],$row["Origen"]);
 }
 
 mysql_free_result($result);
 
 //Cierra la Conexión
 mysql_close($con);
  
 ?>

</table>
</body>
</html>