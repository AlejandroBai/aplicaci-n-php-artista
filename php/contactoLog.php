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



  <?php

    include "./funciones.php";
    menuLogeado(1);
    echo "<div id='formulario'><form action='index.html' method='post'>
      <input type='text' name='nombre' placeholder='Introduce tu nombre'>
      <input type='email' name='email' placeholder='Introduce tu email'>
      <textarea name='mensaje' rows='8' cols='50' placeholder='Mensaje'></textarea>
      <input type='submit' name='enviar' value='Enviar' class='enviar'>
    </form></div>";
    footer();

   ?>

</body>
</html>
