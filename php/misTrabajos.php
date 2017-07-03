<?php
	session_start();

	if (isset($_COOKIE['sesion'])) {
		session_decode($_COOKIE['sesion']);

		if (isset($_SESSION['admin'])) {
			header('location: ../indexLog.php');
		}

	} elseif ($_SESSION['id']) {

	} else {
		header('location: ./acceder.php');
	}


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <title>Proyecto Alejandro Bayo Saiz</title>
</head>
<body>

  <?php

    include "./funciones.php";
    menuCliente();

    $conexion = conecta_bd();
    $consulta = "select * from trabajos, clientes where trabajos.id_cliente=clientes.id and clientes.id = " . $_SESSION['id'] . " order by fecha desc";
    $resultado = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($resultado);

    echo "<section id='trabajos'>";
    echo "<h1>Trabajos</h1>";
    echo "<div id='contenedorTrabajos'>";
    for ($i=0; $i < $numeroFilas; $i++) {
      $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        echo "<div id='cajaTrabajo'>";
          echo "<h2>$fila[titulo]</h2><br>";
          echo "<p>$fila[descripcion]</p>";
          echo "<small>Cliente: $fila[nombre]</small>";
          echo "<div id='imgTrabajo'>";
            echo "<img src='../img/trabajos/$fila[imagen]'><br>";
          echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);

    footer();

   ?>

</body>
</html>
