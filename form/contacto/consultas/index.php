<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>.: SIGSA | SOLICITUDES | CONSULTA DE REGISTROS :.</title>
	<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.3.1.min.css">
	<script src="js/static/jquery.js"></script>
	<script src="js/static/jquery.mobile-1.3.1.min.js"></script>
	<script src="js/login.js"></script>
</head>
<body>
	<section id="login" data-role="page">
		<header data-role="header">
			<h1>.: SIGSA | SOLICITUDES | CONSULTA DE REGISTROS :.</h1>
		</header>
		<article data-role="content
			<form id="form_login">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
		        <table style="width: 100%; height: 100%;">
		        	  <tbody>
		        	    <tr>
		        	      <td width="35%"></td>
		        	      <td width="30%"><div data-role="fieldcontain" class="ui-hide-label">		        	
		        	<!--<label for="txtuser">Usuario:</label>-->
		            <input type="text" name="txtuser" id="txtuser" value="" placeholder="Usuario" />
		        </div></td>
		        	      <td width="35%"></td>
	        	        </tr>
		        	    <tr>
		        	      <td></td>
		        	      <td></td>
		        	      <td></td>
	        	        </tr>
		        	    <tr>
		        	      <td></td>
		        	      <td ><div data-role="fieldcontain" class="ui-hide-label">
		        	<!--<label for="txtpassword">Contraseña:</label>-->
		            
		            <input type="password" name="txtpassword" id="txtpassword" value="" placeholder="Password" />
		        </div></td>
		        	      <td></td>
	        	        </tr>
		        	    <tr>
		        	      <td></td>
		        	      <td ><table width="100%">
		        	        <tr>
		        	          <td width="35%">&nbsp;</td>
		        	          <td width="35%"><input type="button" value="Aceptar" id="btnLogin" name="btnLogin"></td>
		        	          <td width="35%">&nbsp;</td>
	        	            </tr>
	        	          </table></td>
		        	      <td></td>
	        	        </tr>
	        	      </tbody>
	        	  </table>
		    </form>
		     <!--<div id="errorMsg" style="background-color:red;color: #FFFFFF;">Usuario o Contraseña no valida</div>-->
             <div data-role="footer" data-id="persistent_navbar" data-position="fixed">
                <h1 class="title_footer">Sistemas de Información Geográfica, S.A de C.V. Copyright® <?php echo date('Y');?> Todos los Derechos Reservados.</h1>
                <h1 class="title_footer">San Francisco 1375 - 101 Col. Tlacoquemécatl del Valle C.P. 03200 | v.1.0</h1>
             </div>
		</article>
	</section>
	<!-- Aqui nuestro dialog con el mensaje de error  -->
	<section id="pageError" data-role="dialog">
		<header data-role="header">
			<h1>Error</h1>
		</header>
		<article data-role="content">
			<p>Usuario o contraseña no válida</p>
			<a href="#" data-role="button" data-rel="back">Aceptar</a>
		</article>
	</section>
</body>
</html>
