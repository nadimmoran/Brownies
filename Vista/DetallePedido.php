<?php
include('conexion.php');
//INSERTAR FILA DETALLE_PRODUCTO Y CARGAR DELIVERY
if (isset($_POST['OrdenNext'])) {
    $IDusuario = $_POST['Aid'];
    $IDproducto = $_POST['Pid'];
    $Precio = $_POST['Pprecio'];
    $Cantidad = $_POST['Pcan'];
    $Importe = $_POST['Pimp'];
    $Envio = $_POST['Penv'];
    $Total = $_POST['Ptot'];
    $Direccion = $_POST['Pdir'];
    $CodigoPostal = $_POST['Pcod'];
    $Referencia = $_POST['Pref'];

    $InfoEnvio = "insert into informacion_envio(DireccionEnvio, CodigoPostal, Referencia)values('$Direccion', '$CodigoPostal', '$Referencia');";
    $ResEnvio = mysqli_query($conn, $InfoEnvio);
    $Pedido = "insert into pedido(idEnvio, total, idUsuario)values((SELECT MAX(idEnvio) AS id FROM informacion_envio), '$Total', '$IDusuario')";
    $ResPedido = mysqli_query($conn, $Pedido);
    $DetallePedido = "insert into detalle_pedido(idPedido, idProducto, PrecioUnitario, Cantidad, Importe, PrecioEnvio, SubTotal)values((select MAX(idPedido) AS id FROM pedido), '$IDproducto', '$Precio', '$Cantidad', '$Importe', '$Envio', '$Total');";
    $ResDetalle = mysqli_query($conn, $DetallePedido);

    if($ResEnvio && $ResDetalle && $ResPedido){
        header('Location: Pago.php?DetalleProducto=DP');
    }

}
?>