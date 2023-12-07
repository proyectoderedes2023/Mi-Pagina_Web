<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

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

    if (isset($_REQUEST['id_compra'])) {
      $recuperada2 = $_REQUEST['id_compra'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $tipo_compra = $_POST['tipo_compra'];
        $modelo_carro = $_POST['modelo_carro'];
        $tipo_pago = $_POST['tipo_pago'];
        $monto = $_POST['monto'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE compras SET tipo_compra='$tipo_compra', modelo_carro='$modelo_carro', tipo_pago='$tipo_pago', monto='$monto' WHERE id_compra=$recuperada2";
        if($recuperada2){
          echo"<scrpt lenguaje='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location:consulta3.php");
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
      $sql = "SELECT id_compra, tipo_compra, modelo_carro, tipo_pago, monto FROM compras WHERE id_compra=$recuperada2";
      $result = mysqli_query($conn, $sql);
      $compra = mysqli_fetch_assoc($result);
    }
    ?>
    <div class="table-container">
      <div class="tools">
          
        </button>
      </div>
  <table border="1">

</tr>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id compra</th>
          <th>Tipo de carro</th>
          <th>Modelo de carro</th>
          <th>Método de pago</th>
          <th>Monto</th>
        </tr>
        <?php if (isset($compra)): ?>
          <tr>
            <td><?php echo $compra["id_compra"]; ?></td>
            <td><input type="text" name="tipo_compra" value="<?php echo $compra["tipo_compra"]; ?>"></td>
            <td><input type="text" name="modelo_carro" value="<?php echo $compra["modelo_carro"]; ?>"></td>
            <td><input type="text" name="tipo_pago" value="<?php echo $compra["tipo_pago"]; ?>"></td>
            <td><input type="text" name="monto" value="<?php echo $compra["monto"]; ?>"></td>
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