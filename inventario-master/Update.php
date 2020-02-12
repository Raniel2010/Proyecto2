<?php include 'components/header.php'?>
<?php include 'components/sidebar.php'?>


    
<div class="row">

 
     
        <div class="col-sm-3">
          <form action="" method="POST">
    <h4 class="mt-3" >Producto a actulizar</h4>
    <select name="prove">
    <?php 
                $connection = mysqli_connect('localhost','root','','cuentas_principal');
                $query = "SELECT * FROM producto";
                $bring = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($bring)) {
                  $p_name = $row['producto_nombre'];
                  ?>
                <option><?php echo $p_name?></option>
                <?php }  ?>
                  </select>   
                  <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
                  </form>

     

</div>

</div>
<?php update() ?>
<div class="row">

  <div class="col-sm-8">
  <form class="mt-4" action=""  method="post" >
<?php 
        if(isset($_POST['submit'])){
         $id_pro = $_POST['prove'];

         $query_bring = "SELECT * FROM producto WHERE producto_nombre = '$id_pro'";
         $show = mysqli_query($connection, $query_bring);
         
         while ($row = mysqli_fetch_assoc($show)) {
        $id = $row['id_producto'];
        $produc_name=$row['producto_nombre'];
        $categoria =$row["categoria"];
        $marca =$row["marca"];
        $precio =$row["precio"];
        $cantidad = $row["cantidad"];
        $descripcion =$row["descripcion"];
        ?> 
      <label for="name" >Product ID</label>
      <input id="id"  type="text" name="id" value="<?php  echo $id;?>" class="form-control " placeHolder="ID" >

      <label for="name" >Nombre Producto</label>
      <input type="text"  name="nombre" value="<?php echo $produc_name?>" class="form-control" placeHolder="Nombre">

      <label for="name" >Categoria</label>
      <input type="text"  name="categoria" value="<?php echo $categoria?>" class="form-control" placeHolder="Categoria">
     
      <label for="name" >Marca</label>
      <input type="text"  name="marca" value="<?php echo $marca?>" class="form-control" placeHolder="Marca">

      <label for="name" >Precio</label>
      <input type="text" name="precio" value="<?php echo $precio?>" class="form-control" placeHolder="Precio">

      <label for="name" >Cantidad</label>
      <input type="text" name="cantidad" value="<?php echo $cantidad?>" class="form-control" placeHolder="Cantidad">

      <label for="descripcion">Descripcion</label>
    <textarea class="form-control" name="descrip"  id="descripcion" rows="3"><?php echo $descripcion?></textarea>

    <button type="submit" name="update"  class="btn btn-primary">Submit</button>
      <?php  }
      }
      ?>

</form>
</div>
</div>

<?php include 'components/footer.php'?>

