<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renta de autos";

//nuevo algo que tengo que hacer despues.

//$idc= $_POST['caja_idcliente'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection fallida: " . $conn->connect_error);
}

// sql to delete a record. ademas cambiar las cosas
$sql = "DELETE FROM ciudad WHERE id_ciudad=8";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
  
