<?php
	require("conexion.php");
	$consulta = mysqli_query($con, "SELECT id, producto, stock FROM stock WHERE activo=1 ORDER BY producto");
	echo '<option SELECTED>Productos en stock</option>';
	while($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
    echo '<option value="'.$fila['id'].'">'.$fila['producto'].'</option>';
	}
	echo '<option value="GV">Gastos varios</option>';
	mysqli_free_result($result);
	mysqli_close($link);
?>