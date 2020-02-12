<?php




include 'conexion.php';
if (isset($_GET["id_cliente"])){
    $id = $_GET['id_cliente'];
    $query = "DELETE FROM cliente WHERE id_cliente = $id";
    $result = mysqli_query($con,$query);
}

$_SESSION['message'] = 'Se ha removido Correctamente';
$_SESSION['message_type'] = 'danger';

header("location:Index.php");

?>