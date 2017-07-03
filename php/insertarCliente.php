  <?php

    include "./funciones.php";

    $cliente = $_POST['cliente'];
    $conexion = conecta_bd();
    $consulta = "select * from clientes";
    $insert = "insert into clientes values ('', '" . $_POST['nombre'] . "', '" . $_POST['apellidos'] . "', '" . $_POST['direccion'] . "', '" . $_POST['telefono1'] . "', '" . $_POST['telefono2'] . "')";

    mysqli_query($conexion, $insert);
    mysqli_close($conexion);
    header("Location: ./clientes.php");

   ?>
