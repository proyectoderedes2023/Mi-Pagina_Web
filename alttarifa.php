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
$id_auto = isset($_POST['id_auto']) ? $_POST['id_auto'] : "";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$costos = isset($_POST['costos']) ? $_POST['costos'] : "";


$sql = "INSERT INTO tarifa (id_auto, tipo, costos ) VALUES ('$id_auto', '$tipo', '$costos')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:consulta10.php");
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