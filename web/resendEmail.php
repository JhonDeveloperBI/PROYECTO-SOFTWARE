<?php
require("include/BaseDatos.php");
require("include/config.php");
require("utility/Sendmail.php");
if(isset($_GET['mail']) && $_GET['mail'] != "")
{
	$email = $_GET['mail'];

	$sql="SELECT `codigoSeguridad`, `username`, `nombre` FROM  `Usuario` WHERE  `correo` LIKE  '".$email."';";
	$result =$db->ejecutarConsulta($sql);
	echo $db->numeroFilas($result);
	if($db->numeroFilas($result) == 1){
		$fila = $db->obtenerFila($result);
		$clave = $fila[0];
		$user = $fila[1];
		$nombre = $fila[2];
		$mail = $email;


			$nombreUsuario = $nombre; //nombre del usuario al que se le envia el correo
			$emailUsuario = $mail; //email del usuario al que se le envia el correo
			$asunto = "CONFIRMA TU CUENTA"; //Asunto del email
			$emailApp ='fastyapp@gmail.com'; //Email desde el que se envia el correo
			$passEmailApp = 'st123654'; //contraseña del email desde el que se envia el correo
			$nombreApp = "Fasty App"; //nombre de la aplicacion
				// $body contenido del mensaje
			$body = "<br><br> 
			<h2><strong> Bienvenido a Fasty</strong></h2></br>
			<h4>Haga click en el siguiente en enlace para confirmar su correo http://fasty.ml/confirm.php?account=".$user."&token=".md5(sha1($mail).$clave)."
				<br> Su clave para cualquier modificaci&oacute;n es: ".$clave.". ¡No la olvide!
			</h4>
			<br>"; 

				// ($nombreUsuario, $emailUsuario, $asunto, $emailApp, $passEmailApp, $nombreApp, $body)
			$mail = new Sendmail($nombreUsuario, $emailUsuario, $asunto, $emailApp, $passEmailApp, $nombreApp, $body);
			if($mail->enviarMail())
				header("Location: login.php?msg=<p style'color:green;'>Se envio el correo nuevamente</p>");
			else
				header("Location: login.php?msg=Error al enviar el email");


		}else
		header("Location: index.php");
	}else
	header("Location: index.php");

	?>