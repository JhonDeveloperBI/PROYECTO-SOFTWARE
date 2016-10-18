	<?php


/*
$link=mysql_connect('127.0.0.1:3307', 'root', '12345');

	$db=mysql_select_db("software",$link);

	$sql="SELECT *from Establecimientos";

	$result=mysql_query($sql) or die(mysql_error());
 	
 	$row= mysql_num_rows ($result);


	$registros=array();
	$cadena='';

 $emparray = array();

 $i=0;

    while($row =mysql_fetch_assoc($result))
    {
        $emparray[$i] = $row;
        $i++;
    }
echo json_encode($emparray);

mysql_close($link);

*/

// Create connection
$conn = new mysqli("127.0.0.1:3307", "root", "12345","software");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *FROM Establecimientos";
$result = $conn->query($sql);

 $emparray = array();
 $i=0;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $emparray[$i]=$row;
      $i++;
    }
} else {
    echo "0 results";
}

echo json_encode($emparray);
$conn->close();


//	exit();


/*

 if ($row){ 

for ($i=0; $i <$row; $i++) {

$cadena.=mysql_result ($result,$i,"nombre").",".mysql_result ($result,$i,"direccion").",".mysql_result ($result,$i,"telefono").",".mysql_result ($result,$i,"descripcion").",".mysql_result ($result,$i,"hora").",".mysql_result ($result,$i,"UbicacionGps");

$registros[$i]=$cadena;

}//cierro for



 }

*/


	
?>

