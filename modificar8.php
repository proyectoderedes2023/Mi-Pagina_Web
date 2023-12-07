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

    if (isset($_REQUEST['id_servicio'])) {
      $recuperada2 = $_REQUEST['id_servicio'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $numero_servicio = $_POST['numero_servicio'];
        $tipo = $_POST['tipo'];
        $costos = $_POST['costos'];
        $cliente = $_POST['cliente'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE servicios SET numero_servicio='$numero_servicio', tipo='$tipo', costos='$costos', cliente='$cliente' WHERE id_servicio=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta8.php");
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
      $sql = "SELECT id_servicio, numero_servicio, tipo, costos, cliente FROM servicios WHERE id_servicio=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $servicios = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Num</th>
          <th>tipo</th>
          <th>Costo</th>
          <th>Cliente</th>
        </tr>
        <?php if (isset($servicios)): ?>
          <tr>
            <td><?php echo $servicios["id_servicio"]; ?></td>
            <td><input type="int" name="numero_servicio" value="<?php echo $servicios["numero_servicio"]; ?>"></td>
            <td><input type="text" name="tipo" value="<?php echo $servicios["tipo"]; ?>"></td>
            <td><input type="int" name="costos" value="<?php echo $servicios["costos"]; ?>"></td>
            <td><input type="text" name="cliente" value="<?php echo $servicios["cliente"]; ?>"></td>
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