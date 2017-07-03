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

  <div id="submenuTrabajos">
    <ul>
      <li><a href="./trabajosNuevo.php">Nuevo</a></li>
      <li><a href="./trabajosBuscar.php">Buscar</a></li>
      <li><a href="./trabajosBorrar.php">Borrar</a></li>
    </ul>
  </div>

  <?php

    include "./funciones.php";
    menuLogeado(1);

    $conexion = conecta_bd();

    echo "<section id='buscarTrabajos'>";
    echo "<h1>Buscar trabajos</h1>";
    echo "<form action='#' method='post'>";
      echo "<input class='buscador' type='text' name='busqueda' placeholder='Por título y por nombre del cliente'>";
      echo "<input class='buscador' type='date' name='fecha' placeholder='Buscar por fecha...'>";
      echo "<input class='buscador' type='submit' name='buscar' value='Buscar'>";
    echo "</form>";
    echo "<div id='contenedorBuscarTrabajos'>";

    //Si el usuario pulsa el botón, entonces realiza la consulta con la búsqueda y muestra los trabajos que coincidan con esa búsqueda
    if(isset($_POST["buscar"])){

      $busqueda = $_POST["busqueda"];
      $fecha = $_POST["fecha"];

      //De esta forma podemos separar las búsquedas para que quede correcta la búsqueda
      if(!$fecha && $busqueda){
        $consulta = "select * from trabajos, clientes WHERE trabajos.id_cliente=clientes.id
                      AND (titulo LIKE '%$busqueda%' OR nombre like '%$busqueda%') order by titulo, nombre, fecha";
      }elseif ($fecha && !$busqueda) {
        $consulta = "select * from trabajos, clientes WHERE trabajos.id_cliente=clientes.id
                      AND (fecha like '%$fecha%') order by titulo, nombre, fecha";
      }else{
        $consulta = "select * from trabajos, clientes WHERE trabajos.id_cliente=clientes.id
                      AND (titulo LIKE '%$busqueda%' OR nombre like '%$busqueda%' AND (fecha like '%$fecha%'))
                      order by titulo, nombre, fecha";
      }

      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);

      if($numeroFilas > 0){
        for ($i=0; $i < $numeroFilas; $i++) {
          $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
          echo "<div id='cajaNoticia'>";
            echo "<h2>$fila[titulo]</h2><br>";
            echo "<p>$fila[descripcion]</p>";
            echo "<small>Cliente: $fila[nombre]</small>";
            echo "<div id='imgNoticias'>";
              echo "<img src='../img/trabajos/$fila[imagen]'><br>";
            echo "</div>";
          echo "</div>";
        }
      }else{
          echo "No hay resultados para la búsqueda";
      }
    //Si el usuario no ha pulsado el botón, mostrará todos los trabajos
    }else{

      $consulta = "select * from trabajos, clientes WHERE trabajos.id_cliente=clientes.id order by titulo, nombre, fecha";
      $resultado = mysqli_query($conexion, $consulta);
      $numeroFilas = mysqli_num_rows($resultado);
      for ($i=0; $i < $numeroFilas; $i++) {
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        echo "<div id='cajaNoticia'>";
          echo "<h2>$fila[titulo]</h2><br>";
          echo "<p>$fila[descripcion]</p>";
          echo "<small>Cliente: $fila[nombre]</small>";
          echo "<div id='imgNoticias'>";
            echo "<img src='../img/trabajos/$fila[imagen]'><br>";
          echo "</div>";
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
