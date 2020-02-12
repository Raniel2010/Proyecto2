<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="validar.js"></script>

  <!-- php
-->
  <?php
  include 'conexion2.php';

  $id;
  if (isset($_GET['id_cobrar'])) {
    $id = $_GET['id_cobrar'];
    $query = "SELECT * FROM cuentas_cobrar where id_cobrar = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
      while ($data = mysqli_fetch_array($result)) {

        $cargos_demora = $data['cargo_demora'];
        $fecha_limite = $data['fecha_limite'];
        $plazo_pago = $data['plazo_pago'];
      }
    }
  }

  try {
    if (isset($_POST['editar'])) {

      $fecha_limite = $_POST['fecha_limite'];
      $cargos_demora = $_POST['cargo_demora'];
      $plazo_pago = $_POST['plazo_pago'];

      $query2 = ("UPDATE cuentas_cobrar SET fecha_limite = '$fecha_limite', cargo_demora = $cargos_demora, plazo_pago = $plazo_pago WHERE id_cobrar = $id ");
      mysqli_query($con, $query2);
      header("Location:Index.php");
    }
  } catch (Exception $e) {
    echo "error";
    var_dump($e);
  }
  ?>

</head>

<body>
  <form method="POST" action="update.php" onsubmit="return validar();">
    <h2>Sistema de cuenta por cobrar</h2>

    <div class="col-md-3">


      <div class="card card-body">
        <form action="envio3.php" method="POST" onsubmit="return validar();">
          <br>
          <div class="form-group">
            <input type="date" id="plazo_pago" name="plazo_pago" value="<?php echo $plazo_pago; ?>">
            <br>
          </div>
          <input type="text" id="cargo_demora" name="cargo_demora" value="<?php echo $cargos_demora; ?>">
          <br>
          <input type="date" id="fecha_limite" name="fecha_limite" value="<?php echo $fecha_limite; ?>" autofocus required>

          <input type="hidden" name="id_cobrar" value="<?= $id; ?>">
          <form action="Index.php">
            <input type="submit" value="Editar" class="btn btn-Succes">
            <a href="Index.php"></a>
          </form>
      </div>
  </form>
  </form>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>