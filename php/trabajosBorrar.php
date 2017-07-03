<?php
	session_start();

	if (isset($_COOKIE['sesion'])) {
		session_decode($_COOKIE['sesion']);

		if (isset($_SESSION['id'])) {
			header('location: ./misTrabajos.php');
		}

	} elseif ($_SESSION['admin']) {

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

  <div id="submenuTrabajos">
    <ul>
      <li><a href="./trabajosNuevo.php">Nuevo</a></li>
      <li><a href="./trabajosBuscar.php">Buscar</a></li>
      <li><a href="./trabajosBorrar.php">Borrar</a></li>
    </ul>
  </div>

  <?php
    include "./funciones.php";
    menuLogeado(1);

    $conexion = conecta_bd();
    $consulta = "select * from trabajos order by fecha desc";
    $resultado = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($resultado);

    echo "<section id='borrarTrabajo'>";
    echo "<h1>Borrar trabajos</h1>";
    echo "<div id='contenedorBorrarTrabajos'>";
    for ($i=0; $i < $numeroFilas; $i++) {
      $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      echo "<div id='cajaTrabajo'>";
        echo "<h2>$fila[titulo]</h2><br>";
        echo "<div id='imgTrabajo'>";
          echo "<img src='../img/trabajos/$fila[imagen]'><br>";
        echo "</div>";
        echo "<form action='./borrarTrabajo.php' method='post'>";
          echo "<input type='hidden' name='id' value='$fila[id]'>";
          echo "<input type='submit' name='eliminar' value='Borrar trabajo'>";
        echo "</form>";
      echo "</div>";
    }
    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);

    footer();
   ?>

</body>
</html>
