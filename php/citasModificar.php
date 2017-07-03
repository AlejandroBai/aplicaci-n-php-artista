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
    </ul>
  </div>

  <?php
    include "./funciones.php";
    menuLogeado(1);

		$conexion = conecta_bd();
    $fecha = $_POST['fecha'];
		$cliente = $_POST['id'];
		$consulta = "select * from citas, clientes
                  where citas.id_cliente = clientes.id
                  and fecha = '$fecha' and id_cliente = $cliente";
		$resultado = mysqli_query($conexion, $consulta);
		$fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);



    echo "<section id='nuevoCliente'>";
      echo "<h1>Modificar cita</h1>";
      echo "<div id='contenedorNuevoCliente'>";
        echo "<form method='POST' action='./modificarCita.php'>
                  <input type='hidden' name='id2' value='$fila[id_cliente]'>
                  <input type='hidden' name='fecha2' value='$fila[fecha]'>
                  <input type='date' name='fecha' value='$fila[fecha]'>
                  <input type='time' name='hora' value='$fila[hora]'>
                  <input type='text' name='lugar' value='$fila[lugar]'>
                  <input type='text' name='motivo' value='$fila[motivo]'>
                  <input type='text' name='nombre' value='$fila[nombre]' disabled>
                <input type='submit' name='enviar' value='Modificar cita'>
        </form>";
      echo "</div>";
    echo "</section>";
    mysqli_close($conexion);
    footer();
   ?>

</body>
</html>
