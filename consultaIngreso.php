<?php
	require("conexion.php");
	$consulta = mysqli_query($con, "SELECT * FROM ingresos WHERE activo=1 ORDER BY fecha DESC,id DESC");
	if (mysqli_num_rows($consulta) > 0){
		echo " <table> <thead> <tr> <th>N°</th> <th>Fecha</th> <th>Concepto</th> <th>Cliente</th> <th>Tipo</th> <th>Importe</th> </tr> </thead> </table> ";
		while($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
			$prioridad_color = array( 'E' => '#dd0000','I' => '#01BD18');
			echo "<table><tbody>";
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['fecha']."</td>";
    	echo "<td>".$row['concepto']."</td>";
			echo "<td>".$row['id_cliente']."</td>";
			echo "<td bgcolor=' ". $prioridad_color[$row['tipo']] ."'>".$row['tipo']."</td>"; 	
    	echo "<td>".$row['importe']."</td>";
			echo "</tr>";
			echo "</tbody></table>";
		}
	} 
	else { 
		echo " <table> <thead> <tr> <th>N°</th> <th>Fecha</th> <th>Concepto</th> <th>Cliente</th> <th>Tipo</th> <th>Importe</th> </tr> </thead> </table> ";
	}
?>