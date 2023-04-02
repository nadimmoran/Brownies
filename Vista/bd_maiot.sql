-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2022 a las 21:25:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_maiot`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_actualizar_producto` (IN `idProducto1` INT, IN `NombreProducto1` VARCHAR(100), IN `PrecioUnitario1` FLOAT, IN `Descripcion1` VARCHAR(50), IN `Image1` TEXT)   begin
  update Producto set NombreProducto=NombreProducto1,PrecioUnitario=PrecioUnitario1,Descripcion=Descripcion1,Image=Image1 where idProducto=idProducto1;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_actualizar_Usuario` (IN `idUsuario1` INT, IN `idRol1` INT, IN `nombre1` VARCHAR(30), IN `apellido1` VARCHAR(30), IN `Contraseña1` VARCHAR(15), IN `dni1` INT, IN `correo1` VARCHAR(30))   begin
  update Usuario set idRol=idRol1,nombre=nombre1,apellido=apellido1,Contraseña=Contraseña1,dni=dni1,correo=correo1 where idUsuario=idUsuario1;
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_actualizar_Usuario_contraseña` (IN `idUsuario1` INT, IN `contraseña1` VARCHAR(15))   begin
  update usuario set Contraseña=contraseña1 where idUsuario=idUsuario1;
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_agregar_Informacion_Envio` (IN `CostoEnvio1` FLOAT, IN `DireccionEnvio1` VARCHAR(100), IN `CodigoPostal1` INT, IN `Referencia1` VARCHAR(100))   begin
   insert into informacion_envio(DireccionEnvio,CodigoPostal,Referencia)values(DireccionEnvio1,CodigoPostal1,Referencia1);
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_agregar_producto` (IN `nombreProducto1` VARCHAR(100), IN `PrecioUnitario1` FLOAT, IN `Descripcion1` VARCHAR(50), IN `Image1` TEXT)   begin
   insert into producto(NombreProducto,PrecioUnitario,Descripcion,Image)values(NombreProducto1,PrecioUnitario1,Descripcion1,Image1);
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_agregar_Usuario` (IN `idRol1` INT, IN `nombre1` VARCHAR(30), IN `apellido1` VARCHAR(30), IN `Contraseña1` VARCHAR(15), IN `dni1` INT, IN `correo1` VARCHAR(30))   begin
   insert into Usuario(idRol,nombre,apellido,Contraseña,dni,correo)values(idRol1,nombre1,apellido1,Contraseña1,dni1,correo1);
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_delete_producto` (IN `idProducto1` INT)   begin
  delete from producto where idProducto=idProducto1;
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_delete_Usuario` (IN `idUsuario1` INT)   begin
  delete from usuario where idUsuario=idUsuario1;
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_dni_correo` (IN `dni1` INT, IN `correo1` VARCHAR(30))   begin
   SELECT * FROM usuario WHERE dni=dni1 and correo=correo1;
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_pedido_orden` ()   BEGIN
    select pedido.idPedido, nombre,apellido,dni,NombreProducto, producto.PrecioUnitario,DireccionEnvio,
    CodigoPostal, Referencia,FechaCreacion,FechaEntrega,Estado,Cantidad,Subtotal from pedido
    inner join usuario on usuario.idUsuario=pedido.idUsuario
    inner join informacion_envio on informacion_envio.idEnvio=pedido.idEnvio
    inner join detalle_pedido on detalle_pedido.idPedido=pedido.idPedido
    inner join producto on producto.idProducto=detalle_pedido.idProducto;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_pedido_personalizado` ()   BEGIN
