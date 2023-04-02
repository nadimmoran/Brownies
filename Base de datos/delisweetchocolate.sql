-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2022 a las 04:53:43
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `idIngrediente` int(11) NOT NULL,
  `NombreIngrediente` varchar(100) NOT NULL,
  `PrecioIngrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaEntrega` varchar(30) DEFAULT 'Por confirmar',
  `idEnvio` int(11) DEFAULT NULL,
  `Total` float NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Mini brownie', 1, 'Ideal para los niños', 'img\\1brownie.jpg'),
(2, 'Brownie clásico', 5, 'Estilo clásico para disfrutar en cualquier momento', 'img\\2brownie.jpg'),
(3, 'Brownie con nueces', 6, 'Brownie cubierto y relleno con trozos de nueces.', 'img\\3brownie.jpg'),
(4, 'Brownie caramelado', 4, 'Brownie cubierto con una capa fina caramelada y re', 'img\\4brownie.jpg'),
(5, 'Brownie de fresa', 7, 'Brownie de chocolate con internas capas de fresa', 'img\\5brownie.jpg'),
(6, 'Brownie con helado', 8, 'Brownie de chocolate con una bola de helado de vai', 'img\\6brownie.jpg'),
(7, 'Brownie con almendras', 8, 'Brownie de chocolate bañado con trozos de almendra', 'img\\7brownie.jpg'),
(8, 'Brownie con arándanos', 7, 'Brownie de chocolate con glaseado de arandanos.', 'img\\8brownie.jpg'),
(9, 'Brownie con lunetas', 8, 'Brownie con una capa de lentejuelas', 'img\\9brownie.jpg');

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
  `celular` int(9) NOT NULL,
  `FechaRegistro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brownie_personalizado`
--
ALTER TABLE `brownie_personalizado`
  ADD PRIMARY KEY (`idBrownieP`),
  ADD KEY `idIngrediente` (`idIngrediente`),
  ADD KEY `idCaja` (`idCaja`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idCaja`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`idDetallePedido`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idPedido` (`idPedido`);

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
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idEnvio` (`idEnvio`),
  ADD KEY `idUsuario` (`idUsuario`);

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
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brownie_personalizado`
--
ALTER TABLE `brownie_personalizado`
  MODIFY `idBrownieP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacion_envio`
--
ALTER TABLE `informacion_envio`
  MODIFY `idEnvio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `idIngrediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
