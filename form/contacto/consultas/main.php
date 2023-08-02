<?php
header('Content-Type: text/html; charset=UTF-8'); 
//Incluyo el archivo de sesion para impedir el acceso no autorizado a esta página.
require('sesion.php');
$nombreempleado=$_SESSION["empleado"];

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: SIGSA | SOLICITUDES | CONSULTA DE REGISTROS :.</title>

<meta charset="utf-8">
<meta name=viewport content="width=device-width, initial-scale=1.0, minimum-scale=0.5 maximum-scale=1.0">
 
<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.3.1.min.css">
<script src="js/static/jquery.js"></script>
<script src="js/static/jquery.mobile-1.3.1.min.js"></script>
<script src="js/login.js"></script>     
    
<script type = "text/javascript"> 
var tipoRegistro;

function mostrarInfo(idOrigen)
{
	if(idOrigen==0)
	{
		mostrarDatos(0);
		mostrarDescargar(0);
		return;
	}
	tipoRegistro=idOrigen;		
		
	if (window.XMLHttpRequest)
  	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{
		// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.onreadystatechange=function()
  	{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
    		document.getElementById("datos").innerHTML=xmlhttp.responseText;
    	}
		else
		{ 
			document.getElementById("datos").innerHTML='Cargando...';
    	}
  	}
	xmlhttp.open("POST","proceso.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("origen="+idOrigen);	
	mostrarDatos(1);
	mostrarDescargar(1);
}

function mostrarDescargar(opcion){
	if(opcion==1)
	{
 		document.getElementById('ocultoDescargar').style.display = 'block';
	}
	else
	{
		document.getElementById('ocultoDescargar').style.display = 'none';
	} 
}

function mostrarDatos(opcion){
	if(opcion==1)
	{
 		document.getElementById('datos').style.display = 'block';
	}
	else
	{
		document.getElementById('datos').style.display = 'none';
	}
}
</script>    

</head>
<body>
	<section id="login" data-role="page">
		<header data-role="header">
			<h1>.: SIGSA | SOLICITUDES | CONSULTA DE REGISTROS :.</h1>			
		</header>
	  <article data-role="content">
		
        <table width="100%">
			  <tr>
			    <td width="10%"></td>
			    <td width="80%">
                  <table style="width: 100%; height: 100%;">
			      <tbody>
			        <tr>
			          <td width="54%">&nbsp;</td>
			          <td width="10%" class="title3" style="vertical-align:bottom;"><img src="_assets/img/login.png"/> Usuario: </td>
                      <td width="36%" class="title4" style="vertical-align:bottom"><?php echo $nombreempleado; ?></td>
		            </tr>
		          </tbody>
		        </table>
                </td>
			    <td width="10%"></td>
	      </tr>
	    </table>
                 
		<table width="100%">
			  <tr>
			    <td width="10%"></td>
			    <td width="80%">
                  <table style="width: 100%; height: 100%;">
			      <tbody>
			        <tr>
			          <td width="35%" class="title1">Seleccione el Registro:</td>
			          <td width="30%">
                      	<form>
                            <select onchange="mostrarInfo(this.value)">
								<option value="0">Seleccionar</option>                            
								<option value="10">CONTACTO SIGSA</option>							
                            </select>
                        </form>
                      </td>
			          <td width="15%" class="title1"></td>
                      <td width="20%">
                      		<input type="button" name="btnSalir" id="btnSalir" value="Salir"/>
                      </td>
		            </tr>
		          </tbody>
		        </table>
                </td>
			    <td width="10%"></td>
	      </tr>
	    </table>
		<table width="100%">
	   		<tr>
	            <td width="10%"></td>
	            <td width="80%">
                	<div id="datos" style='display:none;'></div>                
                </td>
	            <td width="10%"></td>
          	</tr>
        </table>
        <table width="100%">
          <tr>
              <td width="10%"></td>
              <td width="80%">
              <table style="width: 100%; height: 100%;">
                <tbody>
                  <tr>
                    <td width="35%" class="title1">&nbsp;</td>                    
                    <td width="30%">
                    	<form id="formDescargar" name="formDescargar" method="post" action="excel.php" target="_blank">
                        <div  id="mainContent">
                            <center>
                                <div id='ocultoDescargar' style='display:none;'>
                                    <input type="submit" name="btnDescargar" id="btnDescargar" value="Descargar" />
                                </div> 	  
                            </center>
                        </div></form>
                    </td>
                    <td width="35%"></td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td width="10%"></td>
          </tr>
        </table>
          
          <div data-role="footer" data-id="persistent_navbar" data-position="fixed">
            <h1 class="title_footer">Sistemas de Información Geográfica, S.A de C.V. Copyright® <?php echo date('Y');?> Todos los Derechos Reservados.</h1>
            <h1 class="title_footer">San Francisco 1375 - 101 Col. Tlacoquemécatl del Valle C.P. 03200 | v.1.0</h1>
      	 </div>
      </article>
	</section>
</body>
</html>