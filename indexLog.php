<?php
	session_start();

	if (isset($_COOKIE['sesion'])) {
		session_decode($_COOKIE['sesion']);

		if (isset($_SESSION['id'])) {
			header('location: ./php/misTrabajos.php');
		}

	} elseif ($_SESSION['admin']) {

	} else {
		header('location: ./php/acceder.php');
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <title>Proyecto Alejandro Bayo Saiz</title>
</head>
<body>

  <?php

    include "./php/funciones.php";
    menuLogeado(2);
    imagenAleatoria(2);
    tresNoticias(2);
    footer();

   ?>

</body>
</html>
