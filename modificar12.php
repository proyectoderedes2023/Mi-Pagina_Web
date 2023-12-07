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

    if (isset($_REQUEST['id_usuario'])) {
      $recuperada2 = $_REQUEST['id_usuario'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre_usuario = $_POST['nombre_usuario'];
        $telefono = $_POST['telefono'];
        $dirección = $_POST['dirección'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE usuarios SET nombre_usuario='$nombre_usuario', telefono='$telefono', dirección='$dirección' WHERE id_usuario=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta12.php");
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
      $sql = "SELECT id_usuario, nombre_usuario, telefono, dirección FROM usuarios WHERE id_usuario=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $usuarios = mysqli_fetch_assoc($result);
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
        <?php if (isset($usuarios)): ?>
          <tr>
            <td><?php echo $usuarios["id_usuario"]; ?></td>
            <td><input type="text" name="nombre_usuario" value="<?php echo $usuarios["nombre_usuario"]; ?>"></td>
            <td><input type="int" name="telefono" value="<?php echo $usuarios["telefono"]; ?>"></td>
            <td><input type="text" name="dirección" value="<?php echo $usuarios["dirección"]; ?>"></td>
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