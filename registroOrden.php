<?php
	require("conexion.php");{
    $fecha = $_POST['fecha'];
    $inicio = strtotime($fecha);
    $inicio = date('Y-m-d',$inicio);
    $inicio= date("Y-m-d H:i:s");
    $equipo = $_POST['equipo'];
    $reparacion = $_POST['reparacion'];
    $presupuesto = $_POST['presupuesto'];
    $id_cliente = $_POST['id_cliente'];
    $imei = $_POST['imei'];
    $estado = "PE";
		$activo = 1;
    $consulta10 = "INSERT INTO ordenes (fecha,equipo,reparacion,presupuesto,id_cliente,imei,estado,activo) VALUES ('$inicio','$equipo','$reparacion','$presupuesto','$id_cliente','$imei','$estado','$activo')";
    mysqli_query($con, $consulta10);
	}
?>