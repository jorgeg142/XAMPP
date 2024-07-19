-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2024 a las 04:37:26
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cerrajeria_houdini`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_producto`
--

CREATE TABLE `det_producto` (
  `cod_producto` int(64) NOT NULL,
  `num_factura` int(64) NOT NULL,
  `cant_venta_p` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_producto`
--

INSERT INTO `det_producto` (`cod_producto`, `num_factura`, `cant_venta_p`) VALUES
(1, 2, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_servicio`
--

CREATE TABLE `det_servicio` (
  `servicio_cod_servicio` int(64) NOT NULL,
  `factura_num_factura` int(64) NOT NULL,
  `cant_venta_s` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_servicio`
--

INSERT INTO `det_servicio` (`servicio_cod_servicio`, `factura_num_factura`, `cant_venta_s`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `num_factura` int(64) NOT NULL,
  `fecha_factura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`num_factura`, `fecha_factura`) VALUES
(1, '2009-10-10'),
(2, '2009-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(64) NOT NULL,
  `precio_producto` int(64) NOT NULL,
  `desc_producto` varchar(45) NOT NULL,
  `cant_producto` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `precio_producto`, `desc_producto`, `cant_producto`) VALUES
(1, 12, '3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `cod_servicio` int(64) NOT NULL,
  `nom_servicio` varchar(45) NOT NULL,
  `precio_servicio` int(64) NOT NULL,
  `desc_servicio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`cod_servicio`, `nom_servicio`, `precio_servicio`, `desc_servicio`) VALUES
(2, 'limpio', 8, '12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `det_producto`
--
ALTER TABLE `det_producto`
  ADD PRIMARY KEY (`cod_producto`,`num_factura`),
  ADD KEY `num_factura` (`num_factura`);

--
-- Indices de la tabla `det_servicio`
--
ALTER TABLE `det_servicio`
  ADD PRIMARY KEY (`servicio_cod_servicio`,`factura_num_factura`),
  ADD KEY `factura_num_factura` (`factura_num_factura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`num_factura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`cod_servicio`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_producto`
--
ALTER TABLE `det_producto`
  ADD CONSTRAINT `det_producto_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `producto` (`cod_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `det_producto_ibfk_2` FOREIGN KEY (`num_factura`) REFERENCES `factura` (`num_factura`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `det_servicio`
--
ALTER TABLE `det_servicio`
  ADD CONSTRAINT `det_servicio_ibfk_1` FOREIGN KEY (`factura_num_factura`) REFERENCES `factura` (`num_factura`) ON UPDATE CASCADE,
  ADD CONSTRAINT `det_servicio_ibfk_2` FOREIGN KEY (`servicio_cod_servicio`) REFERENCES `servicio` (`cod_servicio`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
