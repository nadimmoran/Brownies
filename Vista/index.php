<?php
session_start();
if(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}else{
    unset($_SESSION['dataU']);
}
//MOSTRAR CATALOGO
include('conexion.php');
  $listar="CALL pa_listar_producto()";
  $res=mysqli_query($conn,$listar);
  $data=mysqli_fetch_all($res,MYSQLI_ASSOC);
  $_SESSION['data']= $data;
  mysqli_free_result($res);
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delisweetchocolate - Inicio</title>   
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--ESTILOS-->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-1">
            <div class="flex">
                <div class="share">
                    <a href="https://facebook.com/Delisweetchocolate" target="_blank" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/delisweetchocolate" target="_blank" class="fab fa-instagram"></a>
                    <a href="https://api.whatsapp.com/send?phone=51972591578&text=Hola%21%20Comunicate%20con%20nosotros%20para%20mas%20informaci%C3%B3n." target="_blank" class="fab fa-whatsapp"></a>
                </div><?php
                echo $cs = (isset($sesion)) ? "<p><a href='login.php'>Cerrar Sesion</a>": "";?>
            </div>
        </div>

        <div class="header-2">
            <div class="flex">
                <div class="logo">
                    <a href="\Vista\Index.php"><img src="img/logo.png"></a>
                </div>
            <!--BURGER NAVBAR INICIO-->
            <script>
                $(document).ready(function() {
                $('a[href^="#"]').click(function() {
                    var destino = $(this.hash); //this.hash lee el atributo href de este
                    $('html, body').animate({ scrollTop: destino.offset().top }, 700); //Llega a su destino con el tiempo deseado
                    return false;
                });
                });
            </script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <nav class="navbar">
                    <a href="\Vista\Index.php">Catálogo</a>
                    <a href="#footer">Nosotros</a>
                    <?php
                    if(isset($_SESSION['dataU'])){
                        $UsuarioADM = $_SESSION['dataU'];
                        $AdminR = $UsuarioADM[1];
                        if($AdminR == 1){
                           ?><a href="/Vista/Admin/IndexAdmin.php">Administración</a><?php
                        }
                    }?>
                    <a href="https://maps.google.com/maps?q=-12.1683381%2C-76.9500709&z=17&hl=es" target="_blank">Visitar Tienda</a>
                </nav>
                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    <div class="user">
                        <a href="<?php echo $cs = (isset($sesion)) ? "/Vista/Perfil.php": "/Vista/login.php"; ?>"><img src="/Vista/img/usuario.png"></a>
                    </div>                   
                </div>
            <!--BURGER NAVBAR FIN-->           
            </div>        
        </div>
    </header>
    
    <!-- Seccion Personalizar -->
    <section class="home">
        <div class="hero">
            <h3>Personaliza tu propio Brownie</h3>
            <p>Crea tu propio brownie. ¡Con los ingredientes que más te gusten, y no olvides
                escoger un plantilla con la dedicatoria que irá en la caja!
            </p>
            <a href="/Vista/Personalizado.php" class="white-btn">Personalizar</a>           
        </div>   
    </section>
    
    <!-- Seccion Catalogo -->
    <section class="catalogo">
        <h1 class="titulo" style="color: white;">Catálogo de Productos</h1>
        <div class="box-container">
            <?php
                foreach($_SESSION['data'] as $fila) { ?>
                    <div class="box">
                        <img class="imagen" src="<?php echo $fila['Image']; ?>" alt="">
                        <b><div class="nombre"><?php echo $fila['NombreProducto']; ?></b>
                        </div>
                        <b><div class="precio">S/.<?php echo $fila['PrecioUnitario']; ?>.00</div></b>
                        <a href="DescripcionP.php?idProducto=<?php echo $fila['idProducto']?>" class="option-btn" name="verP">Ver</a>
                    </div>
                <?php
                }
            ?>
        </div>
    </section>
    
    <?php include('../Vista/includes/footer.php') ?>
    
    <script src="js/script.js"></script>
    <!-- Boton flotante de whatsapp -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=51972591578&text=Hola%21%20Comunicate%20con%20nosotros%20para%20mas%20informaci%C3%B3n." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
</body>
</html>