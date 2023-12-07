<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renta_de_autos";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Conexion fallida: " . $conn->connect_error);
}
$Nombre_sucursal = isset($_POST['Nombre_sucursal']) ? $_POST['Nombre_sucursal'] : "";
$dirección = isset($_POST['dirección']) ? $_POST['dirección'] : "";
$horario = isset($_POST['horario']) ? $_POST['horario'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";


$sql = "INSERT INTO sucursal (Nombre_sucursal, dirección, horario, telefono  ) VALUES ('$Nombre_sucursal', '$dirección', '$horario', '$telefono')";


  
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
?>