<?php
/*Este es el archivos de para eliminar los datos introducidos por el ususario*/
include "Conexion.php";
if (isset($_GET['id'] )){
$id = $_GET['id'];
$query ="DELETE FROM suplidor WHERE id_suplidor = $id";
$result = mysqli_query($con,$query);
if(!result){
    die("Ha fallado");
}
/*Este codigo es la alerta para notificar al usuario que se ha eliminado correctamente los datos! */
$_SESSION['message'] = 'Se ha removido Correctamente';
$_SESSION['message_type'] = 'danger';
header("location:Index.php");


}


?>