<?php include 'components/header.php'?>
<?php include 'components/sidebar.php'?>

<?php
      include "functions/insert.php";
      ?>


<?php Add()?>
    
<div class="row">

  <div class="col-sm-8">
    
    <form class="mt-4" action=""  method="post" >
      <label for="name" >Product ID</label>
      <!-- <input id="id"  type="text" name="id" required class="form-control " placeHolder="ID" > -->

      <label for="name" >Nombre Producto</label>
      <input type="text"  name="nombre" required class="form-control" placeHolder="Nombre">

      <label for="name" >Categoria</label>
      <input type="text"  name="categoria" required class="form-control" placeHolder="Categoria">

      <label for="name" >Marca</label>
      <input type="text"  name="marca" required class="form-control" placeHolder="Marca">

      <label for="name" >Precio</label>
      <input type="text" name="precio" required class="form-control" placeHolder="Precio">

      <label for="name" >Cantidad</label>
      <input type="text" name="cantidad" required class="form-control" placeHolder="Cantidad">

      <label for="descripcion">Descripcion</label>
    <textarea class="form-control" name="descrip" required id="descripcion" rows="3"></textarea>

    <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
    </form>
  </div>
  
</div>


<?php include 'components/footer.php'?>