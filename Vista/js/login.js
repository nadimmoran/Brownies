function validar() {
    var correo, contrasena;
    correo = document.getElementById("fcorreo").value;
    contrasena = document.getElementById("fcontraseña").value;
 
    //correo expr
    expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
 
    if ((correo === "") || (contrasena === "")) {
       alert("Los campos no pueden quedar vacios");
       return false;
    } else if (!expresion.test(correo)) {
       alert("Correo incorrecto");
       return false;
    }
    return true;
 }