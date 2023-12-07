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

    if (isset($_REQUEST['id_cliente'])) {
      $recuperada2 = $_REQUEST['id_cliente'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre_cliente = $_POST['nombre_cliente'];
        $telefonos = $_POST['telefonos'];
        $direcciones = $_POST['direcciones'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE clientes SET nombre_cliente='$nombre_cliente', telefonos='$telefonos', direcciones='$direcciones' WHERE id_cliente=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta2.php");
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
      $sql = "SELECT id_cliente, nombre_cliente, telefonos, direcciones FROM clientes WHERE id_cliente=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $clientes = mysqli_fetch_assoc($result);
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
        <?php if (isset($clientes)): ?>
          <tr>
            <td><?php echo $clientes["id_cliente"]; ?></td>
            <td><input type="text" name="nombre_cliente" value="<?php echo $clientes["nombre_cliente"]; ?>"></td>
            <td><input type="int" name="telefonos" value="<?php echo $clientes["telefonos"]; ?>"></td>
            <td><input type="text" name="direcciones" value="<?php echo $clientes["direcciones"]; ?>"></td>
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