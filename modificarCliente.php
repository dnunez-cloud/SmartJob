<?php
	require("conexion.php");
 	$id = $_POST['id'];
	$apellido_nombre = $_POST['apellido_nombre'];
	$dni = $_POST['dni'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$consulta4 = "UPDATE  clientes SET apellido_nombre='$apellido_nombre',dni='$dni',telefono='$telefono',direccion='$direccion',email='$email'where id='$id'";
  mysqli_query($con, $consulta4);
?>