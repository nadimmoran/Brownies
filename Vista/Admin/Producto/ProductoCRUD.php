<?php
session_start();
require 'C:\xampp\htdocs\Vista\Admin\AdminDB.php';

if(isset($_POST['EliminarProducto']))
{
    $ProductoID = mysqli_real_escape_string($conn, $_POST['EliminarProducto']);

    $consultaP = "CALL pa_delete_producto('$ProductoID');";
    $resultadoP = mysqli_query($conn, $consultaP);

    if($resultadoP)
    {
        $_SESSION['mensaje'] = "Producto eliminado";
        header("Location: IndexProducto.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al eliminar";
        header("Location: IndexProducto.php");
        exit(0);
    }
}

if(isset($_POST['actualizarP']))
{
    $ProductoID = mysqli_real_escape_string($conn, $_POST['Eid']);

    $producto = mysqli_real_escape_string($conn, $_POST['Eproducto']);
    $precio = mysqli_real_escape_string($conn, $_POST['Eprecio']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['Edescripcion']);
    $imagen = mysqli_real_escape_string($conn, $_POST['Eimagen']);

    $conA = "CALL pa_actualizar_producto('$ProductoID', '$producto', '$precio', '$descripcion', '$imagen');";
    $resA = mysqli_query($conn, $conA);

    if($resA)
    {
        $_SESSION['mensaje'] = "Producto actualizado";
        header("Location: IndexProducto.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al actualizar";
        header("Location: IndexProducto.php");
        exit(0);
    }

}


if(isset($_POST['AgregarP']))
{
    $producto = mysqli_real_escape_string($conn, $_POST['Aproducto']);
    $precio = mysqli_real_escape_string($conn, $_POST['Aprecio']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['Adescripcion']);
    $imagen = mysqli_real_escape_string($conn, $_POST['Aimagen']);

    $conG = "CALL pa_agregar_producto('$producto','$precio','$descripcion','$imagen');";
 
    $resG = mysqli_query($conn, $conG);
    if($resG)
    {
        $_SESSION['mensaje'] = "Producto guardado";
        header("Location: CrearProducto.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Error al guardar";
        header("Location: CrearProducto.php");
        exit(0);
    }
}

?>