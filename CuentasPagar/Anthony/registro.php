<?php
include "Conexion.php";

if(isset($_POST['save_task'])){
$nombre = $_POST['nombre'];
$empresa= $_POST['empresa'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$rnc = $_POST['rnc'];

$query = "INSERT INTO suplidor(empresa,nombre_suplidor,direccion,telefono,correo,RNC) VALUES 
('$empresa','$nombre','$direccion','$telefono','$correo','$rnc')";
$result = mysqli_query($con,$query);

if(!$result){
    die("Todo Ha Fallado");
}
$_SESSION['message'] = 'SR/SRA '.$nombre.' Usted ha sido Registrado/a';
$_SESSION['message_type'] = 'success';
    header("Location: Index.php");
}
?>