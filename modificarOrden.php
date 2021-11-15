<?php
	require("conexion.php");
 	$id = $_POST['id'];
 	$fecha = $_POST['fecha'];
 	$equipo = $_POST['equipo'];
 	$reparacion = $_POST['reparacion'];
 	$presupuesto = $_POST['presupuesto'];
 	$fecha_entrega = $_POST['fecha_entrega'];
 	$imei = $_POST['imei'];
 	$estado = $_POST['estado'];
	if ($estado != "EN" && $estado != "SD") {
		$fecha_entrega = 0;
	}
 	$consulta11 = "UPDATE ordenes SET fecha='$fecha',equipo='$equipo',reparacion='$reparacion',presupuesto='$presupuesto',fecha_entrega='$fecha_entrega',imei='$imei',estado='$estado' where id='$id'";
  mysqli_query($con, $consulta11);
?>
<?php
	require("conexion.php");
	$items=json_decode($_POST["array"], true );

	foreach ($items as $p => $d) {
		$id_producto = intval($d['id_producto']);
		$cantidad = intval($d['cantidad']);
		$consulta7 = "UPDATE stock SET stock=stock -'$cantidad' where id='$id_producto'";
		mysqli_query($con, $consulta7);
	}
?>
<?php
	require("conexion.php");
	$items=json_decode($_POST["array"], true );
	$id_orden= $_POST['id'];

	foreach ($items as $p => $d) {
		$id_producto = intval($d['id_producto']);
		$cantidad = intval($d['cantidad']);
		$precio = intval($d['precio']);

	  $consulta56 = "INSERT INTO ordenes_stock (cantidad,precio,id_producto,id_orden) VALUES ('$cantidad','$precio','$id_producto','$id_orden')";
		mysqli_query($con, $consulta56);
	}
?>
