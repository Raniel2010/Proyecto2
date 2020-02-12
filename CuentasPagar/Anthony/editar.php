<?php
/*Aqui Incluimos el archivo de la conexion */
include "Conexion.php";
/*
Este es es el alrchivo de editar el cual se utiliza para modificar los datos que el usuario ha introducido en la interfaz 
del programa. 
*/
if (isset($_GET['id'] )){
$id = $_GET['id'];
$query ="SELECT * FROM suplidor WHERE id_suplidor = $id";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 1){
    $filas = mysqli_fetch_array($result);
    $empresa = $filas['empresa'];
     $nombre = $filas['nombre_suplidor'];
     $direccion = $filas['direccion'];
     $telefono = $filas['telefono'];
    $correo= $filas['correo'];
    $rnc = $filas['RNC'];
    
}


}
if(isset($_POST['Actualizar'])){
$id = $_GET['id'];
    
    $nombre = $_POST['nombre_suplidor'];
    $empresa = $_POST['empresa'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rnc = $_POST['RNC'];
/*Este es el query de la actualizacion de los datos del usuario  */
 $query = "UPDATE suplidor set nombre_suplidor = '$nombre', empresa = '$empresa', direccion = '$direccion', telefono = '$telefono', correo = '$correo',RNC = '$rnc' WHERE id_suplidor = $id ";
 mysqli_query($con,$query);

 $_SESSION['message'] = 'Se ha Actualizado Correctamente!';
 $_SESSION['message_type'] = 'info';
 header("location:Index.php");
}

?>

<?php include "header.php" 

/*Interfaz del formulario para modificar o actualizar los datos introducidos por el usuario

*/
?>
<div class="container p-4">
<div class="row">   
<div class="col-md-4 mx-auto">
<div class="card card-body">
<form action="editar.php?id=<?php echo $_GET['id'];?> " method="POST" onsubmit="return validar();">
<div class="form-group">
<h3 class="text-center">Actualizar Informacion </h3>
<h4 class="text-center">Suplidor </h4>
<input type="text" id="nombre" name="nombre_suplidor" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar Nombre ">
<br>
<input type="text"  id="empresa" name="empresa" value="<?php echo $empresa; ?>" class="form-control" placeholder="Actualizar Empresa ">
<br>
<input type="text"  id="direccion" name="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="Actualizar Direccion">
<br>
<input type="text" id="telefono"  name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar Telefono">
<br>

<input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" class="form-control" placeholder="Actualizar Correo">
<br>

<input type="text" id="rnc"  name="RNC" value="<?php echo $rnc?>" class="form-control" placeholder="Actualizar RNC">

</div>
<button class = "btn btn-success btn-block" name="Actualizar" >
Actualizar
</button>
<a href="Index.php" class="btn btn-info btn-block" name="volver" >
Volver</a>

 </form>
</div>
</div>

</div>


</div>

<?php include "footer.php" ?>

