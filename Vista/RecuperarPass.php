<?php
session_start();
include('conexion.php');

//VERIFICAR SI EXISTE DATOS DEL USUARIO EN LA BD
if (isset($_POST['BuscarUsuario'])) {
    $dni = $_POST['Rdni'];
    $correo = $_POST['Rcorreo'];
    $query = "CALL pa_listar_dni_correo('$dni', '$correo');";
    $resultado = mysqli_query($conn, $query);
	$user=mysqli_fetch_row($resultado);
	$_SESSION['dataA'] = $user;
}
 //SI USUARIO EXISTE
if(isset($user)){
	header('Location: RestablecerPass.php');
}else{
	?>
	  <?php
	  include("Correo.html");
	  echo "<script>
				  alert('Usuario no existe o datos incorrectos!');
				  window.location= 'Correo.html'
	  </script>";
}
?>