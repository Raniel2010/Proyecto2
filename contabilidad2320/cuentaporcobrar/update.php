<?php

include 'conexion2.php';

$id = $_POST['id_cobrar'];


$fecha_limite = $_POST['fecha_limite'];
$cargos_demora = $_POST['cargo_demora'];
$plazo_pago = $_POST['plazo_pago'];

$sql = "UPDATE cuentas_cobrar set  fecha_limite = '$fecha_limite', cargo_demora = '$cargos_demora',plazo_pago  = '$plazo_pago' WHERE id_cobrar = '$id'";
 $ejecutar = mysqli_query ($con,$sql) or die (mysqli_error($con));
 
 header("Location:Index.php");
 
 ?>