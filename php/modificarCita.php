  <?php
    include "./funciones.php";

    $fecha = $_POST['fecha2'];
	$id = $_POST['id2'];

    $conexion = conecta_bd();
    $update = "update citas set fecha = '" . $_POST['fecha'] . "', hora = '" . $_POST['hora'] . "', lugar = '" . $_POST['lugar'] . "', motivo = '" . $_POST['motivo'] . "' where fecha = '" . $fecha . "' and id_cliente = " . $id;

    mysqli_query($conexion, $update);
    mysqli_close($conexion);
    header("Location: ./citas.php");
   ?>
