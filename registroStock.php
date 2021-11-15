<?php
	require("conexion.php");{
    $costo = $_POST['costo'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
		$activo = 1;
    $consulta4 = "INSERT INTO stock (costo,producto,precio,stock,activo) VALUES ('$costo','$producto','$precio','$stock','$activo')";
    mysqli_query($con, $consulta4);
	}
?>