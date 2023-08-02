<link href="css/styles_tabla.css" rel="stylesheet" type="text/css" />
<?php
include 'conexion.php';
$con=conexion();
mysql_query("SET NAMES 'utf8'");
$res=mysql_query("call sp_getRegistrosForm('".$_POST['origen']."')",$con);

//Inicio la sesión
session_start();
$_SESSION["tipoOrigen"]=$_POST['origen'];

?>

<div id="table_div" style="overflow: scroll; width: 1200px; height: 350px; font-size: 12px;" >
<table border="1" id="rounded-corner">
 <tr>
     <th ><span>ID Registro</span></th>
     <th ><span>Fecha de Registro</span></th>
     <th ><span>Nombre Completo</span></th>
     <th ><span>Correo</span></th>
     <th ><span>Número de Teléfono</span></th>
     <th ><span>Nombre de la Empresa</span></th>
     <th ><span>Comentario</span></th>
      <th ><span>Origen</span></th>
 </tr>

 <?php while($fila=mysql_fetch_array($res))
 { 
	$Numero_Registros = $fila['TotalRegistros']; ?>

 <tr>
     <td><?php echo $fila['ID_Registro']; ?></td>
     <td><?php echo $fila['Fecha_Registro']; ?></td>
     <td><?php echo $fila['Nombre']; ?></td>
     <td><?php echo $fila['Correo']; ?></td>
     <td><?php echo $fila['Telefono']; ?></td>
     <td><?php echo $fila['Empresa']; ?></td>
     <td><?php echo $fila['Mensaje']; ?></td>
     <td><?php echo $fila['Origen']; ?></td>
 </tr>

 <?php } ?>

</table>
</div>

<?php $fila=mysql_fetch_array($res); ?>
<table width="100%">
	<tr>
		<td width="80%">
			<table style="width: 100%; height: 100%;">
				<tbody>
					<tr>
						<td width="30%" class="title1"># Registros: </td>
						<td width="20%"><?php echo $Numero_Registros; ?></td>
						<td width="30%"></td>
						<td width="20%"></td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>
<?php?>

<?php mysql_close($con); ?>
