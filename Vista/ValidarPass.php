<?php
include('conexion.php');

//ACTUALIZAR PASS
if (isset($_POST['ActPass'])) {
    $ID = $_POST['IDR'];
    $PASS = $_POST['NuevaPass'];
    $query = "update Usuario set Contraseña='$PASS' where idUsuario='$ID';";
    $resultado = mysqli_query($conn, $query);
    include("RestablecerPass.php");
	  echo "<script>
				  alert('Contraseña actualizada!');
				  window.location='login.php'
	  </script>";
}else{
	include("RestablecerPass.php");
	echo "<script>
		alert('Error!');
		window.location='RestablecerPass.php'
	</script>";
}
?>