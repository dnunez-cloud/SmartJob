<?php
	require("conexion.php");
  $fecha = $_POST['fecha'];
  $concepto = $_POST['concepto'];
  $tipo = $_POST['tipo'];
  $importe = $_POST['importe'];
	$id_cliente = $_POST['id_cliente'];
	$activo = 1;
  $consulta5 = "INSERT INTO ingresos (fecha,concepto,id_cliente,tipo,importe,activo) VALUES ('$fecha','$concepto','$id_cliente','$tipo','$importe','$activo')";
  mysqli_query($con, $consulta5);
?>
<?php
	require("conexion.php");
	$tipo = $_POST['tipo'];
	$items=json_decode($_POST["array"], true );

	foreach ($items as $p => $d) {
		$id_producto = intval($d['id_producto']);
		$cantidad = intval($d['cantidad']);

		if ($tipo =="I"){
			$consulta7 = "UPDATE stock SET stock=stock - '$cantidad' where id='$id_producto'";
			mysqli_query($con, $consulta7);
		}
		else {
			$consulta7 = "UPDATE stock SET stock=stock + '$cantidad' where id='$id_producto'";
			mysqli_query($con, $consulta7);
		}
	}
?>
<?php
	require("conexion.php");
	$items=json_decode($_POST["array"], true );

	foreach ($items as $p => $d) {
		$id_producto = intval($d['id_producto']);
		$cantidad = intval($d['cantidad']);
		$precio = intval($d['precio']);

	  $consulta55 = "INSERT INTO ingresos_stock (id_ingreso,id_producto,cantidad,precio) VALUES ((SELECT MAX(id) FROM ingresos),'$id_producto','$cantidad','$precio')";
		mysqli_query($con, $consulta55);
	}
?>