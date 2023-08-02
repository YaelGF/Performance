<?php
 header('Content-Type: text/html; charset=UTF-8'); 
?>

<?php

//Desactivar toda notificación de error
error_reporting(1);

if (isset($_GET['origen'])) {
    $idOrigen = $_GET['origen'];
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/template.css" type="text/css"/>
    <title>SIGSA | CONTACTO</title>
    
<script language="JavaScript" type="text/javascript">
	var pagina="index.php?origen=" + "<?php echo $idOrigen; ?>";
	function redireccionar() 
	{
		location.href=pagina;
	} 
	setTimeout ("redireccionar()", 2000);
</script>
</head>
<div class="root">	
    <body>
        <table style="width: 100%;">
			<tr>
				<td style="width: 35%;"></td>
				<td style="width: 30%;">
					<div>
						<div class="banner-wrap">
							<div class="banner_exitoso"></div>
						</div>			
					</div>
				</td>
				<td style="width: 35%;"></td>
			</tr>
		</table>
	</body>
</div>
</html>