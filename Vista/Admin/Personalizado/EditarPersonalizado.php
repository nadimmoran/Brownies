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

    <title>Admin - Editar Personalizado</title>
</head>

<body>
    
    <?php include('../header.php')?>


    <div class="container mt-5">
        <?php include('MensajeBro.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Personalizado 
                            <a href="IndexPersonalizado.php" class="btn btn-danger float-end">Volver</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['idPedido']))
                        {
                            $PedidoID = mysqli_real_escape_string($conn, $_GET['idPedido']);
                            $ConsultaE = "select p.idPedido, Estado, FechaEntrega from pedido p
                            INNER JOIN brownie_personalizado b on p.idPedido=b.idPedido
                            WHERE p.idPedido='$PedidoID';";
                            $ResultadoE = mysqli_query($conn, $ConsultaE);

                            if(mysqli_num_rows($ResultadoE) > 0)
                            {
                                $Personalizado = mysqli_fetch_array($ResultadoE);
                                ?>
                                <form action="PersonalizadoCRUD.php" method="POST">
                                    <input type="hidden" name="PerId" value="<?= $Personalizado['idPedido']; ?>">
                                    <div class="mb-3">
                                        <label>Estado del Pago:</label>
                                        <input type="text" name="PerEst" value="<?=$Personalizado['Estado'];?>" Placeholder="Pago o Pendiente" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Ingrese Fecha de Entrega:</label>
                                        <input type="text" name="PerFecha" value="<?=$Personalizado['FechaEntrega'];?>" Placeholder="31/12/2022" class="form-control" Required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="actualizarPersonalizado" class="btn btn-primary">
                                            Actualizar Personalizado
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Id no encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script header -->
    <script src="/Vista/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>