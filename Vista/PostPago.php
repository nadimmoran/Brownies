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
    <title>Realizar Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <div class="form-Pago">
        <form action="#" method="post">
            <h3>Escanea uno de los siguientes códigos QR.</h3>
            <h1>Por temas de seguridad, recomendamos de no realizar el escaneo mediante terceros no registrados, solo el usuario actual puede proseguir con el pago.</h1><br>
            <h1>Recuerde realizar el pago dentro de los 2 días de haberse generado el pedido, de lo contrario se eliminará.</h1>
            <?php
            if($_GET['idPedido']){
                $IdPedido = $_GET['idPedido'];
                $ConsultaE = "select Total from pedido where idPedido='$IdPedido';";
                $ResultadoE = mysqli_query($conn, $ConsultaE);
                $FilaU=mysqli_fetch_row($ResultadoE);
                $_SESSION['dataPago'] = $FilaU;
                echo "<h2>Monto a Pagar: S/.$FilaU[0]0</h2>";
            }?>
            <h1>La fecha de entrega será designada una vez se confirme el pago del pedido, se le comunicará a su número de celular.</h1><br>
            <br><img class="imagen" src="img/YapeQR.png" alt=""><br>
            <br><img class="imagen" src="img/PlinQR.png" alt=""><br>
            <a href="/Vista/Estado.php" class="option-btn">Volver</a>
        </form>
    </div>
    <?php include('../Vista/includes/footer.php') ?>
</body>

</html>