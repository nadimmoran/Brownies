var state = false;
var password = document.getElementById('fcontraseña');
var longitud = document.querySelector('.politica-longitud i');
var numeros = document.querySelector('.politica-numero i');
var mayuscula = document.querySelector('.politica-mayuscula i');
var caracterespecial = document.querySelector('.politica-especial i');

var long = document.querySelector('.politica-longitud');
var num = document.querySelector('.politica-numero');
var mayus = document.querySelector('.politica-mayuscula');
var caracterespec = document.querySelector('.politica-especial');


function showHide() {
    var show = document.getElementById("showHideDiv");
    if (show.style.display == "block") {
        // show.style.display = "none";
    }
    else {
        show.style.display = "block";
    }
}

// Validar politicas de contraseña

password.addEventListener('keyup', function(){
    var pass = password.value;
    checkStrength(pass);
})

function checkStrength(password){
    var strength = 0;

    //si la contraseña contiene mayusculas y minusculas
    if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){
        strength += 1;
        mayuscula.classList.remove('fa-circle');
        mayuscula.classList.add('fa-check');
        mayus.style.color = "#02b502";
    } 
    else{
        mayuscula.classList.add('fa-circle');
        mayuscula.classList.remove('fa-check');
        mayus.style.color = "#888";
    }

    // si la contraseña tiene numeros
    if(password.match(/([0-9])/)){
        strength += 1;
        numeros.classList.remove('fa-circle');
        numeros.classList.add('fa-check');
        num.style.color = "#02b502";
    }
    else{
        numeros.classList.add('fa-circle');
        numeros.classList.remove('fa-check');
        num.style.color = "#888";
    }

    // Si la contraseña tiene un caracter especial
    if(password.match(/([!,%,&,@,#,$,^,*,?,_,-,=])/)){
        strength += 1;
        caracterespecial.classList.remove('fa-circle');
        caracterespecial.classList.add('fa-check');
        caracterespec.style.color = "#02b502";
    }
    else{
        caracterespecial.classList.add('fa-circle');
        caracterespecial.classList.remove('fa-check');
        caracterespec.style.color = "#888";
    }

    // Si la contraseña tiene al menos 8 caracteres
    if(password.length > 7){
        strength += 1;
        longitud.classList.remove('fa-circle');
        longitud.classList.add('fa-check');
        long.style.color = "#02b502";
    }
    else{
        longitud.classList.add('fa-circle');
        longitud.classList.remove('fa-check');
        long.style.color = "#888";
    }
   
}


// Validar contraseña

var check = function(){
    if (document.getElementById('fcontraseña').value ==
    document.getElementById('fccontraseña').value){
        document.getElementById('alertPassword').style.color = '#8CC63E';
        document.getElementById('alertPassword').innerHTML = '<span><i class="fa fa-check-circle"></i> Contraseñas coinciden!</span>';
    } else{
        document.getElementById('alertPassword').style.color = '#EE2B39';
        document.getElementById('alertPassword').innerHTML = '<span><i class="fa fa-exclamation-triangle"></i> Contraseñas no coinciden!</span>'
    }
}