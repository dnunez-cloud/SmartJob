<?php
  require("conexion.php");
  $id = $_POST['id'];
  $agenda = $_POST['agenda'];
  $tipo = $_POST['tipo'];
  $consulta3 = "UPDATE  agenda SET agenda='$agenda',tipo='$tipo'where id='$id'";
  mysqli_query($con, $consulta3);
?>