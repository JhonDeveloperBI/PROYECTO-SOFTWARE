<?php
require_once("BaseDatos.php");

define("HOST", "sql212.byethost5.com");
define("PORT", 3306);
define("USER", "b5_19129423");
define("PASSWORD", "s123654");
define("BD", "b5_19129423_Fasty");
$db = new BaseDatos(HOST,PORT,USER,PASSWORD,BD);
//$db->ejecutarConsulta("set names'utf8'");
?>