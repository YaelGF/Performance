<?php
 header('Content-Type: text/html; charset=UTF-8'); 
?>

<?php
if (isset($_GET['origen'])) {
    $idOrigen = $_GET['origen'];    
}

//$idOrigen=1;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"> 
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script src="js/validator.js"></script>
	<script src="js/enable_mouse.js"></script>
	<title>Escríbanos, ¡queremos saber de usted!</title>	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="../../css/jquery.fancybox.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="../../css/owl.carousel.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="../../css/slit-slider.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="../../css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="../../css/main.css">

		
		<!-- Modernizer Script for old Browsers -->
		<script src="../../js/modernizr-2.6.2.min.js"></script>
		<!-- Main jQuery -->
        <script src="../../js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="../../js/bootstrap.min.js"></script>
		<!-- Single Page Nav -->
        <script src="../../js/jquery.singlePageNav.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="../../js/jquery.fancybox.pack.js"></script>
		<!-- jquery easing -->
        <script src="../../js/jquery.easing.min.js"></script>
        <!-- Fullscreen slider -->
        <script src="../../js/jquery.slitslider.js"></script>
        <script src="../../js/jquery.ba-cond.min.js"></script>
		<!-- onscroll animation -->
        <script src="../../js/wow.min.js"></script>
		<!-- Custom Functions -->
        <script src="../../js/main.js"></script>
</head>

<body id="body">
	<div>
		<div class="body-wrap">
			<div class="body">
				<section id="contact" >
					<div class="container">
						<div class="row">
							<form id="form1" action="php/sendData.php?origen=<?php echo $idOrigen?>" method="POST" enctype="multipart/form-data">
								
								<div class="col-md-7 contact-form wow animated fadeInLeft">
									<div class="col-center">
										<div class="input-field">
											<input tabindex="1" id="nombre" name="nombre" maxlength="200" type="text" class="form-control" value="<?php if (isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; } ?>" placeholder="Nombre...">
										</div>
										<div class="input-field">
											<input tabindex="2" id="correo" name="correo" maxlength="200" type="email" class="form-control" value="<?php if  (isset($_SESSION['correo'])){ echo $_SESSION['correo']; } ?>" placeholder="Correo...">
										</div>
										<div class="input-field">
											<input tabindex="3" id="asunto" name="asunto" maxlength="45" type="tel" class="form-control" value="<?php if (isset($_SESSION['asunto'])){ echo $_SESSION['asunto']; } ?>" placeholder="Asunto...">
										</div>
										<div class="input-field">
											<textarea tabindex="4" id="mensaje" name="mensaje" class="form-control" maxlength="9999" rows="1" cols="40" placeholder="Mensaje..." style="height: 50px;"></textarea>
										</div>
										<div class="input-field">
											<img src="captcha/captcha.php" style="width: 30%;!important;"/><br/>
											<input tabindex="5" id="captcha" type="text" size="12" name="captcha" class="form-control" placeholder="Código de seguridad"/>
										</div>
										<button tabindex="7" type="submit" name="submit" id="submit" class="btn btn-blue btn-effect">Enviar</button>
									
									</div>
									<div class="send-version">
										<p style="color: #fff;">
											v.1.0
										</p>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</body>
</html>