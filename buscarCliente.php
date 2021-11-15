<?php
  include("conexion.php");
  $id=$_POST['id'];
  $query ="SELECT * FROM clientes where id='$id' AND activo=1";
  $resultado = $con->query($query);
  $datos = new stdClass();
  $fila = $resultado->fetch_array();
	$datos->apellido_nombre= $fila['apellido_nombre'];
	$datos->email= $fila['email'];
	$datos->direccion= $fila['direccion'];
	$datos->dni= $fila['dni'];
  $datos->telefono= $fila['telefono'];
  echo json_encode($datos);
?>