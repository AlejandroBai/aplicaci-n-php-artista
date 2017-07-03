  <?php

    include "./funciones.php";

    // $cliente = $_POST['cliente'];
    $conexion = conecta_bd();
    // $consulta = "select * from citas";
    // $datos = mysqli_query($conexion, $consulta);
    // $numeroFilas = mysqli_num_rows($datos);

    $insert = "insert into citas values ('" . $_POST['fecha'] . "', '" . $_POST['hora'] . "', '" . $_POST['lugar'] . "', '" . $_POST['motivo'] . "', '" . $_POST['cliente'] . "')";

    mysqli_query($conexion, $insert);
    mysqli_close($conexion);
    header("Location: ./citas.php");

   ?>
