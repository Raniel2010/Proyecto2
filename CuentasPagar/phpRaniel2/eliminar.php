<!DOCTYPE html>
<html>
<head>

	<title></title>
</head>
<body>	
	<?php
	include 'conexion.php';

		$query = ("DELETE FROM pedido_proveedor WHERE id_pedido ='".$_GET['del_id']."' ");
		$result = mysqli_query($con,$query);
		header("Location: Cuentas_pagar2V3.php");
	?>
</body>
</html>