<?php
  require("conexion.php");{
    $fecha_1 = $_POST['fecha'];
    $agenda = $_POST['agenda'];
    $tipo = $_POST['tipo'];
    $activo = 1;
    $inicio = strtotime($fecha_1);
    $inicio = date('Y-m-d',$inicio);
    $inicio= date("Y-m-d H:i:s");
    $consulta = "INSERT INTO agenda (fecha,agenda,tipo,activo) VALUES ('$inicio','$agenda','$tipo','$activo')";
    mysqli_query($con, $consulta);
  }
?>