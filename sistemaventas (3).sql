-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2024 a las 20:05:02
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
-- Base de datos: `sistemaventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_almacen`
--

CREATE TABLE `tbl_almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `precio_venta` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_almacen`
--

INSERT INTO `tbl_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_categoria`, `id_usuario`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'P-000001', 'Camiseta Deportiva', 'Camiseta deportiva azul para hombre talla M', 10, 5, 30, '5', '20', '2024-08-06', '2024-08-07-11-39-07_Captura de pantalla 2023-09-06 102831.png', 5, 1, '2024-08-06 16:19:07', '2024-08-07 11:39:07'),
(2, 'P-000002', 'Audifonos', 'Audifonos color negro', 10, 5, 20, '5', '20', '2024-08-07', '2024-08-07-12-50-19_audifonos-bluetooth-bass-pro-con-bateria-de-hasta-22-h.jpg', 2, 1, '2024-08-07 12:50:19', '0000-00-00 00:00:00'),
(4, 'P-000004', 'Play Station 5', 'Play station 5 modelo slim ', 3, 1, 5, '400', '600', '2024-08-07', '2024-08-07-12-53-14_play_station_5.jpg', 2, 1, '2024-08-07 12:53:14', '0000-00-00 00:00:00'),
(5, 'P-000004', 'Pantalones licra', 'Pantalones licra para hombre talla M', 20, 10, 50, '10', '25', '2024-08-07', '2024-08-07-12-54-35_TCL-X5-verde.jpg', 6, 1, '2024-08-07 12:54:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Liquidos', '2024-08-04 18:07:49', '2024-08-04 18:07:49'),
(2, 'electronicos', '2024-08-04 15:42:55', '0000-00-00 00:00:00'),
(3, 'accesorios', '2024-08-04 15:47:23', '0000-00-00 00:00:00'),
(4, 'Cocina', '2024-08-04 15:49:30', '2024-08-05 17:08:00'),
(5, 'Camisetas', '2024-08-06 14:05:12', '0000-00-00 00:00:00'),
(6, 'Pantalones', '2024-08-07 12:51:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Administrador', '2024-08-03 01:29:41', '2024-08-03 01:29:41'),
(2, 'Escritor', '2024-08-02 23:21:46', '2024-08-02 23:56:20'),
(3, 'Contador', '2024-08-03 15:33:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuarios`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Jairo Hidalgo', 'jaito@gmail.com', '$2y$10$R92y2.YmI41UEmcK1MOX5.O89R6m7mvSaVYuCW.AQa2rwmJQZMORi', '', 3, '2024-08-04 17:31:29', '2024-08-04 22:27:32'),
(2, 'Sara Jacome', 'sara@gmail.com', '$2y$10$j7t2tn4TYgTvGPBMER5.ZeAr2c6uGWEu4Bs8K3KQ0NRu9vPgxucVG', '', 2, '2024-08-04 22:24:33', '2024-08-04 22:24:55'),
(3, 'Matias Hidalgo', 'matias@gmail.com', '$2y$10$hEPC7hjeUlJs/bgvugIrReIzk/ArVqyQmn3KznjowQbJpRrERqyrS', '', 2, '2024-08-04 22:27:07', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_almacen`
--
ALTER TABLE `tbl_almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_almacen`
--
ALTER TABLE `tbl_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_almacen`
--
ALTER TABLE `tbl_almacen`
  ADD CONSTRAINT `tbl_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
