<?php
	$busquedaDni=$_POST['busquedaDni'];
	require("conexion.php");
	$consulta = mysqli_query($con, "SELECT * FROM clientes WHERE dni LIKE '%$busquedaDni%' AND activo=1 OR apellido_nombre LIKE '%$busquedaDni%' AND activo=1 ORDER BY apellido_nombre");
	if (mysqli_num_rows($consulta) > 0){
		echo " <table> <thead> <tr> <th>Id</th> <th>Apellido y nombre</th> <th>Dni</th> <th>Telefono</th> <th>Direccion</th> <th>Email</th></tr> </thead> </table> ";
		while($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
			echo "<table><tbody>";
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['apellido_nombre']."</td>";
			echo "<td>".$row['dni']."</td>";
			echo "<td>".$row['telefono']."</td>";
			echo "<td>".$row['direccion']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "</tr>";
			echo "</tbody></table>";
		}
	} 
	else { 
		echo " <table> <thead> <tr> <th>Cod</th> <th>Apellido y nombre</th> <th>Dni</th> <th>Telefono</th> <th>Direccion</th> <th>Email</th></tr> </thead> </table> ";
	}
?>