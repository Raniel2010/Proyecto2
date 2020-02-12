<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php 
    include 'funciones/functions.php';
    while($todo = mysqli_fetch_row($pedido)){
        $id_pedido = $todo[0];
        $id_suplidor = $todo[1];
    $llevar = "INSERT INTO cuentas_pagar(id_pedido,id_suplidor) VALUES ($id_pedido,$id_suplidor)";  
    $llevado = mysqli_query($con,$llevar);
    header("Location:Cuentas_pagar2V3.php");
    }
    ?>
</body>
</html>