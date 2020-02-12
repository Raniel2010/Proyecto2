<?php
    //Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_cliente=intval($_GET['id']);
		$query=mysqli_query($con, "select * from factura where id_cliente='".$id_cliente."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM cliente WHERE id_cliente='".$id_cliente."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  cliente. Existen facturas vinculadas a éste producto. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('nombre_cliente');//Columnas de busqueda
		 $sTable = "cliente";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by nombre_cliente";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
				    
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Direccion</th>
					<th>Cedula o RNC</th>
					<th>Membresia</th>
					
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_cliente=$row['id_cliente'];
						$nombre=$row['nombre_cliente'];
						$apellido=$row['apellido_cliente'];
						$telefono=$row['telefono'];
						$email=$row['correo'];
						$direccion=$row['direccion'];
						$cedula_rnc=$row['cedula_rnc'];
						$membresia=$row['membresia_tipo'];
						//$status=$row['status_cliente'];
						//if ($status==1){$estado="Activo";}
						//else {$estado="Inactivo";}
						//$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					
					<input type="hidden" value="<?php echo $nombre;?>" id="nombre_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $apellido?>" id="apellido_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $telefono;?>" id="telefono<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $email;?>" id="email<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $direccion;?>" id="direccion_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $cedula_rnc;?>" id="cedula_rnc<?php echo $id_cliente;?>>">
					<input type="hidden" value="<?php echo $membresia;?>" id="membresia_tipo<?php echo $id_cliente;?>">
					
					
					<tr>
						
						<td><?php echo $nombre; ?></td>
						<td><?php echo $apellido ; ?></td>
						<td ><?php echo $telefono; ?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $direccion;?></td>
						<td><?php echo $cedula_rnc;?></td>
						<td><?php echo $membresia;?></td>
					
						
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $id_cliente;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $id_cliente; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>