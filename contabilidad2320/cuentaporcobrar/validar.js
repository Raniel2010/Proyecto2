function validar(){

    
let cobrar = document.getElementById("id_cobrar").value;
let cliente = document.getElementById("id_cliente").value;
let factura = document.getElementById("id_factura").value;
let fecha = document.getElementById("fecha_limite").value;
let cargos = document.getElementById("cargo").value;
let plazo = document.getElementById("plazo_pago").value;
    
    
    if(cobrar === "" || cliente === "" || factura === "" || fecha === "" || cargos === "" || plazo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if (cobrar.length>10){
        alert("Datos invalidos");
        return false;
    }
    else if(cliente.length>10){
        alert("Datos invalidos ");
    return false;
    }
    else if(factura.length>10){
        alert("Datos invalidos");
        return false;
    }
    else if(fecha === ""){
        alert("Es obligatorio");
        return false;
    }
    else if(isNaN(cargos)){
        alert("Dato invalido");
        return false;
    }
    else if(plazo === ""){
        alert("Datos invalidos");
        return false;
    }

    }
    