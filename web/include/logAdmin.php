<?php
session_start();

if(!isset($_SESSION['logged']) || !isset($_SESSION['administrador']) || !$_SESSION['logged'] || $_SESSION['administrador'] != 1 ){
	session_destroy();
	header("Location: http://fasty.ml");
}
?>