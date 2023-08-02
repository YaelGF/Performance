<?php
	header('Content-Type: text/html; charset=UTF-8');	
?>
<HTML LANG="es">
<title>.: SIGSA | CONTACTO | CONSULTA DE REGISTROS :.</title>
</head>
<body>

<?php
	//Inicio la sesión
	session_start();
	$_SESSION["contacto_valido"]=0; 
	header("Location:index.php");	
	exit();
?>

</body>
</html>
