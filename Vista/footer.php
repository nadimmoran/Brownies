<!-- Footer -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <div class="logo">
                <a href="/Vista/index.php"><img src="img/logo.png"></a>
            </div>
            <p>
                Misión
                “Deseamos en todo momento brindar a nuestros clientes los mejores brownies
                artesanales que cumplan con los estándares de óptima calidad.”.
            </p>
        </div>
        <div class="box">
            <p><a href="/Vista/index.php">INICIO</a></p>
            <?php
                if(isset($_SESSION['dataU'])){
                $UsuarioADM = $_SESSION['dataU'];
                $AdminR = $UsuarioADM[1];
                if($AdminR == 1){
                   ?><p><a href="/Vista/Admin/IndexAdmin.php">ADMINISTRACIÓN</a></p><?php
                }
            }?>
            <p><a href="https://maps.google.com/maps?q=-12.1683381%2C-76.9500709&z=17&hl=es" target="_blank">TIENDA LOCAL</a></p>
        </div>
        <div class="box">
            <h2>Redes sociales</h2>
            <a href="https://facebook.com/Delisweetchocolate" target="_blank"><i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="https://www.instagram.com/delisweetchocolate" target="_blank"><i class="fab fa-instagram"></i> Instagram </a>
            <a href="https://api.whatsapp.com/send?phone=51972591578&text=Hola%21%20Comunicate%20con%20nosotros%20para%20mas%20informaci%C3%B3n." target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp </a>
        </div>
    </div>
</section>
<p class="credit"> &copy; <b>Delisweetchocolate</b> - 2022 Todos los Derechos Reservados</p>