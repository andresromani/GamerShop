-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 00:21:56
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamershop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`) VALUES
(1, 'Equipos y Notebooks'),
(2, 'Consolas de Video Juego'),
(3, 'Mothers y combos'),
(4, 'Procesadores y coolers cpus'),
(5, 'Placas de Video y otras'),
(6, 'Almacenamiento'),
(7, 'Memorias Ram'),
(8, 'Gabinetes, fuentes y coolers'),
(9, 'Monitores y Televisores'),
(10, 'Teclados y mouses'),
(11, 'Audio, parlantes, auriculares y mic'),
(12, 'Joysticks y periféricos para simuladores'),
(13, 'Muebles'),
(14, 'Periféricos'),
(15, 'Conectividad'),
(16, 'Software'),
(17, 'Ropa, bolsos y mochilas'),
(18, 'Oficina'),
(19, 'Seguridad y Vigilancia'),
(20, 'Celulares'),
(21, 'Cables y cargadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `marca` varchar(55) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `subcategoria_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(55) NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `precio`, `descripcion`, `marca`, `categoria_id`, `subcategoria_id`, `stock`, `imagen`, `estado`) VALUES
(1, 'Mother GIGABYTE H310N Intel', '11200.00', 'Descripción del producto', 'GIGABYTE', 3, 7, 100, 'mother-gigabyte-h310n-intel-20-0.jpg', b'1'),
(2, 'Placa de video RX 570 8gb MSI Armor', '21299.00', 'Descripción del producto', 'MSI', 5, 15, 100, 'radeon-rx-570-8gb-msi-armor-oc.jpg', b'1'),
(3, 'Procesador Intel Core i5 9400F', '17000.00', 'Descripción del producto', 'Intel', 4, 10, 50, 'micro-intel-core-i5-9400f-0.jpg', b'1'),
(4, 'Placa de video GeForce GTX 1660 Ti 6GB Evga SC Ultra', '40000.00', 'Descripción del producto', 'Evga', 5, 14, 100, 'geforce-gtx-1660-ti-6gb-evga-sc-ultra.jpg', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `subcategoria_id` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`subcategoria_id`, `nombre`, `categoria_id`) VALUES
(1, 'EQUIPOS ARMADOS CON PANTALLAS', 1),
(2, 'EQUIPOS ARMADOS SIN PANTALLA', 1),
(3, 'NOTEBOOKS', 1),
(4, 'ACCESORIOS PARA CONSOLAS', 2),
(5, 'KITS DE ACTUALIZACIÓN', 3),
(6, 'MOTHERS AMD', 3),
(7, 'MOTHERS INTEL', 3),
(8, 'COOLERS CPU', 4),
(9, 'PROCESADORES AMD', 4),
(10, 'PROCESADORES INTEL', 4),
(11, 'PROYECTORES', 4),
(12, 'SOLUCIONES TERMICAS', 4),
(13, 'CAPTURADORAS', 5),
(14, 'PLACAS DE VIDEO GEFORCE', 5),
(15, 'PLACAS DE VIDEO RADEON AMD', 5),
(16, 'CARRY DISK | CAJAS PARA DISCOS', 6),
(17, 'DISCOS RÍGIDOS EXTERNOS', 6),
(18, 'DISCOS RÍGIDOS INTERNOS', 6),
(19, 'DISCOS SÓLIDOS SSD', 6),
(20, 'LECTORES DE MEMORIAS', 6),
(21, 'OPTICOS DVD/ BLUERAY RW', 6),
(22, 'PENDRIVES', 6),
(23, 'TARJETAS DE MEMORIA', 6),
(24, 'MEMORIAS', 7),
(25, 'MEMORIAS SODIMM', 7),
(26, 'ACCESORIOS PARA GABINETES', 8),
(27, 'COOLERS FAN', 8),
(28, 'FUENTES DE ALIMENTACIÓN', 8),
(29, 'GABINETES', 8),
(30, 'MODDING | CABLES, ILUMINACIÓN Y OTROS', 8),
(31, 'MONITORES Y PANTALLAS', 9),
(32, 'SOPORTES Y PANTALLAS', 9),
(33, 'ACCESORIOS PARA MOUSE', 10),
(34, 'ACCESORIOS Y RESPUESTOS DE TECLADOS', 10),
(35, 'COMBOS DE TECLADOS, MOUSES Y OTROS', 10),
(36, 'MOUSE PADS', 10),
(37, 'MOUSES', 10),
(38, 'TECLADO', 10),
(39, 'ACCESORIOS PARA AURICULARES', 11),
(40, 'AURICULARES', 11),
(41, 'MICRÓFONOS', 11),
(42, 'PARLANTES', 11),
(43, 'CASCOS VR', 12),
(44, 'JOYSTICKS, GAMEPADS PARA PC Y OTROS', 12),
(45, 'VOLANTES - SIMULADORES DE MANEJO', 12),
(46, 'SILLAS GAMERS', 13),
(47, 'TABLETS DIGITALIZADORAS', 14),
(48, 'WEBCAM', 14),
(49, 'PLACAS DE ED INALAMBRICAS', 15),
(50, 'ROUTER POR CABLE Y SWITCH', 15),
(51, 'ROUTERS WIFI', 15),
(52, 'SISTEMAS OPERATIVOS', 16),
(53, 'MOCHILAS Y BOLSOS', 17),
(54, 'REMERAS', 17),
(55, 'CARGADORES Y PILAS RECARGABLES', 18),
(56, 'ESTABILIZADORES', 18),
(57, 'CAMARAS DE VIGILANCIA', 19),
(58, 'ACCESORIOS PARA CELULARES', 20),
(59, 'CELULARES', 20),
(60, 'SMARTWATCH', 20),
(61, 'ACCESORIOS DE MODDING, HTPC Y OTROS', 21),
(62, 'CABLES Y ADAPTADORES', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `subcategoria_id` (`subcategoria_id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`subcategoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `subcategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`subcategoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
