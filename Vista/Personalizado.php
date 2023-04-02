<?php
session_start();
if(empty($_SESSION['dataU'])){
    header("location:login.php");
}elseif(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalizado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <div class="form-personalizar">

        <form action="/Vista/Ingrediente.php" id="Ingredientes" method="post">

            <h3>Personaliza tu Brownie</h3>

            <div class="img-brownie">
                <img class="basebrownie" id="baseBrownie" src="img/browniebase.png" alt="base Brownie">
                <img class="first-capa" id="Chocolate" src="img/chocolatecover.png" alt="base Brownie" style="display: none;">
                <img class="second-capa" id="Mashmellow" src="img/marshmallows.png" alt="Mashmellow" style="display: none;">
                <img class="second-capa" id="Grageas" src="img/grageas.png" alt="base Brownie" style="display: none;">
                <img class="first-capa" id="chocochip" src="img/chocochips.png" alt="base Brownie" style="display: none;">
                <img class="first-capa" id="Gomitas" src="img/gomita.png" alt="base Brownie" style="display: none;">
                <img class="first-capa" id="chispitas" src="img/chispitas.png" alt="base Brownie" style="display: none;">
            </div>

            <div class="box-container">

                <div class="chkstyle">
                    <input type="checkbox" name="Ingrediente[]" id="checkChocolate" value="Chocolate" onchange="javascript:mostrarcombo()" />
                    <label class="labelchk">Chocolate</label>
                </div>

                <div class="chkstyle">
                    <input type="checkbox" name="Ingrediente[]" id="checkMashmellow" value="Mashmellow" onchange="javascript:mostrarcombo()" />
                    <label class="labelchk">Mashmellow</label>
                </div>

                <div class="chkstyle">
                    <input type="checkbox" name="Ingrediente[]" id="checkChispitas" value="Chispitas" onchange="javascript:mostrarcombo()" />
                    <label class="labelchk" style="margin-right: 1.4rem;">Chispitas</label>
                </div>

                <div class="chkstyle">
                    <input type="checkbox" name="Ingrediente[]" id="checkchochips" value="Chispas de chocolate" onchange="javascript:mostrarcombo()" />
                    <label class="labelchk" style="margin-left: 0.9rem;">Chispas de chocolate</label>
                </div>

                <div class="chkstyle">
                    <input type="checkbox" name="Ingrediente[]" id="checkGrageas" value="Grageas" onchange="javascript:mostrarcombo()" />
                    <label class="labelchk" style="margin-right: 2rem;">Grageas</label>
                </div>

                <div class="chkstyle">
                    <input type="checkbox" name="Ingrediente[]" id="checkGomitas" value="Gomitas" onchange="javascript:mostrarcombo()" />
                    <label class="labelchk" style="margin-right: 3.5rem;">Gomitas</label><br>
                </div>
            </div>
            <h2>PRECIO PARCIAL (S/)</h2><br>
            <input type="number" id="fcontador" name="PreBrownie" readonly class="contbox" value="10"><br>
            <br><input type="submit" name="IngredienteBD" value="Siguiente" class="btn">
            <br><a href="/Vista/index.php" class="option-btn">Volver</a>
        </form>
    </div>


    <?php include('../Vista/includes/footer.php') ?>

    <script src="/Vista/js/script.js"></script>
    
</body>

</html>