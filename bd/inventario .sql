-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-01-2019 a las 14:48:06
-- Versión del servidor: 10.1.37-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(45) DEFAULT NULL,
  `estadoCategoria` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `estadoCategoria`) VALUES
(1, 'Papeleria y Utiles', 0),
(2, 'Detergentes', 1),
(3, 'Equipo de limpieza', 1),
(4, 'Bebida', 1),
(5, 'Equipo de Computo', 1),
(6, 'Computadoras', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `idEncargado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estadoEncargado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`idEncargado`, `nombre`, `estadoEncargado`) VALUES
(1, 'Juan Antonio Perez', 1),
(2, 'Francisco Mariano Giron', 1),
(3, 'Adriana Michel Garcia', 1),
(4, 'Maria Josefina Rodriguez', 0),
(5, 'Xiomara Janeth Larin', 1),
(6, 'Cesar Yarckin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `proveedor` varchar(45) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `marca`, `precio`, `stock`, `estado`, `proveedor`, `idCategoria`) VALUES
(1, 'Garrafón de Agua', 'CRISTAL', 2.25, 45, 1, 'La Constancia', 4),
(2, 'Botella agua 500 ml', 'CRISTAL', 0.4, 80, 1, 'La Constancia', 4),
(3, 'raptor botella 500ml', 'RAPTOR', 1.15, 200, 1, 'Productos Maravilla', 4),
(4, 'Bolsa xedex 500gr', 'XEDEX', 1.25, 60, 1, 'UNILEVER', 2),
(5, 'Galon de lejia', 'MAJIA BLANCA', 2.25, 390, 1, 'BLANCOSOL', 2),
(6, 'Escoba pequeña', 'MARIS', 1.5, 88, 1, 'Productos MARIS', 2),
(7, 'Resma Papel tam Carta', 'FACELA', 3.25, 490, 1, 'FACELA', 1),
(8, 'plumon 509 negro', 'ARTLINE', 0.95, 80, 1, 'sachihata', 1),
(9, 'caja lapicero 100 und', 'FACELA', 5.1, 100, 1, 'FACELA', 1),
(10, 'Trapeador', 'DURAMAX', 10, 12, 1, 'ARENA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `idSalida` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `idEncargado` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`idSalida`, `idProducto`, `cantidad`, `idEncargado`, `fecha`) VALUES
(1, 1, 5, 1, '2019-01-06'),
(2, 2, 20, 3, '2019-01-04'),
(3, 5, 10, 2, '2019-01-01'),
(4, 6, 10, 3, '2019-01-05'),
(5, 9, 60, 3, '2019-01-03'),
(6, 9, 5, 1, '2019-01-04'),
(7, 7, 10, 1, '2019-01-03'),
(8, 6, 2, 5, '2019-01-01'),
(9, 5, 100, 5, '2019-01-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`idEncargado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_producto_categoria1_idx` (`idCategoria`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `fk_salida_producto1_idx` (`idProducto`),
  ADD KEY `fk_salida_encargado1_idx` (`idEncargado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `idEncargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `idSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `fk_salida_encargado1` FOREIGN KEY (`idEncargado`) REFERENCES `encargado` (`idEncargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salida_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