select p.idPedido, nombre,apellido,dni,NombreIngrediente, NombrePlantilla, Mensaje,
CantidadPersonalizado,SubtotalPer, DireccionEnvio, CodigoPostal, Referencia,
FechaCreacion,FechaEntrega,Estado from pedido p 
inner join usuario u on u.idUsuario=p.idUsuario
inner join informacion_envio e on e.idEnvio=p.idEnvio
inner join brownie_personalizado b on b.idPedido=p.idPedido
inner join ingredientes i on b.idIngrediente=i.idIngrediente
inner join caja c on b.idCaja=c.idCaja;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_producto` ()   BEGIN
   select *from producto;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_Producto_id` (IN `idProducto1` INT)   begin
   SELECT * FROM producto WHERE idProducto=idProducto1;
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_usuario` ()   BEGIN
select usuario.idUsuario,rol.nombreRol,usuario.nombre,usuario.apellido,usuario.Contraseña,usuario.dni,usuario.correo,usuario.FechaRegistro from usuario  inner join rol  on usuario.idRol=rol.idRol;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_Usuario_id` (IN `idUsuario1` INT)   begin
   SELECT * FROM usuario WHERE idUsuario=idUsuario1;
   end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `splogin` (IN `correo1` VARCHAR(30), IN `contraseña1` VARCHAR(15))   BEGIN
