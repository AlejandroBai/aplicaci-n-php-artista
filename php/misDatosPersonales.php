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
    $consulta = "select * from clientes where id = " . $_SESSION['id'] . "";
    $resultado = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($resultado);
    echo "<section id='todosClientes'>";
    echo "<h1>Tus datos personales</h1>";
    echo "<div id='contenedorTodosClientes'>";
    echo "<table>";
    echo "<thead><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Teléfono 1</th><th>Teléfono 2</th><th>Nombre de usuario</th><th>Contraseña</th></thead>";
    echo "<tbody>";
    for ($i=0; $i < $numeroFilas; $i++) {
      $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      echo "<tr>";
        echo "<td>$fila[nombre]</td>";
        echo "<td>$fila[apellidos]</td>";
        echo "<td>$fila[direccion]</td>";
        echo "<td>$fila[telefono1]</td>";
        echo "<td>$fila[telefono2]</td>";
				echo "<td>$fila[nombre_usuario]</td>";
				echo "<td>$fila[pass]</td>";
        echo "<td>
                <form action='./misDatosModificar.php' method='post'>
                      <input type='hidden' name='id' value='$fila[id]'>
                      <input type='submit' value='Modificar'>
                </form>
              </td>";
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
