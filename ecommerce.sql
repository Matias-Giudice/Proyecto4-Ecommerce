-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2020 a las 23:26:12
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `precio_unitario` decimal(20,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descargado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id`, `id_venta`, `id_prod`, `precio_unitario`, `cantidad`, `descargado`) VALUES
(1, 1, 1, '1000.00', 1, 0),
(2, 5, 1, '12999.00', 1, 0),
(3, 5, 2, '6999.00', 1, 0),
(4, 6, 2, '6999.00', 1, 0),
(5, 6, 3, '7139.00', 1, 0),
(6, 7, 2, '6999.00', 1, 0),
(7, 7, 3, '7139.00', 1, 0),
(8, 8, 2, '6999.00', 1, 0),
(9, 8, 3, '7139.00', 1, 0),
(10, 9, 2, '6999.00', 1, 0),
(11, 9, 3, '7139.00', 1, 0),
(12, 10, 2, '6999.00', 1, 0),
(13, 10, 3, '7139.00', 1, 0),
(14, 11, 2, '6999.00', 1, 0),
(15, 11, 3, '7139.00', 1, 0),
(16, 12, 2, '6999.00', 1, 0),
(17, 12, 3, '7139.00', 1, 0),
(18, 13, 2, '6999.00', 1, 0),
(19, 13, 3, '7139.00', 1, 0),
(20, 14, 2, '6999.00', 1, 0),
(21, 14, 3, '7139.00', 1, 0),
(22, 15, 1, '12999.00', 1, 0),
(23, 16, 1, '12999.00', 1, 0),
(24, 17, 2, '6999.00', 1, 0),
(25, 18, 2, '6999.00', 1, 0),
(26, 19, 2, '6999.00', 1, 0),
(27, 20, 2, '6999.00', 1, 0),
(28, 21, 1, '12999.00', 1, 0),
(29, 22, 4, '23950.00', 1, 0),
(30, 23, 1, '12999.00', 1, 0),
(31, 23, 2, '6999.00', 1, 0),
(32, 24, 2, '6999.00', 1, 0),
(33, 24, 4, '23950.00', 1, 0),
(34, 24, 3, '7139.00', 1, 0),
(35, 25, 4, '23950.00', 1, 0),
(36, 26, 4, '23950.00', 1, 0),
(37, 26, 3, '7139.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pasadmin` varchar(250) NOT NULL,
  `rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`, `rol`) VALUES
(1, 'Administrador', '', 'admin@gmail.com', '123456', 1),
(12, 'Matias', '123', 'verdes@gmail.com', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(20,0) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'Mother Z390 Aorus XTREME', '12999', 'Motherboard Intel Z390 gamer con VRM Digital IR de 16 Fases, AORUS Monobloque Todo en Uno, RGB Fusion 2.0, 802.11ac Wireless, Intel Thunderbolt 3, DAC ESS SABRE 9018K2M, LAN AQUANTIA® 10GbE, RGB FAN COMMANDER, OC Touch.', 'http://es.gigabyte.com/products/upload/products/6821/ac620221_6.png'),
(2, 'Teclado HyperX Alloy Core', '6999', 'Teclado con Efectos de iluminación 6 modos LED y 3 niveles de brillo x Tipo de x conexión: USB 2.0 x Velocidad de polling: 1000Hz x Anti-ghosting:Anti-ghosting multi-tecla', 'https://media.kingston.com/hyperx/features/hx-features-keyboard-alloy-core-rgb-la.jpg'),
(3, 'Memoria Ram HyperX FURY', '7139', 'Con velocidades de hasta 4800MHz y sincronizaciones rápidas de CL12–CL19, Predator DDR4 ayuda a tu sistema basado en AMD o Intel en videojuegos, edición de video y transmisiones, y es la opción preferida de overclockers, integradores de PC y gamers.', 'https://media.kingston.com/hyperx/features/hx-features-memory-fury-ddr4.jpg'),
(4, 'Fuente Cooler Master MWE ', '23950', 'Formato ATX Watts Nominal 650W Watts Reales 650W Compatible con posición inferior:Sí\r\nCertificaco: 80 plus 80 PLUS Tipo de cableado Cables fijos Ampers en linea +12V\r\n54 AColor: White\r\n', 'https://http2.mlstatic.com/D_NQ_NP_902250-MLA43567948446_092020-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `clavetransaccion` varchar(250) NOT NULL,
  `paypaldatos` text NOT NULL,
  `fecha` datetime NOT NULL,
  `correo` varchar(255) NOT NULL,
  `total` decimal(60,2) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `clavetransaccion`, `paypaldatos`, `fecha`, `correo`, `total`, `status`) VALUES
