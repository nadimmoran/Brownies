<?php
include('conexion.php');

//
if (isset($_POST['ActPer'])) {
    $rol = $_POST['Arol'];
    $nombre = $_POST['Anombre'];
    $apellido = $_POST['Aapellido'];
    $dni = $_POST['Adni'];
    $correo = $_POST['Acorreo'];
    $contraseña = $_POST['Acontraseña'];
    $celular = $_POST['Acelular'];
    $IDusuario = $_POST['Aid'];
    $query = "CALL pa_actualizar_Usuario('$IDusuario', '$rol','$nombre', '$apellido', '$contraseña', '$dni', '$correo', '$celular')";
      
    $result = mysqli_query($conn, $query);
    echo "<script>
                alert('Datos Actualizados!');
                window.location= 'Perfil.php'
    </script>";
}elseif(isset($_POST['ActPed'])){
  header("Location: Estado.php");
}else{
  ?>
    <?php
    include("Perfil.php");
    echo "<script>
                alert('Error al actualizar!');
                window.location= 'Perfil.php'
    </script>";
}


?>