<?php
session_start();
require 'C:\xampp\htdocs\Vista\Admin\AdminDB.php';

if(isset($_POST['EliminarPersonalizado']))
{
    $PedidoID = mysqli_real_escape_string($conn, $_POST['EliminarPersonalizado']);

    $consultaD = "delete from pedido WHERE idPedido='$PedidoID';";
    $resE = mysqli_query($conn, $consultaD);

    if($resE)
    {
        $_SESSION['mensaje'] = "¡Brownie Personalizado Eliminado!";
        header("Location: IndexPersonalizado.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al eliminar";
        header("Location: IndexPersonalizado.php");
        exit(0);
    }
}

if(isset($_POST['actualizarPersonalizado']))
{
    $PedidoID = mysqli_real_escape_string($conn, $_POST['PerId']);
    $EstadoP = mysqli_real_escape_string($conn, $_POST['PerEst']);
    $FechaP = mysqli_real_escape_string($conn, $_POST['PerFecha']);
    $ConP = "update pedido set Estado='$EstadoP', FechaEntrega='$FechaP' where idPedido='$PedidoID'";
    $ResP = mysqli_query($conn, $ConP);

    if($ResP)
    {
        $_SESSION['mensaje'] = "¡Estado del Brownie Personalizado Actualizado!";
        header("Location: IndexPersonalizado.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al actualizar";
        header("Location: IndexPersonalizado.php");
        exit(0);
    }

}
?>