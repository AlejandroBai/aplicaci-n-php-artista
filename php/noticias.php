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


  <div id="submenuNoticias">
    <ul>
      <li><a href="./noticiasNueva.php">Nueva</a></li>
      <li><a href="./noticiasBuscar.php">Buscar</a></li>
      <li><a href="./noticiasBorrar.php">Borrar</a></li>
    </ul>
  </div>

  <?php
    include "./funciones.php";
    menuLogeado(1);
    todasNoticias();
    footer();

   ?>

</body>
</html>
