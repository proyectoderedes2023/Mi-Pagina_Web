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

    if (isset($_REQUEST['id_producto'])) {
      $recuperada2 = $_REQUEST['id_producto'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre_producto = $_POST['nombre_producto'];
        $precio = $_POST['precio'];
        $modelo = $_POST['modelo'];
        $existencia = $_POST['existencia'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE productos SET nombre_producto='$nombre_producto', precio='$precio', modelo='$modelo', existencia='$existencia' WHERE id_producto=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta6.php");
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
      $sql = "SELECT id_producto, nombre_producto, precio, modelo, existencia FROM productos WHERE id_producto=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $productos = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>precio</th>
          <th>modelo</th>
          <th>Existencia</th>
        </tr>
        <?php if (isset($productos)): ?>
          <tr>
            <td><?php echo $productos["id_producto"]; ?></td>
            <td><input type="text" name="nombre_producto" value="<?php echo $productos["nombre_producto"]; ?>"></td>
            <td><input type="int" name="precio" value="<?php echo $productos["precio"]; ?>"></td>
            <td><input type="text" name="modelo" value="<?php echo $productos["modelo"]; ?>"></td>
            <td><input type="text" name="existencia" value="<?php echo $productos["existencia"]; ?>"></td>
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