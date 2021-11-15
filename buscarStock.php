<?php
	include("conexion.php");
	$id=$_POST['id'];
	$query ="SELECT * FROM stock where id='$id' AND activo=1";
	$resultado = $con->query($query);
	$datos = new stdClass();
	$fila = $resultado->fetch_array();
	$datos->costo= $fila['costo'];
	$datos->producto= $fila['producto'];
	$datos->precio= $fila['precio'];
	$datos->stock= $fila['stock'];
	echo json_encode($datos);
?>