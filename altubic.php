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
$nombre_ubic = isset($_POST['nombre_ubic']) ? $_POST['nombre_ubic'] : "";
$codigo_postal = isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : "";
$region = isset($_POST['region']) ? $_POST['region'] : "";
$estado = isset($_POST['estado']) ? $_POST['estado'] : "";


$sql = "INSERT INTO ubicación (nombre_ubic, codigo_postal, region, estado  ) VALUES ('$nombre_ubic', '$codigo_postal', '$region', '$estado')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:consulta11.php");
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