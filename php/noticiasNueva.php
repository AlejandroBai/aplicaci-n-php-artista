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
    echo "<section id='nuevaNoticia'>";
      echo "<h1>Insertar nueva noticia</h1>";
      echo "<div id='contenedorNuevaNoticia'>";
        echo "<form method='POST' action='./insertarNoticia.php' enctype='multipart/form-data'>
                <input type='text' name='titular' placeholder='Titular de la noticia'>
                <input type='file' name='foto' placeholder='Selecciona una foto'>
                <textarea type='text' name='contenido' placeholder='Contenido de la noticia'></textarea>
                <input type='submit' name='enviar' value='Subir noticia'>
              </form>";
      echo "</div>";
    echo "</section>";

    footer();

   ?>

</body>
</html>
