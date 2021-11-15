<?php
  include("conexion.php");
  $id=$_POST['id'];
  $query ="SELECT * FROM ordenes where activo=1 AND id='$id'";
  $resultado = $con->query($query);
  $datos = new stdClass();
  $fila = $resultado->fetch_array();
  $datos->fecha= $fila['fecha'];
  $datos->equipo= $fila['equipo'];
  $datos->reparacion= $fila['reparacion'];
  $datos->presupuesto= $fila['presupuesto'];
  $datos->id_cliente= $fila['id_cliente'];
  $datos->fecha_entrega= $fila['fecha_entrega'];
  $datos->estado= $fila['estado'];
  $datos->imei= $fila['imei'];
  echo json_encode($datos);
?>