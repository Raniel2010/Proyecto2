<?php 
$connection = mysqli_connect('localhost','root','','cuentas_principal');

if($connection){
    
    $query = "SELECT * FROM inventario";
    $result = mysqli_query($connection,$query);    
     $number_per_pages= mysqli_num_rows($result);
    $page_count = 5;

     $page_result= ceil($number_per_pages/$page_count);

     if(!isset($_GET['page'])){
         $page =1;
     }else{
         $page =$_GET['page'];
     }

     $first_result = ($page -1) * $page_count;

     
    $bring_query ='SELECT * FROM inventario LIMIT ' . $first_result . ',' .  $page_count;

    $bring_query_result= mysqli_query($connection,$bring_query);

    }
?>

<?php delete()?>
<div class="row">

  <div class="col-sm-12 m-4">
      
      <table class="table">
          
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Producto_ID</th>
                  <th>Precio de Entrada</th>
                  <th>Categoria</th>
                  <th>Cantidad</th>
                  <th>Fecha de Entrada</th>
                  <th>Descripcion</th>
              <th>Actualizar</th>
              <th>Delete</th>
          </tr>
        </thead>
        
        <tbody>
            <?php
 while($row= mysqli_fetch_assoc( $bring_query_result)){
     $id = $row['id'];	
     $id_producto=$row['id_producto'];
     $precio =$row["precio_entrada"];
     $categoria =$row["categoria"];
     $fecha_entrada=$row['fecha_entrada'];
     $cantidad=$row['cantidad'];
     $descripcion =$row["descripcion"];
     ?>

     <tr>
         <td><?php echo $id?></td>
         <td><?php echo $id_producto?></td>
         <td><?php echo $precio?></td>
         <td><?php echo $categoria?></td>
         <td><?php echo $cantidad?></td>
         <td><?php echo $fecha_entrada?></td>
         <td><?php echo $descripcion?></td>
         <td> <a href="update.php?update=<?php echo $id ?>" class='badge badge-secundary' >Actualizar</a></td>
         <td> <a href="index.php?delete=<?php echo $id ?>" class='badge badge-danger' >Eliminar</a></td>
         
        </tr>
        
        <?php 
       }
       ?>
      </tbody>
    </table>
    
    
    <?php 

for ($page=1;$page<=$page_result;$page++) {
    echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
}

?> 
  </div>

</div>
