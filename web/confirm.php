<?php
require("include/BaseDatos.php");
require("include/config.php");
$sql="";
if(isset($_GET['account']) && isset($_GET['token']) && $_GET['account'] != "" && $_GET['token'] != ""){
	$cuenta = $_GET['account'];
	$token = $_GET['token'];
	$sql="SELECT `codigoSeguridad`, `correo`,  `idUsuario` FROM  `Usuario` WHERE  `username` LIKE  '".$cuenta."';";
	$result =$db->ejecutarConsulta($sql);
	$fila = $db->obtenerFila($result);

	$codeBase = $fila[0];
	$mailBase =$fila[1];
	$idBase =$fila[2];

	if($token == md5(sha1($mailBase).$codeBase)){
		$sqlU= "UPDATE  `Usuario` SET  `correoConfirmado` =  '1' WHERE  `Usuario`.`idUsuario` =".$idBase.";";
		if ($db->ejecutarConsulta($sqlU))
			header("Location: login.php?msg=<p style'color:green'>El email ha sido confirmado</p>");
		else
			header("Location: index.php?msg=dbError");

	}else{

		header("Location: index.php?msg=badCode");
	}

}else{
	header("Location: index.php?msg=badDat");
}
?>