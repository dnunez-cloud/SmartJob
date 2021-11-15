<?php
	require("conexion.php");
  $dniCliente= $_POST['dniCliente'];
	$consulta = mysqli_query($con, "SELECT * FROM ordenes WHERE id_cliente=(SELECT id FROM clientes WHERE dni='$dniCliente') AND activo=1 ORDER BY fecha DESC,id DESC");
	if (mysqli_num_rows($consulta) > 0){
		echo " <table> <thead> <tr><th>Cod</th><th>Fecha</th> <th>Cliente</th> <th>Equipo</th> <th>Reparacion</th> <th>Precio</th> <th>Fecha de entrega</th><th>E</th></tr> </thead> </table> ";
		while($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
			$prioridad_color = array( 'PE' => 'red','EN' => '#01BD18','HE'=>'yellow','EP'=>'#66ecff','SA'=>'orange','SD'=>'lime');
			echo "<table><tbody>";
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['fecha']."</td>";
			echo "<td>".$row['id_cliente']."</td>";
    	echo "<td>".$row['equipo']."</td>";
    	echo "<td>".$row['reparacion']."</td>";
    	echo "<td>".$row['presupuesto']."</td>";
			if($row['fecha_entrega'] === '0000-00-00'){
				echo "<td>".empty($row)."</td>";
			}
    	else {
				echo "<td>".$row['fecha_entrega']."</td>";
			}
			echo "<td bgcolor=' ". $prioridad_color[$row['estado']] ."'>".$row['estado']."</td>"; 	
			echo "</tr>";
			echo "</tbody></table>";
		}
	} 
	else { 
		echo " <table> <thead> <tr><th>Cod</th><th>Fecha</th> <th>Cliente</th> <th>Equipo</th> <th>Reparacion</th> <th>Presupuesto</th> <th>Fecha de entrega</th><th>E</th></tr> </thead> </table> ";
	}
?>