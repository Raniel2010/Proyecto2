<?php
	$con = mysqli_connect("localhost","root","","trabajo");
	$salida = "";
	$query = "SELECT * FROM pedido_proveedor ORDER BY id_pedido";
 	if(isset($_POST['consulta'])){
 		$q = $mysqli->real_escape_string($_POST['consulta']);
 		$query = "SELECT id_pedido,monto,modo_pago,id_producto,fecha_pago,fecha_recibo,estado FROM pedido_proveedor WHERE id_pedido LIKE '%".$q."%' OR id_producto LIKE '%".$q."%' OR monto LIKE '%".$q."%' ";
 	}
 	$resultado = $con->query($query);

 	if($resultado ->num_rows > 0){
 		$salida.="<table class='tabla_datos'>
 					<thead>
 						<tr>
 							<td>id_pedido</td>
 							<td>monto</td>
 							<td>modo_pago</td>
 							<td>id_productop</td>
 							<td>fecha_pago</td>
 							<td>fecha_recibo</td>
 							<td>estado</td>
 						</tr>
 					</thead>
 					<tbody>";

 					while($fila = $resultado->fetch_assoc()){
 						$salida.="<tr>
 							      <td>".$fila['id_pedido']."</td>
 							      <td>".$fila['monto']."</td>
 							      <td>".$fila['modo_pago']."</td>
 							      <td>".$fila['id_producto']."</td>
 							      <td>".$fila['fecha_pago']."</td>
 							      <td>".$fila['fecha_recibo']."</td>
 							      <td>".$fila['estado']."</td>
 						</tr>";
 					}
 					$salida.="</tbody></table>";
 	}else{
 		$salida.="No se encontraron lo datos:(";
 	}
 	echo $salida;
 	$mysqli->close();


?>