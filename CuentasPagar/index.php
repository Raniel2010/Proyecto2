<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css">
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css2/simple-sidebar.css" rel="stylesheet">
</head>

<body>
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">Cuentas por pagar</div>
  <div class="list-group list-group-flush">
    <a href="index.php" class="list-group-item list-group-item-action bg-light">Informacion pedidos</a>
    <a href="Anthony/index.php" class="list-group-item list-group-item-action bg-light">Suplidores</a>
    <a href="phpRaniel2/Cuentas_pagar2V3.php" class="list-group-item list-group-item-action bg-light">Pedido suplidor</a>
    
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
          <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        
      </ul>
    </div>
  </nav>

  <?php
  $con = mysqli_connect("localhost", "root", "", "cuentas_principal");
  ?>


  <table class="table table-striped">
    <thead class="thead">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Empresa</th>
        <th scope="col">Suplidor</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Producto/Servicio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Fecha de recibo</th>
        <th scope="col">Fecha de pago</th>
        <th scope="col">Modo pago</th>
        <th scope="col">Monto</th>
        <th scope="col">Estado</th>
        



      </tr>
    </thead>
    <?php $sql = 
          "SELECT s.id_suplidor,s.empresa,s.nombre_suplidor,s.direccion,s.telefono,s.correo,p.producto_nombre,p.cantidad,pedido.fecha_recibo,pedido.fecha_pago,pedido.modo_pago,pedido.monto,pedido.estado
          FROM cuentas_pagar 
          inner join pedido_proveedor as pedido
          on pedido.id_pedido = cuentas_pagar.id_pedido
          inner join suplidor as s
          on s.id_suplidor = cuentas_pagar.id_suplidor
          inner join producto as p
          on p.id_producto = pedido.id_producto
          Group by id_pagar";

    $resultado = mysqli_query($con, $sql);
    while ($filas = mysqli_fetch_array($resultado)) {
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $filas['id_suplidor'] ?></th>
          <td><?php echo $filas['empresa'] ?></td>
          <td><?php echo $filas['nombre_suplidor'] ?></td>
          <td><?php echo $filas['direccion'] ?></td>
          <td><?php echo $filas['telefono'] ?></td>
          <td><?php echo $filas['correo'] ?></td>
          <td><?php echo $filas['producto_nombre'] ?></td>
          <td><?php echo $filas['cantidad'] ?></td>
          <td><?php echo $filas['fecha_recibo'] ?></td>
          <td><?php echo $filas['fecha_pago'] ?></td>
          <td><?php echo $filas['modo_pago'] ?></td>
          <td><?php echo $filas['monto'] ?></td>
          <td><?php echo $filas['estado'] ?></td>
          

        </tr>

      <?php } ?>

      </tbody>
  </table>

  <footer>

  </footer>

  <script src="js/jquery.js"></script>
  <script src="/Jeremy/js/bootstrap.js"></script>
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