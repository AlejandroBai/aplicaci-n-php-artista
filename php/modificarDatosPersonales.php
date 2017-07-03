  <?php

    session_start();

    if (isset($_COOKIE['sesion'])) {
      session_decode($_COOKIE['sesion']);

      if (isset($_SESSION['admin'])) {
        header('location: ./indexLog.php');
      }

    } elseif ($_SESSION['id']) {

    } else {
      header('location: ./acceder.php');
    }

    include "./funciones.php";

    $conexion = conecta_bd();
    $update = "update clientes set pass = '" . $_POST['password'] . "', direccion = '" . $_POST['direccion'] . "', telefono1 = '" . $_POST['telefono1'] . "', telefono2 = '" . $_POST['telefono2'] . "' where id = '" . $_SESSION['id'] . "'";

    mysqli_query($conexion, $update);
    mysqli_close($conexion);
    header("Location: ./misDatosPersonales.php");

   ?>
