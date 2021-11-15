<?php
  include("conexion.php");
  $id=$_POST['id'];
  $query ="SELECT * FROM ingresos where id='$id' AND activo=1";
  $resultado = $con->query($query);
  $datos = new stdClass();
  $fila = $resultado->fetch_array();
  $datos->fecha= $fila['fecha'];
  $datos->concepto= $fila['concepto'];
  $datos->tipo= $fila['tipo'];
  $datos->importe= $fila['importe'];
  $datos->id_cliente= $fila['id_cliente'];
  echo json_encode($datos);
?>