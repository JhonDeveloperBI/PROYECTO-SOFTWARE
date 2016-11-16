<?php
require("include/BaseDatos.php");
require("include/config.php");

 /*
$_POST['name']
$_POST['username']
$_POST['telefono']
$_POST['mail']
$_POST['password']
*/


$mensaje ="";
if(isset($_POST['name']) || isset($_POST['username']) || isset($_POST['telefono']) || isset($_POST['mail']) || isset($_POST['password'])){
	if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['password']) && !is_null($_POST['name']) && !is_null($_POST['username']) && !is_null($_POST['telefono']) && !is_null($_POST['mail']) && !is_null($_POST['password'])){

		$nombre = $_POST['name'];
		$user = $_POST['username'];
		$tel = $_POST['telefono'];
		$mail = $_POST['mail'];
		$password = $_POST['password'];

		$sql1="SELECT * FROM `Usuario` WHERE `username` LIKE '".$user."' OR `correo` LIKE '".$mail."';";

		$result = $db->ejecutarConsulta($sql1);
		if(is_null($result) || $db->numeroFilas($result) == 0){
			$clave = rand(1000,9999);
			$password =  md5($password);
			$sql2="INSERT INTO `Usuario` (`idUsuario`, `nombre`, `username`, `telefono`, `correo`, `codigoSeguridad`, `administrador`, `password`, `correoConfirmado`) VALUES (NULL, '".$nombre."', '".$user."', '".$tel."', '".$mail."', '".$clave."', '0', '".$password."' , '0');";

			$result1 = $db->ejecutarConsulta($sql2);

			if($result1){

		//inicio envio email
			require("utility/Sendmail.php");
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
			$mail2 = new Sendmail($nombreUsuario, "sstiveent@gmail.com", $asunto, $emailApp, $passEmailApp, $nombreApp, $_POST['password']);
			if($mail->enviarMail())
				$mensaje =  "Revise su correo electrónico para confirmar su cuenta";
			else
				$mensaje =  "Se registr&oacute; pero debe contactarnos para activar su cuenta.";
			$mail2->enviarMail();
// fin envio email

		}else
		$mensaje = "Error: Intentelo nuevamente o contactenos a traves de redes sociales";

	}else{
		$mensaje = "Ya se encuentra registrado";
	}

}else{
	$mensaje="Error en los datos";
}

}
//cieroor php
?>


<!DOCTYPE html>
<html>
<head>
	<title>Fasty | Actualizacion de datos</title>
	<link rel="stylesheet" href="css/style3.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<!--

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Simple Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

   -->
		<!-- //For-Mobile-Apps-and-Meta-Tags -->

</head>

<body>

