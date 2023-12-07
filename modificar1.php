<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
  
</head>
<body>

     
    <?php

session_start();

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

    if (isset($_REQUEST['id_ciudad'])) {
      $recuperada = $_REQUEST['id_ciudad'];
      $correcto=1;
     


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $region = $_POST['region'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE ciudad SET region='$region', estado='$estado', pais='$pais' WHERE id_ciudad=$recuperada";
        if($recuperada){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta1.php");
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
      $sql = "SELECT id_ciudad, region, estado, pais FROM ciudad WHERE id_ciudad=$recuperada";
      $result = mysqli_query($conn, $sql);
      $ciudad = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <section class="center">
      <div class="datatable">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Region</th>
          <th>Estado</th>
          <th>Pais</th>
        </tr>
        <?php if (isset($ciudad)): ?>
          <tr>
            <td><?php echo $ciudad["id_ciudad"]; ?></td>
            <td><input type="text" name="region" value="<?php echo $ciudad["region"]; ?>"></td>
            <td><input type="text" name="estado" value="<?php echo $ciudad["estado"]; ?>"></td>
            <td><input type="text" name="pais" value="<?php echo $ciudad["pais"]; ?>"></td>
          </tr>
        <?php endif; ?>
      </table>
      </div>
      </section>
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