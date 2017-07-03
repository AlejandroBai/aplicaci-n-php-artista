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
      <li><a href="./clientesNuevo.php">Nuevo</a></li>
      <li><a href="./clientesBuscar.php">Buscar</a></li>
    </ul>
  </div>

  <?php
    include "./funciones.php";
    menuLogeado(1);

    echo "<section id='nuevoCliente'>";
      echo "<h1>Insertar nuevo cliente</h1>";
      echo "<div id='contenedorNuevoCliente'>";
        echo "<form method='POST' action='./insertarCliente.php' enctype='multipart/form-data'>
                  <input type='text' name='nombre' placeholder='Nombre'>
                  <input type='text' name='apellidos' placeholder='Apellidos'>
                  <input type='text' name='direccion' placeholder='Dirección'>
                  <input type='text' name='telefono1' placeholder='Teléfono 1'>
                  <input type='text' name='telefono2' placeholder='Teléfono 2'>
                <input type='submit' name='enviar' value='Añadir cliente'>
        </form>";
      echo "</div>";
    echo "</section>";

    footer();
   ?>

</body>
</html>
