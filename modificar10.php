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

    if (isset($_REQUEST['id_tarifa'])) {
      $recuperada2 = $_REQUEST['id_tarifa'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $id_auto = $_POST['id_auto'];
        $tipo = $_POST['tipo'];
        $costos = $_POST['costos'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE tarifa SET id_auto='$id_auto', tipo='$tipo', costos='$costos' WHERE id_tarifa=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta10.php");
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
      $sql = "SELECT id_tarifa, id_auto, tipo, costos FROM tarifa WHERE id_tarifa=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $tarifa = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>ID del auto</th>
          <th>Tipo</th>
          <th>Costos</th>
        </tr>
        <?php if (isset($tarifa)): ?>
          <tr>
            <td><?php echo $tarifa["id_tarifa"]; ?></td>
            <td><input type="int" name="id_auto" value="<?php echo $tarifa["id_auto"]; ?>"></td>
            <td><input type="text" name="tipo" value="<?php echo $tarifa["tipo"]; ?>"></td>
            <td><input type="int" name="costos" value="<?php echo $tarifa["costos"]; ?>"></td>
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