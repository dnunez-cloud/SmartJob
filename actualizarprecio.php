<?php
	require("conexion.php");
 	$porcentaje = $_POST['porcentaje'];
	$consulta9 = "UPDATE  stock SET precio=precio * '1.$porcentaje'";
	mysqli_query($con, $consulta9);
?>