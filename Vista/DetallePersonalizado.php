<?php
include('conexion.php');
//INSERTAR FILA Brownie_Personalizado Y CARGAR CODIGO QR
if (isset($_POST['OrdenBrowniePer'])) {
    //BROWNIE PERSONALIZADO
    $IDusuario = $_POST['Uid'];
    $IDingrediente = $_POST['Iid'];
    $IDcaja = $_POST['Cid'];
    //CALCULOS
    $Precio = $_POST['PerUni'];
    $Cantidad = $_POST['PerCan'];
    $Importe = $_POST['PerImp'];
    $Envio = $_POST['PerEnv'];
    $Parcial = $_POST['PerPar'];
    $Total = $_POST['PerTot'];
    //TABLA ENVIO
    $Direccion = $_POST['PerDir'];
    $CodigoPostal = $_POST['PerCod'];
    $Referencia = $_POST['PerRef'];

    //INSERT TABLA INFORMACION_ENVIO
    $InfoEnvio = "insert into informacion_envio(DireccionEnvio, CodigoPostal, Referencia)values('$Direccion', '$CodigoPostal', '$Referencia');";
    $ResEnvio = mysqli_query($conn, $InfoEnvio);
    //INSERT TABLA PEDIDO
    $PedidoPersonalizado = "insert into pedido(idEnvio, total, idUsuario)
    values((SELECT MAX(idEnvio) AS id FROM informacion_envio), '$Total', '$IDusuario')";
    $ResPedido = mysqli_query($conn, $PedidoPersonalizado);
    //INSERT TABLA BROWNIE_PERSONALIZADO
    $DetallePersonalizado = "insert into brownie_personalizado(idIngrediente, idCaja, idPedido, PrecioPersonalizado, CantidadPersonalizado, ImportePersonalizado, Envio, SubTotalPer)
    values ((SELECT MAX(idIngrediente) as id FROM ingredientes), (SELECT MAX(idCaja) as id FROM caja),(SELECT MAX(idPedido) as id FROM Pedido),
    '$Precio', '$Cantidad', '$Importe', '$Envio', '$Total');";
    $ResDetalle = mysqli_query($conn, $DetallePersonalizado);

    if($ResEnvio && $ResDetalle && $ResPedido){
        header('Location: Pago.php?DetalleProducto=BP');
    }
}
?>