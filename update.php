

<?php
/**
php que actualiza un usuario-lucerito Alarcon
**/
require("include/BaseDatos.php");
require("include/config.php");

$mensaje ="";
if(isset($_POST['name']) || isset($_POST['username']) || isset($_POST['telefono']) || isset($_POST['mail']) || isset($_POST['password'])){
	if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['password']) && !is_null($_POST['name']) && !is_null($_POST['username']) && !is_null($_POST['telefono']) && !is_null($_POST['mail']) && !is_null($_POST['password'])){

$admin=0;

	if($_POST['formWheelchair'] == 'Yes')
		$admin=1;
	else
		$admin=0;

//$nombre="modificadoDenuveo";


$nombre=$_POST['name'];
$username=$_POST['username'];
$telefono=$_POST['telefono'];
$email=$_POST['mail'];
$password=$_POST['password'];

$sqlConsulta ="UPDATE `USUARIO` SET `nombre` = '".$nombre."',`username` = '".$username."',`telefono` = '".$telefono."',`correo` = '".$email."',`administrador` = '".$admin."' WHERE `codigoSeguridad` LIKE ".$password.";";

//$sqlConsulta ="UPDATE `USUARIO` SET `nombre` = '".$nombre."',`username` = '".$username."',`telefono` = '".$telefono."',`email` = '".$email."',`administrador` = '".$admin."'  WHERE `codigoSeguridad` LIKE ".$password.";";

$resultado = $db->ejecutarConsulta($sqlConsulta);

if($resultado){
	$error="SE ACTUALIZ0 USUARIO".$nombre.$username.$telefono.$email.$password.$resultado;
		header("Location:setAdmin.php?BIEN=$error");
}
else
{
	$error=$nombre.$username.$telefono.$email.$password.$admin."ERROR ACTUALIZANDO";
		header("Location:setAdmin.php?error=$error");
}



	}//if interno

}//if externo




?>
