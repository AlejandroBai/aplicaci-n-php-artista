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

		$conex = conecta_bd();
		$consulta = "select * from clientes where id = " . $_POST['id'];
		$resultado = mysqli_query($conex, $consulta);
		$fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);



    echo "<section id='nuevoCliente'>";
      echo "<h1>Modificar cliente</h1>";
      echo "<div id='contenedorNuevoCliente'>";
        echo "<form method='POST' action='./modificarCliente.php'>
                  <input type='text' name='nombre' value='$fila[nombre]'>
                  <input type='text' name='apellidos' value='$fila[apellidos]'>
                  <input type='text' name='direccion' value='$fila[direccion]'>
                  <input type='text' name='telefono1' value='$fila[telefono1]'>
                  <input type='text' name='telefono2' value='$fila[telefono2]'>
                  <input type='hidden' name='id' value='$fila[id]'>
                <input type='submit' name='enviar' value='Modificar cliente'>
        </form>";
      echo "</div>";
    echo "</section>";
    mysqli_close($conex);
    footer();
   ?>

</body>
</html>
