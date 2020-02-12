<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css2/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/bootstrap-grid.min.css">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>Document</title>
   
    <script src="validar.js"></script>
    <script src="Confirmar.js"></script>

    
  
</head>
<body>
  
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Cuentas por cobrar</div>
      <div class="list-group list-group-flush">
        <a href="Index.php" class="list-group-item list-group-item-action bg-light">Cliente</a>
        <a href="../cuentaporcobrar/Index.php" class="list-group-item list-group-item-action bg-light">Cuentas por cobrar</a>
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
      </nav>
<?php include "conexion.php" ?>
        
<div class= "container-fluid p-4 ">
<div class = "row">

<div class="col-md-3">

  
  <div class="card card-body">
  <?php  
  if(isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php session_unset(); } ?>
  
<form action="envio.php" method="POST" onsubmit="return validar();">
<h1>Cliente</h1>
<br>
<div class="form-group">

<input  type="text" id="fname" name="nombre"  placeholder="Nombre" class="form-control"  autofocus required>
<br>
<input type="text" id="apellido" name="apellido" placeholder="Apellido" class="form-control"  autofocus required>
<br>
<input type="text" id="telefono" name="telefono" placeholder="Telefono" class="form-control"  autofocus required>
<br>

<input type="email" id="correo" name="correo"   placeholder="Correo" class="form-control"  autofocus required>
  </div>
  <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="form-control"  autofocus required>
<br>
<input type="text" id="cedula" name="cedula"  placeholder="Cedula" class="form-control"  autofocus required>
<br>
<input type="text" id="membresia" name="codigo" placeholder="Membresia" class="form-control"  autofocus required>
<br>
<input type="submit" class = "btn btn-success btn-block" name="save_task" value= "Enviar">

</form>

</div>
</div>
<div class="col-md-9">

<table class="table table-bordered">

  <thead>

</form>
<tr>
<th scope="col">Id</th>
<th scope="col">Nombre</th>
<th scope="col">Apellido</th>
<th scope="col">Telefono</th>
<th scope="col">Correo</th>
<th scope="col">Direccion</th>
<th scope="col">Cedula</th>
<th scope="col">Membresia</th>
<th scope="col">Acciones</th>

</tr>
  </thead>

<?php
$ql="SELECT * from cliente";
$resultado=mysqli_query($con,$ql);
while($mostrar=mysqli_fetch_array($resultado)){
?>


  <tbody>
    <tr>
<td><?php echo $mostrar['id_cliente']?></td>
<td><?php echo $mostrar['nombre_cliente']?></td>
<td><?php echo $mostrar['apellido_cliente']?></td>
<td><?php echo $mostrar['telefono']?></td>
<td><?php echo $mostrar['correo']?></td>
<td><?php echo $mostrar['direccion']?></td>
<td><?php echo $mostrar['cedula_rnc']?></td>
<td><?php echo $mostrar['membresia_tipo']?></td>

<td>
<a href=" editar.php?id_cliente=<?php echo $mostrar['id_cliente'];?>"  class = "btn btn-primary">

<i class="fas fa-edit"></i>
</a>

  <a href="delete.php?id_cliente=<?php echo $mostrar['id_cliente'];?>" class = "btn btn-danger">
  <i class="fas fa-trash-alt"></i>
  </a>
</td>
</tr>

      <?php } ?>
  </tbody>
</table>

</div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  </body>
</html>
