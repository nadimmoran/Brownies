<?php
session_start();
if(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}
include('conexion.php');
$ConIng="select * from ingredientes where idIngrediente=(SELECT MAX(idIngrediente) from ingredientes);";
$ResIng=mysqli_query($conn,$ConIng);
$IngData=mysqli_fetch_row($ResIng);
$_SESSION['dataI'] = $IngData;
$ConCaja="select * from caja where idCaja=(SELECT MAX(idCaja) from caja);";
$ResCaja=mysqli_query($conn,$ConCaja);
$CajaData=mysqli_fetch_row($ResCaja);
$_SESSION['dataC'] = $CajaData;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Personalizado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <div class="form-Detalle">
    <form action="OrdenCustom.php" method="post">
        <h3>Detalles del Producto Personalizado</h3>
        <div>
            <br><label for="P">Producto:</label>
            <input type="text" id="P" name="P" value="Brownie Personalizado" disabled="disabled" required class="box">
        </div>
        <?php
            //CALCULAR PRECIO
            $Ingrediente=$IngData[2];
            $Caja=$CajaData[3];
            $Precio=$Ingrediente+$Caja;            
        ?>
        <div>
            <label for="P">Precio Unitario:</label>
            <input type="hidden" name="PerPrecio" value="<?= $Precio; ?>">
            <input type="text" id="S" name="S" value="<?php echo "S/$Precio.00"?>" disabled="disabled" required class="box">
        </div>
        <h1>Proporcione su cantidad:</h1>
        <input type="number" id="fcan" name="PerCantidad" max="10" min="1" required class="box">
        <input type="submit" name="CalOrdenPer" value="Siguiente" class="btn">
        <br><a href="/Vista/PlantillaCaja.php" class="option-btn">Volver</a>
    </form>
    </div>
    <?php include('../Vista/includes/footer.php') ?>
</body>
</html>-->