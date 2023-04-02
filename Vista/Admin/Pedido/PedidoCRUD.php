<?php
session_start();
require 'C:\xampp\htdocs\Vista\Admin\AdminDB.php';

if(isset($_POST['EliminarPedido']))
{
    $PedidoID = mysqli_real_escape_string($conn, $_POST['EliminarPedido']);

    $consultaU = "delete from pedido WHERE idPedido='$PedidoID';";
    $resU = mysqli_query($conn, $consultaU);

    if($resU)
    {
        $_SESSION['mensaje'] = "Pedido eliminado";
        header("Location: IndexPedido.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al eliminar";
        header("Location: IndexPedido.php");
        exit(0);
    }
}

if(isset($_POST['actualizarPedido']))
{
    $PedidoID = mysqli_real_escape_string($conn, $_POST['Pid']);
    $Estado = mysqli_real_escape_string($conn, $_POST['Pest']);
    $Fecha = mysqli_real_escape_string($conn, $_POST['Pfecha']);
    $conA = "update pedido set Estado='$Estado', FechaEntrega='$Fecha' where idPedido='$PedidoID'";
    $resA = mysqli_query($conn, $conA);

    if($resA)
    {
        $_SESSION['mensaje'] = "Pedido actualizado";
        header("Location: IndexPedido.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al actualizar";
        header("Location: IndexPedido.php");
        exit(0);
    }

}
?>