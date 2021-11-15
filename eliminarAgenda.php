<?php
  require("conexion.php");
  $id = $_POST['id'];
  $consulta1 = "UPDATE  agenda SET activo=0 where id='$id'";
  mysqli_query($con, $consulta1);
?>