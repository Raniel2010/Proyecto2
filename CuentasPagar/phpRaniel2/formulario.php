<?php
    $con = mysqli_connect('localhost','root','','cuentas_principal');
    
    try{
    $monto = $_POST['input_monto'];
    $modo_pago = $_POST['select1'];
    $id_producto = $_POST['input_id_producto'];
    $id_suplidor = $_POST['input_id_suplidor'];
    
    $id_pedido = $_POST['id_pedido'];
    #$id_factura = $_POST['input_id_factura'];
    #$dias = $_POST['input_dias'];
    $fecha_pago = $_POST['input_pago'];
    $fecha_recibo = $_POST['input_recibo'];
    $estado = "";

    if(empty($monto)){
    $_SESSION['message'] = 'Factura campos vacios';
    $_SESSION['message_type'] = 'success';
    header("Location: AgregarV3.php");
    }
    elseif (!is_numeric($monto)) {
        header("Location: AgregarV3.php");
    }
    if (!is_numeric($id_suplidor)) {
        header("Location: AgregarV3.php");
    }
    if (!is_numeric($id_producto)) {
        header("Location: AgregarV3.php");
    }
    if(empty($fecha_pago)){
        header("Location: AgregarV3.php");   
    }
    if(empty($fecha_recibo)){
        $fecha_recibo = date("Y-m-d");
    }
    if ($fecha_pago >= $fecha_recibo) {
        $estado = "Vigente";
    }
    else{
        $estado = "Atrazado";
    }
  

    $intro = "INSERT INTO pedido_proveedor(id_producto,id_suplidor,monto,modo_pago,fecha_pago,fecha_recibo,estado)
    VALUES ($id_producto,$id_suplidor,$monto,'$modo_pago','$fecha_pago','$fecha_recibo','$estado')";
    $enviar = mysqli_query($con,$intro);

    $llevar = "INSERT INTO cuentas_pagar(id_pedido,id_suplidor) VALUES ($id_pedido,$id_suplidor)";
    $llevado = mysqli_query($con,$llevar);

    if(!$con){
      die("Connection failed: " . mysqli_connect_errno());
    }
    elseif($enviar){
    header("Location: Cuentas_pagar2V3.php");
    echo "Producto registrado";
  }

    }catch(Exception $e){
        echo 'Message' . $e->getMessage();
    }
?>