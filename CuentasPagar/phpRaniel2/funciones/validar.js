/*alert("hola");
function validar(){
let monto,id_producto,fecha_pago,fecha_recibo;
monto = document.getElementById("input_monto").value;
id_producto = document.getElementById("input_id_producto").value;
fecha_pago = document.getElementById("input_pago").value;
fecha_recibo = document.getElementById("input_recibo").value;
expresion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;


if(monto ==="" || modo ===""||  || id_producto ==="" || fecha_pago ==="" || fecha_pago === ""  ){

    alert("Debes Completar Todos los Campos!");
    return false;
}
}*/
$(buscar_datos());
function buscar_datos(consulta){
	$.ajax({
		url: 'buscar.php',
		type: 'POST',
		dataType : 'html',
		data: {consulta: consulta},
	})
	.done(function(){
		$("#datos").html(repuesta);
	})
	.fail(function(){
		console.log("error");
	})
}
$(document).on('keyup', '#search', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
})