SELECT * FROM usuario where correo=correo1 and contraseña=contraseña1;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brownie_personalizado`
--

CREATE TABLE `brownie_personalizado` (
  `idBrownieP` int(11) NOT NULL,
  `idIngrediente` int(11) DEFAULT NULL,
  `idCaja` int(11) DEFAULT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `PrecioPersonalizado` float NOT NULL,
  `CantidadPersonalizado` int(11) NOT NULL,
  `ImportePersonalizado` float NOT NULL,
  `Envio` int(11) NOT NULL,
  `SubTotalPer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brownie_personalizado`
--

INSERT INTO `brownie_personalizado` (`idBrownieP`, `idIngrediente`, `idCaja`, `idPedido`, `PrecioPersonalizado`, `CantidadPersonalizado`, `ImportePersonalizado`, `Envio`, `SubTotalPer`) VALUES
(0, 1, 1, NULL, 0, 0, 0, 0, 0),
(2, 14, 23, NULL, 0, 0, 0, 0, 0),
(3, 23, 15, 29, 30, 10, 300, 5, 380),
(4, 24, 16, 30, 25, 0, 125, 5, 130),
(5, 24, 16, 31, 25, 0, 125, 5, 130),
(6, 24, 16, 32, 25, 0, 125, 5, 130),
(7, 24, 16, 33, 25, 5, 125, 5, 130),
(8, 24, 16, 34, 25, 5, 125, 5, 130),
(9, 24, 16, 35, 25, 5, 125, 5, 130),
(10, 24, 16, 36, 25, 5, 125, 5, 130),
(11, 24, 16, 37, 25, 5, 125, 5, 130),
(12, 24, 16, 38, 25, 5, 125, 5, 130),
(13, 25, 17, 39, 24, 10, 240, 5, 245),
(14, 19, 27, 40, 19, 3, 57, 5, 62),
(15, 20, 28, 43, 20, 10, 200, 5, 205),
(16, 21, 29, 45, 24, 10, 240, 5, 245),
(17, 21, 29, 47, 24, 10, 240, 5, 245),
(18, 23, 31, 54, 17, 8, 136, 5, 141),
(19, 23, 31, 55, 17, 8, 136, 5, 141),
(20, 24, 32, 59, 20, 1, 20, 5, 25),
(21, 25, 33, 60, 17, 10, 170, 5, 175),
(22, 26, 34, 61, 33, 10, 330, 5, 335);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idCaja` int(11) NOT NULL,
  `NombrePlantilla` varchar(30) NOT NULL,
  `Mensaje` varchar(100) DEFAULT NULL,
  `PrecioPlantilla` int(11) NOT NULL,
  `ImagenPlantilla` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idCaja`, `NombrePlantilla`, `Mensaje`, `PrecioPlantilla`, `ImagenPlantilla`) VALUES
(1, 'img\\1brownie.jpg', '', 0, ''),
(2, 'img\\2brownie.jpg', '', 0, ''),
(3, 'img\\3brownie.jpg', '', 0, ''),
(4, 'plantilla1', '', 0, 'imgPlantillasPlantilla1.png'),
(5, 'plantilla1', '', 0, 'imgPlantillasPlantilla1.png'),
(6, 'plantilla1', '', 0, 'imgPlantillasPlantilla1.png'),
(7, 'plantilla9', '', 0, 'imgPlantillasPlantilla9.png'),
(8, 'plantilla4', '', 0, 'imgPlantillasPlantilla4.png'),
(9, 'plantilla2', '', 0, 'imgPlantillasPlantilla2.png'),
(10, 'plantilla', 'null', 0, 'imgPlantillasPlantilla1'),
(11, 'Casualidad amosora', NULL, 0, 'imgPlantillasPlantilla1.png'),
(12, 'Te quiero (Cohete)', NULL, 0, 'imgPlantillasPlantilla3.png'),
(13, 'Fecha Especial (Pinguinos)', NULL, 0, 'imgPlantillasPlantilla5.png'),
(14, 'Te Amo', NULL, 0, 'imgPlantillasPlantilla6.png'),
(15, 'Feliz Aniversario', NULL, 0, 'imgPlantillasPlantilla8.png'),
(16, 'Ser Querido Favorito', NULL, 0, 'imgPlantillasPlantilla10.png'),
(17, 'Casualidad amosora', 'Para mi', 0, 'imgPlantillasplantilla-cuadrada.png'),
(18, 'Hermosa del mundo', NULL, 0, 'imgPlantillasPlantilla13.png'),
(19, 'Marco de San Valentin', 'Para mi', 0, 'imgPlantillassan-valentin.png'),
(20, 'Casualidad amosora', NULL, 0, 'imgPlantillasPlantilla1.png'),
(21, 'Casualidad amosora', NULL, 0, 'imgPlantillasPlantilla1.png'),
(22, 'Marco de Tartas', 'Prueba de que salio bien', 5, 'imgPlantillasplantilla-cuadrada.png'),
(23, 'Marco para Ocasión', 'jfnniddddd', 5, 'imgPlantillasPlantilla11.png'),
(24, 'Feliz Aniversario', NULL, 5, 'imgPlantillasPlantilla8.png'),
(25, 'Marco de Tartas', 'Mensaje de prueba', 5, 'imgPlantillasplantilla-cuadrada.png'),
(26, 'Marco de Tartas', 'test', 5, 'imgPlantillasplantilla-cuadrada.png'),
(27, 'Marco de Tartas', 'Prueba de q salio bien', 5, 'imgPlantillasplantilla-cuadrada.png'),
(28, 'Marco de Rosas', 'xd', 5, 'imgPlantillasPlantilla_flores.png'),
(29, 'Marco de Tartas', 'prueba', 5, 'imgPlantillasplantilla-cuadrada.png'),
(30, 'Marco de Tartas', 'yigvvbi', 5, 'imgPlantillasplantilla-cuadrada.png'),
(31, 'Casualidad amosora', NULL, 5, 'imgPlantillasPlantilla1.png'),
(32, 'Casualidad amosora', NULL, 5, 'imgPlantillasPlantilla1.png'),
(33, 'Marco de Navidad', 'Ultima fila', 5, 'imgPlantillasplantilla_navidad.png'),
(34, 'Marco de San Valentin', 'PRUEBA FINAL', 5, 'imgPlantillassan-valentin.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `idDetallePedido` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `PrecioUnitario` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` float NOT NULL,
  `PrecioEnvio` float NOT NULL DEFAULT 0,
  `SubTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`idDetallePedido`, `idPedido`, `idProducto`, `PrecioUnitario`, `Cantidad`, `Importe`, `PrecioEnvio`, `SubTotal`) VALUES
(1, 0, 3, 5, 4, 20, 5, 25),
(2, 0, 3, 0, 5, 25, 5, 34.5),
(3, 0, 3, 5, 8, 40, 5, 52.2),
(4, 0, 3, 5, 5, 25, 5, 34.5),
(5, 0, 3, 5, 5, 25, 5, 34.5),
(6, 0, 3, 5, 5, 25, 5, 34.5),
(7, 0, 3, 5, 5, 25, 5, 34.5),
(8, 0, 3, 5, 5, 25, 5, 34.5),
(9, 0, 3, 5, 5, 25, 5, 34.5),
(10, 0, 3, 5, 5, 25, 5, 34.5),
(11, 0, 3, 5, 5, 25, 5, 34.5),
(12, 0, 3, 5, 5, 25, 5, 34.5),
(13, 4, 4, 6, 8, 48, 5, 61.64),
(14, 6, 4, 6, 10, 60, 5, 75.8),
(15, 7, 6, 7, 7, 49, 5, 62.82),
(16, 8, 6, 7, 7, 49, 5, 62.82),
(17, 9, 4, 6, 5, 30, 5, 40.4),
(18, 10, 3, 5, 5, 25, 5, 34.5),
(19, 11, 3, 5, 5, 25, 5, 34.5),
(20, 12, 4, 6, 5, 30, 5, 40.4),
(21, 13, 4, 6, 5, 30, 5, 40.4),
(22, 14, 4, 6, 5, 30, 5, 40.4),
(23, 15, 4, 6, 5, 30, 5, 40.4),
(24, 16, 4, 6, 8, 48, 5, 61.64),
(25, 17, 4, 6, 8, 48, 5, 61.64),
(26, 18, 4, 6, 9, 54, 5, 68.72),
(27, 19, 4, 6, 5, 30, 5, 0),
(28, 20, 4, 6, 5, 30, 5, 40.4),
(29, 21, 8, 8, 2, 16, 5, 23.88),
(30, 22, 5, 4, 7, 28, 5, 38.04),
(31, 23, 6, 7, 5, 35, 5, 46.3),
(32, 24, 3, 5, 0, 25, 5, 34.5),
(33, 25, 3, 5, 0, 25, 5, 34.5),
(34, 26, 3, 5, 0, 25, 5, 34.5),
(35, 27, 6, 7, 0, 35, 5, 46.3),
(36, 28, 3, 5, 0, 25, 5, 34.5),
(37, 29, 3, 5, 0, 25, 5, 34.5),
(38, 41, 3, 5, 0, 25, 5, 34.5),
(39, 42, 3, 5, 0, 25, 5, 34.5),
(40, 44, 3, 5, 0, 25, 5, 34.5),
(41, 46, 4, 6, 0, 30, 5, 40.4),
(42, 48, 4, 6, 0, 30, 5, 40.4),
(43, 49, 4, 6, 0, 30, 5, 40.4),
(44, 50, 4, 6, 0, 30, 5, 40.4),
(45, 51, 4, 6, 0, 30, 5, 40.4),
(46, 52, 4, 6, 0, 30, 5, 40.4),
(47, 53, 4, 6, 0, 30, 5, 40.4),
(48, 56, 3, 5, 0, 25, 5, 34.5),
(49, 57, 3, 5, 0, 25, 5, 34.5),
(50, 58, 3, 5, 0, 25, 5, 34.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_envio`
--

