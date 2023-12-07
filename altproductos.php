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
$nombre_producto = isset($_POST['nombre_producto']) ? $_POST['nombre_producto'] : "";
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : "";
$Existencia = isset($_POST['Existencia']) ? $_POST['Existencia'] : "";


$sql = "INSERT INTO productos (nombre_producto, precio, modelo, Existencia ) VALUES ('$nombre_producto', '$precio', '$modelo','$Existencia')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:consulta6.php");
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