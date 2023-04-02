let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
}

window.onscroll = () => {
   navbar.classList.remove('active');

   if (window.scrollY > 60) {
      document.querySelector('.header .header-2').classList.add('active');
   } else {
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

// Validar correo
function validar() {
   var correo, contrasena;
   correo = document.getElementById("fcorreo").value;
   contrasena = document.getElementById("fcontrasena").value;

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

// Personalizar brownie

function mostrarcombo() {

   var elementbaseChocolate = document.getElementById("Chocolate");
   var chkbaseChocolate = document.getElementById("checkChocolate");

   var elementMashmellow = document.getElementById("Mashmellow");
   var chkMashmellow = document.getElementById("checkMashmellow");

   var elementGrageas = document.getElementById("Grageas");
   var chkGrageas = document.getElementById("checkGrageas");

   var elementchochips = document.getElementById("chocochip");
   var chkChochips = document.getElementById("checkchochips");

   var elementGomitas = document.getElementById("Gomitas");
   var chkGomitas = document.getElementById("checkGomitas");

   var elementChispitas = document.getElementById("chispitas");
   var chkChispitas = document.getElementById("checkChispitas");

   //(Condicion) ? True : False;
   let contador = 10;
   let resultado= document.getElementById("fcontador");
  
 
   chkbaseChocolate.checked ? elementbaseChocolate.style.display = "block" : elementbaseChocolate.style.display = "none";
   contador +=  chkbaseChocolate.checked ?  5  :  0; 
   chkMashmellow.checked ? elementMashmellow.style.display = "block" : elementMashmellow.style.display = "none";
   contador +=  chkMashmellow.checked ?  4 :  0;

   chkGrageas.checked ? elementGrageas.style.display = "block" : elementGrageas.style.display = "none";
   contador += chkGrageas.checked ? 3 :  0;

   chkChochips.checked ? elementchochips.style.display = "block" : elementchochips.style.display = "none";
   contador += chkChochips.checked ? 2 :  0; 
   
   chkGomitas.checked ? elementGomitas.style.display = "block" : elementGomitas.style.display = "none";
   contador += chkGomitas.checked ? 2 :  0;
  
   chkChispitas.checked ? elementChispitas.style.display = "block" : elementChispitas.style.display = "none";
   contador += chkChispitas.checked ? 2 :  0;
   
   document.getElementById('fcontador').value = contador;
}