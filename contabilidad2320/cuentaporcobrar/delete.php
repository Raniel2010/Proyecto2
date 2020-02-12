<?php
/*
include 'conexion.php';

$id = $_POST['id_cliente'];

$sql = "DELETE FROM cliente  WHERE id_cliente = '$id'";
 $ejecutar = mysqli_query ($con,$sql) or die (mysqli_error($con));

*/



include 'conexion2.php';

//$mysqli = new mysqli('localhost','root','','projecto') or die (mysqli_error($mysqli));


if (isset($_GET['id_cobrar'])) {
    $id = $_GET['id_cobrar'];
    $mysqli = "DELETE FROM cuentas_cobrar WHERE id_cobrar=$id";
    mysqli_query($con, $mysqli);
}

$_SESSION['message'] = 'Se ha removido Correctamente';
$_SESSION['message_type'] = 'danger';


header("location:Index.php");
