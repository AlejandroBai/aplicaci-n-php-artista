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

		$conex = conecta_bd();
		$consulta = "select * from clientes where id = " . $_SESSION['id'];
		$resultado = mysqli_query($conex, $consulta);
		$fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);



    echo "<section id='nuevoCliente'>";
      echo "<h1>Modificar tus datos</h1>";
      echo "<div id='contenedorNuevoCliente'>";
        echo "<form method='POST' action='./modificarDatosPersonales.php'>
                  <label for='pass'>Contraseña</label>
                  <input id='pass' type='text' name='password' value='$fila[pass]'>
									<label for='direccion'>Dirección</label>
                  <input id='direccion' type='text' name='direccion' value='$fila[direccion]'>
									<label for='tel1'>Teléfono 1</label>
                  <input id='tel1' type='text' name='telefono1' value='$fila[telefono1]'>
									<label for='tel2'>Teléfono 2</label>
                  <input id='tel2' type='text' name='telefono2' value='$fila[telefono2]'>
                  <input type='hidden' name='id' value='$fila[id]'>
                <input type='submit' name='enviar' value='Modificar mis datos'>
        </form>";
      echo "</div>";
    echo "</section>";
    mysqli_close($conex);
    footer();
   ?>

</body>
</html>
