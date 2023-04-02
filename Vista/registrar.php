<?php
include('conexion.php');

if (isset($_POST['registrar'])) {
    $nombre = $_POST['fnom'];
    $apellido = $_POST['fape'];
    $dni = $_POST['fdni'];
    $correo = $_POST['fcorreo'];
    $celular = $_POST['fcelular'];
    $contraseña = $_POST['fcontraseña'];

    $ValidarCorreo = "select correo from usuario where correo='$correo'";
    $ResVal = mysqli_query($conn, $ValidarCorreo);
    $VCorreo=mysqli_fetch_row($ResVal);
    $_SESSION['dataCV'] = $VCorreo;
    $CorreoID = $_SESSION['dataCV'];
    $GetCorreo = $CorreoID[0];
    if($correo == $GetCorreo){
      echo "<script>
      alert('El Correo ya existe!');
      window.location= 'registrarse.html'
      </script>";
    }elseif($correo != $GetCorreo){
        $query = "CALL pa_agregar_Usuario('','$nombre', '$apellido', '$contraseña', '$dni', '$correo', $celular);";
        $result = mysqli_query($conn, $query);
        echo "<script>
        alert('¡Registro Completado!');
        window.location='login.php'
        </script>";
    }
}
?>