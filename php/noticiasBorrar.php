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

    $conexion = conecta_bd();
    $consulta = "select * from noticias order by fecha desc";
    $resultado = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($resultado);

    echo "<section id='borrarNoticias'>";
    echo "<h1>Borrar noticias</h1>";
    echo "<div id='contenedorBorrarNoticias'>";
    for ($i=0; $i < $numeroFilas; $i++) {
      $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      echo "<div id='cajaNoticia'>";
        echo "<h2>$fila[titular]</h2><br>";
        echo "<div id='imgNoticias'>";
          echo "<img src='../img/noticias/$fila[imagen]'><br>";
        echo "</div>";
        echo "<form action='./borrarNoticia.php' method='post'>";
  			  echo "<input type='hidden' name='id' value='$fila[id]'>";
  			  echo "<input type='submit' name='eliminar' value='Borrar noticia'>";
			  echo "</form>";
      echo "</div>";
    }
    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);
    footer();

   ?>

</body>
</html>
