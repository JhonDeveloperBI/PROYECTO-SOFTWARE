<?php 
session_start();
if( isset($_SESSION['logged']) &&  $_SESSION['logged'] == true){
	if(!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($_POST['comentario']) || $_POST['comentario'] == ""){
		header("Location:index.php");
	}else{
		require("include/BaseDatos.php");
		require("include/config.php");
		$id=$_GET['id'];
		$comentario=$_POST['comentario'];

		$sqlConsulta= "SELECT * FROM `Calificacion` WHERE `Usuario_idUsuario` = ".$_SESSION['id']." AND `Establecimiento_idEstablecimiento` = ".$id.";";
		$result1= $db->ejecutarConsulta($sqlConsulta);
		if($db->numeroFilas($result1) != 0){
			$sqlConsulta ="UPDATE `Calificacion` SET `comentario` = '".$comentario."' WHERE `Calificacion`.`Usuario_idUsuario` = ".$_SESSION['id']." AND `Calificacion`.`Establecimiento_idEstablecimiento` = ".$id.";";
		}else{
			$sqlConsulta = "INSERT INTO `Calificacion` (`estrellas`, `comentario`, `Usuario_idUsuario`, `Establecimiento_idEstablecimiento`) VALUES (NULL, ".$comentario.", '".$_SESSION['id']."', '".$id."');";
		}
		$result1= $db->ejecutarConsulta($sqlConsulta);

		header("Location:ver.php?id=".$id."#coment");

	}
}
?>