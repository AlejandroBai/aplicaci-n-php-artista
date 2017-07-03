  <?php

    include "./funciones.php";
    $conexion = conecta_bd();
    $id = $_POST["id"];
    $consulta = "delete from noticias where id = $id";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header("Location: ./noticias.php");

   ?>
