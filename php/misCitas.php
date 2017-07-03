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
    $consulta = "select * from citas, clientes where citas.id_cliente=clientes.id and id = " . $_SESSION['id'] . " order by fecha desc";
    $resultado = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($resultado);
    echo "<section id='todosClientes'>";
    echo "<h1>Mis citas</h1>";
    echo "<div id='contenedorTodosClientes'>";
    echo "<table>";
    echo "<thead><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Motivo</th><th>Nombre del cliente</th><th>Teléfono 1</th><th>Teléfono 2</th></thead>";
    echo "<tbody>";
    for ($i=0; $i < $numeroFilas; $i++) {
      $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      echo "<tr>";
        echo "<td>$fila[fecha]</td>";
        echo "<td>$fila[hora]</td>";
        echo "<td>$fila[lugar]</td>";
        echo "<td>$fila[motivo]</td>";
        echo "<td>$fila[nombre]</td>";
        echo "<td>$fila[telefono1]</td>";
        echo "<td>$fila[telefono2]</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);

    footer();

   ?>

</body>
</html>
