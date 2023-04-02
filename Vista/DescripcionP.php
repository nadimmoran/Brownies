<?php
session_start();
include('conexion.php');
if(empty($_SESSION['dataU'])){
    header("location:login.php");
}elseif(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}

$idProducto = $_GET['idProducto'];
$consulta="select * from producto where idProducto=$idProducto";
$resultado=mysqli_query($conn,$consulta);
$data=mysqli_fetch_row($resultado);
$_SESSION['dataP'] = $data;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <div class="form-Detalle">
    <form action="OrdenPedido.php" method="post">
        <h3>Detalles del Producto</h3>
        <br><img class="imagen" src="<?php echo $data[4]?>" alt=""><br>
        <div>
            <br><label for="P">Producto:</label>
            <input type="text" id="P" name="P" value="<?php echo $data[1]?>" disabled="disabled" required class="box">
        </div>
        <div>
            <label for="P">Precio Unitario:</label>
            <input type="hidden" name="PrecioC" value="<?= $data[2]; ?>">
            <input type="text" id="S" name="S" value="<?php echo "S/$data[2].00"?>" disabled="disabled" required class="box">
        </div>
        <h1>Elija su cantidad</h1>
        <input type="number" id="fcan" name="Scantidad" max="10" min="1" required class="box">
        <input type="submit" name="CalOrden" value="Siguiente" class="btn">
        <br><a href="/Vista/index.php" class="option-btn">Volver</a>
    </form>
    </div>
    <?php include('../Vista/includes/footer.php') ?>
</body>
</html>