<?php
session_start();
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

    <title>Admin - Agregar Producto</title>
</head>

<body>
    
    <?php include('../header.php')?>


    <div class="container mt-5">
        <?php include('MensajeP.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Agregar Producto 
                            <a href="IndexProducto.php" class="btn btn-danger float-end">Volver</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="ProductoCRUD.php" method="POST">

                            <div class="mb-3">
                                <label>Producto</label>
                                <input type="text" name="Aproducto" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Precio</label>
                                <input type="text" name="Aprecio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descripcion</label>
                                <input type="text" name="Adescripcion" maxlength="100" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Imagen (Ruta)</label>
                                <input type="text" name="Aimagen" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="AgregarP" class="btn btn-primary">Guardar Producto</button>
                            </div>

                        </form>
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