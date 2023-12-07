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

    if (isset($_REQUEST['id_ubicacion'])) {
      $recuperada2 = $_REQUEST['id_ubicacion'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre_ubic = $_POST['nombre_ubic'];
        $codigo_postal = $_POST['codigo_postal'];
        $region = $_POST['region'];
        $estado = $_POST['estado'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE ubicación SET nombre_ubic='$nombre_ubic', codigo_postal='$codigo_postal', region='$region', estado='$estado' WHERE id_ubicacion=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta11.php");
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
      $sql = "SELECT id_ubicacion, nombre_ubic, codigo_postal, region, estado FROM ubicación WHERE id_ubicacion=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $ubicación = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>nombre</th>
          <th>Codigo postal</th>
          <th>region</th>
          <th>Estado</th>
        </tr>
        <?php if (isset($ubicación)): ?>
          <tr>
            <td><?php echo $ubicación["id_ubicacion"]; ?></td>
            <td><input type="text" name="nombre_ubic" value="<?php echo $ubicación["nombre_ubic"]; ?>"></td>
            <td><input type="int" name="codigo_postal" value="<?php echo $ubicación["codigo_postal"]; ?>"></td>
            <td><input type="text" name="region" value="<?php echo $ubicación["region"]; ?>"></td>
            <td><input type="text" name="estado" value="<?php echo $ubicación["estado"]; ?>"></td>
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