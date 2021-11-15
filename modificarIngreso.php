<?php
	require("conexion.php");
 	$id = $_POST['id'];
 	$fecha = $_POST['fecha'];
 	$importe = $_POST['importe'];
 	$consulta4 = "UPDATE ingresos SET fecha='$fecha',importe='$importe' where id='$id'";
  mysqli_query($con, $consulta4);
?>