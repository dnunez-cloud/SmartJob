<?php
	require("conexion.php");
	$consulta = mysqli_query($con, "SELECT * FROM agenda WHERE activo=1 ORDER BY fecha DESC,id DESC");
	if (mysqli_num_rows($consulta) > 0){
		echo " <table> <thead> <tr> <th>N°</th> <th>Fecha</th> <th>Agenda</th> <th>Tipo</th> </tr> </thead> </table> ";
		while($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
			$prioridad_color = array( 'P' => '#dd0000','N'=>'white');
			echo "<table><tbody>";
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['fecha']."</td>";
			echo "<td>".$row['agenda']."</td>";
			echo "<td bgcolor=' ". $prioridad_color[$row['tipo']] ."'>".$row['tipo']."</td>"; 	
			echo "</tr>";
			echo "</tbody></table>";
		}
	} 
	else { 
		echo " <table> <thead> <tr> <th>Id</th> <th>Fecha</th> <th>Agenda</th> <th>Tipo</th> </tr> </thead> </table> ";
	}
?>
