<?php
	include "./conexion.php";
$sql = "SELECT * FROM pedido_proveedor";
$resultado = mysqli_query($con,$sql);
$operando = mysqli_query($con,$sql);
$s_p = mysqli_query($con,$sql);
$id_pedido = mysqli_query($con,'SELECT id_pedido FROM pedido_proveedor');
$resultado2 = mysqli_query($con,'SELECT id_suplidor FROM suplidor');
$producto = mysqli_query($con, 'SELECT id_producto FROM producto');
$p_n = mysqli_query($con, 'SELECT * FROM producto');
$n_s = mysqli_query($con, 'SELECT id_suplidor,nombre_suplidor FROM suplidor');
$pedido = mysqli_query($con, 'SELECT id_pedido,id_suplidor FROM pedido_proveedor');

$data_array = array(
        'id' => 'id_proveedor',
        'id_producto' => 'id_producto'
);
?>