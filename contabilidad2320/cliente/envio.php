<?php

include 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$cedula = $_POST['cedula'];
$codigo = $_POST['codigo'];

$sql = "INSERT INTO  cliente values(id_cliente ,'$nombre','$apellido','$telefono','$correo','$direccion','$cedula','$codigo')";
 $ejecutar = mysqli_query ($con,$sql) or die (mysqli_error($con));
 

 /*if (!$ejecutar){
     echo  "Hay un error";
 }
 else {
     echo "Datos guardados";
 }*/
 
 $_SESSION['message'] = 'SR/SRA '.$nombre.' Usted ha sido Registrado/a';
$_SESSION['message_type'] = 'success';
 
 header("location:Index.php ");
 
 ?>
