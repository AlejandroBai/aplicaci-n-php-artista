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

  <div id="submenuClientes">
    <ul>
      <li><a href="./citasNueva.php">Nueva</a></li>
      <li><a href="./citasBuscar.php">Buscar</a></li>
      <li><a href="./citasBorrar.php">Borrar</a></li>
    </ul>
  </div>

  <?php

    include "./funciones.php";
    menuLogeado(1);

    $conexion = conecta_bd();

    echo "<section id='buscarTrabajos'>";
    echo "<h1>Buscar citas</h1>";
    echo "<form action='#' method='post'>";
      echo "<input class='buscador' type='text' name='busqueda' placeholder='Por nombre del cliente'>";
      echo "<input class='buscador' type='date' name='fecha' placeholder='Buscar por fecha...'>";
      echo "<input class='buscador' type='submit' name='buscar' value='Buscar'>";
    echo "</form>";
    echo "<div id='contenedorBuscarTrabajos'>";


    //Si el usuario pulsa el botón, entonces realiza la consulta con la búsqueda y muestra los trabajos que coincidan con esa búsqueda
    if(isset($_POST["buscar"])){

      $busqueda = $_POST["busqueda"];
      $fecha = $_POST["fecha"];

      //De esta forma podemos separar las búsquedas para que quede correcta la búsqueda
      if(!$fecha && $busqueda){
        $consulta = "select * from citas, clientes WHERE citas.id_cliente=clientes.id
                      AND (nombre LIKE '%$busqueda%') order by nombre, fecha";
      }elseif ($fecha && !$busqueda) {
        $consulta = "select * from citas, clientes WHERE citas.id_cliente=clientes.id
                      AND (fecha like '%$fecha%') order by nombre, fecha";
      }else{
        $consulta = "select * from citas, clientes WHERE citas.id_cliente=clientes.id
                      AND (nombre LIKE '%$busqueda%' OR fecha like '%$fecha%')
                      order by nombre, fecha";
      }

      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);

      echo "<table>";
      echo "<thead><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Motivo</th><th>Cliente</th><th>Teléfono 1</th><th>Teléfono 2</th></thead>";
      echo "<tbody>";
      if($numeroFilas > 0){
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

      }else{
          echo "No hay resultados de citas para la búsqueda";
      }
      echo "</div>";
      echo "</section>";
    }else{
      $consulta = "select * from citas, clientes WHERE citas.id_cliente=clientes.id";
      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);

      echo "<table>";
      echo "<thead><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Motivo</th><th>Cliente</th><th>Teléfono 1</th><th>Teléfono 2</th></thead>";
      echo "<tbody>";
      if($numeroFilas > 0){
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
    }
  }

    mysqli_close($conexion);

    footer();

   ?>

</body>
</html>
