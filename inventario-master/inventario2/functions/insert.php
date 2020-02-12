<?php


// function Add(){
//     if (isset($_POST['submit'])) {
        
//         $id = $_POST['id'];
//         $nombre = $_POST['nombre'];
//         $categoria = $_POST['categoria'];
//         $marca = $_POST['marca'];
//         $precio = $_POST['precio'];
//         $cantidad = $_POST['cantidad'];
//         $descrip = $_POST['descrip'];

//         if (!is_numeric($id)) {
//             echo "The Id field can not contain Strings";
//         } else {
//             $connection = mysqli_connect('localhost','root','','proyecto');


//             $query = "INSERT INTO producto(id_producto,produc_name,category,marca,precio,cantidad,descripcion)";
//             $query .= "VALUES($id,'$nombre','$categoria','$marca',$precio,$cantidad,'$descrip')";


//             $result = mysqli_query($connection, $query);

//             if (!$result) {
//                 echo ("Error description: " . mysqli_error($connection));
//             }
//         }
//     }
// }



// function bring_id()
// {


//     $connection = mysqli_connect('localhost','root','','proyecto');
//     $query = "SELECT * FROM producto";
//     $bring = mysqli_query($connection, $query);

//     while ($row = mysqli_fetch_assoc($bring)) {
//         $id = $row['id_producto'];
//         echo "<option value={$id}>{$id}</option>";
//     }
// }
