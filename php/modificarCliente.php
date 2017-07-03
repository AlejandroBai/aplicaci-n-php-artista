  <?php

    include "./funciones.php";

    $conexion = conecta_bd();
    $update = "update clientes set nombre = '" . $_POST['nombre'] . "', apellidos = '" . $_POST['apellidos'] . "', direccion = '" . $_POST['direccion'] . "', telefono1 = '" . $_POST['telefono1'] . "', telefono2 = '" . $_POST['telefono2'] . "' where id = '" . $_POST['id'] . "'";

    mysqli_query($conexion, $update);
    mysqli_close($conexion);
    header("Location: ./clientes.php");

   ?>
