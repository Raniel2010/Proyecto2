<?php
include 'conexion2.php';


$fecha_limite = $_POST['fecha_limite'];
$cargos_demora = $_POST['cargo_demora'];
$plazo_pago = $_POST['plazo_pago'];



$sql = "INSERT INTO cuentas_cobrar(fecha_limite,cargo_demora,plazo_pago) VALUES('$fecha_limite',$cargos_demora,'$plazo_pago')";
 $ejecutar = mysqli_query ($con,$sql) or die(mysqli_error($con));

 /*if (!$ejecutar){
     echo  "Hay un error";
 }
 else {
     echo "Datos guardados";
 }*/

 

 header("location:Index.php");