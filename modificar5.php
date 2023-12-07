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

    if (isset($_REQUEST['id_empleado'])) {
      $recuperada2 = $_REQUEST['id_empleado'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre_empleado = $_POST['nombre_empleado'];
        $salario = $_POST['salario'];
        $dirección = $_POST['dirección'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE empleados SET nombre_empleado='$nombre_empleado', salario='$salario', dirección='$dirección' WHERE id_empleado=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta5.php");
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
      $sql = "SELECT id_empleado, nombre_empleado, salario, dirección FROM empleados WHERE id_empleado=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $empleados = mysqli_fetch_assoc($result);
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
        <?php if (isset($empleados)): ?>
          <tr>
            <td><?php echo $empleados["id_empleado"]; ?></td>
            <td><input type="text" name="nombre_empleado" value="<?php echo $empleados["nombre_empleado"]; ?>"></td>
            <td><input type="int" name="salario" value="<?php echo $empleados["salario"]; ?>"></td>
            <td><input type="text" name="dirección" value="<?php echo $empleados["dirección"]; ?>"></td>
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