<?php
	require("conexion.php");       
	{
    $apellido_nombre = $_POST['apellido_nombre'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
		$email = $_POST['email'];
		$activo = 1;
    $consulta4 = "INSERT INTO clientes (apellido_nombre,dni,telefono,direccion,email,activo) VALUES ('$apellido_nombre','$dni','$telefono','$direccion','$email','$activo')";
    mysqli_query($con, $consulta4);
	}
?>