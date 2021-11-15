<?php
	include("conexion.php");
	$id=$_POST['id'];
	$query ="SELECT id,producto,stock,precio  FROM stock where id='$id' AND activo=1";
	$resultado = $con->query($query);
	$datos = new stdClass();
	$fila = $resultado->fetch_array();
	$datos->id= $fila['id'];
	$datos->producto= $fila['producto'];
	$datos->stock= $fila['stock'];
	$datos->precio= $fila['precio'];
	echo json_encode($datos);
?>