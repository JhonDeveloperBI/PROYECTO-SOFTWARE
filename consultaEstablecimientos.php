	<?php


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


	
?>

