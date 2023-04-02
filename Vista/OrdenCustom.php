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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <?php
    $Usuario = $_SESSION['dataU'];
    $Ingrediente = $_SESSION['dataI'];
    $Caja = $_SESSION['dataC'];
    if(is_array($Ingrediente) and is_array($Caja))
    {
        ?>
            <div class="form-Orden">
                <form action="DetallePersonalizado.php" method="post">
                    <h3>Orden del Brownie Personalizado</h3>
                    <input type="hidden" name="Uid" value="<?= $Usuario[0]; ?>">
                    <input type="hidden" name="Iid" value="<?= $Ingrediente[0]; ?>">
                    <input type="hidden" name="Cid" value="<?= $Caja[0]; ?>">
                    <div>
                        <label for="P">Producto: </label>
                        <input type="text" id="P" name="PerNom" value="Brownie de chocolate" disabled="disabled" required class="box">
                    </div>
                    <div>
                        <label for="P">Descripción:</label>
                        <textarea id="R" name="R" disabled="disabled" class="box"><?php echo "Contiene ingredientes como $Ingrediente[1], y usa el diseño $Caja[1]"?></textarea>
                    </div>
                    <div>
                        <label for="M">Mensaje de la Caja:</label>
                        <input type="text" id="M" name="PerMen" value="<?php echo $Caja[2]; ?>" placeholder="¡El diseño elegido incluye mensaje!" disabled="disabled" required class="box">
                    </div>
                    <?php
                    //Calcular Precios
                    if(isset($_POST['CalOrdenPer'])){
                        $Cantidad=$_POST['PerCantidad'];
                        $CAN=intval($Cantidad);
                        $Precio=$_POST['PerPrecio'];
                        $PRE=intval($Precio);
                        $Importe=($CAN*$PRE);
                        $IGV=$Importe*0.18;
                        $Envio=5;
                        $Parcial=$Importe+$Envio;
                        $SubTotal=$Importe+$IGV;
                        $Total=$SubTotal+5;
                    }
                    ?>
                    <input type="hidden" name="PerUni" value="<?=$Precio;?>">
                    <input type="hidden" name="PerCan" value="<?=$Cantidad;?>">
                    <input type="hidden" name="PerImp" value="<?=$Importe;?>">
                    <input type="hidden" name="PerIGV" value="<?=$IGV;?>">
                    <input type="hidden" name="PerEnv" value="<?=$Envio;?>">
                    <input type="hidden" name="PerTot" value="<?=$Total;?>">
                    <input type="hidden" name="PerPar" value="<?=$Parcial;?>">
                    <div>
                        <label for="funi">Precio Unitario:</label>
                        <input type="text" id="uni" name="Uni" value="S/.<?=$Precio;?>.00" disabled="disabled" required class="box">
                    </div>
                    <div>
                        <label for="fcan">Cantidad:</label>
                        <input type="text" id="fcan" name="Can" value="<?=$CAN;?>" disabled="disabled" required class="box">
                    </div>
                    <div>
                        <label for="P">SubTotal:</label>
                        <input type="text" id="Pre" name="PrecioP" value="S/.<?=$Importe;?>.00" disabled="disabled" required class="box">
                    </div>
                    <div>
                        <label for="fsub">Total (Inlcuye IGV + Cargo Delivery S/5.00):</label>
                        <input type="text" id="ftot" name="T" value="S/.<?=$Total;?>" disabled="disabled" required class="box">
                    </div>
                    <br><h3>Datos del Delivery</h3>
                    <b><p>Complete la siguiente información, disponible en Lima Metropolitana.</p></b>
                    <div>
                        <br><label for="direccionE">Dirección</label>
                        <input type="text" id="direccionE" name="PerDir" required class="box">
                    </div>
                    <div>
                        <label for="codigoP">Código Postal</label>
                        <input type="number" id="codigoP" name="PerCod" max="15999" min="15000" required class="box">
                    </div>
                    <div>
                        <label for="referenciaE">Referencia</label>
                        <input type="text" id="referenciaE" name="PerRef" required class="box">
                    </div>
                    <input type="submit" name="OrdenBrowniePer" value="Siguiente" class="btn"><br>
                    <br><a href="/Vista/DescPersonalizado.php" class="option-btn">Volver</a>
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