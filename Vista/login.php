<?php
session_start();
if(isset($_SESSION['dataU'])){
    unset($_SESSION['dataU']);
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body>

    <div class="form-container">

        <form action="InicioSesion.php" method="post">
            <img src="img/logo.png" alt=""></a>
            <h3>Inicio de Sesión</h3>

            <div>
                <label for="fcorreo">Correo</label>
                <input type="email" id="fcorreo" name="fcorreo" required class="box">
            </div>
            <div>
                <label for="fcontraseña">Contraseña</label>
                <input type="password" id="fcontraseña" name="fcontraseña" required class="box">
            </div>
            <div><br>
                <div class="forgotpass chkespacio"><input type="checkbox" name="frecuerda"><label for="frecuerda">&nbsp;Recuérdame</label></div>
                <a href="Correo.html" class="forgotpass passderecho">¿Olvidaste tu contraseña?</a>
            </div><br>

            <input type="submit" name="logear" value="Iniciar Sesión" class="btn"><br>
            <a href="registrarse.html" class="btn btncolor">&nbsp;Registrarse&nbsp;</a><br>
        </form>
    </div>
</body>

</html>