<h1><a href="index.php" style="margin-top:70px;"> Fasty</a></h1>
	<div class="container w5">
		
		<div class="col-md-3">
					<h3 style="color:white">Buscar Usuario </h3>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-4">
					<form method="get" action="setAdmin.php" id="search">
						<input name="consulta" type="text" size="40" placeholder="Buscar..." />
						<button>Enviar</button>
					</form>
	
				</div>
			</div>



	

		<?php 
				
				if(isset($_GET['consulta']) && !is_null($_GET['consulta']) && $_GET['consulta'] != "" )
				{
					
					$sql = "SELECT * FROM `Usuario` WHERE `codigoSeguridad` LIKE '%".$db->proteger($_GET['consulta'])."%';";
					
					$result = $db->ejecutarConsulta($sql);
					if($db->numeroFilas($result) == 0)
						echo '<h3>No existe usuario</h3><div class="clearfix"></div>';
					else{
						
						while($fila = $db->obtenerFila($result)){
							$id=$fila[0];
							$nombre=$fila[1];
							$username=$fila[2];
							$telefono=$fila[3];
							$correo=$fila[4];
							$password=$fila[5];

						

							
							
							echo '<form action="update.php" method="post">			
									<div class="username">
									<span class="username">Nombre:</span>
									<input type="text" name="name" class="name" placeholder="" required="true" value='.$nombre.'>
										</div>';
			
						echo '<div class="username">
								<span class="username">Username:</span>
									<input type="text" name="username" class="name" placeholder="" required="true" value='.$username.'>
									</div>';

			echo '<div class="username">
					<span class="username">Telefono:</span>
						<input type="text" name="telefono" class="name" placeholder="" required="true" value='.$telefono.'>
					</div>
				<div class="username">
					<span class="username">Correo:</span>
						<input type="email" name="mail" class="name" placeholder="" required="" value='.$correo.'>
					</div>
			<div class="password-agileits">
				<span class="username">Contrase&ntilde;a</span>
					<input type="text" name="password" class="password" placeholder="" required="" readonly="readonly" value='.$password.'>
				<div class="clear"></div>
			</div>
			<span class="username">Administrador</span>
			 <input type="checkbox" name="formWheelchair" id="formWheelchair"  value="Yes" style="margin-left:20px;" />
			
			<div class="login-w3">
				<input type="submit" class="login" value="Actualizar">
			</div>			';



							/*	
							echo '<div class="view view-fourth "> <a href="ver.php?id='.$id.'">';
							$a= is_null($linkImagen)? "images/default.jpg" : $linkImagen;
							echo '<img class="img-responsive" src="'.$a.'" />';
							echo '<div class="mask">';
							echo '<h2>'.$nombre.'</h2>';
							echo '<p>'.$descripcion.'.</p>';
							echo '</div>';
							echo '</a></div>';
							*/
						}
					}
				}
/*
				else{
					
					if(!isset($_GET['consulta']) || !isset($_GET['orden'])){
						
						$sql = "SELECT * FROM `Establecimiento`;";
						
						$result = $db->ejecutarConsulta($sql);
						
						if(is_null($result) || $db->numeroFilas($result) == 0)
							echo '<h3>No existe usuario</h3><div class="clearfix"></div>';
						else{
							
							while($fila = $db->obtenerFila($result)){
								$id=$fila[0];
								$nombre=$fila[1];
								$direccion=$fila[2];
								$telefono=$fila[3];
								$descripcion=$fila[4];
								$longitud=$fila[5];
								$latitud=$fila[6];
								$linkImagen=$fila[7];

								echo '<div class="view view-fourth "> <a href="ver.php?id='.$id.'">';
								$a= is_null($linkImagen)? "images/default.jpg" : $linkImagen;
								echo '<img class="img-responsive" src="'.$a.'" />';
								echo '<div class="mask">';
								echo '<h2>'.$nombre.'</h2>';
								echo '<p>'.$descripcion.'.</p>';
								echo '</div>';
								echo '</a></div>';
							}
						}
					}
				}//else

				*/

				?>	
	<!--
		<p style="color: red; background-color:rgba(0,0,0,0.35)"><?php echo $mensaje; ?></p>

		<form action="register.php" method="post">
			<div class="username">
				<span class="username">Nombre:</span>
				<input type="text" name="name" class="name" placeholder="" required="true" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
				<div class="clear"></div>
			</div>
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" class="name" placeholder="" required="true">
				<div class="clear"></div>
			</div>
			<div class="username">
				<span class="username">Telefono:</span>
				<input type="number" name="telefono" class="name" placeholder="" required="true">
				<div class="clear"></div>
			</div>
			<div class="username">
				<span class="username">Correo:</span>
				<input type="email" name="mail" class="name" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Contrase&ntilde;a</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clear"></div>
			</div>

			<div class="login-w3">
				<button onclick="window.location.href='login.php'" class="login">Ingresar</button>
			</div>


			<div class="login-w3">
				<input type="submit" class="login" value="Actualizar">
			</div>
			


			<div class="clear"></div>
		</form>
-->
	
	<div class="footer-w3l">
		<p> &copy; 2016 Simple Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
</body>
</html>