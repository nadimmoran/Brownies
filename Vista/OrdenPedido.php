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
    <title>Orden de Pedido</title>   
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <?php
    $UsuarioA = $_SESSION['dataU'];
    $ProductoD = $_SESSION['dataP'];
    if(is_array($UsuarioA) and is_array($ProductoD))
    {
        ?>
            <div class="form-Orden">
                <form action="DetallePedido.php" method="post">
                    <h3>Orden del Pedido</h3>
                    <img class="imagen" src="<?=$ProductoD[4];?>" alt="">
                    <input type="hidden" name="Aid" value="<?= $UsuarioA[0]; ?>">
                    <input type="hidden" name="Pid" value="<?= $ProductoD[0]; ?>">
                    <div>
                        <label for="fpro">Producto: </label>
                        <input type="text" id="fpro" name="Ppro" value="<?=$ProductoD[1];?>" disabled="disabled" required class="box">
                    </div>
                    <input type="hidden" name="Pprecio" value="<?= $ProductoD[2]; ?>">
                    <div>
                        <label for="fpre">Precio:</label>
                        <input type="text" id="fpre" name="Ppre" value="S/.<?=$ProductoD[2];?>.00" disabled="disabled" required class="box">
                    </div>
                    <?php
                    //CALCULAR SUBTOTAL
                    if(isset($_POST['CalOrden'])){
                        $Cantidad=$_POST['Scantidad'];
                        $CAN=intval($Cantidad);
                        $Precio=$_POST['PrecioC'];
                        $PRE=intval($Precio);
                        $CalcularP=($CAN*$PRE);
                        $IGV=$CalcularP*0.18;
                        $Envio=5;
                        $SubT=$CalcularP+$IGV;
                        $Tot=$SubT+5;
                    }
                    ?>
                    <input type="hidden" name="Pimp" value="<?= $CalcularP; ?>">
                    <input type="hidden" name="Pigv" value="<?= $IGV; ?>">
                    <input type="hidden" name="Penv" value="<?= $Envio; ?>">
                    <input type="hidden" name="Ptot" value="<?= $Tot; ?>">
                    <input type="hidden" name="Pcan" value="<?= $CAN; ?>">
                    <div>
                        <label for="fcan">Cantidad:</label>
                        <input type="text" id="fcan" name="Pcantidad" value="<?=$CAN;?>" disabled="disabled" required class="box">
                    </div>
                    <div>
                        <label for="fsub">SubTotal:</label>
                        <input type="text" id="fsub" name="Psub" value="S/.<?=$CalcularP;?>.00" disabled="disabled" required class="box">
                    </div>
                    <div>
                        <label for="fsub">Precio Total a Pagar (Inlcuye IGV + Cargo Delivery S/5.00):</label>
                        <input type="text" id="ftot" name="tot" value="S/.<?=$Tot;?>" disabled="disabled" required class="box">
                    </div>
                    <br><h3>Datos del Delivery</h3>
                    <b><p>Complete la siguiente información, disponible en Lima Metropolitana.</p></b>
                    <div>
                        <br><label for="direccionE">Dirección</label>
                        <input type="text" id="direccionE" name="Pdir" required class="box">
                    </div>
                    <div>
                        <label for="codigoP">Código Postal</label>
                        <input type="number" id="codigoP" name="Pcod" max="15999" min="15000" required class="box">
                    </div>
                    <div>
                        <label for="referenciaE">Referencia</label>
                        <input type="text" id="referenciaE" name="Pref" required class="box">
                    </div>
                    <input type="submit" name="OrdenNext" value="Siguiente" class="btn"><br>
                    <br><a href="DescripcionP.php?idProducto=<?=$ProductoD[0];?>" class="option-btn">Volver</a>>
                </form>
            </div>
        <?php include('../Vista/includes/footer.php') ?>
        <?php
    }else
    {
        echo "<h4>Id no encontrado</h4>";
    }
    ?>
</body>
</html>