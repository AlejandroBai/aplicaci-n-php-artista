  <?php

    include "./funciones.php";

    $cliente = $_POST['cliente'];
    $conexion = conecta_bd();
    $consulta = "select * from trabajos";
    $datos = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($datos);
    $nombre_foto = $numeroFilas + 1;
		$type_imagen = $_FILES['foto']['type'];
		$temporal = $_FILES['foto']['tmp_name'];

		switch ($type_imagen)
		{
			case 'image/jpeg':
				$nombre_foto_final = $nombre_foto . ".jpg";
				break;
			case 'image/png':
				$nombre_foto_final = $nombre_foto . ".png";
				break;

			case 'image/gif':
				$nombre_foto_final = $nombre_foto . ".gif";
				break;

			default: 'El archivo no es un archivo de imagen';
		}

    $ruta = "../img/trabajos/$nombre_foto_final";
		move_uploaded_file($temporal, $ruta);
    $insert = "insert into trabajos values ('', '" . $nombre_foto_final . "', '" . $_POST['titulo'] . "', '" . $_POST['descripcion'] . "', '" . date('Y-m-d') . "', '" . $cliente . "')";

    mysqli_query($conexion, $insert);
    mysqli_close($conexion);
    header("Location: ./trabajos.php");

   ?>