CREATE TABLE `informacion_envio` (
  `idEnvio` int(11) NOT NULL,
  `DireccionEnvio` varchar(100) DEFAULT NULL,
  `CodigoPostal` int(11) DEFAULT NULL,
  `Referencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informacion_envio`
--

INSERT INTO `informacion_envio` (`idEnvio`, `DireccionEnvio`, `CodigoPostal`, `Referencia`) VALUES
(1, 'SJM', 10258, 'lima'),
(2, 'sjm', 123, 'lima'),
(3, 'Asoc. Marianos Santos Mz A Lt 11', 15058, 'Lima'),
(4, 'Asoc. Marianos Santos Mz A Lt 11', 15058, 'Lima'),
(5, 'Asoc. Marianos Santos Mz A Lt 11', 15058, 'Lima'),
(6, 'Asoc. Marianos Santos Mz A Lt 11', 15058, 'Lima'),
(7, 'Asoc. Marianos Santos Mz A Lt 11', 15058, 'Lima'),
(8, 'Asoc. Marianos Santos Mz A Lt 11', 15058, 'LimaPeru'),
(9, 'Lima', 123124, 'sjm'),
(10, 'SJM', 12345, 'Lima'),
(11, 'SJL', 12345, 'Metro'),
(12, 'Asoc. Marianos Santos Mz A Lt 11', 32156, 'sjm'),
(13, 'Lima', 12345, 'sjm'),
(14, 'Av. San Juan', 150632, 'Sise'),
(15, 'Lima', 12345, 'Metro'),
(16, 'SJM', 12345, 'Sise'),
(17, 'SJL', 654321, 'Metro'),
(18, 'Lima', 10528, 'Metro'),
(19, 'Av. San Juan', 150247, 'Parque'),
(20, 'Av. San Juan', 150247, 'Parque'),
(21, 'Av. San Juan', 12345, 'Metro'),
(22, 'Lima', 12345, 'Parque'),
(23, 'Av. San Juan', 12345, 'Metro'),
(24, 'Av. San Juan', 12345, 'Parque'),
(25, 'Av. San Juan', 14789, 'Sise'),
(26, 'Lima', 12354, 'sjm'),
(27, 'Av. San Juan', 12345, 'Parque'),
(28, 'Lima', 12345, 'Sise'),
(29, 'Lima', 12345, 'Sise'),
(30, 'Av. San Juan', 12345, 'Parque'),
(31, 'Av. San Juan', 1351, 'LimaPeru'),
(32, 'Lima', 21325, 'sjm'),
(33, 'Av. San Juan', 12345, 'parque zonal'),
(34, 'Av. San Juan', 12345, 'Metro'),
(35, 'Av. San Juan', 123546, 'Mall'),
(36, 'Av. San Juan', 12354, 'Estacion'),
(37, 'Av. San Juan', 123, 'parque zonal'),
(38, 'Av. San Juan', 123, 'parque zonal'),
(39, 'Av. San Juan', 123, 'Metro'),
(40, 'Av. San Juan', 123, 'Metro'),
(41, 'Av. San Juan', 12, 'Metro'),
(42, 'Av. San Juan', 123, 'Metro'),
(43, 'Miraflores', 123, 'parque'),
(44, 'Miraflores', 123, 'parque'),
(45, 'sjm', 123, 'ct'),
(46, 'Surco', 123, 'sise'),
(47, 'Av. San Juan', 123, 'Parque'),
(48, 'SJM', 14, 'LimaPeru'),
(49, 'Av. San Juan', 12, 'Mall'),
(50, 'Lima', 15, 'Lima'),
(51, 'Av. San Juan', 123, 'sise'),
(52, 'Lima', 12, 'Lima'),
(53, 'Miraflores', 12, 'Estacion'),
(54, 'Lima', 123, 'Lima'),
(55, 'Av. San Juan', 15, 'Lima'),
(56, 'SJM', 513, 'Parque'),
(57, 'Asoc. Marianos Santos Mz A Lt 11', 12, 'Lima'),
(58, 'Lima', 12, 'sjm'),
(59, 'Lima', 132, 'Metro'),
(60, 'Miraflores', 12, 'sise'),
(61, 'Miraflores', 123, 'Metro'),
(62, 'Av. San Juan', 546, 'Lima'),
(63, 'Lima', 351, 'Lima'),
(64, 'Lima', 546, 'LimaPeru'),
(65, 'Av. San Juan', 468, 'Metro'),
(66, 'Chorrilos', 150258, 'Alipio'),
(67, 'Bayovar', 98765, 'Campo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `idIngrediente` int(11) NOT NULL,
  `NombreIngrediente` varchar(100) NOT NULL,
  `PrecioIngrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`idIngrediente`, `NombreIngrediente`, `PrecioIngrediente`) VALUES
(1, 'on,on', 0),
(2, 'chocolate', 0),
(3, 'chocolate,Mashmellow,Chispas de chocolate', 0),
(4, 'Chispitas, Grageas, Gomitas', 0),
(5, 'Gomitas', 0),
(6, 'Mashmellow, Grageas', 0),
(7, 'Mashmellow, Gomitas', 0),
(8, 'Gomitas', 0),
(9, 'Gomitas', 0),
(10, 'Chocolate, Chispitas', 0),
(11, 'Chocolate, Chispitas', 0),
(12, 'Gomitas', 0),
(13, 'Chocolate, Chispitas', 17),
(14, 'Chocolate, Mashmellow, Chispitas, Chispas de chocolate, Grageas, Gomitas', 28),
(15, 'Gomitas', 12),
(16, 'Chocolate, Grageas, Gomitas', 20),
(17, 'Chocolate, Mashmellow', 19),
(18, 'Chocolate', 15),
(19, 'Mashmellow', 14),
(20, 'Chocolate', 15),
(21, 'Chocolate, Chispitas, Chispas de chocolate', 19),
(22, 'Chispas de chocolate, Gomitas', 14),
(23, 'Gomitas', 12),
(24, 'Chocolate', 15),
(25, 'Gomitas', 12),
(26, 'Chocolate, Mashmellow, Chispitas, Chispas de chocolate, Grageas, Gomitas', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaEntrega` date DEFAULT NULL,
  `idEnvio` int(11) DEFAULT NULL,
  `Total` float NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `FechaCreacion`, `FechaEntrega`, `idEnvio`, `Total`, `idUsuario`, `Estado`) VALUES
(1, '2022-06-04 06:02:22', '0000-00-00', 3, 10, 1, 'Pendiente'),
(2, '2022-06-04 06:04:02', '2022-06-04', 3, 10, 8, 'Pendiente'),
(3, '2022-06-04 06:31:36', '0000-00-00', 7, 100, 10, 'Pendiente'),
(4, '2022-06-04 06:39:34', '0000-00-00', 8, 100, 10, 'pago'),
(5, '2022-06-04 07:00:17', '2022-06-24', 8, 100, 10, 'Pendiente'),
(6, '2022-06-04 07:02:20', '2022-06-06', 9, 100, 10, 'pago'),
(7, '2022-06-04 07:26:54', '2022-06-06', 10, 62.82, 10, 'Pendiente'),
(10, '2022-06-05 00:15:22', '2022-06-06', 13, 34.5, 10, 'Pendiente'),
(11, '2022-06-06 02:55:59', '2022-06-07', 14, 34.5, 10, 'Pendiente'),
(12, '2022-06-06 03:15:45', '2022-06-07', 15, 40.4, 10, 'Pendiente'),
(13, '2022-06-06 03:18:20', '2022-06-07', 16, 40.4, 10, 'Pendiente'),
(14, '2022-06-06 03:34:37', '2022-06-07', 17, 40.4, 10, 'Pendiente'),
(15, '2022-06-07 02:12:57', '2022-06-08', 18, 40.4, 10, 'Pendiente'),
(16, '2022-06-07 22:21:47', '2022-06-09', 19, 61.64, 10, 'Pendiente'),
(17, '2022-06-07 22:22:52', '2022-06-09', 20, 61.64, 10, 'Pendiente'),
(18, '2022-06-07 22:41:59', '2022-06-09', 21, 68.72, 10, 'Pendiente'),
(19, '2022-06-07 23:28:17', '2022-06-09', 22, 0, 10, 'Pendiente'),
(20, '2022-06-07 23:31:30', '2022-06-09', 23, 40.4, 10, 'Pendiente'),
(21, '2022-06-07 23:35:10', '2022-06-09', 24, 23.88, 10, 'Pendiente'),
(22, '2022-06-07 23:49:47', '2022-06-09', 25, 38.04, 10, 'Pendiente'),
(23, '2022-06-08 00:17:45', '2022-06-09', 26, 46.3, 10, 'Pendiente'),
(24, '2022-06-08 01:32:57', '2022-06-09', 27, 34.5, 10, 'Pendiente'),
(25, '2022-06-08 02:35:29', '2022-06-09', 28, 34.5, 10, 'Pendiente'),
(26, '2022-06-08 02:35:32', '2022-06-09', 29, 34.5, 10, 'Pendiente'),
(27, '2022-06-08 07:02:50', '2022-06-10', 30, 46.3, 10, 'Pendiente'),
(28, '2022-06-09 22:13:26', '2022-06-11', 31, 34.5, 10, 'Pendiente'),
(30, '2022-06-10 01:04:24', '2022-06-11', 33, 0, 10, 'Pago'),
(32, '2022-06-10 01:10:31', '2022-06-11', 35, 0, 10, 'Pendiente'),
(33, '2022-06-10 01:12:01', '2022-06-11', 36, 0, 10, 'Pendiente'),
(34, '2022-06-10 01:12:51', '2022-06-11', 37, 0, 10, 'Pendiente'),
(35, '2022-06-10 01:14:10', '2022-06-11', 38, 0, 10, 'Pendiente'),
(36, '2022-06-10 01:14:22', '2022-06-11', 39, 0, 10, 'Pendiente'),
(37, '2022-06-10 01:15:35', '2022-06-11', 40, 0, 10, 'Pendiente'),
(38, '2022-06-10 01:15:44', '2022-06-11', 41, 152.5, 10, 'Pendiente'),
(39, '2022-06-10 01:17:11', '2022-06-11', 42, 288.2, 10, 'Pendiente'),
(40, '2022-06-10 01:31:33', '2022-06-11', 46, 72.26, 10, 'Pendiente'),
(41, '2022-06-10 01:55:21', '2022-06-11', 47, 34.5, 10, 'Pendiente'),
(42, '2022-06-10 02:07:21', '2022-06-11', 48, 34.5, 10, 'Pendiente'),
(43, '2022-06-10 02:07:34', '2022-06-11', 49, 241, 10, 'Pendiente'),
(44, '2022-06-10 02:09:45', '2022-06-11', 50, 34.5, 10, 'Pendiente'),
(45, '2022-06-10 02:22:12', '2022-06-11', 51, 288.2, 10, 'Pendiente'),
(46, '2022-06-10 02:23:02', '2022-06-11', 52, 40.4, 10, 'Pendiente'),
(47, '2022-06-10 02:46:05', '2022-06-11', 53, 288.2, 10, 'Pendiente'),
(48, '2022-06-10 04:17:26', '2022-06-11', 54, 40.4, 10, 'Pendiente'),
(49, '2022-06-10 04:28:51', '2022-06-11', 55, 40.4, 10, 'Pendiente'),
(50, '2022-06-10 04:29:15', '2022-06-11', 56, 40.4, 10, 'Pendiente'),
(51, '2022-06-10 04:41:06', '2022-06-11', 57, 40.4, 10, 'Pendiente'),
(52, '2022-06-10 04:44:30', '2022-06-11', 58, 40.4, 10, 'Pendiente'),
(53, '2022-06-10 04:48:19', '2022-06-11', 59, 40.4, 10, 'Pendiente'),
(54, '2022-06-10 04:51:23', '2022-06-11', 60, 165.48, 10, 'Pendiente'),
(55, '2022-06-10 04:51:58', '2022-06-11', 61, 165.48, 10, 'Pendiente'),
(56, '2022-06-10 05:37:10', '2022-06-12', 62, 34.5, 10, 'Pendiente'),
(57, '2022-06-10 05:46:45', '2022-06-12', 63, 34.5, 10, 'Pendiente'),
(58, '2022-06-10 05:48:02', '2022-06-12', 64, 34.5, 10, 'Pendiente'),
(59, '2022-06-10 05:48:30', '2022-06-12', 65, 28.6, 10, 'Pendiente'),
(60, '2022-06-10 08:31:18', '2022-06-12', 66, 205.6, 5, 'Pendiente'),
(61, '2022-06-10 08:34:41', '2022-06-12', 67, 394.4, 10, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `NombreProducto` varchar(100) NOT NULL,
  `PrecioUnitario` float NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `NombreProducto`, `PrecioUnitario`, `Descripcion`, `Image`) VALUES
(2, 'mini brownie', 1, 'personal', 'img\\1brownie.jpg'),
(3, 'Brownie Clasico', 5, 'Estilo clásico para disfrutar en cualquier momento', 'img\\2brownie.jpg'),
(4, 'Brownie con nueces', 6, 'Brownie cubierto y relleno con trozos de nueces.', 'img\\3brownie.jpg'),
(5, 'Brownie caramelado', 4, 'Brownie cubierto con una capa fina caramelada y re', 'img\\4brownie.jpg'),
(6, 'Brownie de fresa', 7, 'Brownie de chocolate con internas capas de fresa', 'img\\5brownie.jpg'),
(8, 'Brownie con helado', 8, 'Brownie de chocolate con una bola de helado de vai', 'img\\6brownie.jpg'),
(9, 'Brownie con almendras', 8, 'Brownie de chocolate bañado con trozos de almendra', 'img\\7brownie.jpg'),
(10, 'Brownie con arandanos', 7, 'Brownie de chocolate con glaseado de arandanos.', 'img\\8brownie.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(0, 'Cliente'),
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `Contraseña` varchar(15) NOT NULL,
  `dni` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `FechaRegistro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idRol`, `nombre`, `apellido`, `Contraseña`, `dni`, `correo`, `FechaRegistro`) VALUES
(4, 0, 'ruiz', 'ramoz', 'oki', 87654321, 'ruiz@gmail.com', '0000-00-00 00:00:00'),
(5, 1, 'nadim', 'moran', '123', 12345667, 'nadim@gmail.com', '2022-05-21 18:07:59'),
(7, 0, 'sebastian', 'injante', '123', 12345678, 'injante@hotmail.com', '2022-05-21 18:24:58'),
(8, 0, 'Nadim', 'Solis', '12345', 12345678, 'nadim@hotmail.com', '2022-05-21 18:29:58'),
(9, 0, 'Jose', 'Perez', 'oki', 12345678, 'perez@gmail.com', '2022-05-21 18:31:24'),
(10, 0, 'sebastian', 'Asto', 'nuevapass', 23456789, 'asto@gmail.com', '2022-05-21 18:43:23'),
(19, 0, 'maria', 'serena', '12345', 87654321, 'maria@hotmail.com', '2022-05-27 03:07:00'),
(23, 0, 'Jose', 'Perez', '123', 12345678, 'jose@hotmail.com', '2022-06-04 20:00:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brownie_personalizado`
--
ALTER TABLE `brownie_personalizado`
  ADD PRIMARY KEY (`idBrownieP`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idCaja`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`idDetallePedido`);

--
-- Indices de la tabla `informacion_envio`
--
ALTER TABLE `informacion_envio`
  ADD PRIMARY KEY (`idEnvio`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`idIngrediente`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brownie_personalizado`
--
ALTER TABLE `brownie_personalizado`
  MODIFY `idBrownieP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `informacion_envio`
--
ALTER TABLE `informacion_envio`
  MODIFY `idEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `idIngrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
