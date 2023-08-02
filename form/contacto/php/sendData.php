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
	<script language="JavaScript" type="text/javascript">
		var pagina="";
		function redireccionar(pag){
			if(pag==1){				
				pagina="../index.php?origen=" + "<?php echo $idOrigen; ?>";
			}
			else{
				pagina="../success.php?origen=" + "<?php echo $idOrigen; ?>";
			}			
			location.href=pagina;
		}
	</script>
<?php

//Datos de correo
$email_SMTPDebug = 2;
$email_Debugoutput = 'html';
$email_SMTPAuth = true;

$email_SMTPAutoTLS = false; 
$email_SMTPSecure = "tls"; 

$email_Host = "oxmx.sigsa.com.mx";
$email_Port = 587;
$email_CharSet = 'UTF-8';

$email_Username = "info@sigsa.com.mx";
$email_Password = "Sigsa.2016";

//Datos de correo
/*$email_SMTPDebug = 0;
$email_Debugoutput = 'html';
$email_SMTPAuth = true; 
$email_SMTPSecure = "tls"; 
$email_Host = "ox13.sigsa.info";
$email_Port = 587;
$email_CharSet = 'UTF-8';

$email_Username = "francisco.lopez@sigsa.info";
$email_Password = "fXXU22";*/

//Datos de correo enviado
$to1=$email_Username;
$to2=$email_Username;
$to_user_req="";

$subject="IUCA [Contacto]";
$subject2="IUCA [Solicitud de Contacto]";

//Correo SMTP
date_default_timezone_set('America/Mexico_City');
require 'PHPMailerAutoload.php';

//Objeto correo #1
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = $email_SMTPDebug;
$mail->Debugoutput = $email_Debugoutput;
$mail->SMTPAuth = $email_SMTPAuth ;
$mail->SMTPAutoTLS = $email_SMTPAutoTLS; 
$mail->SMTPSecure = $email_SMTPSecure;
$mail->Host = $email_Host ;
$mail->Port = $email_Port;
$mail->CharSet = $email_CharSet;
$mail->Username = $email_Username;
$mail->Password = $email_Password;
$mail->IsHTML(true); 

//Objeto correo #2
$mail2 = new PHPMailer;
$mail2->isSMTP();
$mail2->SMTPDebug = $email_SMTPDebug;
$mail2->Debugoutput = $email_Debugoutput;
$mail2->SMTPAuth = $email_SMTPAuth ;
$mail2->SMTPAutoTLS = $email_SMTPAutoTLS; 
$mail2->SMTPSecure = $email_SMTPSecure;
$mail2->Host = $email_Host ;
$mail2->Port = $email_Port;
$mail2->CharSet = $email_CharSet;
$mail2->Username = $email_Username;
$mail2->Password = $email_Password;
$mail2->IsHTML(true); 
//Fin Correo SMTP

//Variables de registro
$idRegistro = 1;
$idTipoRegistro = 2;
//$idOrigen = 1;

