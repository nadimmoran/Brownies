<?php
session_start();
require('conexion.php');
$PrecioBrownie=$_POST['PreBrownie'];
//SI NO SE MARCA NINGUN INGREDIENTE
if(empty($_POST['Ingrediente'])){
    echo "<script>
		alert('¡Debe elegir al menos un ingrediente!');
		window.location='Personalizado.php'
	</script>";
}

$checkBox = implode(', ', $_POST['Ingrediente']);
//SI SE MARCA ALGUN INGREDIENTE
if(isset($_POST['IngredienteBD']))
{       
    $query="insert into ingredientes(NombreIngrediente, PrecioIngrediente)VALUES('" . $checkBox . "', '$PrecioBrownie')";
    $resultado=mysqli_query($conn,$query);
    header('Location: PlantillaCaja.php');
}
?>