<?php
  require("conexion.php");
  $id = $_POST['id'];
  $consulta4 = "UPDATE  ordenes SET activo=0 where id='$id'";
  mysqli_query($con, $consulta4);
?>