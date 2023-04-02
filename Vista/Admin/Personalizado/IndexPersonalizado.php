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

    <title>Admin. Pedido Personalizado</title>
</head>

<body>
    
    <?php include('../header.php')?>

    <div class="container mt-4">
        <?php include('MensajeBro.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center">PEDIDOS DE BROWNIES PERSONALIZADOS</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered border-primary" style='font-size:150%'>
                            <thead>
                                <tr class="table-info">
                                    <th style="text-align:center">Nombres Completos</th>
                                    <th style="text-align:center">DNI</th>
                                    <th style="text-align:center">Celular</th>
                                    <th style="text-align:center">Brownie Personalizado</th>
                                    <th style="text-align:center">Caja</th>
                                    <th style="text-align:center">Cantidad</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Dirección</th>
                                    <th style="text-align:center">Código Postal</th>
                                    <th style="text-align:center">Referencia</th>
                                    <th style="text-align:center">Fecha Creada</th>
                                    <th style="text-align:center">Fecha Entrega</th>
                                    <th style="text-align:center">Estado Pago</th>
                                    <th style="text-align:center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $consulta = "CALL pa_listar_pedido_personalizado();";
                                    $resultado = mysqli_query($conn, $consulta);

                                    if(mysqli_num_rows($resultado) > 0)
                                    {
                                        foreach($resultado as $Personalizado)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $Personalizado['nombre']; ?> <?= $Personalizado['apellido']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['dni']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['celular']; ?></td>
                                                <td style="text-align:center">Brownie decorado con <?= $Personalizado['NombreIngrediente']; ?>.</td>
                                                <td style="text-align:center">La plantilla es "<?= $Personalizado['NombrePlantilla']; ?>" y su mensaje "<?= $Personalizado['Mensaje']; ?>".</td>
                                                <td style="text-align:center"><?= $Personalizado['CantidadPersonalizado']; ?></td>
                                                <td style="text-align:center">S/.<?= $Personalizado['SubtotalPer']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['DireccionEnvio']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['CodigoPostal']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['Referencia']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['FechaCreacion']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['FechaEntrega']; ?></td>
                                                <td style="text-align:center"><?= $Personalizado['Estado']; ?></td>
                                                <td style="text-align:center">
                                                    <a href="EditarPersonalizado.php?idPedido=<?= $Personalizado['idPedido']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="PersonalizadoCRUD.php" method="POST" class="d-inline">
                                                        <button type="submit" name="EliminarPersonalizado" value="<?=$Personalizado['idPedido'];?>" class="btn btn-danger btn-sm">Eliminar</button>
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