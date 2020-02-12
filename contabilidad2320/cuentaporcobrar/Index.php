<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Cuentas por cobrar</div>
    <div class="list-group list-group-flush">
      <a href="../cliente/Index.php" class="list-group-item list-group-item-action bg-light">Cliente</a>
      <a href="Index.php" class="list-group-item list-group-item-action bg-light">Cuentas por cobrar</a>

    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle"> Menu</button>

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


    <?php include "header.php" ?>
    <?php include "conexion2.php" ?>

    <div class="container-fluid p-4 ">
      <div class="row">

        <div class="col-md-3">


          <div class="card card-body">
            <form action="envio3.php" method="POST" onsubmit="return validar();">
              <br>
              <div class="form-group">

                <input type="date" id="fecha_limite" name="fecha_limite" class="form-control" placeholder="Fecha limite" autofocus required>
                <br>
                <input type="text" id="cargo" name="cargo_demora" class="form-control" placeholder="Cargos de mora" autofocus required>
                <br>
                <input type="date" id="plazo_pago" name="plazo_pago" class="form-control" placeholder="Plazo de pago" autofocus required>
              </div>
              <input type="submit" class="btn btn-success btn-block" name="save_task" value="Enviar">


            </form>

          </div>
        </div>
        <div class="col-md-9">

          <table class="table table-bordered">

            <thead>

              </form>
              <tr>
                <th scope="col">Id Cobrar</th>
                <th scope="col">Fecha Limite</th>
                <th scope="col">Cargos de mora</th>
                <th scope="col">Plazo de pago</th>
                <th scope="col">Acciones</th>

              </tr>
            </thead>
            <?php
            $sql = "SELECT * from cuentas_cobrar";
            $resultado = mysqli_query($con, $sql);
            while ($mostrar = mysqli_fetch_array($resultado)) { ?>
              <tr>
                <td><?php echo $mostrar['id_cobrar']; ?></td>
                <td><?php echo $mostrar['fecha_limite']; ?></td>
                <td><?php echo $mostrar['cargo_demora']; ?></td>
                <td><?php echo $mostrar['plazo_pago']; ?></td>

                <td>

                  <a href="update2.php?id_cobrar=<?php echo $mostrar['id_cobrar']; ?>" class=" btn btn-primary">
                    <i class="fas fa-edit"></i>
                  </a>


                  <a href="delete.php? id_cobrar=<?php echo $mostrar['id_cobrar']; ?>" class=" btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </a>

                </td>
              </tr>
            <?php } ?>

          </table>

        </div>
      </div>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Menu Toggle Script -->
      <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>