(1, '12345678910', '', '2020-11-11 00:00:00', 'verdes@gmail.com', '700.00', 'pendiente'),
(2, '12345678910', '', '2020-11-11 00:00:00', 'verdes@gmail.com', '700.00', 'pendiente'),
(3, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 18:02:53', 'verdes@gmail.com', '19998.00', 'pendiente'),
(4, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 18:03:23', 'verdes@gmail.com', '19998.00', 'pendiente'),
(5, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 19:27:47', 'verdes@gmail.com', '19998.00', 'pendiente'),
(6, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 19:28:28', 'verdes@gmail.com', '14138.00', 'pendiente'),
(7, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 19:40:27', 'verdes@gmail.com', '14138.00', 'pendiente'),
(8, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 19:42:24', 'verdes@gmail.com', '14138.00', 'pendiente'),
(9, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 19:48:43', 'verdes@gmail.com', '14138.00', 'pendiente'),
(10, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 20:50:12', 'verdes@gmail.com', '14138.00', 'pendiente'),
(11, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 20:52:11', 'verdes@gmail.com', '14138.00', 'pendiente'),
(12, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 20:54:59', 'verdes@gmail.com', '14138.00', 'pendiente'),
(13, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 21:00:50', 'verdes@gmail.com', '14138.00', 'pendiente'),
(14, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 21:01:23', 'verdes@gmail.com', '14138.00', 'pendiente'),
(15, '31h49r8gtfd86qmgenuvnp1c03', '', '2020-11-11 21:33:46', 'verdes@gmail.com', '12999.00', 'pendiente'),
(16, 'vdopkop8npbph6gd38rm7ncfeq', '', '2020-11-11 22:52:38', 'verdes@gmail.com', '12999.00', 'pendiente'),
(17, 'gk8qh2ck7tej9rh54umkidha9g', '', '2020-11-13 16:16:05', 'verdes@gmail.com', '6999.00', 'pendiente'),
(18, 'gk8qh2ck7tej9rh54umkidha9g', '', '2020-11-13 17:02:55', 'verdes@gmail.com', '6999.00', 'pendiente'),
(19, 'gk8qh2ck7tej9rh54umkidha9g', '', '2020-11-13 17:06:56', 'verdes@gmail.com', '6999.00', 'pendiente'),
(20, 'jfts34nr6v6a1l4cflk24lb4pl', '', '2020-11-17 12:22:57', 'verdes@gmail.com', '6999.00', 'pendiente'),
(21, 'mpnbp4a6fioshdo4jo4fvf4ap0', '', '2020-11-22 18:22:38', 'verdes@gmail.com', '12999.00', 'pendiente'),
(22, '2p30u520a5kq1t4uueorrqoadq', '', '2020-11-23 18:35:29', 'verdes@gmail.com', '23950.00', 'pendiente'),
(23, '72disa3hreektk3k55bjnnaniu', '', '2020-11-24 17:27:41', 'verdes@gmail.com', '19998.00', 'pendiente'),
(24, '72disa3hreektk3k55bjnnaniu', '', '2020-11-24 18:26:12', 'verdes@gmail.com', '38088.00', 'pendiente'),
(25, '2lo6jia7tuologtq7cpdmri74e', '', '2020-11-25 19:11:40', 'verdes@gmail.com', '23950.00', 'pendiente'),
(26, '2lo6jia7tuologtq7cpdmri74e', '', '2020-11-25 19:12:31', 'verdes@gmail.com', '31089.00', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
