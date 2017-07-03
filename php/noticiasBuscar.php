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

    echo "<section id='buscarNoticias'>";
    echo "<h1>Buscar noticias por titular</h1>";
    echo "<form action='#' method='post'>";
      echo "<input class='buscador' type='text' name='busqueda' placeholder='Buscar noticia...'>";
      echo "<input class='buscador' type='submit' name='buscar' value='Buscar'>";
    echo "</form>";
    echo "<div id='contenedorBuscarNoticias'>";

    //Si el usuario pulsa el botón, entonces realiza la consulta con la búsqueda y muestra las noticias que coincidan con esa búsqueda
    if(isset($_POST["buscar"])){

      $busqueda = $_POST["busqueda"];
      $consulta = "select * from noticias WHERE titular LIKE '%$busqueda%' order by fecha desc";
      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);

      if($numeroFilas > 0){
        for ($i=0; $i < $numeroFilas; $i++) {
          $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
          echo "<div id='cajaNoticia'>";
            echo "<h2>$fila[titular]</h2><br>";
            echo "<div id='imgNoticias'>";
              echo "<img src='../img/noticias/$fila[imagen]'><br>";
            echo "</div>";
            echo "<form action='./noticia_completa.php' method='post'>";
              echo "<input type='hidden' name='id' value='$fila[id]'>";
              echo "<input type='submit' name='enviar' value='Leer más'>";
            echo "</form>";
          echo "</div>";
        }
      }else{
          echo "No hay resultados para la búsqueda";
      }
    //Si el usuario no ha pulsado el botón, mostrará todas las noticias por defecto
    }else{

      $consulta = "select * from noticias order by fecha desc";
      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);
      for ($i=0; $i < $numeroFilas; $i++) {
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        echo "<div id='cajaNoticia'>";
          echo "<h2>$fila[titular]</h2><br>";
          echo "<div id='imgNoticias'>";
            echo "<img src='../img/noticias/$fila[imagen]'><br>";
          echo "</div>";
          echo "<form action='./noticia_completa.php' method='post'>";
            echo "<input type='hidden' name='id' value='$fila[id]'>";
            echo "<input type='submit' name='enviar' value='Leer más'>";
          echo "</form>";
        echo "</div>";
      }
    }

    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);

    footer();

   ?>

</body>
</html>
