<?php
session_start();
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>   
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    <!-- RESTABLECER CONTRASEÑA -->
    <?php
    $UsuarioR = $_SESSION['dataA'];
        if(is_array($UsuarioR))
        {
            ?>
            <div class="form-container">
                <form action="ValidarPass.php" method="post">
                    <a href="/Vista/Index.php"><img src="img/logo.png" alt=""></a>
                    <h3>Restablezca su contraseña</h3>
                    <input type="hidden" name="IDR" value="<?= $UsuarioR[0]; ?>">
                    <div>
                        <label for="fnom">Contraseña encontrada:</label>
                        <input type="text" id="PASS" name="PassR" disabled="disabled" value="<?=$UsuarioR[4];?>" required class="box">
                    </div>
                    <div>
                        <label for="fnom">Nueva contraseña:</label>
                        <input type="text" id="PASS" name="NuevaPass" required class="box">
                    </div>
                    <input type="submit" name="ActPass" value="Actualizar contraseña" class="btn">
                </form>
            </div>
            <?php
        }else
        {
            echo "<h4>Id no encontrado</h4>";
        }
    ?>
</body>