<?php
session_start();
include('conexion.php');
if(empty($_SESSION['dataU'])){
    header("location:login.php");
}elseif(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delisweetchocolate - Estado de Pedidos</title>   
    <!-- estilos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/Vista/estilos/estilos.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <div class="contenedor">
        <h1>Cualquier consulta contáctenos en nuestro Whatsapp.</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center">Mis Pedidos Realizados</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered border-primary" style='font-size:150%'>
                            <thead>
                                <tr class="table-info">
                                    <th style="text-align:center">Producto</th>
                                    <th style="text-align:center">Cantidad</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Dirección de Envío</th>
                                    <th style="text-align:center">Código Postal</th>
                                    <th style="text-align:center">Referencia</th>
                                    <th style="text-align:center">Fecha Creada</th>
                                    <th style="text-align:center">Fecha de Entrega</th>
                                    <th style="text-align:center">Estado de Pago</th>
                                    <th style="text-align:center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $UsuarioA = $_SESSION['dataU'];
                                    $UsuarioID = $UsuarioA[0];
                                    $consulta = "select pedido.idUsuario, pedido.idPedido, NombreProducto, producto.PrecioUnitario, Cantidad, Subtotal, DireccionEnvio,
                                    CodigoPostal, Referencia,FechaCreacion,FechaEntrega,Estado from pedido
                                    inner join informacion_envio on informacion_envio.idEnvio=pedido.idEnvio
                                    inner join detalle_pedido on detalle_pedido.idPedido=pedido.idPedido
                                    inner join producto on producto.idProducto=detalle_pedido.idProducto
                                    where pedido.idUsuario='$UsuarioID';";
                                    $resultado = mysqli_query($conn, $consulta);

                                    if(mysqli_num_rows($resultado) > 0)
                                    {
                                        foreach($resultado as $pedido)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $pedido['NombreProducto']; ?></td>
                                                <td style="text-align:center"><?= $pedido['Cantidad']; ?></td>
                                                <td style="text-align:center">S/.<?= $pedido['Subtotal']; ?>0</td>
                                                <td style="text-align:center"><?= $pedido['DireccionEnvio']; ?></td>
                                                <td style="text-align:center"><?= $pedido['CodigoPostal']; ?></td>
                                                <td style="text-align:center"><?= $pedido['Referencia']; ?></td>
                                                <td style="text-align:center"><?= $pedido['FechaCreacion']; ?></td>
                                                <td style="text-align:center"><?= $pedido['FechaEntrega']; ?></td>
                                                <td style="text-align:center"><?= $pedido['Estado']; ?></td>
                                                <td style="text-align:center">
                                                    <a href="PostPago.php?idPedido=<?= $pedido['idPedido']?>" class="btn btn-success btn-sm">Pagar</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Registro no encontrado </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center">Mis Brownies Personalizados Realizados</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered border-primary" style='font-size:150%'>
                            <thead>
                                <tr class="table-info">
                                    <th style="text-align:center">Brownie Personalizado</th>
                                    <th style="text-align:center">Caja</th>
                                    <th style="text-align:center">Cantidad</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Dirección de Envío</th>
                                    <th style="text-align:center">Código Postal</th>
                                    <th style="text-align:center">Referencia</th>
                                    <th style="text-align:center">Fecha Creada</th>
                                    <th style="text-align:center">Fecha de Entrega</th>
                                    <th style="text-align:center">Estado de Pago</th>
                                    <th style="text-align:center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $UsuarioA = $_SESSION['dataU'];
                                    $UsuarioID = $UsuarioA[0];
                                    $consulta = "select p.idPedido, p.idUsuario, NombreIngrediente, NombrePlantilla, Mensaje,
                                    CantidadPersonalizado,SubtotalPer, DireccionEnvio, CodigoPostal, Referencia,
                                    FechaCreacion,FechaEntrega,Estado from pedido p 
                                    inner join usuario u on u.idUsuario=p.idUsuario
                                    inner join informacion_envio e on e.idEnvio=p.idEnvio
                                    inner join brownie_personalizado b on b.idPedido=p.idPedido
                                    inner join ingredientes i on b.idIngrediente=i.idIngrediente
                                    inner join caja c on b.idCaja=c.idCaja
                                    where p.idUsuario='$UsuarioID';";
                                    $resultado = mysqli_query($conn, $consulta);

                                    if(mysqli_num_rows($resultado) > 0)
                                    {
                                        foreach($resultado as $personalizado)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center">Brownie decorado con <?= $personalizado['NombreIngrediente'];?>.</td>
                                                <td style="text-align:center">La plantilla es "<?= $personalizado['NombrePlantilla'];?>" y su mensaje es "<?= $personalizado['Mensaje'];?>".</td>
                                                <td style="text-align:center"><?= $personalizado['CantidadPersonalizado']; ?></td>
                                                <td style="text-align:center">S/.<?= $personalizado['SubtotalPer']; ?>0</td>
                                                <td style="text-align:center"><?= $personalizado['DireccionEnvio']; ?></td>
                                                <td style="text-align:center"><?= $personalizado['CodigoPostal']; ?></td>
                                                <td style="text-align:center"><?= $personalizado['Referencia']; ?></td>
                                                <td style="text-align:center"><?= $personalizado['FechaCreacion']; ?></td>
                                                <td style="text-align:center"><?= $personalizado['FechaEntrega']; ?></td>
                                                <td style="text-align:center"><?= $personalizado['Estado']; ?></td>
                                                <td style="text-align:center">
                                                    <a href="PostPago.php?idPedido=<?= $personalizado['idPedido']?>" class="btn btn-success btn-sm">Pagar</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Registro no encontrado </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <!-- Boton flotante de whatsapp -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=51972591578&text=Hola%21%20Comunicate%20con%20nosotros%20para%20mas%20informaci%C3%B3n." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
</body>