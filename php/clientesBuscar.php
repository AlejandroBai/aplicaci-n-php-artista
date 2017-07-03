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

  <!-- En la parte central podrá ver una tabla con los datos de todos los clientes que tiene ahora mismo. Además, para cada cliente aparecerá un botón desde donde el usuario podrá modificar los datos de alguno de sus clientes. -->

  <div id="submenuClientes">
    <ul>
      <li><a href="./clientesNuevo.php">Nuevo</a></li>
      <li><a href="./clientesBuscar.php">Buscar</a></li>
    </ul>
  </div>

  <?php
    include "./funciones.php";
    menuLogeado(1);

    $conexion = conecta_bd();

    echo "<section id='buscarClientes'>";
      echo "<h1>Buscar clientes</h1>";
      echo "<form action='./clientesBuscar.php' method='POST'>";
        echo "<input class='buscador' type='text' name='nombre' placeholder='Buscar por nombre...'>";
        echo "<input class='buscador' type='text' name='apellidos' placeholder='Buscar por apellidos...'>";
        echo "<input class='buscador' type='text' name='telefono' placeholder='Buscar por teléfono...'>";
        echo "<input class='buscador' type='submit' name='buscar' value='Buscar'>";
      echo "</form>";
      echo "<div id='contenedorBuscarClientes'>";

    //Si el usuario pulsa el botón, entonces realiza la consulta con la búsqueda y muestra los trabajos que coincidan con esa búsqueda
    if(isset($_POST["buscar"])){

      $nombre = $_POST["nombre"];
      $apellidos = $_POST["apellidos"];
      $telefono = $_POST["telefono"];

      $consulta = "select * from clientes WHERE nombre LIKE '%$nombre%'
                    AND (apellidos like '%$apellidos%' AND (telefono1 like '%$telefono%' OR telefono2 like '%$telefono%' ))
                    order by nombre, apellidos";

      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);

      echo "<table>";
      echo "<thead><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Teléfono 1</th><th>Teléfono 2</th></thead>";
      echo "<tbody>";
      if($numeroFilas > 0){
        for ($i=0; $i < $numeroFilas; $i++) {
          $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
          echo "<tr>";
            echo "<td>$fila[nombre]</td>";
            echo "<td>$fila[apellidos]</td>";
            echo "<td>$fila[direccion]</td>";
            echo "<td>$fila[telefono1]</td>";
            echo "<td>$fila[telefono2]</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

      }else{
          echo "No hay resultados de clientes para la búsqueda";
      }
      echo "</div>";
      echo "</section>";
    //Si el usuario no ha pulsado el botón, mostrará todos los clientes
    }else{

      $conexion = conecta_bd();
      $consulta = "select * from clientes order by nombre, apellidos";
      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);

      echo "<table>";
      echo "<thead><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Teléfono 1</th><th>Teléfono 2</th></thead>";
      echo "<tbody>";
      for ($i=0; $i < $numeroFilas; $i++) {
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        echo "<tr>";
          echo "<td>$fila[nombre]</td>";
          echo "<td>$fila[apellidos]</td>";
          echo "<td>$fila[direccion]</td>";
          echo "<td>$fila[telefono1]</td>";
          echo "<td>$fila[telefono2]</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      echo "</div>";
      echo "</section>";
    }

    mysqli_close($conexion);
    footer();

   ?>

</body>
</html>
