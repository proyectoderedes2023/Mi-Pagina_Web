<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renta_de_autos";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id_ubicacion,nombre_ubic, codigo_postal, region, estado FROM ubicación WHERE id_ubicacion >=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="consulta.css">
  </head>
  <body>
  <header>
    <div class="interior">"
        <a href="index.html" class="logo"><img src="regreso.png" alt=""></a>
        <a href="index.html" class="logo"><img src="alquil.png" alt=""></a>
        <nav class="navegacion">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="servicios.html">Servicios</a></li>
            <li class="submenu"><a href="familiares.html">Productos</a>
               <ul class="hijos">
                <li><a href=""></a>Autos Familiares</li>
                <li><a href=""></a>Autos de lujo</li>
                <li><a href=""></a>Autos deportivos</li>
               </ul> 
            </li>
            <li><a href="Login.html">Administradores</a></li>
        </ul>
        </nav>
    </div>
 </header> 
 <div id="header">
  <ul class="nav">
   
    <li><a href="consulta1.php">Atras</a></li>

    <li><a href="#">Altas</a>
    <ul>
    <li><a href="consulta1.php">Consulta Ciudad</a></li>
    <li><a href="consulta2.php">Consulta Cliente</a></li>
    <li><a href="consulta3.php">Consulta Compras</a></li>
    <li><a href="consulta4.php">Consulta Contactos</a></li>
    <li><a href="consulta5.php">Consulta Empledos</a></li>
    <li><a href="consulta6.php">Consulta Productos</a></li>
    <li><a href="consulta7.php">Consulta Proovedores</a></li>
    <li><a href="consulta8.php">Consulta Servicio</a></li>
    <li><a href="consulta9.php">Consulta Sucursal</a></li>
    <li><a href="consulta10.php">Consulta Tarifa</a></li>
    <li><a href="consulta11.php">Consulta Ubicacion</a></li>
    <li><a href="consulta12.php">Consulta Usuario</a></li>
    </ul>
    </li>
  </ul>
  </div>  
    <div class="table-container">
      <div class="tools">
        
      <i class="material-icons"><a href="alta11.html"><img src="agregar.png" width="40" height="40"></a></i>
        </button>
      </div>
  <table border="1">
<tr>
<th>Id Ubicacion</th>
<th>Nombre de ubicacion</th>
<th>Codigo Postal</th>
<th>Region</th>
<th>Estado</th>
<th>Eliminar</th>
<th>Modificar</th>
</tr>
  <?php
    if (isset($_REQUEST['id_ubicacion']))
    {
       $recuperada=$_REQUEST['id_ubicacion'];
      //echo$recuperada;
  
  
      $sql = "DELETE FROM ubicación WHERE id_ubicacion=".$recuperada;
      if($recuperada){
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
      echo "Record deleted successfully";
      } else {
      echo "Error deleting record: " . $conn->error;
      }
    }
  while($row = mysqli_fetch_assoc($result)) {
    echo"<tr>";
    echo"<td>". $row["id_ubicacion"]."</td>". "<td>" . $row["nombre_ubic"]."</td>"."<td>". $row["codigo_postal"]."</td>"."<td>" . $row["region"]."</td>"."<td>". $row["estado"];
    echo"<td>"."<p> <a href='http://localhost/Basedatos/consulta11.php?id_ubicacion=".$row['id_ubicacion']."'>
    <img src='basura.png' alt='W3Schools.com' widt='38' height='38'>
    </a></p>";
    echo"<td>"."<p> <a href='http://localhost/Basedatos/modificar11.php?id_ubicacion=".$row['id_ubicacion']."'>
    <img src='mod.png' alt='W3Schools.com' widt='38' height='38'>
    </a></p>";
  }
  echo "</table>";
  echo"</div>";
} else {
  echo "0 results";
}

mysqli_close($conn);
?>