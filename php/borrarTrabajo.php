  <?php

    include "./funciones.php";
    $conexion = conecta_bd();
    $id = $_POST["id"];
    
    //Borrar archivo de la carpeta primero
    $consulta1 = "select * from trabajos where id = $id";
    $resultado1 = mysqli_query($conexion, $consulta1);
    $fila = mysqli_fetch_array($resultado1, MYSQLI_ASSOC);
    $archivo = $fila['imagen'];
    unlink("../img/trabajos/$archivo");

    //Borrar trabajo completo de la base de datos
    $consulta = "delete from trabajos where id = $id";
    mysqli_query($conexion, $consulta);

    mysqli_close($conexion);
    
    header("Location: ./trabajos.php");

   ?>
