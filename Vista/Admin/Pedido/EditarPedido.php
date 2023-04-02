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

    <title>Admin - Editar Pedido</title>
</head>

<body>
    
    <?php include('../header.php')?>


    <div class="container mt-5">
        <?php include('MensajePro.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Pedido 
                            <a href="IndexPedido.php" class="btn btn-danger float-end">Volver</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['idPedido']))
                        {
                            $PedidoID = mysqli_real_escape_string($conn, $_GET['idPedido']);
                            $ConsultaE = "select idPedido, Estado, FechaEntrega from pedido WHERE idPedido='$PedidoID';";
                            $ResultadoE = mysqli_query($conn, $ConsultaE);

                            if(mysqli_num_rows($ResultadoE) > 0)
                            {
                                $PedidoA = mysqli_fetch_array($ResultadoE);
                                ?>
                                <form action="PedidoCRUD.php" method="POST">
                                    <input type="hidden" name="Pid" value="<?= $PedidoA['idPedido']; ?>">
                                    <div class="mb-3">
                                        <label>Estado del Pago:</label>
                                        <input type="text" name="Pest" value="<?=$PedidoA['Estado'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Ingrese Fecha de Entrega:</label>
                                        <input type="text" name="Pfecha" value="<?=$PedidoA['FechaEntrega'];?>" placeholder="31/12/2022" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="actualizarPedido" class="btn btn-primary">
                                            Actualizar Pedido
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