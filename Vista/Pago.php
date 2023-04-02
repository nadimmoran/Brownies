<?php
session_start();
if(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <div class="form-Pago">
        <form action="/Vista/Pedido.php" method="post">
            <h3>Escanea uno de los siguientes códigos QR.</h3>
            <h1>Por temas de seguridad, recomendamos de no realizar el escaneo mediante terceros no registrados, solo el usuario actual puede proseguir con el pago.</h1><br>
            <?php
            if($_GET['DetalleProducto'] == 'DP'){
                $UsuarioA = $_SESSION['dataU'];
                $UsuarioID = $UsuarioA[0];
                $ConsultaE = "select Total from pedido where idUsuario=('$UsuarioID') ORDER BY idUsuario DESC LIMIT 1;";
                $ResultadoE = mysqli_query($conn, $ConsultaE);
                $FilaU=mysqli_fetch_row($ResultadoE);
                $_SESSION['dataPP'] = $FilaU;
                echo "<h2>Monto a Pagar: S/.$FilaU[0]</h2>";
            }elseif($_GET['DetalleProducto'] == 'BP'){
                $UsuarioA = $_SESSION['dataU'];
                $UsuarioID = $UsuarioA[0];
                $ConsultaE = "select Total from pedido where idUsuario=('$UsuarioID') ORDER BY idUsuario DESC LIMIT 1;";
                $ResultadoE = mysqli_query($conn, $ConsultaE);
                $FilaU=mysqli_fetch_row($ResultadoE);
                $_SESSION['dataPP'] = $FilaU;
                echo "<h2>Monto a Pagar: S/.$FilaU[0]</h2>";
            }?>
            <h1>Sino puede realizar el pago puede hacerlo dentro de 2 días, de lo contrario se eliminará su pedido.</h1>
            <br><img class="imagen" src="img/YapeQR.png" alt=""><br>
            <br><img class="imagen" src="img/PlinQR.png" alt=""><br>
            <input type="hidden" value="<?php echo $_GET['DetalleProducto']?>" name="DetPro">
            <input type="submit" name="Pedido" value="Confirmar" class="btn">
        </form>
    </div>
    <?php include('../Vista/includes/footer.php') ?>
</body>

</html>