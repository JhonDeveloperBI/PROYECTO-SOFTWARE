<?php


session_start();
if (isset($_SESSION['logged']))
{
	if ($_SESSION['logged'] == true)
	{
		header("location: index.php");
	}
}

/**
$_POST['username'];
$_POST['password'];
**/
require("include/BaseDatos.php");
require("include/config.php");
if(isset($_GET['msg']))
	$mensaje=$_GET['msg'];
else
	$mensaje ="";
if (isset($_POST['username']) || isset($_POST['password'])){
	if (isset($_POST['username']) && isset($_POST['password']) && !is_null($_POST['username']) && !is_null($_POST['password']) && $_POST['username'] != "" && $_POST['password'] != ""){

		$password = md5($_POST['password']);
		$user = $_POST['username'];

		$sql="SELECT * FROM `Usuario` WHERE `username` LIKE '".$user."' OR `correo` LIKE '".$user."';";
		$result = $db->ejecutarConsulta($sql);
		if(!is_null($result) && $db->numeroFilas($result) != 0){
			$fila =  $db->obtenerFila($result);


			if(strcmp($password, $fila[7])== 0){

				if($fila[8] == 1){
					$_SESSION['id'] = $fila[0];
					$_SESSION['nombre'] = $fila[1];
					$_SESSION['username'] = $fila[2];
					$_SESSION['administrador'] = $fila[6];
					$_SESSION['correoConfirmado']= $fila[8];
					$_SESSION['logged']=true;
					if( $fila[6] == 1)
						header("Location: admin/index.php");
					else
						header("Location: index.php");	
				}else{
					$mensaje = "Por favor confirme su email<br>
					Haz click <a href='resendEmail.php?mail=".$fila[4]."' >aqu&iacute;</a>  para reenviar el email";
				}

			}else
			$mensaje = "Correo o contraseña incorrecta";
			


		}else
		$mensaje="Correo o contraseña incorrecta";

	}else
	$mensaje="complete los datos";

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Fasty | Login</title>
	<link rel="stylesheet" href="css/style3.css">

	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<!-- For-Mobile-Apps-and-Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Simple Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps-and-Meta-Tags -->

</head>

<body>
	<h1><a href="index.php"> Fasty</a></h1>
	<div class="container w3">
		<h2>Login </h2>
		<form action="login.php" method="post">
			<p style="color: red; background-color:rgba(0,0,0,0.35)"><?php echo $mensaje;?></p>
			<div class="username">
				<span class="username">Correo o Usuario:</span>
				<input type="text" name="username" class="name" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Contrase&ntilde;a</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clear"></div>
			</div>

			<div class="login-w3">
				<input type="submit" class="login" value="Login">
			</div>
			<div class="clear"></div>
		</form>
	</div>
	<div class="footer-w3l">
		<p> &copy; 2016 Simple Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
</body>
</html>