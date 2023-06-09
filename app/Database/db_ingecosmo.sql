-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2023 a las 05:14:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ingecosmo`
--
CREATE DATABASE IF NOT EXISTS `db_ingecosmo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_ingecosmo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id_accion` smallint(2) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id_accion`, `nombre`, `descripcion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Crear Usuario', 'Esta accion permitira crear los Usuarios e ingresarlos en la base de datos', 'A', '2023-03-02 14:08:53', 2),
(2, 'Editar Usuario', 'Esta accion permitira editar los Usuarios ingresados en la base de datos', 'A', '2023-03-02 14:14:30', 2),
(3, 'Eliminar Usuario', 'Esta accion permitira eliminar los Usuarios ingresados en la base de datos', 'A', '2023-03-02 14:14:34', 2),
(4, 'Ver Usuario', 'Esta accion permitira realizar una visualizacion de los Usuarios registrados en la base de datos', 'A', '2023-03-02 14:14:37', 2),
(5, 'Editar Cliente', 'Esta accion permitira editar los Clientes ingresados en la base de datos', 'A', '2023-03-02 14:05:38', 2),
(6, 'Eliminar Cliente', 'Esta accion permitira eliminar los Clientes ingresados en la base de datos', 'A', '2023-03-02 14:05:38', 2),
(7, 'Crear Cliente', 'Esta accion permitira crear los Clientes e ingresarlos en la base de datos', 'A', '2023-03-02 14:05:38', 2),
(8, 'Ver Clientes', 'Esta accion permitira realizar una visualizacion de los Clientes registrados en la base de datos', 'A', '2023-03-02 14:08:03', 2),
(9, 'Editar Vehiculo', 'Esta accion permitira editar los Vehiculos ingresados en la base de datos', 'A', '2023-03-02 14:05:38', 2),
(10, 'Eliminar Vehiculo', 'Esta accion permitira Eliminar los Vehiculos ingresados en la base de datos', 'A', '2023-03-02 14:05:38', 2),
(11, 'Crear Vehiculo', 'Esta accion permitira crear los Vehiculos e ingresarlos en la base de datos', 'A', '2023-03-02 14:09:28', 2),
(12, 'Ver Vehiculos', 'Esta accion permitira realizar una visualizacion de los Vehiculos registrados en la base de datos', 'A', '2023-03-02 14:14:47', 2),
(13, 'Crear Trabajador', 'Esta accion permitira crear los Trabajadores e ingresarlos en la base de datos', 'A', '2023-03-02 14:14:53', 2),
(14, 'Editar Trabajador', 'Esta accion permitira editar los Trabajadores e ingresarlos en la base de datos', 'A', '2023-03-02 14:14:57', 2),
(15, 'Eliminar Trabajador', 'Esta accion permitira eliminar los Trabajadores e ingresarlos en la base de datos', 'A', '2023-03-02 14:15:01', 2),
(16, 'Ver Trabajadores', 'Esta accion permitira realizar una visualizacion de los Trabajadores registrados en la base de datos', 'A', '2023-03-02 14:11:52', 2),
(17, 'Crear Proveedor', 'Esta accion permitira crear los Proveedores e ingresarlos en la base de datos', 'A', '2023-03-02 14:14:22', 2),
(18, 'Editar Proveedor', 'Esta accion permitira editar los Proveedores e ingresarlos en la base de datos', 'A', '2023-03-02 14:14:22', 2),
(19, 'Eliminar Proveedor', 'Esta accion permitira eliminar los Proveedores e ingresarlos en la base de datos', 'A', '2023-03-02 14:14:22', 2),
(20, 'Ver Proveedores', 'Esta accion permitira realizar una visualizacion de los Proveedores registrados en la base de datos', 'A', '2023-03-02 14:14:22', 2),
(21, 'Registrar Entrada Material', 'Esta accion permitira registrar la entrada de los Materiales e ingresarlos en la base de datos', 'A', '2023-03-02 14:30:35', 2),
(22, 'Editar Material', 'Esta accion permitira editar los Materiales e ingresarlos en la base de datos', 'A', '2023-03-02 14:30:35', 2),
(23, 'Registrar Salida Material', 'Esta accion permitira registrar la salida de los Materiales e ingresarlos en la base de datos', 'A', '2023-03-02 14:31:12', 2),
(24, 'Ver Materiales', 'Esta accion permitira realizar una visualizacion de los Materiales registrados en la base de datos', 'A', '2023-03-02 14:30:35', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre`, `descripcion`, `estado`, `fecha_crea`, `usario_crea`) VALUES
(1, 'Jefe de Colisión', 'Se encarga de supervisar y administrar las operaciones diarias de un taller de reparación de colisiones de vehículos.', 'A', '2023-03-01 16:41:07', 2),
(2, 'Latonero', 'Se encarga de restaurar y reparar las piezas afectadas por el impacto del golpe', 'A', '2023-03-01 16:10:55', 2),
(3, 'Reparadores', 'Se encarga de reparar los desperfectos en la carrocería de los vehículos de motor', 'A', '2023-03-01 16:10:55', 2),
(4, 'Pintor', 'Se encarga de aplicar un acabado de pintura a los vehículos que se han dañado en accidentes', 'A', '2023-03-01 16:20:31', 2),
(5, 'Jefe de mecanica', 'Se encarga de coordinar, dirigir y supervisar el mantenimiento preventivo, arreglo de fallas o daños a los vehículos y llevar el control de órdenes de abastecimiento de combustibles.', 'A', '2023-03-01 16:20:31', 2),
(6, 'Mecanico', 'Se encarga de diagnosticar, reparar y ajustar distintos tipos de maquinaria, instalaciones y elementos mecánicos. Montaje, instalación, puesta en marcha y reparación de equipos industriales.', 'A', '2023-03-01 16:27:50', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE `email` (
  `id_email` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prioridad` char(1) NOT NULL COMMENT 'P = Primaria - S = Secundaria',
  `tipo_usuario` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_usuario`, `email`, `prioridad`, `tipo_usuario`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(3, 1, 'john.doe@example.com', 'P', 8, 'A', '2023-05-29 15:06:59', 22),
(4, 1, 'sarahsmith88@gmail.com', 'S', 8, 'A', '2023-05-29 15:06:59', 22),
(5, 2, 'michael_johnson23@hotmail.com', 'P', 5, 'A', '2023-03-02 14:47:53', 2),
(6, 2, 'lisa.lee@outlook.com', 'S', 5, 'A', '2023-03-02 14:47:53', 2),
(7, 3, 'markwilliams67@yahoo.com', 'P', 6, 'A', '2023-03-02 14:47:53', 2),
(8, 3, 'chris.taylor@gmail.com', 'S', 6, 'A', '2023-03-02 14:47:53', 2),
(9, 3, 'jennifer.jones1985@hotmail.com', 'P', 7, 'A', '2023-03-02 14:47:53', 2),
(10, 3, 'david_brown23@icloud.com', 'S', 7, 'A', '2023-03-02 14:47:53', 2),
(11, 1, 'amy.wilson34@yahoo.com', 'P', 5, 'A', '2023-03-02 14:47:53', 2),
(12, 1, 'brian.clarkson@gmail.com', 'S', 5, 'A', '2023-03-02 14:47:53', 2),
(13, 4, 'yuleidisavilezm@gmail.com', 'P', 7, 'A', '2023-04-27 17:25:16', 3),
(14, 5, 'juanlm101120@gmail.com', 'P', 7, 'A', '2023-05-03 18:21:31', 1),
(15, 6, 'juanlm101@gmail.com', 'P', 7, 'A', '2023-05-03 18:27:47', 1),
(16, 7, 'juanlm101@gmail.com', 'P', 7, 'A', '2023-05-03 18:27:47', 1),
(17, 8, 'juanlm1010@gmail.com', 'S', 7, 'A', '2023-05-03 18:29:36', 1),
(18, 9, 'dasadasdasd', 'S', 7, 'A', '2023-05-03 18:30:21', 1),
(19, 10, 'dasadasdasd', 'S', 7, 'A', '2023-05-03 18:30:21', 1),
(20, 11, 'juanlm100@gmail.com', 'P', 7, 'A', '2023-05-03 18:33:20', 1),
(21, 12, 'juanlm100@gmail.com', 'P', 7, 'A', '2023-05-03 18:33:20', 1),
(22, 13, 'masaxasx', 'P', 7, 'A', '2023-05-03 18:36:12', 1),
(23, 14, 'masaxasx', 'P', 7, 'A', '2023-05-03 18:36:12', 1),
(24, 15, '123asdasd', 'P', 7, 'A', '2023-05-03 18:37:40', 1),
(25, 16, '313123', 'S', 7, 'A', '2023-05-03 18:39:35', 1),
(26, 1, 'jual1010@gmail.', 'P', 7, 'A', '2023-06-07 13:33:50', 22),
(27, 17, 'juanlm1120@gmail.com', 'S', 7, 'A', '2023-05-04 21:13:52', 1),
(28, 18, 'juanlm10@gmail.co', 'P', 7, 'A', '2023-05-12 12:26:31', 4),
(29, 18, 'asdsd@gmail.com', 'S', 7, 'A', '2023-05-11 14:15:50', 4),
(33, 4, 'moiseBD@gmail.com', 'P', 5, 'A', '2023-06-28 00:39:55', 22),
(34, 19, 'juanlm11120@gmail.com', 'P', 7, 'A', '2023-05-18 20:36:56', 1),
(35, 8, 'uvawasa', 'P', 5, 'A', '2023-05-29 15:09:00', 22),
(36, 9, 'sdfsd@sdf', 'P', 56, 'A', '2023-05-25 18:00:04', 19),
(38, 21, 'juan@gmail', 'P', 7, 'A', '2023-06-07 13:22:00', 22),
(39, 22, 'colli@gmail.com', 'P', 7, 'A', '2023-06-02 14:24:40', 22),
(40, 23, 'holii@gmail', 'P', 7, 'A', '2023-05-29 15:55:23', 21),
(41, 2, 'asda@asddd', 'P', 6, 'A', '2023-05-25 18:50:18', 21),
(42, 10, 'joaaaaaaa@', 'P', 5, 'A', '2023-05-25 19:48:15', 22),
(43, 10, 'dyufgskufg@', 'S', 5, 'A', '2023-05-25 20:30:58', 22),
(44, 11, 'mierdaamksolomierda@', 'P', 5, 'A', '2023-05-25 20:47:07', 22),
(45, 12, 'jpda@', 'P', 5, 'A', '2023-05-25 20:57:55', 22),
(46, 13, 'nojodaprravida', 'P', 5, 'A', '2023-05-25 21:00:19', 22),
(47, 3, 'dfgdfg@', 'P', 6, 'A', '2023-05-25 21:45:44', 21),
(48, 4, 'sdfds@sdf', 'P', 6, 'A', '2023-05-25 21:47:09', 21),
(49, 14, 'FSGw', 'P', 5, 'A', '2023-05-25 21:48:07', 22),
(50, 15, 'collante@', 'P', 5, 'A', '2023-05-25 21:49:21', 22),
(51, 16, 'dfsdf@sdd', 'P', 56, 'A', '2023-05-25 21:49:54', 21),
(52, 17, 'tgtty', 'S', 8, 'A', '2023-05-26 17:51:47', 22),
(54, 19, 'asdasd', 'P', 56, 'A', '2023-05-26 18:31:12', 21),
(55, 24, 'yule@gmail.com', 'P', 7, 'A', '2023-05-29 15:55:06', 21),
(57, 3, 'auuuuuuu@', 'P', 8, 'A', '2023-05-31 17:22:47', 22),
(58, 25, 'trance@gmail.com', 'P', 7, 'A', '2023-06-01 18:35:54', 20),
(59, 26, 'garger', 'P', 7, 'A', '2023-06-01 18:37:47', 20),
(60, 27, 'tellme@gmail.com', 'P', 7, 'A', '2023-06-01 19:50:40', 22),
(61, 28, 'segdr', 'P', 7, 'A', '2023-06-01 19:54:10', 22),
(62, 29, 'trhpseir', 'P', 7, 'A', '2023-06-01 20:00:25', 22),
(63, 30, 'peluqueate', 'P', 7, 'A', '2023-06-05 18:32:51', 22),
(64, 31, 'fyulig', 'P', 7, 'A', '2023-06-18 02:56:41', 22),
(65, 32, 'mjhmjy', 'P', 7, 'A', '2023-06-05 19:38:37', 30),
(66, 33, 'yile@gmail.com', 'P', 7, 'A', '2023-06-06 17:45:58', 20),
(67, 34, 'ghmtdy', 'P', 7, 'A', '2023-06-06 20:18:20', 22),
(68, 35, 'dgdfsg', 'P', 7, 'A', '2023-06-06 15:26:22', 35),
(69, 21, 'dxgdrhg', 'P', 8, 'A', '2023-06-07 18:02:55', 22),
(70, 5, 'correo@correo.com', 'P', 56, 'A', '2023-06-07 18:49:43', 1),
(71, 6, 'macancua@gmail.com', 'P', 5, 'A', '2023-06-13 20:50:27', 1),
(72, 22, 'mariaBD@gmial.com', 'P', 5, 'A', '2023-06-27 06:27:32', 22),
(73, 22, 'mariapaula@gmial.com', 'S', 5, 'A', '2023-06-27 06:27:32', 22),
(74, 23, 'ICDSG@UZDFHG.COM', 'P', 5, 'A', '2023-06-27 06:29:45', 22),
(75, 24, 'coo@jhu.com', 'P', 5, 'A', '2023-06-27 06:31:28', 22),
(76, 25, 'hggfh@ijdrg.com', 'P', 5, 'A', '2023-06-27 06:39:27', 22),
(77, 26, 'khfkyf@hgruef.com', 'P', 5, 'A', '2023-06-27 06:44:11', 22),
(78, 27, 'hdfsgiuj@gmail.com', 'P', 8, 'A', '2023-06-29 05:28:25', 22),
(79, 28, 'correoaoa@gkijgroe.com', 'P', 8, 'A', '2023-06-29 05:29:37', 22),
(80, 29, 'IHOIG@YGFE.COM', 'P', 8, 'A', '2023-06-29 05:31:02', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteria`
--

CREATE TABLE `estanteria` (
  `id` smallint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `n_iconos` varchar(30) NOT NULL,
  `tipo_estante` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estanteria`
--

INSERT INTO `estanteria` (`id`, `nombre`, `fecha_crea`, `usuario_crea`, `estado`, `n_iconos`, `tipo_estante`) VALUES
(1, 'Brocas', '2023-05-18 03:26:34', 3, 'A', 'brocas.png', 60),
(2, 'Discos', '2023-05-18 03:26:34', 3, 'A', 'discos.png', 60),
(3, 'Baterias', '2023-05-18 05:33:18', 3, 'A', 'baterias.png', 60),
(4, 'Bombillerias', '2023-05-18 03:26:34', 3, 'A', 'bombillerias.png', 60),
(5, 'Pinturas', '2023-05-18 03:26:34', 3, 'A', 'pinturas.png', 60),
(6, 'Aceites', '2023-05-18 03:26:34', 3, 'A', 'aceites.png', 60),
(7, 'Remaches', '2023-05-18 03:26:34', 3, 'A', 'remaches.png', 60),
(8, 'Lubricantes', '2023-05-18 03:26:34', 3, 'A', 'lubricantes.png', 60),
(12, 'Solidaria', '2023-05-18 03:28:06', 2, 'A', 'bodega.png', 61),
(13, 'Sura', '2023-05-18 03:28:06', 2, 'A', 'bodega.png', 61),
(14, 'Colpatria', '2023-05-18 03:28:49', 2, 'A', 'bodega.png', 61),
(15, 'Bolivar', '2023-05-18 03:28:49', 2, 'A', 'bodega.png', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filas`
--

CREATE TABLE `filas` (
  `id_fila` smallint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_estante` smallint(2) NOT NULL,
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `filas`
--

INSERT INTO `filas` (`id_fila`, `nombre`, `id_estante`, `usuario_crea`, `fecha_crea`, `estado`) VALUES
(1, 'B1', 1, 3, '2023-06-08 15:04:53', 'A'),
(2, 'B2', 1, 3, '2023-06-08 15:04:53', 'A'),
(3, 'B3', 1, 3, '2023-06-08 15:04:53', 'A'),
(4, 'B4', 1, 3, '2023-06-08 15:04:53', 'A'),
(5, 'D1', 2, 3, '2023-06-08 15:04:53', 'A'),
(6, 'D2', 2, 3, '2023-06-08 15:04:53', 'A'),
(7, 'D3', 2, 3, '2023-06-08 15:04:53', 'A'),
(8, 'D4', 2, 3, '2023-06-08 15:04:53', 'A'),
(9, 'A1', 3, 3, '2023-06-08 15:04:53', 'A'),
(10, 'A2', 3, 3, '2023-06-08 15:04:53', 'A'),
(11, 'A3', 3, 3, '2023-06-08 15:04:53', 'A'),
(12, 'A4', 3, 3, '2023-06-08 15:04:53', 'A'),
(13, 'C1', 4, 3, '2023-06-08 15:04:53', 'A'),
(14, 'C2', 4, 3, '2023-06-08 15:04:53', 'A'),
(15, 'C3', 4, 3, '2023-06-08 15:04:53', 'A'),
(16, 'C4', 4, 3, '2023-06-08 15:04:53', 'A'),
(17, 'G1', 5, 3, '2023-06-08 15:04:53', 'A'),
(18, 'G2', 5, 3, '2023-06-08 15:04:53', 'A'),
(19, 'G3', 5, 3, '2023-06-08 15:04:53', 'A'),
(20, 'G4', 5, 3, '2023-06-08 15:04:53', 'A'),
(21, 'H1', 6, 3, '2023-06-08 15:04:53', 'A'),
(22, 'H2', 6, 3, '2023-06-08 15:04:53', 'A'),
(23, 'H3', 6, 3, '2023-06-08 15:04:53', 'A'),
(24, 'H4', 6, 3, '2023-06-08 15:04:53', 'A'),
(25, 'E1', 7, 3, '2023-06-08 15:04:53', 'A'),
(26, 'Fila E2', 7, 3, '2023-06-07 15:21:51', 'A'),
(27, 'Fila E3', 7, 3, '2023-06-07 15:21:51', 'A'),
(28, 'Fila E4', 7, 3, '2023-06-07 15:21:51', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_orden`
--

CREATE TABLE `inv_orden` (
  `id_inv_orden` smallint(2) NOT NULL,
  `id_orden` smallint(2) NOT NULL,
  `n` smallint(2) NOT NULL,
  `item` varchar(35) NOT NULL,
  `checked` varchar(5) NOT NULL,
  `cantidad` smallint(2) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `estado` varchar(2) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inv_orden`
--

INSERT INTO `inv_orden` (`id_inv_orden`, `id_orden`, `n`, `item`, `checked`, `cantidad`, `observacion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(2, 1, 6, 'Panoramicos', '3', 1, NULL, 'A', '2023-06-15 03:27:22', 1),
(3, 1, 5, 'Retrovisor Interno', '2', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(4, 1, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(5, 1, 1, 'Grua', 'true', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(6, 1, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(7, 1, 7, 'Radio', '1', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(8, 1, 8, 'Parlantes', '1', 1, NULL, 'A', '2023-06-15 03:27:22', 1),
(9, 1, 9, 'Rejillas A/A', '1', 2, NULL, 'A', '2023-06-15 03:27:22', 1),
(10, 1, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(11, 1, 11, 'Pito', '1', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(12, 1, 12, 'Plumillas', '1', 2, NULL, 'A', '2023-06-15 03:27:22', 1),
(13, 1, 13, 'Cinturones', '1', 2, NULL, 'A', '2023-06-15 03:27:22', 1),
(14, 1, 14, 'Manijas', '1', 3, NULL, 'A', '2023-06-15 03:27:22', 1),
(15, 1, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(16, 1, 16, 'Tapa Soles', '1', 5, NULL, 'A', '2023-06-15 03:27:22', 1),
(17, 1, 17, 'Tapetes', '1', 2, NULL, 'A', '2023-06-15 03:27:22', 1),
(18, 1, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-06-15 03:27:22', 1),
(19, 1, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(20, 1, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(21, 1, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(22, 1, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(23, 1, 23, 'Kit Carretera', '3', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(24, 1, 24, 'Gato', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(25, 1, 25, 'Extintor', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(26, 1, 26, 'Sensores', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(27, 1, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(28, 1, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(29, 1, 28, 'Bateria', '1', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(30, 1, 29, 'TipoCombustible', '3', 0, NULL, 'A', '2023-06-15 03:27:23', 1),
(31, 1, 30, 'Observacion', 'true', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum vehicula nunc, vitae bibendum tellus condimentum ut. Suspendisse tristique dapibus consectetur. Phasellus lacinia odio sed ligula vehicula dictum. Duis laoreet tellus a velit ullamcorper, at cursus neque cursus. Integer varius convallis maximus. Nam a lacinia libero, eu lobortis purus. Aliquam ligula lorem, fermentum id ante id, semper varius massa. Donec id blandit justo, sit amet vestibulum turpis. Morbi at iaculis tellus. Suspendisse mattis ullamcorper efficitur. Aenean pharetra, magna ac sagittis lobortis, turpis ex ultrices dolor, sit amet facilisis mi ipsum in nisi. Ut aliquam tempor ex vel consequat. Donec quam turpis, auctor at ante eu, gravida pellentesque sapien.Duis ornare fringilla semper. In scelerisque tortor tortor, ac volutpat purus mollis sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat posuere dignissim. Vestibulum sodales, ex vehicula vulputate vestibulum, odio risus interdum felis, vel pretium mi ipsum non arcu. Donec laoreet vulputate imperdiet. In a tellus ac quam facilisis semper in et arcu. Duis dignissim egestas orci a mollis. Suspendisse enim sapien, lacinia a massa ultricies, vestibulum porttitor erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam tellus tellus, ornare at odio quis, lobortis tristique ipsum. Maecenas feugiat pulvinar placerat. Aliquam sit amet magna non ligula pretium sollicitudin. Nulla facilisi.Nulla nec sollicitudin ipsum. Ut pellentesque augue eget nisl fermentum, ut semper mauris ornare. Morbi auctor posuere arcu ac elementum. Mauris aliquam nunc eget aliquam interdum. Sed efficitur diam eget nisi pretium malesuada. Nullam non porta enim. Curabitur nec lacus a erat congue fringilla. Sed gravida metus massa, ut dapibus eros mollis porta. Maecenas rhoncus, mi eget ultrices scelerisque, enim purus finibus odio, sit amet sodales purus ante quis odio. Praesent facilisis est sit amet urna accumsan, non porta metus aliquet. Nullam a semper tellus. ', 'A', '2023-06-15 03:27:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_vehiculo`
--

CREATE TABLE `marca_vehiculo` (
  `id_marca` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca_vehiculo`
--

INSERT INTO `marca_vehiculo` (`id_marca`, `nombre`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Chevrolet', 'A', '2023-06-14 14:05:39', 2),
(2, 'Audi', 'A', '2023-06-14 14:00:51', 2),
(3, 'BMW', 'A', '2023-06-14 14:01:15', 2),
(4, 'Dacia', 'A', '2023-06-14 14:01:15', 2),
(5, 'Ferrari', 'A', '2023-06-14 14:01:15', 2),
(6, 'Ford', 'A', '2023-06-14 14:01:15', 2),
(7, 'Honda', 'A', '2023-06-14 14:01:15', 2),
(8, 'Hyundai', 'A', '2023-06-14 14:01:15', 2),
(9, 'Infiniti', 'A', '2023-06-14 14:01:15', 2),
(10, 'Jeep', 'A', '2023-06-14 14:01:15', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` smallint(2) NOT NULL,
  `id_orden` smallint(2) DEFAULT NULL,
  `id_proveedor` smallint(2) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria_material` smallint(2) DEFAULT NULL,
  `tipo_material` smallint(2) NOT NULL,
  `cantidad_actual` decimal(5,0) NOT NULL,
  `precio_venta` decimal(11,0) DEFAULT NULL,
  `precio_compra` decimal(11,2) DEFAULT NULL,
  `fecha_ultimo_ingre` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_ultimo_salid` datetime DEFAULT NULL,
  `estante` smallint(2) NOT NULL,
  `fila` smallint(2) DEFAULT NULL COMMENT 'Si el material se encuentra en diferentes estantes o filas, esta debe ser dividida con un indicador. Ej: 1 - 2 - 3',
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `cantidad_vendida` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `id_orden`, `id_proveedor`, `nombre`, `categoria_material`, `tipo_material`, `cantidad_actual`, `precio_venta`, `precio_compra`, `fecha_ultimo_ingre`, `fecha_ultimo_salid`, `estante`, `fila`, `estado`, `fecha_crea`, `usuario_crea`, `cantidad_vendida`) VALUES
(47, 1, 2, 'Broca12', 26, 10, 12, 20000, 15000.00, '2023-06-27 20:41:05', '2023-05-01 08:20:15', 13, 2, 'P', '2023-05-29 13:22:32', 2, 15),
(48, NULL, 5, 'Bateria', 28, 9, 11, 23000, 25000.00, '2023-06-08 08:34:16', '2023-05-01 08:22:47', 3, 9, 'A', '2023-05-29 13:23:45', 2, 13),
(49, NULL, NULL, 'Bombillo12', 29, 9, 11, 12000, 13000.00, '2023-06-08 08:34:49', '2023-05-01 08:24:05', 4, 13, 'A', '2023-05-29 13:26:56', 2, 12),
(50, NULL, NULL, 'Disco 4 pulgadas', 30, 9, 13, 12321, 2132.00, '2023-06-08 08:35:17', '2023-05-02 08:24:05', 2, 5, 'A', '2023-05-29 13:26:56', 2, 12),
(51, NULL, NULL, 'Pintura123', 32, 9, 12, 2131, 2324.00, '2023-06-08 08:35:54', '2023-05-03 08:26:58', 5, 17, 'A', '2023-05-29 13:28:44', 2, 12),
(53, NULL, NULL, 'Aceites', 31, 9, 11, 12900, 15000.00, '2023-06-08 08:36:07', '2023-05-03 08:31:14', 6, 21, 'A', '2023-05-29 13:33:33', 2, 14),
(55, NULL, NULL, 'broca1', 26, 9, 8, 11000, 10000.00, '2023-06-08 08:33:29', '2023-05-01 08:38:16', 1, 2, 'A', '2023-05-29 13:40:04', 0, 4),
(56, NULL, NULL, 'broca2', 26, 9, 11, 12000, 15000.00, '2023-06-08 08:36:24', '2023-05-02 08:24:05', 1, 4, 'A', '2023-05-29 13:40:04', 2, 12),
(57, NULL, NULL, 'Broca3', 26, 9, 14, 13000, 10000.00, '2023-06-08 08:36:24', '2023-05-01 08:20:15', 1, 4, 'A', '2023-05-29 13:45:35', 2, 12),
(58, NULL, NULL, 'Broca4', 26, 9, 10, 13000, 8000.00, '2023-06-08 09:42:21', '2023-05-01 08:40:24', 1, 1, 'A', '2023-05-29 13:45:35', 2, 17),
(59, NULL, NULL, 'Bombillo1', 29, 9, 13, 2000, 3000.00, '2023-06-08 10:30:16', '2023-05-01 08:45:46', 4, 14, 'I', '2023-05-29 13:50:04', 2, 13),
(60, NULL, NULL, 'Bombillo2', 29, 9, 2, 3200, 4000.00, '2023-06-08 08:37:16', '2023-05-02 08:24:05', 4, 15, 'A', '2023-05-29 13:50:04', 2, 27),
(61, NULL, NULL, 'Bombillo3', 29, 9, 13, 23000, 15000.00, '2023-06-08 08:37:06', '2023-05-01 08:50:06', 4, 14, 'A', '2023-05-29 13:53:07', 0, 0),
(62, NULL, NULL, 'Bombilllo4', 29, 9, 13, 15000, 20000.00, '2023-06-08 08:37:57', '2023-05-01 08:50:06', 4, 13, 'A', '2023-05-29 13:53:07', 2, 16),
(64, NULL, NULL, 'Disco 2', 30, 9, 12, 20000, 10000.00, '2023-06-08 08:38:10', '2023-05-01 08:20:15', 2, 6, 'A', '2023-05-29 13:55:19', 2, 12),
(65, NULL, NULL, 'Disco 3 pulgadas', 30, 9, 12, 3200, 900.00, '2023-06-08 08:38:20', '2023-05-02 08:24:05', 2, 7, 'A', '2023-05-29 13:55:19', 2, 12),
(66, NULL, NULL, 'Disco 4', 30, 9, 12, 20000, 15000.00, '2023-06-08 08:38:39', '2023-05-01 08:20:15', 2, 8, 'A', '2023-05-29 13:56:29', 2, 14),
(67, NULL, NULL, 'Disco 5 pulgadas', 30, 9, 12, 12321, 2132.00, '2023-06-08 08:38:47', '2023-05-02 08:24:05', 2, 8, 'A', '2023-05-29 13:56:29', 2, 11),
(68, NULL, NULL, 'broca', 26, 9, 12, 3000, 2000.00, '2023-06-08 08:39:03', NULL, 1, 1, 'A', '2023-05-29 19:38:03', 0, 0),
(69, NULL, NULL, 'Broca23', 26, 9, 15, 22000, 21000.00, '2023-06-08 08:33:29', NULL, 1, 2, 'A', '2023-05-29 19:38:04', 0, 1),
(73, NULL, NULL, 'Aceite', 31, 9, 12, 15000, 12000.00, '2023-06-08 08:36:07', NULL, 6, 21, 'A', '2023-05-31 18:05:44', 0, 0),
(74, NULL, NULL, 'bombillo4', 29, 9, 11, 15000, 12000.00, '2023-06-08 08:37:16', NULL, 4, 15, 'A', '2023-05-31 20:36:19', 0, 1),
(75, NULL, NULL, 'RGT', 28, 9, 323, 4356, 24356.00, '2023-06-09 09:57:22', NULL, 1, 4, 'A', '2023-05-31 20:38:51', 0, 22),
(76, NULL, NULL, 'broca123', 26, 9, 3452, 23456, 23456.00, '2023-06-09 07:49:32', NULL, 1, 1, 'A', '2023-06-01 17:25:06', 0, 4),
(77, NULL, NULL, 'brocaa', 26, 9, 8, 15000, 12000.00, '2023-06-08 08:36:24', NULL, 1, 4, 'A', '2023-06-06 17:50:33', 0, 5),
(78, NULL, NULL, 'Broca 45', 26, 9, 17, 24000, 23000.00, '2023-06-09 07:49:11', NULL, 1, 2, 'A', '2023-06-06 18:37:57', 0, 15),
(79, NULL, NULL, 'Broca 46', 26, 9, 9, 32000, 25000.00, '2023-06-08 08:33:29', NULL, 1, 2, 'A', '2023-06-06 18:38:28', 0, 4),
(80, NULL, NULL, 'Broca 47', 26, 9, 11, 532853, 14241.00, '2023-06-09 07:46:03', NULL, 1, 2, 'A', '2023-06-06 19:19:19', 0, 1),
(81, NULL, NULL, 'Broca 48', 26, 9, 1, 45000, 23000.00, '2023-06-08 08:33:29', NULL, 1, 2, 'A', '2023-06-06 19:19:36', 0, 11),
(82, NULL, NULL, 'Broca 49', 26, 9, 20, 12542, 24512.00, '2023-06-08 09:45:58', NULL, 1, 1, 'A', '2023-06-06 19:19:59', 0, 3),
(83, 1, 2, 'remache', 51, 9, 30, 20000, 15000.00, '2023-06-13 08:23:26', '2023-06-07 09:51:41', 1, 1, 'A', '2023-06-06 14:52:50', 3, 5),
(84, 31, 1, 'prueba', 61, 10, 11, 12000, 12222.00, '2023-06-08 10:05:05', NULL, 13, 2, 'A', '2023-06-06 16:47:37', 21, 12),
(86, 32, 1, 'puerta', NULL, 10, 2, NULL, NULL, '2023-06-08 10:08:02', NULL, 15, NULL, 'A', '2023-06-08 19:19:29', 21, 0),
(87, 32, 1, 'llanta', NULL, 10, 1, NULL, NULL, '2023-06-08 10:07:47', NULL, 14, NULL, 'A', '2023-06-08 19:48:54', 21, 0),
(88, 32, 3, 'Llantas', NULL, 10, 3, NULL, NULL, '2023-06-08 10:05:28', NULL, 13, NULL, 'A', '2023-06-08 19:59:01', 21, 0),
(89, 32, 3, 'sad', NULL, 10, 3, NULL, NULL, '2023-06-09 08:57:24', NULL, 12, NULL, 'I', '2023-06-08 20:01:17', 21, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_det`
--

CREATE TABLE `movimiento_det` (
  `id_movimientodet` smallint(4) NOT NULL,
  `id_movimientoenc` smallint(2) NOT NULL,
  `id_material` smallint(2) NOT NULL,
  `item` smallint(2) NOT NULL,
  `cantidad` smallint(2) NOT NULL,
  `costo` decimal(11,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimiento_det`
--

INSERT INTO `movimiento_det` (`id_movimientodet`, `id_movimientoenc`, `id_material`, `item`, `cantidad`, `costo`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 49, 1, 2, 20000.00, 'A', '2023-06-14 15:36:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_enc`
--

CREATE TABLE `movimiento_enc` (
  `id_movimientoenc` smallint(2) NOT NULL,
  `id_tercero` smallint(2) DEFAULT NULL,
  `id_vehiculo` smallint(2) DEFAULT NULL,
  `id_trabajador` smallint(2) DEFAULT NULL,
  `fecha_movimiento` date NOT NULL,
  `tipo_movimiento` smallint(2) NOT NULL,
  `estado` char(2) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimiento_enc`
--

INSERT INTO `movimiento_enc` (`id_movimientoenc`, `id_tercero`, `id_vehiculo`, `id_trabajador`, `fecha_movimiento`, `tipo_movimiento`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 5, 1, NULL, '2023-06-14', 58, '38', '2023-06-15 03:56:29', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_servicio`
--

CREATE TABLE `ordenes_servicio` (
  `id_orden` smallint(2) NOT NULL,
  `n_orden` varchar(15) NOT NULL,
  `id_vehiculo` smallint(2) NOT NULL,
  `kms` varchar(20) NOT NULL,
  `nombres` varchar(25) DEFAULT NULL,
  `apellidos` varchar(25) DEFAULT NULL,
  `n_identificacion` varchar(15) DEFAULT NULL,
  `estado` smallint(2) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_servicio`
--

INSERT INTO `ordenes_servicio` (`id_orden`, `n_orden`, `id_vehiculo`, `kms`, `nombres`, `apellidos`, `n_identificacion`, `estado`, `fecha_entrada`, `fecha_salida`, `fecha_crea`, `usuario_crea`) VALUES
(1, '41000', 15, '745', NULL, NULL, NULL, 38, '2023-06-14', '2023-06-16', '2023-06-14 23:12:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_detalle`
--

CREATE TABLE `param_detalle` (
  `id_param_det` smallint(2) NOT NULL,
  `id_param_enc` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `resumen` char(5) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `n_iconos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `param_detalle`
--

INSERT INTO `param_detalle` (`id_param_det`, `id_param_enc`, `nombre`, `resumen`, `estado`, `fecha_crea`, `usuario_crea`, `n_iconos`) VALUES
(1, 1, 'Cedula de Ciudadania', 'CC', 'A', '2023-02-25 02:14:50', 2, ''),
(2, 1, 'Numero de Identificacion Tributaria', 'NIT', 'A', '2023-02-25 02:15:24', 2, ''),
(3, 2, 'Celular', 'Cel', 'A', '2023-02-25 16:51:15', 2, ''),
(4, 2, 'Fijo', 'Fijo', 'A', '2023-02-25 16:51:15', 2, ''),
(5, 3, 'Cliente', 'C', 'A', '2023-02-28 14:01:11', 2, ''),
(6, 3, 'Trabajador', 'T', 'A', '2023-02-28 14:01:48', 2, ''),
(7, 3, 'Usuario', 'Us', 'A', '2023-02-28 15:54:58', 2, ''),
(8, 3, 'Proveedor', 'Pro', 'A', '2023-02-28 16:17:00', 2, ''),
(9, 4, 'Insumo', 'In', 'A', '2023-02-28 16:27:24', 2, ''),
(10, 4, 'Repuesto', 'Re', 'A', '2023-02-28 16:27:24', 2, ''),
(11, 5, 'Entrada - Insumo', 'En', 'A', '2023-02-28 16:39:02', 2, ''),
(12, 5, 'Salida - Insumo', 'Sa', 'A', '2023-02-28 16:39:02', 2, ''),
(26, 10, 'Brocas', 'Br', 'A', '2023-03-02 15:06:41', 2, 'brocas.png'),
(28, 10, 'Baterias', 'Bat', 'A', '2023-03-02 15:06:41', 2, 'baterias.png'),
(29, 10, 'Bombilleria', 'Bom', 'A', '2023-03-02 15:06:41', 2, 'bombillerias.png'),
(30, 10, 'Discos', 'Ds', 'A', '2023-03-02 15:06:41', 2, 'discos.png'),
(31, 10, 'Aceites', 'Ac', 'A', '2023-03-02 15:06:41', 2, 'aceites.png'),
(32, 10, 'Pintura', 'Pt', 'A', '2023-03-02 15:06:41', 2, 'pinturas.png'),
(33, 11, '1/4', '1/4', 'A', '2023-04-19 13:36:59', 2, ''),
(34, 11, '1/2', '1/2', 'A', '2023-04-19 13:36:59', 2, ''),
(35, 11, '3/4', '3/4', 'A', '2023-04-19 13:36:59', 2, ''),
(36, 11, '1', '1', 'A', '2023-04-19 13:36:59', 2, ''),
(37, 12, 'En Proceso', 'EP', 'A', '2023-04-19 13:54:17', 2, ''),
(38, 12, 'Entregado', 'E', 'A', '2023-04-19 13:54:17', 2, ''),
(39, 12, 'Garantía', 'G', 'A', '2023-04-19 13:54:17', 2, ''),
(40, 12, 'Perdida Total', 'PT', 'A', '2023-04-19 13:54:17', 2, ''),
(41, 12, 'Pte Autorización', 'PA', 'A', '2023-04-19 13:54:17', 2, ''),
(42, 12, 'Pte Cotización', 'PC', 'A', '2023-04-19 13:54:17', 2, ''),
(43, 12, 'Pte Retiro', 'PR', 'A', '2023-04-19 13:54:17', 2, ''),
(44, 12, 'Pte Repuesto', 'PR', 'A', '2023-04-19 13:54:17', 2, ''),
(45, 12, 'En Taller', 'ET', 'A', '2023-04-19 13:54:17', 2, ''),
(51, 10, 'Remaches', '', 'A', '2023-04-27 14:37:03', 2, 'remaches.png'),
(52, 10, 'Lubricantes', '', 'A', '2023-04-27 14:40:52', 2, 'lubricantes.png'),
(54, 10, 'Otros', 'Lt', 'A', '2023-03-02 15:06:41', 2, 'mas.png'),
(56, 3, 'Aliado', 'Ali', 'A', '2023-05-08 14:45:52', 3, ''),
(57, 5, 'Entrada - Vehiculo', 'EnVe', 'A', '2023-05-12 14:00:57', 3, ''),
(58, 5, 'Salida - Vehiculo', 'SaVe', 'A', '2023-05-12 14:01:15', 3, ''),
(59, 5, 'Cambio de Estado - Vehiculo', 'CEV', 'A', '2023-05-12 15:30:51', 3, ''),
(60, 14, 'Estante', 'Est', 'A', '2023-05-18 18:00:42', 3, ''),
(61, 14, 'Bodega', 'Bod', 'A', '2023-05-18 18:00:42', 3, 'bodega.png'),
(64, 15, 'Pendiente', 'Pen', 'A', '2023-06-08 15:02:38', 2, ''),
(65, 15, 'Aceptado', 'Acep', 'A', '2023-06-08 15:02:38', 2, ''),
(66, 15, 'Denegado', 'Dene', 'A', '2023-06-08 15:02:38', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_encabezado`
--

CREATE TABLE `param_encabezado` (
  `id_param_enc` smallint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `param_encabezado`
--

INSERT INTO `param_encabezado` (`id_param_enc`, `nombre`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Tipo de Documento', 'A', '2023-03-01 12:47:55', 2),
(2, 'Tipo de Telefono', 'A', '2023-03-01 12:48:00', 2),
(3, 'Tipo de Usuario', 'A', '2023-03-01 12:48:06', 2),
(4, 'Tipo de Material', 'A', '2023-03-01 12:48:12', 2),
(5, 'Tipo de movimiento', 'A', '2023-02-28 16:38:00', 2),
(10, 'Categoria', 'A', '2023-03-02 14:53:42', 2),
(11, 'Nivel Combustible', 'A', '2023-04-19 13:33:12', 2),
(12, 'Estado Vehiculo', 'A', '2023-04-19 13:45:35', 2),
(14, 'Tipo Estante', 'A', '2023-05-18 17:59:57', 2),
(15, 'Tipo Validacion', 'A', '2023-06-08 14:59:39', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` smallint(2) NOT NULL,
  `id_rol` smallint(2) NOT NULL,
  `id_accion` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo \r\n',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `id_rol`, `id_accion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 2, 1, 'A', '2023-02-25 01:52:55', 2),
(2, 2, 4, 'A', '2023-03-02 14:25:34', 2),
(3, 1, 5, 'A', '2023-03-02 14:19:21', 2),
(4, 1, 6, 'A', '2023-03-02 14:24:53', 2),
(5, 1, 7, 'A', '2023-03-02 14:24:53', 2),
(6, 1, 8, 'A', '2023-03-02 14:24:53', 2),
(7, 1, 9, 'A', '2023-03-02 14:24:53', 2),
(8, 1, 10, 'A', '2023-03-02 14:24:53', 2),
(9, 1, 11, 'A', '2023-03-02 14:24:53', 2),
(10, 1, 12, 'A', '2023-03-02 14:24:53', 2),
(11, 1, 13, 'A', '2023-03-02 14:24:53', 2),
(12, 1, 14, 'A', '2023-03-02 14:24:53', 2),
(13, 1, 15, 'A', '2023-03-02 14:24:53', 2),
(14, 1, 16, 'A', '2023-03-02 14:24:53', 2),
(15, 1, 17, 'A', '2023-03-02 14:24:53', 2),
(16, 1, 18, 'A', '2023-03-02 14:24:53', 2),
(17, 1, 19, 'A', '2023-03-02 14:24:53', 2),
(18, 1, 20, 'A', '2023-03-02 14:24:53', 2),
(19, 2, 2, 'A', '2023-03-02 14:27:34', 2),
(20, 2, 3, 'A', '2023-03-02 14:27:34', 2),
(21, 3, 21, 'A', '2023-03-02 14:32:02', 2),
(22, 3, 22, 'A', '2023-03-02 14:32:02', 2),
(23, 3, 23, 'A', '2023-03-02 14:32:02', 2),
(24, 3, 24, 'A', '2023-03-02 14:32:02', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id_peticion` smallint(2) NOT NULL,
  `emisor` smallint(2) NOT NULL,
  `receptor` smallint(2) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `msg_emisor` text NOT NULL,
  `msg_receptor` text DEFAULT NULL,
  `tipo_validacion` smallint(2) NOT NULL DEFAULT 64,
  `visto` char(1) DEFAULT NULL,
  `fecha_envio_pet` date NOT NULL,
  `fecha_res_pet` date DEFAULT NULL,
  `hora_envio_pet` time NOT NULL,
  `hora_res_pet` time DEFAULT NULL,
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id_peticion`, `emisor`, `receptor`, `asunto`, `msg_emisor`, `msg_receptor`, `tipo_validacion`, `visto`, `fecha_envio_pet`, `fecha_res_pet`, `hora_envio_pet`, `hora_res_pet`, `usuario_crea`, `fecha_crea`) VALUES
(1, 31, 0, 'Cambiar el nombre de insumo broca 12', 'me equivoque y puse el nombre de la broca 3', NULL, 64, NULL, '2023-06-28', NULL, '22:12:33', NULL, 31, '2023-06-29 03:12:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id_propietario` smallint(2) NOT NULL,
  `id_vehiculo` smallint(2) NOT NULL,
  `id_tercero` smallint(2) NOT NULL,
  `tipo_propietario` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id_propietario`, `id_vehiculo`, `id_tercero`, `tipo_propietario`) VALUES
(1, 1, 5, 56),
(2, 2, 6, 5),
(7, 3, 8, 5),
(15, 4, 4, 5),
(16, 5, 7, 56),
(17, 6, 8, 5),
(18, 7, 20, 5),
(19, 8, 5, 56),
(20, 9, 8, 5),
(21, 10, 8, 5),
(22, 11, 5, 56),
(23, 12, 16, 56),
(24, 13, 6, 5),
(25, 14, 5, 56),
(26, 15, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` smallint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Torre de Control', 'Este rol podra ejecutar las acciones basicas de todo el sistema, tales como Crear(Clientes, Vehiculos, Trabajadores, Proveedores), Editar (Clientes, Vehiculos, Trabajadores, Proveedores), Eliminar (Cl', 'A', '2023-03-01 16:01:19', 2),
(2, 'Super Administrador', 'Superadministra todo', 'A', '2023-05-16 13:04:34', 2),
(3, 'Almacenista', 'Almacena el almacen', 'A', '2023-02-25 00:44:40', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id_telefono` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `tipo_telefono` smallint(2) NOT NULL,
  `tipo_usuario` smallint(2) NOT NULL,
  `prioridad` char(1) NOT NULL COMMENT 'P = Primaria - S = Secundaria',
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id_telefono`, `id_usuario`, `numero`, `tipo_telefono`, `tipo_usuario`, `prioridad`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 2, '3012911437', 3, 5, 'P', 'A', '2023-02-28 14:52:57', 2),
(2, 1, '3012918888', 3, 6, 'P', 'A', '2023-05-25 16:31:03', 21),
(4, 4, '3135604242', 3, 7, 'P', 'A', '2023-04-27 17:29:20', 4),
(7, 7, '3000012312', 3, 7, 'P', 'A', '2023-05-03 18:27:47', 1),
(8, 8, '3333', 3, 7, 'P', 'A', '2023-05-03 18:29:36', 1),
(9, 9, '13123123', 3, 7, 'S', 'A', '2023-05-03 18:30:21', 1),
(10, 10, '13123123', 3, 7, 'S', 'A', '2023-05-03 18:30:21', 1),
(11, 11, '122133', 3, 7, 'P', 'A', '2023-05-03 18:33:20', 1),
(12, 12, '122133', 3, 7, 'P', 'A', '2023-05-03 18:33:20', 1),
(13, 13, '333333', 3, 7, 'P', 'A', '2023-05-03 18:36:12', 1),
(14, 14, '333333', 3, 7, 'P', 'A', '2023-05-03 18:36:12', 1),
(15, 15, '231333', 3, 7, 'P', 'A', '2023-05-08 13:48:16', 1),
(17, 16, '31233', 3, 7, 'S', 'A', '2023-05-04 18:25:47', 1),
(19, 16, '123533', 3, 7, 'S', 'A', '2023-05-04 14:08:34', 1),
(21, 16, '11', 3, 7, 'P', 'A', '2023-05-04 19:14:21', 1),
(23, 1, '12', 3, 7, 'P', 'A', '2023-06-08 12:44:34', 22),
(24, 17, '123', 3, 7, 'P', 'A', '2023-05-04 21:13:52', 1),
(25, 18, '3332', 3, 7, 'S', 'A', '2023-05-10 13:32:29', 4),
(26, 6, '132132', 3, 5, 'P', 'A', '2023-06-13 15:50:27', 1),
(30, 4, '1234564567', 3, 5, 'P', 'A', '2023-06-28 00:39:55', 22),
(31, 19, '1111', 3, 7, 'P', 'A', '2023-05-18 20:52:25', 1),
(32, 8, '123', 3, 5, 'P', 'A', '2023-05-29 15:08:38', 22),
(33, 9, '2423', 3, 56, 'P', 'A', '2023-05-25 18:00:04', 19),
(35, 21, '33333', 3, 7, 'P', 'A', '2023-06-07 13:22:00', 22),
(36, 22, '3012911437', 3, 7, 'P', 'A', '2023-06-02 14:24:40', 22),
(37, 23, '32412', 3, 7, 'P', 'A', '2023-05-29 15:55:22', 21),
(38, 2, '23423', 3, 6, 'P', 'A', '2023-05-25 18:50:17', 21),
(39, 10, '30129114', 3, 5, 'P', 'A', '2023-05-25 19:48:15', 22),
(40, 10, '56454', 3, 5, 'S', 'A', '2023-05-25 20:30:59', 22),
(41, 11, '30544888', 3, 5, 'P', 'A', '2023-05-25 20:47:07', 22),
(42, 12, '798456', 3, 5, 'P', 'A', '2023-05-25 20:57:55', 22),
(43, 13, '6978412', 3, 5, 'P', 'A', '2023-05-25 21:00:19', 22),
(44, 3, '234233', 3, 6, 'P', 'A', '2023-05-25 21:45:44', 21),
(45, 4, '234', 3, 6, 'P', 'A', '2023-05-25 21:47:09', 21),
(46, 14, '547656', 4, 5, 'P', 'A', '2023-05-25 21:48:07', 22),
(47, 15, '852147', 3, 5, 'P', 'A', '2023-05-25 21:49:20', 22),
(48, 16, '1111', 3, 56, 'P', 'A', '2023-05-25 21:49:54', 21),
(49, 17, '5463456', 3, 8, 'P', 'A', '2023-05-26 17:51:47', 22),
(51, 18, '61579429', 3, 5, 'P', 'A', '2023-05-26 18:16:16', 22),
(52, 19, '12312', 3, 56, 'P', 'A', '2023-05-26 18:31:12', 21),
(53, 24, '3014904556', 3, 7, 'P', 'A', '2023-05-29 15:55:05', 21),
(54, 1, '4563456', 4, 8, 'P', 'A', '2023-05-29 20:06:59', 22),
(55, 20, '789456', 3, 5, 'P', 'A', '2023-05-29 20:10:03', 22),
(56, 3, '43645', 3, 8, 'P', 'A', '2023-05-31 17:22:47', 22),
(57, 25, '35794156', 3, 7, 'P', 'A', '2023-06-01 18:35:54', 20),
(58, 26, '7564895', 3, 7, 'P', 'A', '2023-06-01 18:37:47', 20),
(59, 27, '456189', 3, 7, 'P', 'A', '2023-06-01 19:50:40', 22),
(60, 28, '3245345', 3, 7, 'P', 'A', '2023-06-01 19:54:09', 22),
(61, 29, '654645', 3, 7, 'P', 'A', '2023-06-01 20:00:25', 22),
(62, 30, '159753', 3, 7, 'P', 'A', '2023-06-05 18:32:50', 22),
(63, 31, '67867876', 3, 7, 'P', 'A', '2023-06-18 02:56:42', 22),
(64, 32, '56546', 3, 7, 'P', 'A', '2023-06-05 19:38:37', 30),
(65, 33, '3014904554', 3, 7, 'P', 'A', '2023-06-06 17:45:58', 20),
(66, 34, '4353453', 3, 7, 'P', 'A', '2023-06-06 20:18:20', 22),
(67, 35, '159789', 3, 7, 'P', 'A', '2023-06-06 15:26:22', 35),
(68, 21, '56547567', 3, 8, 'P', 'A', '2023-06-07 18:02:55', 22),
(69, 5, '123333', 3, 56, 'P', 'A', '2023-06-07 18:49:43', 1),
(70, 22, '3012911438', 3, 5, 'P', 'A', '2023-06-27 06:27:32', 22),
(71, 23, '1234567894', 3, 5, 'P', 'A', '2023-06-27 06:29:45', 22),
(72, 24, '7894566123', 3, 5, 'P', 'A', '2023-06-27 06:31:27', 22),
(73, 25, '1234567899', 3, 5, 'P', 'A', '2023-06-27 06:39:27', 22),
(74, 26, '1234564564', 3, 5, 'P', 'A', '2023-06-27 06:44:11', 22),
(75, 22, '1597894564', 4, 5, 'S', 'A', '2023-06-27 07:03:38', 22),
(76, 27, '5465473676', 3, 8, 'P', 'A', '2023-06-29 05:28:25', 22),
(77, 28, '5657657653', 3, 8, 'P', 'A', '2023-06-29 05:29:36', 22),
(78, 29, '6547357653', 3, 8, 'P', 'A', '2023-06-29 05:31:02', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `id_tercero` smallint(2) NOT NULL,
  `tipo_doc` smallint(2) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `n_identificacion` varchar(15) NOT NULL,
  `nombre_p` varchar(30) DEFAULT NULL,
  `nombre_s` varchar(30) DEFAULT NULL,
  `apellido_p` varchar(30) DEFAULT NULL,
  `apellido_s` varchar(30) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `tipo_tercero` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`id_tercero`, `tipo_doc`, `razon_social`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `direccion`, `tipo_tercero`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 2, 'CTUSPRO', '123456', '', '', '', '', 'Calle 34', 8, 'A', '0000-00-00 00:00:00', 22),
(2, 2, 'AUTECO', '9012494137', NULL, NULL, NULL, NULL, 'VIA LAS PALMAS KM 15 750 LC L 104VIA LAS PALMAS KM 15 750 LC L 104', 8, 'A', '2023-03-02 11:08:57', 2),
(3, 2, 'Sie De Colombia S A E S P', '830095452-4', NULL, NULL, NULL, NULL, 'CALLE 35 SUR 34 D 21, BOGOTA, BOGOTA, COLOMBIA', 8, 'A', '2023-03-02 11:11:50', 22),
(4, 1, '', '1044678854', 'Moises', 'David', 'Mazo', 'Solano', 'carrera18a68b', 5, 'A', '2023-05-02 13:20:40', 22),
(5, 2, 'Colpatria', '7898755', NULL, NULL, NULL, NULL, 'c', 56, 'A', '2023-05-02 13:20:47', 0),
(6, 1, '', '789456', 'Yuleidis', 'Paola', 'Avilez', 'Monterroza', 'Calle', 5, 'A', '2023-05-09 08:04:35', 1),
(7, 2, 'Renting', '123123', NULL, NULL, NULL, NULL, 'calle 76', 56, 'A', '2023-05-16 13:16:24', 0),
(9, 2, 'Prueba', '1245', NULL, NULL, NULL, NULL, 'calle2', 56, 'I', '2023-05-25 13:00:04', 0),
(14, 1, '', '468', 'ARGARE', 'REGAER', 'GERRE', 'ERGER', 'DFHG', 5, 'A', '2023-05-25 16:48:07', 22),
(16, 2, 'pruebaa', '2222222222', NULL, NULL, NULL, NULL, 'calle', 56, 'A', '2023-05-25 16:49:54', 0),
(17, 2, 'hfgh', '5645', NULL, NULL, NULL, NULL, 'gntyj', 8, 'I', '2023-05-26 12:51:47', 22),
(18, 1, '', '159753', 'ky', 'many', 'west', 'este', 'callelocooo', 5, 'A', '2023-05-26 13:16:16', 22),
(19, 2, 'dsdasd', '123', NULL, NULL, NULL, NULL, 'qwedqwsadasd', 56, 'I', '2023-05-26 13:31:12', 0),
(20, 1, '', '1597875', 'wasa', 'uva', 'uva', 'wasa', 'wasawasa', 5, 'A', '2023-05-29 15:10:03', 22),
(21, 2, 'COLETO', '1597865', NULL, NULL, NULL, NULL, 'calle colcodeco', 8, 'A', '2023-06-07 13:02:54', 22),
(22, 1, '', '1044610550', 'Isabella', 'Canelita', 'Collante ', 'Mendez', 'cra16a68b', 5, 'A', '2023-06-27 01:27:31', 22),
(26, 1, '', '658476876', 'yjfuykjuyf', 'kuykruy', 'krulkuyk', 'ryukru7yk', 'kruylkryit', 5, 'I', '2023-06-27 01:44:11', 22),
(27, 2, 'colectivo', '546789789879879', NULL, NULL, NULL, NULL, 'caerra de mi corazon', 8, 'A', '2023-06-29 00:28:25', 22),
(28, 2, 'jaja peni', '545646456', NULL, NULL, NULL, NULL, 'jaja tonta', 8, 'A', '2023-06-29 00:29:36', 22),
(29, 2, 'DARWINISTA', '78646545465', NULL, NULL, NULL, NULL, 'HDUFYUYFRE', 8, 'A', '2023-06-29 00:31:02', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_marca`
--

CREATE TABLE `tipo_marca` (
  `id_marca` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `marca` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_marca`
--

INSERT INTO `tipo_marca` (`id_marca`, `nombre`, `marca`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Chevrolet Spark', 1, 'A', '2023-06-14 19:02:41', 2),
(2, 'Audi', 2, 'A', '2023-06-14 16:04:52', 2),
(3, 'BMW', 3, 'A', '2023-06-14 16:04:55', 2),
(4, 'Dacia', 4, 'A', '2023-06-14 16:04:58', 2),
(5, 'Ferrari', 5, 'A', '2023-06-14 16:05:01', 2),
(6, 'Ford', 6, 'A', '2023-06-14 16:05:03', 2),
(7, 'Honda', 7, 'A', '2023-06-14 16:05:06', 2),
(8, 'Hyundai', 8, 'A', '2023-06-14 16:05:09', 2),
(9, 'Infiniti', 9, 'A', '2023-06-14 16:05:13', 2),
(10, 'Jeep', 10, 'A', '2023-06-14 16:05:15', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` smallint(2) NOT NULL,
  `id_cargo` smallint(2) NOT NULL,
  `tipo_identificacion` smallint(2) NOT NULL,
  `n_identificacion` varchar(15) NOT NULL,
  `nombre_p` varchar(30) NOT NULL,
  `nombre_s` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_s` varchar(30) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `id_cargo`, `tipo_identificacion`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `direccion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'A', '2023-05-25 16:31:02', 21),
(2, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'I', '2023-05-25 14:00:28', 21),
(3, 1, 1, '22222', 'prueba', 'ewre', 'asdd', 'dfdfd', 'calle', 'A', '2023-05-25 21:45:43', 21),
(4, 1, 1, '11111', 'prueba', '', 'asdas', 'asd', 'call', 'A', '2023-05-25 16:47:32', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(2) NOT NULL,
  `id_rol` smallint(2) NOT NULL,
  `tipo_doc` smallint(2) NOT NULL,
  `n_identificacion` varchar(15) NOT NULL,
  `nombre_p` varchar(30) NOT NULL,
  `nombre_s` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_s` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `foto` varchar(200) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `contrasena` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `tipo_doc`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `estado`, `foto`, `fecha_crea`, `contrasena`) VALUES
(1, 1, 1, '123123', 'Moises', 'David', 'Mazo', 'Solano', 'A', '', '2023-02-25 01:10:22', '$2y$10$Eq87siPIKlzNB3TOFyiSeu04MxWKqFOiVDnwxgxnMjZqy9ANLOxxS'),
(19, 3, 1, '147852', 'Primer', '', 'Almacenista', 'Prueba', 'A', '', '2023-05-16 18:04:18', '$2y$10$gtDjmIRxOPMrVC7lcIsMWefCUBpVpt63/Ax.0TDWNZSF0shiLbtpK'),
(20, 1, 1, '1043436814', 'Yuleidis', '', 'Avilez', 'Monterroza', 'A', '', '2023-05-25 18:02:10', '$2y$10$UKOUUE6KkVxDVCCCrRvZBevJhNGxre39aWtL7rK8E5oFsVx7fYVM2'),
(21, 1, 1, '1044606952', 'Juan ', '', 'Padilla', 'Salcedo', 'A', '', '2023-05-25 18:05:08', '$2y$10$d00tYv.yBSmuC679LsnroO0y6OTJcR.bJoulGPjHMYIjHqd2bzXTe'),
(22, 1, 1, '1044610050', 'Isabella ', 'Canelitx', 'Collante', 'Mendez', 'A', 'fotoUser/22Isabella .png', '2023-05-25 18:05:18', '$2y$10$tQYsCLOsEj9VBtHfHslkqe51oMEl2jkbS2tJty/Z8vNeKILopQ0Cy'),
(23, 3, 1, '1044605537', 'Shadia', 'MARGARITA', 'Rangel', 'Pedrozo', 'A', '', '2023-05-25 18:07:51', '$2y$10$0IkUVov6wnuuck8IPSmnVufGGMLlmgr96bFlLLrpu1jF67o202wPS'),
(24, 3, 1, '147852', 'Yule', 'Almacen', 'avilez', 'monterroza', 'A', 'fotoUser/24Yule_2.png', '2023-05-29 18:00:36', '$2y$10$MxBOjvHVD8YbtuFJ8JUaiuDaODhmpsLl7YiAQUvIi0gDC81FZWwOy'),
(25, 1, 1, '15978645', 'metro', 'bomin', 'yoooo', 'nigga', 'A', '', '2023-06-01 18:35:54', '$2y$10$x75wkoAn2jASJKflA7BBcu/tzkumMjo0spC9.Ej2Elg2zH.wmJ6F6'),
(26, 1, 1, '312649875', 'traza', 'que', 'tyga', 'kylie', 'I', '', '2023-06-01 18:37:47', '$2y$10$9m3uM0F0klncShzknGZIoezC2O0an9tPHm3L2A9.ZkoStbdOB/lGu'),
(27, 1, 1, '1697534', 'kenye', 'what', 'west', 'lights', 'I', '', '2023-06-01 19:50:40', '$2y$10$k67XbqBw9SJq9v2Id7b.Z.7MTfngD0XIoptmhSusmObtLQLQUHlDy'),
(28, 1, 1, '4543', 'rgre', 'rher', 'rhte', 'tht', 'I', '', '2023-06-01 19:54:09', '$2y$10$c4i9O8ZI.LsZck/SLCzr7.rn5D5.eAB4L.TbBDRfr8L7K/XcU2eYa'),
(29, 1, 1, '4634', 'hsdhf', 'gjhsftj', 'sgjsg', 'gfjf', 'I', '', '2023-06-01 20:00:24', '$2y$10$SUM9PTCRGMeNkpsKPDOWee8tQDae285qvAPWQE1z5K/ATGqfdY4c.'),
(30, 1, 1, '123456', 'pruebalmacetrdtrd', 'numero', 'idk', 'muchas', 'A', '', '2023-06-05 18:32:50', '$2y$10$kzlMVcuARTIG/yd5IWO3sOLJ3FcWRShz2KkFuXpFUdmI7zmn17tHq'),
(31, 3, 1, '123456789', 'isa', 'almacenista', 'ver', 'foto', 'A', '', '2023-06-05 18:54:17', '$2y$10$e6ue8k.xgfK/cPP2wyoWl.5lBD7hg89dpP9kfbxZKuKSf7kPNqp/S'),
(32, 1, 1, '67567', 'ujgyjm', 'ujkm,y', 'tykm', 'ukry', 'I', '', '2023-06-05 19:38:37', '$2y$10$1sXprncgCJaykhfUe9Brx./lifMA7wkwIUFBAeYHoU0Y.Ox7NEGoO'),
(33, 1, 1, '123456780', 'lalalalal', 'lallalalal', 'lalalalalla', 'lalalalalal', 'I', 'fotoUser/0lalalalal.png', '2023-06-06 17:45:58', '$2y$10$xysj4NdxCZu4r8B7ElYVa.9PYi4bxj73EUsd0EYRe2mqmN11T5qCW'),
(34, 1, 1, '56456', 'fghsth', 'hsdh', 'fdhdh', 'dhgsgdh', 'I', '', '2023-06-06 20:18:20', '$2y$10$l1YLfHxC6WPW/t8JXbVw6OClqzaG1bPy9acQIjGIcWmAXtlC9xFZa'),
(35, 2, 1, '1234566', 'barbie', 'fashionista', 'bum', 'baia', 'I', 'descarga.png', '2023-06-06 20:24:33', '$2y$10$bX52kA5ckLQMP9UeG2d28eF6BrcmJwQoJB0K2vxtSQ3bwsgi3XCzC'),
(36, 3, 1, '1231231', 'Nuevo', '', 'Usuario', 'Prueva', 'I', 'fotoUser/default.png', '2023-06-07 20:38:04', '$2y$10$mVMFZJ.IXAUb.qeljs3BkOgEwXfCpkkckqBu6lnnfm9vtfZS8dMi6'),
(37, 1, 1, '33123', 'qwe', '', 'qwe', 'qwe', 'I', 'fotoUser/default.png', '2023-06-07 20:43:19', '$2y$10$MPDlSHrR9tEtS7RNlhLqieC0Eh76esvPlWKLKEErJEzYZKGXQCFya'),
(38, 1, 1, '31231', 'edc', '', 'edc', 'edc', 'I', 'fotoUser/default.png', '2023-06-07 20:50:09', '$2y$10$9Tr39exvEmfaQlyEXJa4ye6LRk0hZ1mxkuTxrN5/6TJCV4PBslNEW'),
(39, 1, 1, '15978964', 'prueba', 'para', 'telefono', 'correo', 'I', 'fotoUser/0prueba.png', '2023-06-07 21:06:11', '$2y$10$S7XEZdoI9WjXXqA0pyr3y.7N995vjXRQRtCyvyYf9PliCUc0HeRtO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` smallint(2) NOT NULL,
  `id_marca` smallint(2) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `linea` varchar(20) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `color` varchar(15) NOT NULL,
  `n_combustible` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `id_marca`, `placa`, `linea`, `modelo`, `color`, `n_combustible`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 'QWE133', '', '2017', 'Rojo', 34, 'A', '2023-05-29 20:36:20', 1),
(2, 10, 'MOI123', '', '2018', 'Rojo', 33, '3', '2023-05-29 21:01:58', 1),
(3, 1, 'PIO489', '', '2020', 'Amarillo', 35, 'A', '2023-05-31 20:09:55', 20),
(4, 3, 'QWE111', '', '2021', 'Rojo Mate', 34, 'A', '2023-06-02 18:01:59', 1),
(5, 5, 'TRY345', '', '2018', 'Amarillo', 35, 'A', '2023-06-02 18:03:50', 1),
(6, 3, 'OIU333', '', '2020', 'Verde', 36, 'A', '2023-06-02 18:06:46', 1),
(7, 1, 'POI333', '', '2021', 'Salmon', 34, 'A', '2023-06-02 18:10:36', 1),
(8, 4, 'MOI333', '', '2020', 'Gris', 35, 'A', '2023-06-02 18:13:22', 1),
(9, 8, 'QWE147', '', '2022', 'Rojo', 35, 'A', '2023-06-02 18:25:18', 1),
(10, 3, 'DEO122', '', '2025', 'aZUL', 36, 'A', '2023-06-02 18:39:11', 1),
(11, 1, 'WSD222', '', '2020', 'Esmeralda', 34, 'A', '2023-06-02 19:39:13', 1),
(12, 4, 'POL741', '', '2012', 'Lila', 34, 'A', '2023-06-02 19:56:16', 1),
(13, 3, 'POL333', '', '2020', 'Oros', 33, 'A', '2023-06-02 20:04:26', 1),
(14, 3, 'LOL159', '', '2021', 'Azul', 33, 'A', '2023-06-02 20:08:02', 1),
(15, 3, 'ILO333', '', '2020', 'Azul', 35, 'A', '2023-06-02 20:10:30', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_param_det`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_param_det` (
`id_param_det` smallint(2)
,`id_param_enc` smallint(2)
,`nombre` varchar(50)
,`resumen` char(5)
,`estado` char(1)
,`fecha_crea` timestamp
,`usuario_crea` smallint(2)
,`n_iconos` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_param_det2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_param_det2` (
`id_param_det` smallint(2)
,`id_param_enc` smallint(2)
,`nombre` varchar(50)
,`resumen` char(5)
,`estado` char(1)
,`fecha_crea` timestamp
,`usuario_crea` smallint(2)
,`n_iconos` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_usuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_usuarios` (
`id_usuario` smallint(2)
,`id_rol` smallint(2)
,`tipo_doc` smallint(2)
,`n_identificacion` varchar(15)
,`nombre_p` varchar(30)
,`nombre_s` varchar(30)
,`apellido_p` varchar(30)
,`apellido_s` varchar(30)
,`estado` char(1)
,`foto` varchar(200)
,`fecha_crea` timestamp
,`contrasena` varchar(300)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_param_det`
--
DROP TABLE IF EXISTS `vw_param_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_param_det`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_param_det2`
--
DROP TABLE IF EXISTS `vw_param_det2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_param_det2`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_usuarios`
--
DROP TABLE IF EXISTS `vw_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, `usuarios`.`id_rol` AS `id_rol`, `usuarios`.`tipo_doc` AS `tipo_doc`, `usuarios`.`n_identificacion` AS `n_identificacion`, `usuarios`.`nombre_p` AS `nombre_p`, `usuarios`.`nombre_s` AS `nombre_s`, `usuarios`.`apellido_p` AS `apellido_p`, `usuarios`.`apellido_s` AS `apellido_s`, `usuarios`.`estado` AS `estado`, `usuarios`.`foto` AS `foto`, `usuarios`.`fecha_crea` AS `fecha_crea`, `usuarios`.`contrasena` AS `contrasena` FROM `usuarios` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id_accion`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `estanteria`
--
ALTER TABLE `estanteria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `filas`
--
ALTER TABLE `filas`
  ADD PRIMARY KEY (`id_fila`),
  ADD KEY `id_estante` (`id_estante`);

--
-- Indices de la tabla `inv_orden`
--
ALTER TABLE `inv_orden`
  ADD PRIMARY KEY (`id_inv_orden`);

--
-- Indices de la tabla `marca_vehiculo`
--
ALTER TABLE `marca_vehiculo`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `tipo_material` (`tipo_material`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `categoria_material` (`categoria_material`),
  ADD KEY `estante` (`estante`),
  ADD KEY `id_vehiculo` (`id_orden`);

--
-- Indices de la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  ADD PRIMARY KEY (`id_movimientodet`),
  ADD KEY `enc_detalle` (`id_movimientoenc`),
  ADD KEY `material_det` (`id_material`);

--
-- Indices de la tabla `movimiento_enc`
--
ALTER TABLE `movimiento_enc`
  ADD PRIMARY KEY (`id_movimientoenc`),
  ADD KEY `tercero_enc` (`id_tercero`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `ordenes_servicio`
--
ALTER TABLE `ordenes_servicio`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `param_detalle`
--
ALTER TABLE `param_detalle`
  ADD PRIMARY KEY (`id_param_det`) USING BTREE,
  ADD KEY `id_param_enc` (`id_param_enc`);

--
-- Indices de la tabla `param_encabezado`
--
ALTER TABLE `param_encabezado`
  ADD PRIMARY KEY (`id_param_enc`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_accion` (`id_accion`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id_peticion`),
  ADD KEY `emisor` (`emisor`),
  ADD KEY `receptor` (`receptor`),
  ADD KEY `tipo_validacion` (`tipo_validacion`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id_propietario`),
  ADD KEY `tercero_propietario` (`id_tercero`),
  ADD KEY `vehiculo_propietario` (`id_vehiculo`),
  ADD KEY `tipo_tercero` (`tipo_propietario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_telefono`),
  ADD KEY `tipo_telefono` (`tipo_telefono`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`id_tercero`) USING BTREE,
  ADD KEY `tipo_doc` (`tipo_doc`) USING BTREE,
  ADD KEY `tipo_tercero` (`tipo_tercero`);

--
-- Indices de la tabla `tipo_marca`
--
ALTER TABLE `tipo_marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD KEY `tipo_identificacion` (`tipo_identificacion`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `tipo_doc` (`tipo_doc`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `n_combustible` (`n_combustible`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id_accion` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `email`
--
ALTER TABLE `email`
  MODIFY `id_email` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `filas`
--
ALTER TABLE `filas`
  MODIFY `id_fila` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `inv_orden`
--
ALTER TABLE `inv_orden`
  MODIFY `id_inv_orden` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `marca_vehiculo`
--
ALTER TABLE `marca_vehiculo`
  MODIFY `id_marca` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  MODIFY `id_movimientodet` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimiento_enc`
--
ALTER TABLE `movimiento_enc`
  MODIFY `id_movimientoenc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordenes_servicio`
--
ALTER TABLE `ordenes_servicio`
  MODIFY `id_orden` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `param_detalle`
--
ALTER TABLE `param_detalle`
  MODIFY `id_param_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `param_encabezado`
--
ALTER TABLE `param_encabezado`
  MODIFY `id_param_enc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id_peticion` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id_propietario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `id_tercero` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tipo_marca`
--
ALTER TABLE `tipo_marca`
  MODIFY `id_marca` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `filas`
--
ALTER TABLE `filas`
  ADD CONSTRAINT `id_estante` FOREIGN KEY (`id_estante`) REFERENCES `estanteria` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  ADD CONSTRAINT `enc_detalle` FOREIGN KEY (`id_movimientoenc`) REFERENCES `movimiento_enc` (`id_movimientoenc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
