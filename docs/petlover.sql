-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2024 a las 22:32:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petlover`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `identificacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `estado` varchar(10) DEFAULT 'activo' CHECK (`estado` in ('activo','inactivo'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`identificacion`, `nombre`, `apellido`, `correo`, `password`, `estado`) VALUES
(1, 'popo', 'dfdfdfd', 'juan.perez@example.com', 'contrasena123', 'activo'),
(2, 'dsds', 'ddsdsd', 'juan.e@example.com', '12345', 'activo'),
(34, 'fdfd', 'fdfdfd', 'juandfdfdfd.e@example.com', '34434343', 'activo'),
(2121, 'xsxsx', 'hjhj', 'alex@gmai.com', 'jksdsds', 'activo'),
(32323, 'w232', 'dssdsdsd', 'ddsddsds', 'dddsdsd', 'activo'),
(111111, 'alejo', 'tobon', 'alejo.dsds@gmail.com', '12345', 'activo'),
(234567, 'asdfgh', 'asdfgh', 'asdfg', 'asdfg', 'activo'),
(343434, 'FDFDFD', 'FDFDFDF', 'alzxzFGFGFxex@gmai.com', '434343', 'activo'),
(433434, 'sdsdsds', 'dsdsds', 'dsdsdsds', '23232323', 'activo'),
(434343, 'fdffdf', 'dfdff', 'fdfdfdf', 'fdfdfdf', 'activo'),
(34343434, 'ffdsdfdfd', 'fdfdfd', 'aledfdfdfx@gmai.com', '334343', 'activo'),
(111111111, 'luz', 'narvaez', 'luz@gmail.com', '12345', 'activo'),
(1113859316, 'cxcxc', 'xcxcx', 'juan.excx@example.com', '12345', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura_cita`
--

CREATE TABLE `detalle_factura_cita` (
  `id` bigint(20) NOT NULL,
  `id_factura_cita` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura_producto`
--

CREATE TABLE `detalle_factura_producto` (
  `id` int(11) NOT NULL,
  `id_factura_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_cita`
--

CREATE TABLE `factura_cita` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cita` int(11) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_producto`
--

CREATE TABLE `factura_producto` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `raza` varchar(35) NOT NULL,
  `nota` varchar(500) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `tipo`, `raza`, `nota`, `id_cliente`) VALUES
(1, 'pepe', 'perro', 'chardoberman', 'perro', 1),
(2, 'santiago', 'gato', 'no definido', 'gato', 1113859316);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagenProducto` varchar(400) NOT NULL,
  `estado` varchar(10) DEFAULT 'activo' CHECK (`estado` in ('activo','inactivo'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripcion`, `stock`, `precio`, `imagenProducto`, `estado`) VALUES
(3, 'fdfdf', 2, 2, '../assets/imgcepillo.jpg', 'inactivo'),
(4, 'narva', 23, 23000, '../assets/imglogo.jpg', 'activo'),
(5, 'sdsd', 334, 344, '../assets/imgcepillo.jpg', 'activo'),
(6, 'wewe', 3, 23, '../assets/imgcepillo.jpg', 'activo'),
(7, 'wew', 3443, 33232323, '../assets/imgcepillo.jpg', 'activo'),
(8, 'sds', 3, 23, '../assets/imgcepillo.jpg', 'activo'),
(9, 'sdd', 32, 2323, '../assets/imgcepillo.jpg', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `identificacion` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`identificacion`, `nombre`, `apellido`, `correo`, `password`, `id_rol`) VALUES
(2671333, 'admin', 'admin', 'admin@gmail.com', '12345', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `detalle_factura_cita`
--
ALTER TABLE `detalle_factura_cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_factura_cita` (`id_factura_cita`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `detalle_factura_producto`
--
ALTER TABLE `detalle_factura_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_factura_producto` (`id_factura_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `factura_cita`
--
ALTER TABLE `factura_cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Factura_Cita_Cita1` (`id_cita`);

--
-- Indices de la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura_producto`
--
ALTER TABLE `detalle_factura_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_cita`
--
ALTER TABLE `factura_cita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`identificacion`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`);

--
-- Filtros para la tabla `detalle_factura_cita`
--
ALTER TABLE `detalle_factura_cita`
  ADD CONSTRAINT `detalle_factura_cita_ibfk_1` FOREIGN KEY (`id_factura_cita`) REFERENCES `factura_cita` (`id`),
  ADD CONSTRAINT `detalle_factura_cita_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`);

--
-- Filtros para la tabla `detalle_factura_producto`
--
ALTER TABLE `detalle_factura_producto`
  ADD CONSTRAINT `detalle_factura_producto_ibfk_1` FOREIGN KEY (`id_factura_producto`) REFERENCES `factura_producto` (`id`),
  ADD CONSTRAINT `detalle_factura_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `factura_cita`
--
ALTER TABLE `factura_cita`
  ADD CONSTRAINT `fk_Factura_Cita_Cita1` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`identificacion`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
