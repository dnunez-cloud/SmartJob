<?php
	include("conexion.php");
	$id=$_POST['id'];
	$query ="SELECT id, apellido_nombre, dni  FROM clientes where id='$id' AND activo=1";
	$resultado = $con->query($query);
	$datos = new stdClass();
	$fila = $resultado->fetch_array();
	$datos->id= $fila['id'];
	$datos->apellido_nombre= $fila['apellido_nombre'];
	$datos->dni= $fila['dni'];
	echo json_encode($datos);
?>