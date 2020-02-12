
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="validar.js"></script>
 <?php
 include 'conexion.php';
 ?>
	</head>
	<body>
  <form method="POST" action="delete.php" onsubmit="return validar();">
<h2>Cliente</h2>
    <div class="row">
      <div class="col-75">
        <div class="container">
        

            <div class="row">
              <div class="col-50">
                <label for="fname"><i class="fa fa-user"></i>id_cliente</label>
                <input type="text" id="fname" name="id_cliente" placeholder="id_cliente"  >
				
              </div>
			  
            </div>
            <input type="submit" value="Eliminar" class="btn btn-Succes" name="btn1"> 
            
            </form>    

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
	</body>
	</html>

