<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
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

    if (isset($_REQUEST['id_contactos'])) {
      $recuperada2 = $_REQUEST['id_contactos'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre_contactos = $_POST['nombre_contactos'];
        $telefono = $_POST['telefono'];
        $dirección = $_POST['dirección'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE contactos SET nombre_contactos='$nombre_contactos', telefono='$telefono', dirección='$dirección' WHERE id_contactos=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta4.php");
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
      $sql = "SELECT id_contactos, nombre_contactos, telefono, dirección FROM contactos WHERE id_contactos=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $contactos = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>telefono</th>
          <th>direccion</th>
        </tr>
        <?php if (isset($contactos)): ?>
          <tr>
            <td><?php echo $contactos["id_contactos"]; ?></td>
            <td><input type="text" name="nombre_contactos" value="<?php echo $contactos["nombre_contactos"]; ?>"></td>
            <td><input type="int" name="telefono" value="<?php echo $contactos["telefono"]; ?>"></td>
            <td><input type="text" name="dirección" value="<?php echo $contactos["dirección"]; ?>"></td>
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