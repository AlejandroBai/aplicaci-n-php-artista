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
  <title>Proyecto Alejandro Bayo Saiz</title>
</head>
<body>

  <?php
		$id = $_POST['id'];
		include "funciones.php";
		$conex = conecta_bd();
		$consulta = "select *
					from noticias
					where id=$id";
		$resultado = mysqli_query($conex, $consulta);
		$fila = mysqli_fetch_array($resultado);

		echo "NOTICIA COMPLETA";
		echo "Titular: $fila[titular]<br>";
		echo "Imagen: <img src='../img/noticias/$fila[imagen]'><br>";
		echo "Contenido: $fila[contenido]";

		mysqli_close($conex);
	?>

</body>
</html>
