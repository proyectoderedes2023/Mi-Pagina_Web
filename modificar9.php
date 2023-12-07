<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="table-container">
    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "renta_de_autos";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Comprobar conexión
    if (!$conn) {
      die("Error de conexión: " . mysqli_connect_error());
    }

    if (isset($_REQUEST['ID_sucursal'])) {
      $recuperada2 = $_REQUEST['ID_sucursal'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $Nombre_sucursal = $_POST['Nombre_sucursal'];
        $dirección = $_POST['dirección'];
        $horario = $_POST['horario'];
        $telefono = $_POST['telefono'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE sucursal SET Nombre_sucursal='$Nombre_sucursal', dirección='$dirección', horario='$horario', telefono='$telefono' WHERE ID_sucursal=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta9.php");
        }else{
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son incorrecto);
          ";
        }
        ?>
 
    <?php

        if (mysqli_query($conn, $sql)) {
          echo "";
        } else {
          echo "Error al actualizar registro: " . mysqli_error($conn);
        }
      }

      // Obtener la información de la ciudad seleccionada
      $sql = "SELECT ID_sucursal, Nombre_sucursal, dirección, horario, telefono FROM sucursal WHERE ID_sucursal=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $sucursal = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>nombre</th>
          <th>Direccion</th>
          <th>horario</th>
          <th>Telefono</th>
        </tr>
        <?php if (isset($sucursal)): ?>
          <tr>
            <td><?php echo $sucursal["ID_sucursal"]; ?></td>
            <td><input type="text" name="Nombre_sucursal" value="<?php echo $sucursal["Nombre_sucursal"]; ?>"></td>
            <td><input type="text" name="dirección" value="<?php echo $sucursal["dirección"]; ?>"></td>
            <td><input type="time" name="horario" value="<?php echo $sucursal["horario"]; ?>"></td>
            <td><input type="int" name="telefono" value="<?php echo $sucursal["telefono"]; ?>"></td>
          </tr>
        <?php endif; ?>
      </table>
      <br>
      <input type="submit" name="guardar" value="Guardar">
    </form>
  </div>

  <?php
  // Cerrar la conexión
  mysqli_close($conn);
  ?>
</body>
</html>