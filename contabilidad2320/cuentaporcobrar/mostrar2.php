<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/bootstrap-grid.min.css">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">

    <title>mostrar</title>
    <?php
    include 'conexion2.php';
    ?>
</head>
<body>
<div class="container p-4">
<div class="row">
<div class="col-md-8">
    <table class="table table-bordered">
<thead>
    <tr>
        <th>Id Cobrar</th>
        <th>Id Cliente</th>
     
        <th>Fecha limite</th>
        <th>Cargos de mora</th>
        <th>Plazo de pago</th>
        <th>Acciones</th>
    </tr>
    </thead>

<?php
$sql="SELECT * from cuentas_cobrar";
$resultado=mysqli_query($con,$sql);
while($mostrar=mysqli_fetch_array($resultado)){
?>
<tr>
<td><?php echo $mostrar['id_cobrar']?></td>
<td><?php echo $mostrar['id_cliente']?></td>
<td><?php echo $mostrar['fecha_limite']?></td>
<td><?php echo $mostrar['cargos_demora']?></td>
<td><?php echo $mostrar['plazo_pago']?></td>
 
<td>

<a href=" update2.php?id_cobrar=<?php echo $mostrar['id_cobrar'];?>"> 
<i class=" fas fa-edit">Editar</i>
</a>

<a href="delete.php?delete=<?php echo $mostrar['id_cobrar']; ?>">
<i class=" fas fa-trash-alt">Eliminar</i>
</a>

</td>
</tr>

<?php


}?>
    </table>
    </div>
    </div>
    </div>
    <form action="cuenta-por-cobrar.php">
<input type="submit" value="Agregar Nuevo Ususario" class="btn btn-Succes">
    <a href="cuenta-por-cobrar.php"></a>
    </form>
    
    <script src="../js/jquery.js" ></script>
<script src="../js/bootstrap.js"></script>

</body>
</html>