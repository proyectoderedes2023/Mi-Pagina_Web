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
$Nombre_proveedor = isset($_POST['Nombre_proveedor']) ? $_POST['Nombre_proveedor'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$dirección = isset($_POST['dirección']) ? $_POST['dirección'] : "";


$sql = "INSERT INTO proveedores (Nombre_proveedor, telefono, dirección ) VALUES ('$Nombre_proveedor', '$telefono', '$dirección')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:consulta7.php");
}else{
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son incorrecto);
  ";
}

  
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
?>