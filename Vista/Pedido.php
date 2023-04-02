<?php
session_start();
if(isset($_SESSION['dataU'])){
    $sesion=$_SESSION['dataU'];
}
include('conexion.php');
//MOSTRAR PEDIDO
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'BD_MAIOT'
  ) or die(mysqli_erro($mysqli));

  if($_POST['DetPro'] == 'DP'){
    $ListarPedido ="select nombre,apellido,NombreProducto,Subtotal, FechaEntrega from pedido
    inner join usuario on usuario.idUsuario=pedido.idUsuario
    inner join informacion_envio on informacion_envio.idEnvio=pedido.idEnvio
    inner join detalle_pedido on detalle_pedido.idPedido=pedido.idPedido
    inner join producto on producto.idProducto=detalle_pedido.idProducto
    where pedido.idPedido=(SELECT MAX(pedido.idPedido) FROM pedido);";
  }else{
    $ListarPedido ="select nombre,apellido,Estado,SubtotalPer, FechaEntrega from pedido
    inner join usuario on usuario.idUsuario=pedido.idUsuario
    inner join informacion_envio on informacion_envio.idEnvio=pedido.idEnvio
    inner join brownie_personalizado on brownie_personalizado.idPedido=pedido.idPedido
    where pedido.idPedido=(SELECT MAX(pedido.idPedido) FROM pedido);";
  }
  
  $ResPedido=mysqli_query($conn,$ListarPedido);
  $FilaPedido=mysqli_fetch_row($ResPedido);
  $_SESSION['dataLP'] = $FilaPedido;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="estilos/estilos.css">
</head>

<body class="body-content">
    <?php include('../Vista/includes/header.php') ?>
    <?php
    $Pedido = $_SESSION['dataLP'];
    if(is_array($Pedido))
    {
        ($_POST['DetPro'] == 'DP')?$Pedido[2]:$Pedido[2]='Brownie Personalizado';
        ?>
        <div class="form-Pedido">
            <form action="/Vista/Inicio.php" method="post">
                <h3>Pedido Generado</h3>
                <div>
                    <label for="NA">Nombre y Apellidos:</label>
                    <input type="text" id="NA" name="NA" value="<?php echo "$Pedido[0] $Pedido[1]"?>" disabled="disabled" required class="box">
                </div>
                <div>
                    <label for="P">Producto:</label>
                    <input type="text" id="P" name="P" value="<?php echo "$Pedido[2]"?>" disabled="disabled" required class="box">
                </div>
                <div>
                    <label for="T">Pago Total:</label>
                    <input type="text" id="T" name="T" value="<?php echo "S/$Pedido[3]0"?>" disabled="disabled" required class="box">
                </div>
                <div>
                    <p>La fecha de entrega será designada una vez se confirme el pago del pedido, se le comunicará a su número de celular.</p>
                </div>
                <h3>¡Gracias por elegirnos!</h3>
                <div>
                    <p>Su pedido ha sido generado, puede ver sus pedidos y su fecha de entrega desde el botón "Ver mis Pedidos". En su Perfil de usuario también se encuentra.</p>
                </div>
                <a href="/Vista/Estado.php" class="option-btn">Ver mis Pedidos</a>
                <div>
                    <p>Si desea visitarnos y conocer más de nuestros productos puede ir a nuestra tienda local.</p>
                    <p>Horario: Desde las 07:00am hasta las 10:00pm</p>
                    <p>Direccion: Av. El Sol 2-196, Villa María del Tiunfo</p>
                    <p>Referencia: Altura de la estación Villa María, cerca del colegio Santa María.</p><br>
                </div>
                <input type="submit" name="Inicio" value="Volver al Inicio" class="btn">
                <a href="https://maps.google.com/maps?q=-12.1683381%2C-76.9500709&z=17&hl=es" target="_blank" class="option-btn" name="verP">Tienda Local</a>
            </form>
        </div>
        <?php include('../Vista/includes/footer.php') ?>
        <?php
    }else
    {
        echo "<h4>Error</h4>";
    }
    ?>
</body>
</html>