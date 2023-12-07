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
$nombre_empleado = isset($_POST['nombre_empleado']) ? $_POST['nombre_empleado'] : "";
$salario = isset($_POST['salario']) ? $_POST['salario'] : "";
$dirección = isset($_POST['dirección']) ? $_POST['dirección'] : "";


$sql = "INSERT INTO empleados (nombre_empleado, salario, dirección ) VALUES ('$nombre_empleado', '$salario', '$dirección')";


  
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
?>