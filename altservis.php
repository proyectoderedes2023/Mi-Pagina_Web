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
$numero_servicio = isset($_POST['numero_servicio']) ? $_POST['numero_servicio'] : "";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$costos = isset($_POST['costos']) ? $_POST['costos'] : "";
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : "";


$sql = "INSERT INTO servicios (numero_servicio, tipo, costos, cliente  ) VALUES ('$numero_servicio', '$tipo', '$costos', '$cliente')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:consulta8.php");
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