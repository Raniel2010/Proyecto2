<?php
  include 'funciones/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css" >
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Agregar Factura</title>
    
</head>
<body>
<?php include('header.php'); ?>
	
<div class="container w-100 bg-ligth">
        <div class="row justify-content-center">
          
              <form action="formulario.php" method="POST" onsubmit=" return validar();">

                <div class="col"> <label for="monto">Monto</label>
                <input class="form-control" name="input_monto" type="text" size="40"  placeholder="Monto" required="autocomplete">
                </div>

                <?php while ($l = mysqli_fetch_array($id_pedido) ){ ?>
                      <input type="hidden" name="id_pedido" value="<?=$l['id_pedido'];?>">
                  <?php } ?>

                <div class="col"> <label for="modo">Modo de Pago</label> 
					         <select class="form-control" name="select1" id="select1">
                      <option value="tarjeta">&ltTarjeta de Credito&gt</option>
                      <option value="cheque">&ltCheque&gt</option>
                      <option value="efectivo">&ltEfectivo&gt</option>
                   </select>
                </div>

                  <div class="col"> <label for="eleccion">Id del producto</label><br>
                  <select name="input_id_producto">
                    <?php while ($nom_prod = mysqli_fetch_array($p_n) ){ ?>
                      <option value="<?=$nom_prod['id_producto'];?>"> <?= $nom_prod['producto_nombre'];?> </option>
                  <?php } ?>
                  </select>
                  </div>
                  
                  <div class="col"> <label for="eleccion">Id del suplidor</label><br>
                  <select name="input_id_suplidor">
                      <?php while ($nom_sup = mysqli_fetch_array($n_s)){ ?>
                  <option value="<?=$nom_sup['id_suplidor'];?>"> <?= $nom_sup['nombre_suplidor']; ?> </option>
                  <?php } ?>  
                  </select>
                  </div>

                  <!--<div class="col"> <label for="factura">Id de la factura</label>
                  <br>
                  <select name="input_id_factura">
                    <?php while ($oper = mysqli_fetch_array($operando)){ ?>
                    <option value="<?= $oper['id_factura']?>"><?php echo $oper['id_factura']?></option>
                  <?php } ?>
                  </select>
                  </div> -->
                  <div class="col"> <label for="pago">Fecha de pago</label><br>
                  <input class="form-control" type="date" date-format="DD-MM-YYYY" name="input_pago" min="2018-01-01" max="2020-12-31" maxlength="10">
                  </div>

                  <div class="col"> <label for="recibo">Fecha de recibo</label>
                <input class="form-control" type="date" date-format="DD-MM-YYYY" name="input_recibo" min="2018-01-01" max="2020-12-31" maxlength="10"> 
                  </div>
                  <br>
                  <div class="col botones">
                    <button type="submit" name="enviar" class="btn btn-primary">Registrar </button>    
                    <a href="Cuentas_pagar2V3.php" name="volver" class="btn btn-dark" role="button">Volver</a>
			            </div>
                </form>

<script src="./js/bootstrap.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="validar.js"></script>

</body>
</html>