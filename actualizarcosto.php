<?php
	require("conexion.php");
 	$porcentaje = $_POST['porcentaje'];
 	$consulta9 = "UPDATE  stock SET costo=costo * '1.$porcentaje'";
  mysqli_query($con, $consulta9);
?>