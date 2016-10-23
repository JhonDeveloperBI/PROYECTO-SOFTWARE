<?php

$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$hora=$_POST['hora'];
$ubicacion=$_POST['ubicacion'];
$descripcion=$_POST['descripcion'];




if(empty($nombre) == FALSE && empty($direccion) == FALSE && empty($telefono) == FALSE && empty($hora) == FALSE&&empty($ubicacion) == FALSE&&empty($descripcion) == FALSE)
{
// Create connection
$conn = new mysqli("127.0.0.1:3307", "root", "12345","software");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = 'INSERT INTO Establecimientos (nombre,direccion,telefono,descripcion,hora,UbicacionGps,Administrador) VALUES("'.$nombre.'", "'.$direccion.'", "'.$telefono.'","'.$descripcion.'","'.$hora.'","'.$ubicacion.'","1" )';
$result = $conn->query($sql);

if($result)
{
echo '<script type="text/javascript">alert("la acción ha sido llevada a cabo con éxito ");</script>';
echo "<script>location.href='regitrarEstablecimientos.php'</script>";
}
else
{
echo '<script type="text/javascript">alert("Ha ocurrido un error");</script>';
echo "<script>location.href='regitrarEstablecimientos.php'</script>";

}
$conn->close();
}//if
else
echo "verifique todos los elementos";



?>