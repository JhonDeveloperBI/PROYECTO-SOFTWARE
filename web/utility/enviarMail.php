<?php 

//COPIAR ESTE CODIGO DONDE SE NECESITE ENVIAR EMAIL, SE REEMPLAZAN LOS VALORES DE LAS VARIABLES Y LISTO
require("Sendmail.php");
$nombreUsuario = "stivencito"; //nombre del usuario al que se le envia el correo
$emailUsuario = "sstiveent@gmail.com"; //email del usuario al que se le envia el correo
$asunto = "este es el correo"; //Asunto del email
$emailApp ='fastyapp@gmail.com'; //Email desde el que se envia el correo
$passEmailApp = 'st123654'; //contraseña del email desde el que se envia el correo
$nombreApp = "Fasty"; //nombre de la aplicacion
	// $body contenido del mensaje
$body = "<br><br> 
<h2><strong> Bienvenido a Fasty</strong></h2></br>
<h4>haga click en el siguiente en enlace para confirmar su correo rubbias19.com
	<br>"; 

	// ($nombreUsuario, $emailUsuario, $asunto, $emailApp, $passEmailApp, $nombreApp, $body)
 $mail = new Sendmail($nombreUsuario, $emailUsuario, $asunto, $emailApp, $passEmailApp, $nombreApp, $body);
 if($mail->enviarMail())
 	echo "sizas";
 else
 	echo "nonas";



?>