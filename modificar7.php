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

    if (isset($_REQUEST['id_proveedor'])) {
      $recuperada2 = $_REQUEST['id_proveedor'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $Nombre_proveedor = $_POST['Nombre_proveedor'];
        $telefono = $_POST['telefono'];
        $dirección = $_POST['dirección'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE proveedores SET Nombre_proveedor='$Nombre_proveedor', telefono='$telefono', dirección='$dirección' WHERE id_proveedor=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta7.php");
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
      $sql = "SELECT id_proveedor, Nombre_proveedor, telefono, dirección FROM proveedores WHERE id_proveedor=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $proveedores = mysqli_fetch_assoc($result);
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
        <?php if (isset($proveedores)): ?>
          <tr>
            <td><?php echo $proveedores["id_proveedor"]; ?></td>
            <td><input type="text" name="Nombre_proveedor" value="<?php echo $proveedores["Nombre_proveedor"]; ?>"></td>
            <td><input type="int" name="telefono" value="<?php echo $proveedores["telefono"]; ?>"></td>
            <td><input type="text" name="dirección" value="<?php echo $proveedores["dirección"]; ?>"></td>
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