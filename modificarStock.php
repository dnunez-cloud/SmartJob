<?php
	require("conexion.php");
 	$id = $_POST['id'];
	$costo = $_POST['costo'];
	$precio = $_POST['precio'];
	$consulta4 = "UPDATE  stock SET costo='$costo',precio='$precio' where id='$id'";
  mysqli_query($con, $consulta4);
?>