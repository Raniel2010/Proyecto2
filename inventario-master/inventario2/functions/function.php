<?php 

function Add(){
    if (isset($_POST['submit'])) {
        
        $id_producto = $_POST['id_producto'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio_entrada'];
        $descrip = $_POST['descrip'];
        $cantidad = $_POST['cantidad'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $connection = mysqli_connect('localhost','root','','cuentas_principal');



            $query = "INSERT INTO inventario(id_producto,fecha_entrada,categoria,precio_entrada,descripcion,cantidad)";
            $query .= "VALUES($id_producto,'$fecha_entrada','$categoria',$precio,'$descrip',$cantidad)";


            $result = mysqli_query($connection, $query);

            if (!$result) {
                echo ("Error description: " . mysqli_error($connection));
            }
        }
    }


function delete (){

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];

        $connection = mysqli_connect('localhost','root','','cuentas_principal');
        $delete_query = "DELETE FROM inventario WHERE id = $delete";
        $delete_result = mysqli_query($connection,$delete_query);
        header('Location: index.php');



    }



}

function bring_id()
{

    $connection = mysqli_connect('localhost','root','','cuentas_principal');
                $query = "SELECT * FROM inventario";
                $bring = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($bring)) {
                  $id = $row['id'];
                  
                echo "<option>{$id}</option>";
                   
    }
}

function update(){

    if (isset($_POST['update'])) {
    // $id = $_POST['id'];
    $id_producto = $_POST['id_producto'];
    $categoria = $_POST['categoria'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descrip = $_POST['descrip'];

    if (!is_numeric($id_producto)) {
        echo "The Id field ID can not contain Strings";
    } else {
        $connection = mysqli_connect('localhost','root','','cuentas_principal');


        $query = "UPDATE inventario SET
        id_producto = $id_producto,
        categoria= '$categoria',
        fecha_entrada= '$fecha_entrada',
        precio_entrada= $precio,
        cantidad= $cantidad,
        descripcion='$descrip'
        where id_producto = $id_producto ";


        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo ("Error description: " . mysqli_error($connection));
        }
    }
}

function show_update(){
    
}

}
