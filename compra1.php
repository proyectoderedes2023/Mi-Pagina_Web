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
$tipo_compra = isset($_POST['tipo_compra']) ? $_POST['tipo_compra'] : "";
$modelo_carro = isset($_POST['modelo_carro']) ? $_POST['modelo_carro'] : "";
$tipo_pago = isset($_POST['tipo_pago']) ? $_POST['tipo_pago'] : "";
$monto = isset($_POST['monto']) ? $_POST['monto'] : "";


$sql = "INSERT INTO compras (tipo_compra, modelo_carro, tipo_pago, monto ) VALUES ('$tipo_compra', '$modelo_carro', '$tipo_pago', '$monto')";
if($sql){
  echo"<scrpt lenguaje='JavaScript'>
  alert(''Los datos son correctos);
  ";
  header("Location:servicios.html");
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