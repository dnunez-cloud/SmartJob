<?php
  include("conexion.php");
  $id=$_POST['id'];
  $query ="SELECT * FROM agenda where id='$id' AND activo=1";
  $resultado = $con->query($query);
  $datos = new stdClass();
  $fila = $resultado->fetch_array();
  $datos->agenda= $fila['agenda'];
  echo json_encode($datos);
?>