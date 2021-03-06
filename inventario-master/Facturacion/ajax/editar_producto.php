<?php
/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (empty($_POST['mod_categoria']){
			$error[] = "categoria vacio";
		} else if (empty($_POST['mod_marca'])){
			$error[] = "mara vacia";
		} else if(empty($_POST['mod_descripcion'])){
			$error[] = "descripcion vacia";
		}else if ($_POST['mod_estado']==""){
			$errors[] = "Selecciona el estado del producto";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio de venta vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigo']) &&
			!empty($_POST['mod_nombre']) &&
			$_POST['mod_estado']!="" &&
			!empty($_POST['mod_precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$categoria=mysqli_real_escape_string($con,(strip_tags($_POST["mod_categoria"],ENT_QUOTES))); 
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST["mod_marca"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_descripcion"],ENT_QUOTES))); 
		$estado=intval($_POST['mod_estado']);
		$precio_venta=floatval($_POST['mod_precio']);
		$id_producto=$_POST['mod_id'];
		$sql="UPDATE products SET codigo_producto='".$codigo."', nombre_producto='".$nombre."',categoria='" .$categoria."' , marca='".$marca."',descripcion='".$descripcion."', status_producto='".$estado."', precio='".$precio_venta."' WHERE id_producto='".$id_producto."'";
		$query_update = mysqli_query($con,$sql);$
			if ($query_update){
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>