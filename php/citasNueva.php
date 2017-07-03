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

    echo "<section id='nuevoCliente'>";
      echo "<h1>Insertar nueva cita</h1>";
      echo "<div id='contenedorNuevoCliente'>";
        echo "<form method='POST' action='./insertarCita.php' enctype='multipart/form-data'>
                  <input type='date' name='fecha' placeholder='Inserta fecha' required>
                  <input type='time' name='hora' placeholder='--:--' required>
                  <input type='text' name='lugar' placeholder='Lugar' required>
                  <input type='text' name='motivo' placeholder='Motivo 1' required>";
				          $conexion = conecta_bd();
				          $consulta = 'select * from clientes order by nombre asc';
                  $resultado = mysqli_query($conexion, $consulta);
				          $numFila  = mysqli_num_rows($resultado);
                  echo "<select name='cliente' id='cliente' required>";
                    for ($i=0; $i < $numFila; $i++) {
                         $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                              echo "<option value='$fila[id]'>$fila[nombre] $fila[apellidos]</option>'";
                       }
		              echo "</select>
                  <input type='submit' name='enviar' value='Añadir cita' required>
                </form>";
      echo "</div>";
    echo "</section>";
    footer();
   ?>

</body>
</html>
