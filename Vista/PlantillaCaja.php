<?php
session_start();
if(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla</title>
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="body-content">

    <?php include('../Vista/includes/header.php') ?>

    <div class="container">

        <form action="/Vista/Plantilla.php" method="post">
            <h3>Elige un diseño para tu caja</h3>
            <div class="wrapper">
                <!-- <div class="image" id="seleccionar">
                    <p class="text">No haz elegido una plantilla</p>
                </div> -->
                <div class="image" id="plantilla1">
                    <img src="img/Plantillas/Plantilla1.png" alt="">
                </div>
                <div class="image" id="plantilla2">
                    <img src="img/Plantillas/Plantilla13.png" alt="">
                </div>
                <div class="image" id="plantilla3">
                    <img src="img/Plantillas/Plantilla3.png" alt="">
                </div>
                <div class="image" id="plantilla4">
                    <img src="img/Plantillas/Plantilla4.png" alt="">
                </div>
                <div class="image" id="plantilla5">
                    <img src="img/Plantillas/Plantilla5.png" alt="">
                </div>
                <div class="image" id="plantilla6">
                    <img src="img/Plantillas/Plantilla6.png" alt="">
                </div>
                <div class="image" id="plantilla7">
                    <img src="img/Plantillas/Plantilla7.png" alt="">
                </div>
                <div class="image" id="plantilla8">
                    <img src="img/Plantillas/Plantilla8.png" alt="">
                </div>
                <div class="image" id="plantilla9">
                    <img src="img/Plantillas/Plantilla10.png" alt="">
                </div>
                <div class="image" id="plantilla10">
                    <img src="img/Plantillas/Plantilla11.png" alt="">
                </div>
                <div class="image" id="plantilla11">
                    <img src="img/Plantillas/plantilla-cuadrada.png" alt="">
                </div>
                <div class="image" id="plantilla12">
                    <img src="img/Plantillas/Plantilla_flores.png" alt="">
                </div>
                <div class="image" id="plantilla13">
                    <img src="img/Plantillas/san-valentin.png" alt="">
                </div>
                <div class="image" id="plantilla14">
                    <img src="img/Plantillas/plantilla_navidad.png" alt="">
                </div>

                <div class="frase" id="contenido"></div>
            </div>

            <!--Funcion name de la Plantilla elegida-->
            <script>
            function Plantilla(){
                let Npla = document.getElementById('name');
                let lenguaje = Npla.value;
                if(lenguaje == 'Selecciona tu diseño'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla1'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla2'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla3'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla4'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla5'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla6'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla7'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla8'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla9'){
                    document.getElementById('entrada').disabled = true;
                }
                if(lenguaje == 'plantilla10'){
                    document.getElementById('entrada').disabled = false;
                }
                if(lenguaje == 'plantilla11'){
                    document.getElementById('entrada').disabled = false;
                }
                if(lenguaje == 'plantilla12'){
                    document.getElementById('entrada').disabled = false;
                }
                if(lenguaje == 'plantilla13'){
                    document.getElementById('entrada').disabled = false;
                }
                if(lenguaje == 'plantilla14'){
                    document.getElementById('entrada').disabled = false;
                }
            }
            </script>

            <!--COMBOBOX PLANTILLAS-->
            <select id="name" name="Diseño" style="width: 90%;" onchange="Plantilla();">
                <!-- <option value="seleccionar">Selecciona tu diseño</option> -->
                <option value="plantilla1">Casualidad amosora</option>
                <option value="plantilla2">Hermosa del mundo</option>
                <option value="plantilla3">Te quiero (Cohete)</option>
                <option value="plantilla4">Te quiero (Panda)</option>
                <option value="plantilla5">Fecha Especial (Pinguinos)</option>
                <option value="plantilla6">Te Amo</option>
                <option value="plantilla7">Feliz Cumpleaños</option>
                <option value="plantilla8">Feliz Aniversario</option>
                <option value="plantilla9">Ser Querido Favorito</option>
                <option value="plantilla10">Marco para Ocasión</option>
                <option value="plantilla11">Marco de Tartas</option>
                <option value="plantilla12">Marco de Rosas</option>
                <option value="plantilla13">Marco de San Valentin</option>
                <option value="plantilla14">Marco de Navidad</option>
            </select>

            <div class="mensaje">
                <label for="fnom">Escribe un mensaje: (Sólo diseño con marco)</label>
                <textarea id="entrada" name="frase" onkeyup="escribir2()" class="box" placeholder="Ejemplo: Feliz cumpleaños!" requireD></textarea>
            </div>
            <h2>Precio del Diseño</h2>
            <div>
                <input type="text" id="Pdiseño" name="PreDiseño" value="S/5.00" disabled="disabled" class="box"></textarea>
            </div>
            <input type="submit" name="registrar" value="Siguiente" class="btn">
            <br><a href="/Vista/Personalizado.php" class="option-btn">Volver</a>
        </form>
    </div>


    <?php include('../Vista/includes/footer.php') ?>

    <script src="js/script.js"></script>

    <!-- elegir opciones de plantilla -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").on('change', function() {
                $(".image").hide();
                $("#" + $(this).val()).fadeIn(700);
            }).change();
        })
    </script>

    <!-- Escribir frase -->
    <script>
        function escribir2() {
            valor = document.getElementById('entrada').value;
            document.getElementById('contenido').innerHTML = ' ' + valor;
        }
    </script>

</body>

</html>