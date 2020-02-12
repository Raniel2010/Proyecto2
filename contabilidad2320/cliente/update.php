<?php

include 'conexion.php';

$id = $_POST['id_cliente'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];
$codigo = $_POST['codigo'];

$sql = "UPDATE cliente set nombre_cliente = '$nombre',apellido_cliente = '$apellido',telefono= '$telefono',correo= '$correo',direccion = '$direccion', cedula_rnc = '$cedula', membresia_tipo = '$codigo' WHERE id_cliente = '$id'";
 $ejecutar = mysqli_query ($con,$sql) or die (mysqli_error($con));

 $_SESSION['message'] = 'Se ha Actualizado Correctamente!';
 $_SESSION['message_type'] = 'info';
 
 header("Location:Index.php");


