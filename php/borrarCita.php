  <?php

  include "./funciones.php";

  $conexion = conecta_bd();
  $consulta = "delete from citas where id_cliente = " . $_POST['id'];
  mysqli_query($conexion, $consulta);
  mysqli_close($conexion);
  header("Location: ./citas.php");

   ?>
