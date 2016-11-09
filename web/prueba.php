<?php

$para      = 'sstiveent@gmail.com';
$titulo    = 'Fasty - Confirma tu cuenta';
$mensaje   = 'Bienvenido a fasty, haz click en el siguiente enlace para confirmar tu cuenta';
$cabeceras = 'From: webmaster@fasty.ml' . "\r\n" .
    'Reply-To: webmaster@fasty.ml' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

echo mail($para, $titulo, $mensaje, $cabeceras);
?>