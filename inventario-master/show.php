<?php 
$connection = mysqli_connect('localhost','root','','cuentas_principal');

if($connection){
    
    $query = "SELECT * FROM producto";
    $result = mysqli_query($connection,$query);    
     $number_per_pages= mysqli_num_rows($result);
    $page_count = 10;

     $page_result= ceil($number_per_pages/$page_count);

     if(!isset($_GET['page'])){
         $page =1;
     }else{
         $page =$_GET['page'];
     }

     $first_result = ($page -1) * $page_count;

     
    $bring_query ='SELECT * FROM producto LIMIT ' . $first_result . ',' .  $page_count;

    $bring_query_result= mysqli_query($connection,$bring_query);

    }
?>

<?php delete()?>
<div class="row">

  <div class="col-sm-11 m-4">
      
      <table class="table">
          
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Categoria</th>
                  <th>Marca</th>
                  <th>Precio</th>
              <th>Cantidad</th>
              <th>Descripcion</th>
              <th>Actualizar</th>
              <th>Delete</th>
          </tr>
        </thead>
        
        <tbody>
            <?php
 while($row= mysqli_fetch_assoc( $bring_query_result)){
     $id_prod = $row['id_producto'];	
     $produc_name=$row['producto_nombre'];
     $categoria =$row["categoria"];
     $marca =$row["marca"];
     $precio =$row["precio"];
     $cantidad = $row["cantidad"];
     $descripcion =$row["descripcion"];
     $ternary=($cantidad > 3 ? $cantidad : " <span class='badge badge-danger' >Agotado</span>" )
     ?>
     <tr>
         <td><?php echo $id_prod?></td>
         <td><?php echo $produc_name?></td>
         <td><?php echo $categoria?></td>
         <td><?php echo $marca?></td>
         <td><?php echo $precio?></td>
         <td><?php echo $ternary  ?></td>
         <td><?php echo $descripcion?></td>
         <td> <a href="update.php?update=<?php echo $id_prod ?>" class='badge badge-secundary' >Actualizar</a></td>
         <td> <a href="index.php?delete=<?php echo $id_prod ?>" class='badge badge-danger' >Eliminar</a></td>
         
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
