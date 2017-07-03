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
<select class="" name="">
<option value=""></option>
</select>

  <?php
    include "./funciones.php";
    menuLogeado(1);
    echo "<section id='nuevoTrabajo'>";
      echo "<h1>Insertar nuevo trabajo</h1>";
      echo "<div id='contenedorNuevoTrabajo'>";
        echo "<form method='POST' action='./insertarTrabajo.php' enctype='multipart/form-data'>
                <input type='text' name='titulo' placeholder='Título del trabajo'>
                <input type='file' name='foto' placeholder='Selecciona una foto'>
                <textarea type='text' name='descripcion' placeholder='Descripción del trabajo'></textarea>";


                $conexion = conecta_bd();
                $consulta = "select * from clientes";
                $resultado = mysqli_query($conexion, $consulta);
                $numeroFilas = mysqli_num_rows($resultado);
                echo "<select name='cliente' id='cliente'>";
                for ($i=0; $i < $numeroFilas; $i++) {
                  $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

                  echo "<option value='$fila[id]'>$fila[nombre] $fila[apellidos]</option>";
                }
                echo "</select>";


        echo "<input type='submit' name='enviar' value='Subir trabajo'>
        </form>";
      echo "</div>";
    echo "</section>";

    footer();
   ?>

</body>
</html>
