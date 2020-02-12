<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM cliente where nombre_cliente like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_cliente=$row['id_cliente'];
		$row_array['value'] = $row['nombre_cliente'];
	    $row_array['id_cliente']=$id_cliente;
		$row_array['nombre_cliente']=$row['nombre_cliente'];
		$row_array['apellido_cliente']=$row['apellido_cliente'];
		$row_array['telefono']=$row['telefono'];
		$row_array['email']=$row['email'];
		$row_array['direccion']=$row['direccion'];
		$row_array['cedula_rnc']=$row['cedula_rnc'];
		$row_array['membresia_tipo']=$row['membresia_tipo']
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>