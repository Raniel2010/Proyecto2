<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="validar.js"></script>

  <?php
  include 'conexion.php';


  if (isset($_GET['id_cliente'])) {
    $id = $_GET['id_cliente'];
    $query = "SELECT * FROM cliente where id_cliente = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {

      while ($data = mysqli_fetch_array($result)) {

        $nombre = $data['nombre_cliente'];
        $apellido = $data['apellido_cliente'];
        $telefono = $data['telefono'];
        $correo = $data['correo'];
        $direccion = $data['direccion'];
        $cedula = $data['cedula_rnc'];
        $codigo = $data['membresia_tipo'];
      }
    }
  }

  try {
    if (isset($_POST['Aceptar'])) {
      $id = $_POST['id_cliente'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      $direccion = $_POST['direccion'];
      $cedula = $_POST['cedula'];
      $codigo = $_POST['codigo'];

      $sql = ("UPDATE cliente set nombre_cliente = '$nombre', apellido_cliente = '$apellido', telefono= '$telefono',correo= '$correo', direccion= '$direccion',cedula_rnc= '$cedula', membresia_tipo= '$codigo' WHERE id_cliente = '$id'");
      $result = mysqli_query($con, $sql);
      echo $result;
      header("Location:datos.php");
    }
  } catch (Exception $e) {
    echo "error";
    var_dump($e);
  }
  ?>

</head>

<body>
  <form method="POST" action="update.php" onsubmit="return validar();">

    <div class="col-md-3">


      <div class="card card-body">
        <form action="envio.php" method="POST" onsubmit="return validar();">
          <h1>Editar Cliente</h1>
          <br>
          <div class="form-group">
            <div class="row">

              <input type="text" id="fname" name="nombre" placeholder="Nombre" class="form-control" value="<?php echo $nombre; ?>">
              <br>
              <input type="text" id="email" name="apellido" placeholder="Apellido" class="form-control" value="<?php echo $apellido; ?>">
              <br>
              <input type="text" id="state" name="telefono" placeholder="Telefono" class="form-control" value="<?php echo $telefono; ?>">
              <br>
              <input type="text" id="adr" name="correo" placeholder="Correo" class="form-control" value="<?php echo $correo; ?>">
              <br>
              <input type="text" id="city" name="direccion" placeholder="Direccion" class="form-control" value="<?php echo $direccion; ?>">
              <br>
              <input type="text" id="name" name="cedula" placeholder="Cedula" class="form-control" value="<?php echo $cedula; ?>">
              <br>
              <input type="text" id="codigo" name="codigo" placeholder="10001" class="form-control" value="<?php echo $codigo; ?>">
              <br>
              <input type="hidden" name="id_cliente" value="<?= $id ?>">
              <form action="datos.php">
                <input type="submit" class="btn btn-Succes btn-block" name="save_task">
                <a href="datos.php"></a>

            </div>
        </form>


      </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>

</html>