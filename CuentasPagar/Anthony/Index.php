<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Cuentas por pagar</div>
      <div class="list-group list-group-flush">
        <a href="../index.php" class="list-group-item list-group-item-action bg-light">Informacion pedidos</a>
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Suplidores</a>
        <a href="../phpRaniel2/Cuentas_pagar2V3.php" class="list-group-item list-group-item-action bg-light">Pedido suplidor</a>
        
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
<?php include "header.php"?>
<?php include "Conexion.php" ?>
    
<div class= "container-fluid p-4 ">
<div class = "row">

<div class="col-md-3">
  <?php  
  if(isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php session_unset(); } ?>
  
  <div class="card card-body">
<form action="registro.php" method="POST" onsubmit="return validar();">

<h3 class="text-center">Registro </h3>
<h4 class="text-center">Suplidor </h4>
<br>
  <div class="form-group">

<input  type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
<br>
<input type="text" id="empresa" name="empresa" class="form-control" placeholder="Empresa" autofocus required>
<br>
<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion" autofocus required>
<br>
<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" autofocus required>
  </div>
  <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo" autofocus required>
<br>
<input type="text" id="rnc" name="rnc" class="form-control" placeholder="RNC" autofocus required>
<br>
<input type="submit" class = "btn btn-success btn-block" name="save_task" value= "Registrar">

</form>
</div>
</div>
<div class="col-md-9">

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Empresa</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>RNC</th>
      <th>Acciones</th>
    
    </tr>
  </thead>
  <tbody>
      <?php 
       $sql = "SELECT * FROM suplidor";
       $resultado = mysqli_query($con, $sql);
      while ($filas = mysqli_fetch_array($resultado) ){
      ?> 

    <tr>
      <th><?php echo $filas['id_suplidor']?></th>
      <td><?php echo $filas['empresa']?></td>
      <td><?php echo $filas['nombre_suplidor']?></td>
      <td><?php echo $filas['direccion']?></td>
      <td><?php echo $filas['telefono']?></td>
      <td><?php echo $filas['correo']?></td>
      <td><?php echo $filas['RNC']?> </td>
      <td> 
      <a href="editar.php?id=<?php echo $filas['id_suplidor']?>" class="btn btn-secondary">
      <i class="fas fa-user-edit"></i>
      </a>
      <a href="eliminar.php?id=<?php echo $filas['id_suplidor']?>" class="btn btn-danger">
       <i class="far fa-trash-alt"></i>
      </a>
      </td>

      
    </tr>

      <?php } ?>
  </tbody>
</table>

</div>
  </div>
 
 
<?php include "footer.php" ?>


