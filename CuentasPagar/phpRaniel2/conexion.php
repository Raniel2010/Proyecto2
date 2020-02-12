<?php
	function conexion(){
		return $conexion = mysqli_connect('localhost','root','','cuentas_principal');
	}
	$con = conexion();

	/*if(!empty($con)){
		echo "conectado";
	}else{
		echo"no conectado";
	}
	
	$query = "SELECT * FROM pedido_proveedor";
	$con = mysqli_query($conexion,$query);*/

?>