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

    <title>Admin. Usuario</title>
</head>

<body>
    
    <?php include('../header.php')?>


    <div class="container mt-4">
        <?php include('MensajeU.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center">USUARIOS REGISTRADOS
                            <a href="CrearUsuario.php" class="btn btn-primary float-end">Agregar Usuario</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered border-primary" style='font-size:150%'>
                            <thead>
                                <tr class="table-info">
                                    <th style="text-align:center">Id</th>
                                    <th style="text-align:center">Rol</th>
                                    <th style="text-align:center">Nombre</th>
                                    <th style="text-align:center">Apellido</th>
                                    <th style="text-align:center">Contraseña</th>
                                    <th style="text-align:center">DNI</th>
                                    <th style="text-align:center">Correo</th>
                                    <th style="text-align:center">Celular</th>
                                    <th style="text-align:center">Fecha registrado</th>
                                    <th style="text-align:center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $consulta = "CALL pa_listar_usuario;";
                                    $resultado = mysqli_query($conn, $consulta);

                                    if(mysqli_num_rows($resultado) > 0)
                                    {
                                        foreach($resultado as $usuario)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $usuario['idUsuario']; ?></td>
                                                <td style="text-align:center"><?= $usuario['nombreRol']; ?></td>
                                                <td style="text-align:center"><?= $usuario['nombre']; ?></td>
                                                <td style="text-align:center"><?= $usuario['apellido']; ?></td>
                                                <td style="text-align:center"><?= $usuario['Contraseña']; ?></td>
                                                <td style="text-align:center"><?= $usuario['dni']; ?></td>
                                                <td style="text-align:center"><?= $usuario['correo']; ?></td>
                                                <td style="text-align:center"><?= $usuario['celular']; ?></td>
                                                <td style="text-align:center"><?= $usuario['FechaRegistro']; ?></td>
                                                <td style="text-align:center">
                                                    <a href="EditarUsuario.php?idUsuario=<?= $usuario['idUsuario']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="UsuarioCRUD.php" method="POST" class="d-inline">
                                                        <button type="submit" name="EliminarUsuario" value="<?=$usuario['idUsuario'];?>" class="btn btn-danger btn-sm">Eliminar</button>
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