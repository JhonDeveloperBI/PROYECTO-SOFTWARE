<?php 
session_start();
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == true){
	if(!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($_GET['rate']) || !is_numeric($_GET['rate'])){
		header("Location:index.php");
	}else{
		require("include/BaseDatos.php");
		require("include/config.php");
		$id=$_GET['id'];
		$calificacion=$_GET['rate'];

		$sqlConsulta= "SELECT * FROM `Calificacion` WHERE `Usuario_idUsuario` = ".$_SESSION['id']." AND `Establecimiento_idEstablecimiento` = ".$id.";";
		$result1= $db->ejecutarConsulta($sqlConsulta);
		if($db->numeroFilas($result1) != 0){
			$sqlConsulta ="UPDATE `Calificacion` SET `estrellas` = '".$calificacion."' WHERE `Calificacion`.`Usuario_idUsuario` = ".$_SESSION['id']." AND `Calificacion`.`Establecimiento_idEstablecimiento` = ".$id.";";
		}else{
			$sqlConsulta = "INSERT INTO `Calificacion` (`estrellas`, `comentario`, `Usuario_idUsuario`, `Establecimiento_idEstablecimiento`) VALUES ('".$calificacion."', NULL, '".$_SESSION['id']."', '".$id."');";
		}
		$result1= $db->ejecutarConsulta($sqlConsulta);

		header("Location:ver.php?id=".$id."#rate");

	}
}
?>