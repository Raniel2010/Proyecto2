<?php include 'components/header.php' ?>
<?php include 'components/sidebar.php' ?>

<?php
include "functions/insert.php";
?>


<?php Add() ?>

<div class="row">

  <div class="col-sm-8">



    <form class="mt-4" action="" method="post">
      <label for="name">Producto ID</label>
      <!-- <input id="id_producto" type="text" name="id_producto" required class="form-control " placeHolder="ID"> -->
      <br/>


      <select name="id_producto">
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'cuentas_principal');
        $query = "SELECT * FROM producto";
        $bring = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($bring)) {
          $id_producto = $row['id_producto'];
        ?>
          <option><?php echo $id_producto ?></option>
        <?php }  ?>
      </select>

<br/>
      <label for="name">Fecha entrada</label>
      <input type="date" name="fecha_entrada" date-format="DD-MM-YYYY" required class="form-control" placeHolder="Fecha de entrada">

      <label for="name">Precio de Entrada</label>
      <input type="text" name="precio_entrada" required class="form-control" placeHolder="Precio de Entrada">

      <label for="name">Categoria</label>
      <input type="text" name="categoria" required class="form-control" placeHolder="Categoria">

      <label for="name">Cantidad</label>
      <input type="text" name="cantidad" required class="form-control" placeHolder="Cantidad">

      <label for="descripcion">Descripcion</label>
      <textarea class="form-control" name="descrip" required id="descripcion" rows="3"></textarea>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</div>


<?php include 'components/footer.php' ?>