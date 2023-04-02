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
                <a href="/Vista/index.php"><img src="/Vista/img/logo.png"></a>
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
