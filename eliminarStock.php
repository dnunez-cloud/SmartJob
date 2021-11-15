<?php
	require("conexion.php");
 	$id = $_POST['id'];
	$consulta4 = "UPDATE  stock SET activo=0 where id='$id'";
  mysqli_query($con, $consulta4);
?>