<?php include 'components/header.php'?>
<?php include 'components/sidebar.php'?>


    
<div class="row">

 
     
        <div class="col-sm-3">
          <form action="" method="POST">
    <h4 class="mt-3" >Producto a actulizar</h4>
    <select name="prove">
    <?php 
                $connection = mysqli_connect('localhost','root','','cuentas_principal');
                $query = "SELECT * FROM inventario";
                $bring = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($bring)) {
                  $id = $row['id'];
                  ?>
                <option><?php echo $id?></option>
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

         $query_bring = "SELECT * FROM inventario WHERE id = '$id'";
         $show = mysqli_query($connection, $query_bring);
         
         while ($row = mysqli_fetch_assoc($show)) {
        $id = $row['id'];
        $produc_id=$row['id_producto'];
        $cantidad = $row["cantidad"];
        $categoria =$row["categoria"];
        $precio =$row["precio_entrada"];
        $fecha_entrada =$row["fecha_entrada"];
        $descripcion =$row["descripcion"];
        ?> 
      <!-- <label for="name" >ID</label>
      <input id="id" type="text" name="id" value="<?php  echo $id;?>" class="form-control "  disabled placeHolder="ID" > -->

      <label for="name" >ID Producto</label>
      <input type="text"  name="id_producto" value="<?php echo $produc_id?>" class="form-control" placeHolder="Nombre">
      
            <label for="name" >Cantidad</label>
            <input type="text" name="cantidad" value="<?php echo $cantidad?>" class="form-control" placeHolder="Cantidad">

      <label for="name" >Categoria</label>
      <input type="text"  name="categoria" value="<?php echo $categoria?>" class="form-control" placeHolder="Categoria">
     
      <label for="name" >Fecha de Entrada</label>
      <input type="date"  name="fecha_entrada" value="<?php echo $fecha_entrada?>" date-format="DD-MM-YYYY" required class="form-control" placeHolder="Fecha de entrada">
    
      <label for="name" >Precio</label>
      <input type="text" name="precio" value="<?php echo $precio?>" class="form-control" placeHolder="Precio">

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