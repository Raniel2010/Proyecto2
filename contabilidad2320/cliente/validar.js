function validar(){
var nombre, apellido, cedula, correo, direccion, telefono, zip, expresion;

nombre = document.getElementById("fname").value;
apellido = document.getElementById("email").value;
cedula = document.getElementById("name").value;
correo = document.getElementById("adr").value;
direccion = document.getElementById("city").value;
telefono = document.getElementById("state").value;
zip = document.getElementById("zip").value;

if(nombre === "" || apellido === "" || cedula === "" || correo === "" || direccion === "" || telefono === "" || zip === ""){
    alert("Todos los campos son obligatorios");
    return false;
}
else if (nombre.length>20){
    alert("El nombre es muy largo");
    return false;
}
else if(apellido.length>20){
    alert("El apellido es muy largo ");
return false;
}
else if(isNaN(cedula)){
    alert("La cedula no es valida");
    return false;
}
else if(correo.length>50){
    alert("El correo no es valido");
    return false;
}
else if(direccion === ""){
    alert("Es obligatorio");
    return false;
}
else if(isNaN(telefono)){
    alert("Este telefono no es valido");
    return false;
}
else if(isNaN(zip)){
    alert("Este codigo no es valido");
    return false;
}}
