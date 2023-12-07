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
$nombre_contactos = isset($_POST['nombre_contactos']) ? $_POST['nombre_contactos'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$dirección = isset($_POST['dirección']) ? $_POST['dirección'] : "";


$sql = "INSERT INTO contactos (nombre_contactos, telefono, dirección ) VALUES ('$nombre_contactos', '$telefono', '$dirección')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:consulta4.php");
}else{
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son incorrecto);
  ";
}
echo "imprimiendo nombre del cliente";

echo $nombre_contactos;

echo "imp tel";
echo $telefono;

echo "imp direc";
echo $dirección;

  
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
?>