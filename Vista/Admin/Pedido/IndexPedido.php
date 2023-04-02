<?php
    session_start();
    require 'C:\xampp\htdocs\Vista\Admin\AdminDB.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- estilos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/Vista/estilos/admin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin. Pedido</title>
</head>

<body>
    
    <?php include('../header.php')?>


    <div class="container mt-4">
        <?php include('MensajePro.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center">PEDIDOS GENERADOS</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered border-primary" style='font-size:150%'>
                            <thead>
                                <tr class="table-info">
                                    <th style="text-align:center">Nombres Completos</th>
                                    <th style="text-align:center">DNI</th>
                                    <th style="text-align:center">Celular</th>
                                    <th style="text-align:center">Producto</th>
                                    <th style="text-align:center">Cantidad</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Dirección de Envío</th>
                                    <th style="text-align:center">Código Postal</th>
                                    <th style="text-align:center">Referencia</th>
                                    <th style="text-align:center">Fecha Creada</th>
                                    <th style="text-align:center">Fecha de Entrega</th>
                                    <th style="text-align:center">Estado de Pago</th>
                                    <th style="text-align:center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $consulta = "CALL pa_listar_pedido_orden();;";
                                    $resultado = mysqli_query($conn, $consulta);

                                    if(mysqli_num_rows($resultado) > 0)
                                    {
                                        foreach($resultado as $pedido)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $pedido['nombre']; ?> <?= $pedido['apellido']; ?></td>
                                                <td style="text-align:center"><?= $pedido['dni']; ?></td>
                                                <td style="text-align:center"><?= $pedido['celular']; ?></td>
                                                <td style="text-align:center"><?= $pedido['NombreProducto']; ?></td>
                                                <td style="text-align:center"><?= $pedido['Cantidad']; ?></td>
                                                <td style="text-align:center">S/.<?= $pedido['Subtotal']; ?></td>
                                                <td style="text-align:center"><?= $pedido['DireccionEnvio']; ?></td>
                                                <td style="text-align:center"><?= $pedido['CodigoPostal']; ?></td>
                                                <td style="text-align:center"><?= $pedido['Referencia']; ?></td>
                                                <td style="text-align:center"><?= $pedido['FechaCreacion']; ?></td>
                                                <td style="text-align:center"><?= $pedido['FechaEntrega']; ?></td>
                                                <td style="text-align:center"><?= $pedido['Estado']; ?></td>
                                                <td style="text-align:center">
                                                    <a href="EditarPedido.php?idPedido=<?= $pedido['idPedido']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="PedidoCRUD.php" method="POST" class="d-inline">
                                                        <button type="submit" name="EliminarPedido" value="<?=$pedido['idPedido'];?>" class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>
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
    
    <!-- script header -->
    <script src="/Vista/js/script.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>