if(isset($_POST['send']))
{
	session_start();
	
	//Para no perder los datos del form cuando se haga el rollback
	$_SESSION['nombre'] = $_POST['nombre'];	
	$_SESSION['correo']= $_POST['correo'];
	$_SESSION['asunto'] = $_POST['asunto'];
	$_SESSION['mensaje'] = $_POST['mensaje'];
		
	if(strtoupper($_REQUEST["captcha"]) == $_SESSION["captcha"] )
	{
		//Reemplazo el captcha usado por un texto largo para evitar que se vuelva a intentar
		$_SESSION["captcha"] = md5(rand()*time());

		//Inserta el código exitoso aquí
		$message=":)";
		$message2=":)";

		//Obtener el nombre y el mail de usuario
		$from = stripslashes($_POST['nombre'])."<".stripslashes($_POST['correo']).">";
		
		if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['asunto']) || empty($_POST['mensaje']))
		{
			$errors .= "\n Error: campos requeridos";
		}
		
		$nombre = strtoupper($_POST['nombre']);
		$correo = $_POST['correo'];
		$asunto = $_POST['asunto'];
		$mensaje = strtoupper($_POST['mensaje']);
		$to_user_req = $_POST['correo'];
		
		//Validamos email
		if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$correo))
		{
			$errors .= "\n Error: correo invalido";
		}

		//Generamos una cadena aleatoria para usarse como el limite del marker
		$mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
		
		//Enviamos el mensaje
		//Construimos el cuerpo del mensaje con las variables capturadas
		$message = "
		<p style='font-size:14px;font-family:Arial,sans-serif;color: #1679C5;'><strong>########### DATOS DE CONTACTO ###########</strong></p>
		<p style='font-size:12px;font-family:Arial,sans-serif;'><strong>Nombre: </strong>$nombre</p>
		<p style='font-size:12px;font-family:Arial,sans-serif;'><strong>Correo: </strong>$correo</p>
		<p style='font-size:12px;font-family:Arial,sans-serif;'><strong>Asunto: </strong>$asunto</p>
		<p style='font-size:12px;font-family:Arial,sans-serif;'><strong>Mensaje: </strong>$mensaje</p>
		<p></p>
		";

		$message2 = "			
		<p></p>
		<p><strong>Estimado(a), $nombre</strong></p>		
		<p></p>
		<p style='font-size:12px;font-family:Arial,sans-serif;'>El presente correo es para informarte que hemos recibido tu solicitud de Contacto.</p>
		<p style='font-size:12px;font-family:Arial,sans-serif;'>Revisaremos a detalle tu información, en breve nos pondremos en contacto.</p>
		<br>
		<p style='font-size:12px;font-family:Arial,sans-serif;'>Recibe un cordial saludo.</p>
		<br>
		<br>		
		<p></p>
		<p></p>
		<p style='color: #005596;'>INSTITUTO UNIVERSITARIO DE CIENCIAS AMBIENTALES</p>
		<p style='color: #808285;'>Vicente Guerrero # 33 | San Carlos El Encinal | C.P. 43760 | Santiango Tulantepec, Hgo.</p>
		<p style='color: #808285;'>T. (775) 1162 454 • 1162 451  C. 55 1353 3568 | Correo: website@iuca.info</p>";

		//Guardar datos en base de datos
		require_once 'funciones_bd.php';
		$db = new funciones_BD();
		
		//Asignar fecha de registro		
		$fecharegistro = date("Y-m-d H:i:s");
		
		if($db->addRegistro($idOrigen,$idTipoRegistro,$nombre,$correo,$telefono,$empresa,$mensaje,$fecharegistro))
		{	
			
			//Enviar correo
			$mail->setFrom($to1, $subject);
			$mail->addAddress($to2, $subject);
			$mail->Subject = $subject;
			$mail->Body = $message;

			if (!$mail->send()) 
			{
			    echo "Error al enviar el correo: " . $mail->ErrorInfo;

			    //Si el envio falló
				?>
					<script language="JavaScript" type="text/javascript">
						alert('Lo sentimos ha ocurrido un error en el envío del correo, \r\n por favor intente más tarde!');
						//redireccionar(1);
					</script>
				<?php
			} 
			else 
			{			    
			    //Enviar respuesta a usuario
			    $mail2->setFrom($to1, $subject2);
				$mail2->addAddress($to_user_req, $subject2);
				$mail2->Subject = $subject2;
				$mail2->Body = $message2;

				//Enviar correo de respuesta
				if (!$mail2->send()) 
				{
				    echo "Error al enviar el correo: " . $mail2->ErrorInfo;
				    //Si el envio falló
					?>
						<script language="JavaScript" type="text/javascript">
							alert('Lo sentimos ha ocurrido un error en el envío del correo \r\nde respuesta, por favor intente más tarde!');
							redireccionar(1);
						</script>
					<?php
				} 
				else 
				{				    
				    ?>
						<script language="JavaScript" type="text/javascript">
							//alert('Su solicitud ha sido enviada con éxito.');
							redireccionar(2);
						</script>
					<?php
				}
			}
		}
		else
		{
			?>
				<script language="JavaScript" type="text/javascript">
					alert('Lo sentimos ha ocurrido un error en el envío, \r\npor favor intente otra vez!');
					redireccionar(1);
				</script>
			<?php
		}
	}
	else
	{
		//Reemplazo el captcha usado por un texto largo para evitar que se vuelva a intentar
		$_SESSION["captcha"] = md5(rand()*time());
		
		//Inserta el código de error aquí
		?>
		<script language="JavaScript" type="text/javascript">
			alert('Lo sentimos ha insertado mal el código de seguridad, \r\npor favor vuelva a intentarlo.');
			redireccionar(1);
		</script>
		<?php
	}
}
?>