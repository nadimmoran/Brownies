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

    <title>Admin - Editar Producto</title>
</head>

<body>
    
    <?php include('../header.php')?>


    <div class="container mt-5">
        <?php include('MensajeP.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Producto 
                            <a href="IndexProducto.php" class="btn btn-danger float-end">Volver</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['idProducto']))
                        {
                            $ProductoID = mysqli_real_escape_string($conn, $_GET['idProducto']);
                            $ConsultaE = "CALL pa_listar_Producto_id('$ProductoID');";
                            $ResultadoE = mysqli_query($conn, $ConsultaE);

                            if(mysqli_num_rows($ResultadoE) > 0)
                            {
                                $ProductoA = mysqli_fetch_array($ResultadoE);
                                ?>
                                <form action="ProductoCRUD.php" method="POST">
                                    <input type="hidden" name="Eid" value="<?= $ProductoA['idProducto']; ?>">

                                    <div class="mb-3">
                                        <label>Producto</label>
                                        <input type="text" name="Eproducto" value="<?=$ProductoA['NombreProducto'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Precio Unitario</label>
                                        <input type="text" name="Eprecio" value="<?=$ProductoA['PrecioUnitario'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripcion</label>
                                        <input type="text" name="Edescripcion" maxlength="100" value="<?=$ProductoA['Descripcion'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Imagen (Ruta)</label>
                                        <input type="text" name="Eimagen" value="<?=$ProductoA['Image'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="actualizarP" class="btn btn-primary">
                                            Actualizar Producto
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
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>