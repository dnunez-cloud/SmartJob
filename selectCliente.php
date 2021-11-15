<?php
	require("conexion.php");
	$consultaA = mysqli_query($con, "SELECT id, apellido_nombre, dni FROM clientes WHERE activo=1 ORDER BY apellido_nombre");
	echo '<option SELECTED>Listado de clientes</option>';
	while($fila = mysqli_fetch_array($consultaA, MYSQLI_ASSOC)) {
    echo '<option value="'.$fila['id'].'">'.$fila['apellido_nombre'].'</option>';
	}
	mysqli_free_result($result);
	mysqli_close($link);
?>