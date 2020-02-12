<?php include "header.php" ?>
<?php include "conexion2.php" ?>
        
<div class= "container-fluid p-4 ">
<div class = "row">

<div class="col-md-3">

  
  <div class="card card-body">
<form action="envio3.php" method="POST" onsubmit="return validar();">
<br>
  <div class="form-group">

<input type="date" id="fecha_limite" name="fecha_limite" class="form-control" placeholder="Fecha limite" autofocus required>
<br>
<input type="text" id="cargos_demora" name="cargos_demora" class="form-control" placeholder="Cargos de mora" autofocus required>
<br>
<input type="date" id="plazo_pago" name="plazo_pago" class="form-control" placeholder="Plazo de pago" autofocus required>
  </div>
<input type="submit" class = "btn btn-success btn-block" name="save_task" value= "Envio">


</form>

</div>
</div>
<div class="col-md-9">