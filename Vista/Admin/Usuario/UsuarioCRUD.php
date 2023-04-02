<?php
session_start();
require 'C:\xampp\htdocs\Vista\Admin\AdminDB.php';

if(isset($_POST['EliminarUsuario']))
{
    $UsuarioID = mysqli_real_escape_string($conn, $_POST['EliminarUsuario']);

    $consultaU = "CALL pa_delete_Usuario('$UsuarioID');";
    $resU = mysqli_query($conn, $consultaU);

    if($resU)
    {
        $_SESSION['mensaje'] = "Usuario eliminado";
        header("Location: IndexUsuario.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al eliminar";
        header("Location: IndexUsuario.php");
        exit(0);
    }
}

if(isset($_POST['actualizarU']))
{
    $UsuarioID = mysqli_real_escape_string($conn, $_POST['Eid']);
    $rol = mysqli_real_escape_string($conn, $_POST['Erol']);
    $nombre = mysqli_real_escape_string($conn, $_POST['Enombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['Eapellido']);
    $contraseña = mysqli_real_escape_string($conn, $_POST['Econtraseña']);
    $dni = mysqli_real_escape_string($conn, $_POST['Edni']);
    $correo = mysqli_real_escape_string($conn, $_POST['Ecorreo']);
    $celular = mysqli_real_escape_string($conn, $_POST['Ecelular']);

    $conA = "update usuario set idRol='$rol',nombre='$nombre',apellido='$apellido',Contraseña='$contraseña',dni='$dni',correo='$correo', celular='$celular' where idUsuario='$UsuarioID'";
    $resA = mysqli_query($conn, $conA);

    if($resA)
    {
        $_SESSION['mensaje'] = "Usuario actualizado";
        header("Location: IndexUsuario.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al actualizar";
        header("Location: IndexUsuario.php");
        exit(0);
    }

}


if(isset($_POST['AgregarU']))
{
    $nombre = mysqli_real_escape_string($conn, $_POST['Anombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['Aapellido']);
    $contraseña = mysqli_real_escape_string($conn, $_POST['Acontraseña']);
    $dni = mysqli_real_escape_string($conn, $_POST['Adni']);
    $correo = mysqli_real_escape_string($conn, $_POST['Acorreo']);
    $celular = mysqli_real_escape_string($conn, $_POST['Acelular']);

    $conG = "CALL pa_agregar_Usuario('','$nombre', '$apellido', '$contraseña', '$dni', '$correo', '$celular');";
 
    $resG = mysqli_query($conn, $conG);
    if($resG)
    {
        $_SESSION['mensaje'] = "Usuario guardado";
        header("Location: CrearUsuario.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al guardar";
        header("Location: CrearUsuario.php");
        exit(0);
    }
}

?>