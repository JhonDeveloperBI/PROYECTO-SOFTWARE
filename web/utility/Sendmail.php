<?php 
/*--------------------------------------------------------------------------------------------*/ 
require_once('PHPMailer/class.phpmailer.php'); //Patch a class.phpmailer.php 
include('PHPMailer/class.smtp.php'); //Patch a class.smtp.php 
/*------------------------------------------------------------------------------------------*/ 
class Sendmail{
//*********************CONFIG****************************// 

	private $nombreUsuario; //nombre del usuario al que se le envia el correo
	private $emailUsuario; //email del usuario al que se le envia el correo
	private $asunto; //Asunto del email
	private $emailApp; //Email desde el que se envia el correo
	private $passEmailApp; //contraseña del email desde el que se envia el correo
	private $nombreApp; //nombre de la aplicacion
	private $body; // $body contenido del mensaje

 //*******************Fin CONFIG*******************************//

	function __construct($nombreUsuario, $emailUsuario, $asunto, $emailApp, $passEmailApp, $nombreApp, $body)
	{
		$this->nombreUsuario = $nombreUsuario;
		$this->emailUsuario = $emailUsuario;
		$this->asunto = $asunto;
		$this->emailApp = $emailApp;
		$this->passEmailApp = $passEmailApp;
		$this->nombreApp = $nombreApp;
		$this->body = $body;

	}


	public function enviarMail(){

		$mail = new PHPMailer(); 
		$mail->setLanguage('es'); 
		/*------------------------------------------------------------------------------------------*/ 
		$host = 'smtp.gmail.com'; 
		$username = $this->emailApp ; 
		$password = $this->passEmailApp; 
		$port = 587; 
		$secure = 'tls'; 
		/*------------------------------------------------------------------------------------------*/ 
		/*------------------------------------------------------------------------------------------*/ 
		$mail->From = $this->emailApp; 
		$mail->FromName = $this->nombreApp; 
		$mail->addReplyTo($this->emailApp, $this->nombreApp); 
		$mail->isSMTP(); 
		$mail->Host = $host; 
		$mail->SMTPAuth = true; 
		$mail->Username = $username; 
		$mail->Password = $password; 
		$mail->Port = $port; 
		$mail->SMTPSecure = $secure; 
		/*------------------------------------------------------------------------------------------*/ 
		$mail->addAddress($this->emailUsuario, $this->nombreUsuario); 
		/*------------------------------------------------------------------------------------------*/ 
		$mail->isHTML(true); 
		$mail->CharSet = 'utf-8'; 
		$mail->setWordWrap = 70; 
		/*------------------------------------------------------------------------------------------*/ 
		$mail->Subject = $this->asunto; 
		$mail->Body = $this->body; 
		//$mail->MsgHTML($body); 
		$mail->AltBody = $this->body; //Texto plano por si no acepta correo html 
		/*------------------------------------------------------------------------------------------*/ 
		if($mail->Send()) { 
			return true;
		} else { 
			return false;
		} 
	}
}
?> 