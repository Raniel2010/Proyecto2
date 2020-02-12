<?php
include 'funciones/functions.php';

if (isset($_GET['id_pedido'])) {
  $id_ped = $_GET['id_pedido'];
  $query  = "SELECT * FROM pedido_proveedor where id_pedido = $id_ped";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_array($result);
    $monto       = $data['monto'];
    $modo_pago   = $data['modo_pago'];
    $id_producto = $data['id_producto'];
    $id_suplidor = $data['id_suplidor'];
    #$id_factura  = $data['id_factura'];
    $fecha_recibo = $data['fecha_recibo'];
    $fecha_pago  = $data['fecha_pago'];
    $estado      = $data['estado'];
  }
}

#update = "";
try {
  if (isset($_POST['actualizar'])) {
    echo $id_ped;
    $input_monto = $_POST['input_monto'];
    $modo_pago = $_POST['select1'];
    $id_producto = $_POST['input_id_producto'];
    $id_suplidor = $_POST['input_id_suplidor'];
    #$id_factura  = $data['id_factura'];
    $fecha_recibo = $_POST['input_recibo'];
    $fecha_pago = $_POST['input_pago'];

    $query2 = ("UPDATE pedido_proveedor SET id_producto = $id_producto, id_suplidor = $id_suplidor, fecha_recibo = '$fecha_recibo', fecha_pago = '$fecha_pago', monto = $input_monto, modo_pago = '$modo_pago' WHERE id_pedido = $id_ped");
    mysqli_query($con, $query2);
    echo $query2;
    header("Location:Cuentas_pagar2V3.php");
  }
} catch (Exception $e) {
  echo "error";
  var_dump($e);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <title>Modificacion</title>
</head>

<body>

  <div class="container bg-light">
    <div class="row justify-content-center principal_contenedor">

      <form action="modificar.php?id_pedido= <?php echo $_GET['id_pedido']; ?>" method="POST">

        <div class="card w-100 card-body">

          <h3 class="text-center">Modificar Pedido </h3>
          <br>
          <label for="cliente">Cliente: usuario</label>
          <div class="form-group">
          <label for="monto">Monto</label><br>
            <input type="text" size="50" name="input_monto" placeholder="Monto" value="<?php echo $monto; ?>" required="autocomplete" autofocus required />
            <br>

            <br><label for="modo">Modo de Pago</label>
            <select name="select1" value="<?php echo $modo_pago; ?>">
              <option value="tarjeta">&ltTarjeta de Credito&gt</option>
              <option value="cheque">&ltCreque&gt</option>
              <option value="efectivo">&ltEfectivo&gt</option>
            </select>
            <br>
           <!-- <div class="pos">
              <label for="estado">Estado</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <select name="select2" value="<?php echo $estado; ?>">
                <option value="pago">Pagado</option>
                <option value="pendiente">Pendiente</option>
                <option value="atrazado">Atrazado</option>
              </select>
            </div>-->

            <br>
            <div class="col"> <label for="eleccion">Id del producto</label><br>
                  <select name="input_id_producto">
                  <?php while ($nom_prod = mysqli_fetch_array($p_n) ){ ?>
                      <option value="<?=$nom_prod['id_producto'];?>"> <?= $nom_prod['producto_nombre'];?> </option>
                  <?php } ?>
                  </select>
                  </div>
          </div>
          <div class="col"> <label for="eleccion">Id del suplidor</label><br>
                  <select name="input_id_suplidor">
                    <?php while ($fila2 = mysqli_fetch_array($resultado2)){ ?>
                  <option value="<?=$fila2['id_suplidor'];?>"><?= $fila2['id_suplidor'] ; ?> </option>
                    <?php } ?>
                  </select>
                  </div>
         <!--<label for="id_factura">Id de la factura</label>
           <input name="input_id_factura" type="text" size="40" placeholder="Id de la factura" value="<?php echo $id_factura; ?>"> -->
          <br>
          <label for="pago">Fecha de pago</label>
          <input name="input_pago" type="text" size="50" maxlength="10" placeholder="Fecha de pago" required="autocomplete" value="<?php echo $fecha_pago; ?>">
          <br>
          <label for="recibo">Fecha de entrega</label>
          <input name="input_recibo" type="text" size="50" maxlength="10" required="autocomplete" placeholder="Fecha de recibo" value="<?php echo $fecha_recibo; ?>">
          <br>
          <button type="submit" name="actualizar" class="btn btn btn-info">Actualizar</button>
          <a href="Cuentas_pagar2V3.php" name="volver" class="btn btn btn-dark" role="button">Volver</a>

      </form>
    </div>
</body>
</html>
    <!--
?php

    include 'conexion.php';
    if(empty($_REQUEST['id_pedido'])){
      header('Location: Cuentas_pagar2.php');
      mysqli_close($con);
    }

    $id_ped = $_REQUEST['id_pedido'];
    $insert = "Select * From pedido_proveedor where id_ped = id_cliente" ; 
    
    $sql = mysqli_query($con,$insert);
    mysqli_close($con);

    $result_sql = mysqli_fetch_row($sql);

    if($result_sql == 0){
      header('Location: AgregarV2.php');
    }
    else{
      while ($data = mysqli_fetch_array($sql)){
        $monto       = $data['monto'];
        $modo_pago   = $data['modo_pago'];
        $id_producto = $data['id_producto'];
        $fecha_recibo = $data['fecha_recibo'];
        $fecha_pago  = $data['fecha_recibo'];
        $estado      = $data['estado']; 

        # code...
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="estilos2.css">
	<title>Modificacion</title>
</head>
<body>

<div class="container bg-light">
        <div class="row justify-content-center principal_contenedor">
                <form action="formulario.php" method="POST" >
                  <div class="form-group">
                  <div class="col-auto">
                    <label for="registrar" style="font-size: 15pt;">
                        Modificar Pedido</label>
                  </div>
                  <div class="col"> <label for="cliente">Cliente: usuario</label> </div>
                  <div class="col"> <input type="text" size="50" 
                  name="input_monto" id="input_monto" placeholder="Monto" value="<?php echo $monto; ?>" /> </div>

                  <div class="col"> <label for="modo">Modo de Pago</label> 
					<select name="select1" value="<?php echo $modo_pago; ?>">
                          <option value="tarjeta">&ltTarjeta de Credito&gt</option>
                          <option value="cheque">&ltCreque&gt</option>
                          <option value="efectivo">&ltEfectivo&gt</option>
					</select>
                  </div>

                  <div class="col"> <label for="estado">Estado</label>&nbsp
                    <select name="select2" value="<?php echo $estado; ?>">
                        <option value="pago">Pagado</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="atrazado">Atrazado</option>
                    </select>
                  </div>

                  <div class="col"> <input name="input_id_producto" type="text" size="50" 
                    placeholder="Id del Producto" value="<?php echo $id_producto; ?>"> </div>
					
                  <div class="col"> <input name="input_pago" type="text" size="50" 
                    placeholder="Fecha de pago" value="<?php echo $fecha_pago; ?>">  </div>
					
                  <div class="col"> <input name="input_recibo" type="text" size="50" 
                    placeholder="Fecha de recibo" value="<?php echo $fecha_recibo; ?>"> </div>
					
                        <button type="submit" class="btn btn btn-primary">Registrar</button>
                        <div class="btn btn btn-dark">Volver</div>
					</div>
                </form>
         </div>
</div>

</body>
</html>