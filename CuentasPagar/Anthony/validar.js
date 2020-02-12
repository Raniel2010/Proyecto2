function validar(){
let nombre,empresa,direccion,telefono,correo,rnc;
nombre = document.getElementById("nombre").value;
empresa = document.getElementById("empresa").value;
direccion = document.getElementById("direccion").value;
telefono = document.getElementById("telefono").value;
rnc = document.getElementById("rnc").value;
correo = document.getElementById("correo").value;
expresion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;


if(nombre ==="" || empresa ===""|| direccion ===""||telefono ==="" || rnc ==="" || correo === ""  ){

    alert("Debes Completar Todos los Campos!");
    return false;
}
else if(correo.length>100){
    alert("El correo es muy largo!")
    return false;
}
else if(!expresion.test(correo)){
alert("El correo no es valido!")
return false;
}

else if (isNaN(telefono)){
alert("El Telefono Ingresado no es un numero");
return false;
}

        }
