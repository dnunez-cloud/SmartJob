<?php
	require("conexion.php");
  $producto=$_POST['producto'];
	$consulta = mysqli_query($con, "SELECT * FROM stock WHERE producto LIKE '%$producto%' AND activo=1 ORDER BY producto");
	if (mysqli_num_rows($consulta) > 0){
		echo " <table> <thead> <tr> <th>Código</th> <th>Costo</th> <th>Producto</th> <th>Precio</th> <th>Stock</th> </tr> </thead> </table> ";
		while($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
			$prioridad_color = array(0=>'red',1=>'yellow',2=>'yellow',3=>'yellow');
			echo "<table><tbody>";
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['costo']."</td>";
			echo "<td>".$row['producto']."</td>";
			if($row['precio'] <= $row['costo']){
				echo "<td bgcolor='red'>".$row['precio']."</td>";
			}
			else {
				echo "<td>".$row['precio']."</td>";
			}
			if ($row['stock']<4) {
				echo "<td bgcolor=' ". $prioridad_color[$row['stock']] ."'>".$row['stock']."</td>"; 	
			}
			else {
				echo "<td>".$row['stock']."</td>";
			}
			echo "</tr>";
			echo "</tbody></table>";
		}
	} 
	else { 
		echo " <table> <thead> <tr> <th>Id</th> <th>Costo</th> <th>Producto</th> <th>Precio</th> <th>Stock</th> </tr> </thead> </table> ";
	}
?>