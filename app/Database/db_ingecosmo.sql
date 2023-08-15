-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2023 a las 02:36:22
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
(26, 1, 'jual1010@gmail.', 'P', 7, 'A', '2023-06-15 14:43:27', 1),
(27, 17, 'juanlm1120@gmail.com', 'S', 7, 'A', '2023-05-04 21:13:52', 1),
(28, 18, 'juanlm10@gmail.co', 'P', 7, 'A', '2023-05-12 12:26:31', 4),
(29, 18, 'asdsd@gmail.com', 'S', 7, 'A', '2023-05-11 14:15:50', 4),
(33, 4, 'adasd', 'P', 5, 'A', '2023-05-18 05:58:16', 1),
(34, 19, 'juanlm11120@gmail.com', 'P', 7, 'A', '2023-06-23 13:16:35', 20),
(35, 8, 'uvawasa', 'P', 5, 'A', '2023-05-29 15:09:00', 22),
(36, 9, 'sdfsd@sdf', 'P', 56, 'A', '2023-05-25 18:00:04', 19),
(38, 21, 'juan@gmail', 'P', 7, 'A', '2023-07-25 13:35:04', 21),
(39, 22, 'colli@gmail.com', 'P', 7, 'A', '2023-06-02 14:24:40', 22),
(40, 23, 'holii@gmail', 'P', 7, 'A', '2023-05-29 15:55:23', 21),
(41, 2, 'asda@asddd', 'P', 6, 'A', '2023-07-26 14:11:57', 1),
(42, 10, 'joaaaaaaa@', 'P', 5, 'A', '2023-05-25 19:48:15', 22),
(43, 10, 'dyufgskufg@', 'S', 5, 'A', '2023-05-25 20:30:58', 22),
(44, 11, 'mierdaamksolomierda@', 'P', 5, 'A', '2023-05-25 20:47:07', 22),
(45, 12, 'jpda@', 'P', 5, 'A', '2023-05-25 20:57:55', 22),
(46, 13, 'nojodaprravida', 'P', 5, 'A', '2023-05-25 21:00:19', 22),
(47, 3, 'dfgdfg@', 'P', 6, 'A', '2023-05-25 21:45:44', 21),
(48, 4, 'sdfds@sdf', 'P', 6, 'A', '2023-05-25 21:47:09', 21),
(49, 14, 'FSGw', 'P', 5, 'A', '2023-05-25 21:48:07', 22),
(50, 15, 'collante@', 'P', 5, 'A', '2023-05-25 21:49:21', 22),
(52, 17, 'tgtty', 'S', 8, 'A', '2023-05-26 17:51:47', 22),
(53, 18, 'collaldkweiuofefhw', 'P', 5, 'A', '2023-07-25 14:24:57', 21),
(54, 19, 'asdasd', 'P', 56, 'A', '2023-05-26 18:31:12', 21),
(55, 24, 'yule@gmail.com', 'P', 7, 'A', '2023-05-29 15:55:06', 21),
(56, 20, 'fgsrhgh', 'P', 5, 'A', '2023-05-29 20:10:03', 22),
(57, 3, 'auuuuuuu@', 'P', 8, 'A', '2023-05-31 17:22:47', 22),
(58, 25, 'trance@gmail.com', 'P', 7, 'A', '2023-06-23 13:53:38', 22),
(59, 26, 'garger', 'P', 7, 'A', '2023-06-01 18:37:47', 20),
(60, 27, 'tellme@gmail.com', 'P', 7, 'A', '2023-06-01 19:50:40', 22),
(61, 28, 'segdr', 'P', 7, 'A', '2023-06-01 19:54:10', 22),
(62, 29, 'trhpseir', 'P', 7, 'A', '2023-06-01 20:00:25', 22),
(63, 30, 'peluqueate', 'P', 7, 'A', '2023-06-05 18:32:51', 22),
(64, 31, 'fyulig', 'P', 7, 'A', '2023-06-05 18:54:18', 1),
(65, 32, 'mjhmjy', 'P', 7, 'A', '2023-06-05 19:38:37', 30),
(66, 33, 'yile@gmail.com', 'P', 7, 'A', '2023-06-06 17:45:58', 20),
(67, 34, 'ghmtdy', 'P', 7, 'A', '2023-06-06 20:18:20', 22),
(68, 35, 'dgdfsg', 'P', 7, 'A', '2023-06-06 15:26:22', 35),
(69, 21, 'dxgdrhg', 'P', 8, 'A', '2023-06-07 18:02:55', 22),
(70, 5, 'colpatria@correo.com', 'P', 56, 'A', '2023-07-17 16:45:07', 22),
(71, 6, 'hop@gmail.com', 'P', 5, 'A', '2023-07-24 14:52:37', 22),
(72, 2, 'juanlm101120@gmail.com', 'P', 8, 'A', '2023-06-16 18:25:54', 1),
(74, 1, 'correo', 'P', 6, 'A', '2023-06-21 18:52:07', 1),
(75, 5, 'YUKE@GMAIJMIK.COM', 'P', 6, 'A', '2023-06-26 20:21:42', 20),
(76, 6, 'akok@gmail.com', 'P', 6, 'A', '2023-07-25 13:50:08', 21),
(77, 40, 'correo@correo.com', 'P', 7, 'A', '2023-06-29 19:08:01', 1),
(78, 41, 'sad@correo.com', 'P', 7, 'A', '2023-06-29 19:08:41', 1),
(79, 16, 'sora@gmail.com', 'P', 56, 'A', '2023-07-17 21:47:17', 22),
(80, 7, 'Renting@gmail.com', 'P', 56, 'A', '2023-07-17 21:48:06', 22);

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
  `tipo_fila` smallint(2) NOT NULL,
  `iconoF` varchar(30) NOT NULL,
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `filas`
--

INSERT INTO `filas` (`id_fila`, `nombre`, `id_estante`, `tipo_fila`, `iconoF`, `usuario_crea`, `fecha_crea`, `estado`) VALUES
(1, 'B1', 1, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(2, 'B2', 1, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(3, 'B3', 1, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(4, 'B4', 1, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(5, 'D1', 2, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(6, 'D2', 2, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(7, 'D3', 2, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(8, 'D4', 2, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(9, 'A1', 3, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(10, 'A2', 3, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(11, 'A3', 3, 60, '', 3, '2023-07-19 15:24:27', 'A'),
(12, 'A4', 3, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(13, 'C1', 4, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(14, 'C2', 4, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(15, 'C3', 4, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(16, 'C4', 4, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(17, 'G1', 5, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(18, 'G2', 5, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(19, 'G3', 5, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(20, 'G4', 5, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(21, 'H1', 6, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(22, 'H2', 6, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(23, 'H3', 6, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(24, 'H4', 6, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(25, 'E1', 7, 60, '', 3, '2023-07-19 15:26:16', 'A'),
(26, 'E2', 7, 60, '', 3, '2023-07-19 15:26:34', 'A'),
(27, 'E3', 7, 60, '', 3, '2023-07-19 15:26:34', 'A'),
(28, 'E4', 7, 60, '', 3, '2023-07-19 15:26:34', 'A'),
(29, 'Sec1', 12, 61, '', 3, '2023-07-19 15:29:21', 'A'),
(30, 'Sec2', 12, 61, '', 2, '2023-07-19 15:29:21', 'A'),
(31, 'Llantas', 13, 61, 'rueda.png', 1, '2023-07-24 13:12:05', 'A'),
(32, 'Puertas', 13, 61, 'puertaCarro.png', 2, '2023-07-24 13:12:15', 'A'),
(50, 'r', 13, 0, '/default.png', 23, '2023-07-25 21:02:38', 'A'),
(53, 'jiji', 13, 0, '13jiji.png', 23, '2023-07-25 21:27:37', 'A');

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
(1, 1, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-06-15 17:44:10', 22),
(2, 1, 1, 'Grua', 'true', 0, NULL, 'A', '2023-06-15 17:44:10', 22),
(3, 1, 4, 'Retrovisores', '1', 0, NULL, 'A', '2023-06-15 17:44:10', 22),
(4, 1, 5, 'Retrovisor Interno', '2', 0, NULL, 'A', '2023-06-15 17:44:10', 22),
(5, 1, 2, 'Llaves', 'true', 0, NULL, 'A', '2023-06-15 17:44:10', 22),
(6, 1, 6, 'Panoramicos', '1', 2, NULL, 'A', '2023-06-15 17:44:10', 22),
(7, 1, 7, 'Radio', '2', 0, NULL, 'A', '2023-06-15 17:44:10', 22),
(8, 1, 8, 'Parlantes', '2', 4, NULL, 'A', '2023-06-15 17:44:10', 22),
(9, 1, 9, 'Rejillas A/A', '1', 2, NULL, 'A', '2023-06-15 17:44:10', 22),
(10, 1, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(11, 1, 11, 'Pito', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(12, 1, 12, 'Plumillas', '1', 3, NULL, 'A', '2023-06-15 17:44:11', 22),
(13, 1, 13, 'Cinturones', '2', 4, NULL, 'A', '2023-06-15 17:44:11', 22),
(14, 1, 14, 'Manijas', '1', 4, NULL, 'A', '2023-06-15 17:44:11', 22),
(15, 1, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(16, 1, 16, 'Tapa Soles', '1', 3, NULL, 'A', '2023-06-15 17:44:11', 22),
(17, 1, 17, 'Tapetes', '1', 4, NULL, 'A', '2023-06-15 17:44:11', 22),
(18, 1, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(19, 1, 19, 'Luz Techo', '2', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(20, 1, 20, 'Tapa Gasolina', '2', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(21, 1, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(22, 1, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(23, 1, 23, 'Kit Carretera', '2', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(24, 1, 24, 'Gato', '1', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(25, 1, 25, 'Extintor', '3', 0, NULL, 'A', '2023-06-15 17:44:11', 22),
(26, 1, 26, 'Sensores', '1', 0, NULL, 'A', '2023-06-15 17:44:12', 22),
(27, 1, 27, 'Camara Rever', '2', 0, NULL, 'A', '2023-06-15 17:44:12', 22),
(28, 1, 27, 'Control Alarma', '2', 0, NULL, 'A', '2023-06-15 17:44:12', 22),
(29, 1, 28, 'Bateria', '1', 0, NULL, 'A', '2023-06-15 17:44:12', 22),
(30, 1, 29, 'TipoCombustible', '5', 0, NULL, 'A', '2023-06-15 17:44:12', 22),
(31, 1, 30, 'Observacion', 'true', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean magna elit, egestas at quam vitae, auctor pulvinar ante. Aliquam cursus massa ipsum. Proin tristique consequat orci, ut vehicula urna gravida aliquam. Mauris quis tempor lectus, in gravida justo. Donec vulputate leo a eros luctus aliquet id vitae ex. Quisque efficitur elit eget pellentesque eleifend. Mauris a est ac ligula ullamcorper lacinia ac sed arcu. Donec lacinia purus erat, pellentesque commodo mi cursus quis. Nunc accumsan, velit eu ultrices varius, orci est fermentum diam, quis consectetur mauris tortor ac libero. Sed elementum purus nec arcu egestas, a commodo nisl semper. Aliquam neque ex, semper in leo eget, ultrices dignissim tellus. Praesent et neque tristique, malesuada neque ut, lacinia orci. Duis sed quam metus. Mauris commodo metus mauris, id finibus quam tincidunt quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet laoreet augue. Duis vitae vulputate ipsum. Aliquam porttitor dignissim mauris, non venenatis nunc dignissim id. Ut nec augue fermentum, cursus augue et, dictum eros. Aliquam non massa neque. Morbi et ornare urna. Nulla eget massa a enim pretium commodo. Ut ut nunc eu lorem lobortis rhoncus vehicula at leo. Vestibulum varius mauris id erat euismod, sed mattis neque facilisis. Quisque fermentum purus ut fermentum pellentesque. Curabitur dictum enim vel justo auctor, vitae ornare purus lobortis. Cras eu nulla eget neque feugiat sollicitudin. Nunc commodo, diam et dictum vehicula, urna lorem ullamcorper diam, at fringilla nulla velit at turpis. Pellentesque sodales sollicitudin nunc nec consectetur. Curabitur bibendum gravida diam, sit amet pharetra neque pellentesque eget. Sed laoreet metus sed est euismod, ut mollis libero porttitor. In tristique ante augue, vitae placerat risus ultrices vel. Fusce posuere quam eu augue aliquam volutpat.', 'A', '2023-06-15 17:44:12', 22),
(32, 2, 1, 'Grua', 'false', 0, NULL, 'A', '2023-06-15 18:41:09', 22),
(33, 2, 2, 'Llaves', 'true', 0, NULL, 'A', '2023-06-15 18:41:09', 22),
(34, 2, 4, 'Retrovisores', '1', 0, NULL, 'A', '2023-06-15 18:41:09', 22),
(35, 2, 5, 'Retrovisor Interno', '2', 0, NULL, 'A', '2023-06-15 18:41:09', 22),
(36, 2, 6, 'Panoramicos', '3', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(37, 2, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(38, 2, 7, 'Radio', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(39, 2, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(40, 2, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(41, 2, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(42, 2, 11, 'Pito', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(43, 2, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(44, 2, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(45, 2, 14, 'Manijas', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(46, 2, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(47, 2, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(48, 2, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-06-15 18:41:10', 22),
(49, 2, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(50, 2, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(51, 2, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-06-15 18:41:10', 22),
(52, 2, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(53, 2, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(54, 2, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(55, 2, 24, 'Gato', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(56, 2, 25, 'Extintor', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(57, 2, 26, 'Sensores', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(58, 2, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(59, 2, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(60, 2, 28, 'Bateria', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(61, 2, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-06-15 18:41:11', 22),
(62, 2, 30, 'Observacion', 'true', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean magna elit, egestas at quam vitae, auctor pulvinar ante. Aliquam cursus massa ipsum. Proin tristique consequat orci, ut vehicula urna gravida aliquam. Mauris quis tempor lectus, in gravida justo. Donec vulputate leo a eros luctus aliquet id vitae ex. Quisque efficitur elit eget pellentesque eleifend. Mauris a est ac ligula ullamcorper lacinia ac sed arcu. Donec lacinia purus erat, pellentesque commodo mi cursus quis. Nunc accumsan, velit eu ultrices varius, orci est fermentum diam, quis consectetur mauris tortor ac libero. Sed elementum purus nec arcu egestas, a commodo nisl semper. Aliquam neque ex, semper in leo eget, ultrices dignissim tellus.Praesent et neque tristique, malesuada neque ut, lacinia orci. Duis sed quam metus. Mauris commodo metus mauris, id finibus quam tincidunt quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet laoreet augue. Duis vitae vulputate ipsum. Aliquam porttitor dignissim mauris, non venenatis nunc dignissim id. Ut nec augue fermentum, cursus augue et, dictum eros. Aliquam non massa neque. Morbi et ornare urna. Nulla eget massa a enim pretium commodo. Ut ut nunc eu lorem lobortis rhoncus vehicula at leo. Vestibulum varius mauris id erat euismod, sed mattis neque facilisis. Quisque fermentum purus ut fermentum pellentesque. Curabitur dictum enim vel justo auctor, vitae ornare purus lobortis.\nCras eu nulla eget neque feugiat sollicitudin. Nunc commodo, diam et dictum vehicula, urna lorem ullamcorper diam, at fringilla nulla velit at turpis. Pellentesque sodales sollicitudin nunc nec consectetur. Curabitur bibendum gravida diam, sit amet pharetra neque pellentesque eget. Sed laoreet metus sed est euismod, ut mollis libero porttitor. In tristique ante augue, vitae placerat risus ultrices vel. Fusce posuere quam eu augue aliquam volutpat.', 'A', '2023-06-15 18:41:11', 22),
(63, 3, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(64, 3, 1, 'Grua', 'true', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(65, 3, 2, 'Llaves', 'true', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(66, 3, 4, 'Retrovisores', '1', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(67, 3, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-06-15 18:43:50', 22),
(68, 3, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(69, 3, 7, 'Radio', '1', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(70, 3, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-06-15 18:43:50', 22),
(71, 3, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-06-15 18:43:50', 22),
(72, 3, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(73, 3, 11, 'Pito', '1', 0, NULL, 'A', '2023-06-15 18:43:50', 22),
(74, 3, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-06-15 18:43:50', 22),
(75, 3, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-06-15 18:43:51', 22),
(76, 3, 14, 'Manijas', '1', -1, NULL, 'A', '2023-06-15 18:43:51', 22),
(77, 3, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(78, 3, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-06-15 18:43:51', 22),
(79, 3, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-06-15 18:43:51', 22),
(80, 3, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(81, 3, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(82, 3, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(83, 3, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(84, 3, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(85, 3, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(86, 3, 24, 'Gato', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(87, 3, 25, 'Extintor', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(88, 3, 26, 'Sensores', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(89, 3, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(90, 3, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(91, 3, 28, 'Bateria', '1', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(92, 3, 29, 'TipoCombustible', '', 0, NULL, 'A', '2023-06-15 18:43:51', 22),
(93, 3, 30, 'Observacion', 'true', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean magna elit, egestas at quam vitae, auctor pulvinar ante. Aliquam cursus massa ipsum. Proin tristique consequat orci, ut vehicula urna gravida aliquam. Mauris quis tempor lectus, in gravida justo. Donec vulputate leo a eros luctus aliquet id vitae ex. Quisque efficitur elit eget pellentesque eleifend. Mauris a est ac ligula ullamcorper lacinia ac sed arcu. Donec lacinia purus erat, pellentesque commodo mi cursus quis. Nunc accumsan, velit eu ultrices varius, orci est fermentum diam, quis consectetur mauris tortor ac libero. Sed elementum purus nec arcu egestas, a commodo nisl semper. Aliquam neque ex, semper in leo eget, ultrices dignissim tellus.\n\nPraesent et neque tristique, malesuada neque ut, lacinia orci. Duis sed quam metus. Mauris commodo metus mauris, id finibus quam tincidunt quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet laoreet augue. Duis vitae vulputate ipsum. Aliquam porttitor dignissim mauris, non venenatis nunc dignissim id. Ut nec augue fermentum, cursus augue et, dictum eros. Aliquam non massa neque. Morbi et ornare urna. Nulla eget massa a enim pretium commodo. Ut ut nunc eu lorem lobortis rhoncus vehicula at leo. Vestibulum varius mauris id erat euismod, sed mattis neque facilisis. Quisque fermentum purus ut fermentum pellentesque. Curabitur dictum enim vel justo auctor, vitae ornare purus lobortis. Cras eu nulla eget neque feugiat sollicitudin. Nunc commodo, diam et dictum vehicula, urna lorem ullamcorper diam, at fringilla nulla velit at turpis. Pellentesque sodales sollicitudin nunc nec consectetur. Curabitur bibendum gravida diam, sit amet pharetra neque pellentesque eget. Sed laoreet metus sed est euismod, ut mollis libero porttitor. In tristique ante augue, vitae placerat risus ultrices vel. Fusce posuere quam eu augue aliquam volutpat.', 'A', '2023-06-15 18:43:52', 22),
(94, 4, 1, 'Grua', 'true', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(95, 4, 2, 'Llaves', 'true', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(96, 4, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(97, 4, 4, 'Retrovisores', '1', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(98, 4, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-06-15 18:51:52', 22),
(99, 4, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(100, 4, 7, 'Radio', '1', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(101, 4, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-06-15 18:51:52', 22),
(102, 4, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-06-15 18:51:52', 22),
(103, 4, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(104, 4, 11, 'Pito', '1', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(105, 4, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-06-15 18:51:52', 22),
(106, 4, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-06-15 18:51:52', 22),
(107, 4, 14, 'Manijas', '1', -1, NULL, 'A', '2023-06-15 18:51:52', 22),
(108, 4, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-06-15 18:51:52', 22),
(109, 4, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-06-15 18:51:53', 22),
(110, 4, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-06-15 18:51:53', 22),
(111, 4, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(112, 4, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(113, 4, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(114, 4, 21, 'Llave Pernos', '3', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(115, 4, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(116, 4, 23, 'Kit Carretera', '2', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(117, 4, 24, 'Gato', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(118, 4, 25, 'Extintor', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(119, 4, 26, 'Sensores', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(120, 4, 27, 'Camara Rever', '2', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(121, 4, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(122, 4, 28, 'Bateria', '1', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(123, 4, 29, 'TipoCombustible', '3', 0, NULL, 'A', '2023-06-15 18:51:53', 22),
(124, 4, 30, 'Observacion', 'true', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean magna elit, egestas at quam vitae, auctor pulvinar ante. Aliquam cursus massa ipsum. Proin tristique consequat orci, ut vehicula urna gravida aliquam. Mauris quis tempor lectus, in gravida justo. Donec vulputate leo a eros luctus aliquet id vitae ex. Quisque efficitur elit eget pellentesque eleifend. Mauris a est ac ligula ullamcorper lacinia ac sed arcu. Donec lacinia purus erat, pellentesque commodo mi cursus quis. Nunc accumsan, velit eu ultrices varius, orci est fermentum diam, quis consectetur mauris tortor ac libero. Sed elementum purus nec arcu egestas, a commodo nisl semper. Aliquam neque ex, semper in leo eget, ultrices dignissim tellus.\nPraeset et neque tristique, malesuada neque ut, lacinia orci. Duis sed quam metus. Mauris commodo metus mauris, id finibus quam tincidunt quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet laoreet augue. Duis vitae vulputate ipsum. Aliquam porttitor dignissim mauris, non venenatis nunc dignissim id. Ut nec augue fermentum, cursus augue et, dictum eros. Aliquam non massa neque. Morbi et ornare urna. Nulla eget massa a enim pretium commodo. Ut ut nunc eu lorem lobortis rhoncus vehicula at leo. Vestibulum varius mauris id erat euismod, sed mattis neque facilisis. Quisque fermentum purus ut fermentum pellentesque. Curabitur dictum enim vel justo auctor, vitae ornare purus lobortis.Cras eu nulla eget neque feugiat sollicitudin. Nunc commodo, diam et dictum vehicula, urna lorem ullamcorper diam, at fringilla nulla velit at turpis. Pellentesque sodales sollicitudin nunc nec consectetur. Curabitur bibendum gravida diam, sit amet pharetra neque pellentesque eget. Sed laoreet metus sed est euismod, ut mollis libero porttitor. In tristique ante augue, vitae placerat risus ultrices vel. Fusce posuere quam eu augue aliquam volutpat.', 'A', '2023-06-15 18:51:54', 22),
(125, 5, 1, 'Grua', 'false', 0, NULL, 'A', '2023-06-29 18:38:34', 22),
(126, 5, 5, 'Retrovisor Interno', '2', 0, NULL, 'A', '2023-06-29 18:38:34', 22),
(127, 5, 6, 'Panoramicos', '2', 5, NULL, 'A', '2023-06-29 18:38:34', 22),
(128, 5, 4, 'Retrovisores', '1', 0, NULL, 'A', '2023-06-29 18:38:34', 22),
(129, 5, 2, 'Llaves', 'true', 0, NULL, 'A', '2023-06-29 18:38:35', 22),
(130, 5, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-06-29 18:38:35', 22),
(131, 5, 7, 'Radio', '3', 0, NULL, 'A', '2023-06-29 18:38:35', 22),
(132, 5, 8, 'Parlantes', '2', 4, NULL, 'A', '2023-06-29 18:38:35', 22),
(133, 5, 9, 'Rejillas A/A', '1', 3, NULL, 'A', '2023-06-29 18:38:35', 22),
(134, 5, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-06-29 18:38:35', 22),
(135, 5, 11, 'Pito', '2', 0, NULL, 'A', '2023-06-29 18:38:35', 22),
(136, 5, 12, 'Plumillas', '2', 2, NULL, 'A', '2023-06-29 18:38:35', 22),
(137, 5, 13, 'Cinturones', '3', 5, NULL, 'A', '2023-06-29 18:38:35', 22),
(138, 5, 14, 'Manijas', '2', 3, NULL, 'A', '2023-06-29 18:38:35', 22),
(139, 5, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(140, 5, 16, 'Tapa Soles', '1', 4, NULL, 'A', '2023-06-29 18:38:36', 22),
(141, 5, 17, 'Tapetes', '2', 2, NULL, 'A', '2023-06-29 18:38:36', 22),
(142, 5, 18, 'Tapizado', '3', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(143, 5, 19, 'Luz Techo', '2', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(144, 5, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(145, 5, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(146, 5, 22, 'Herramientas', '2', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(147, 5, 23, 'Kit Carretera', '2', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(148, 5, 24, 'Gato', '1', 0, NULL, 'A', '2023-06-29 18:38:36', 22),
(149, 5, 25, 'Extintor', '3', 0, NULL, 'A', '2023-06-29 18:38:37', 22),
(150, 5, 26, 'Sensores', '1', 0, NULL, 'A', '2023-06-29 18:38:37', 22),
(151, 5, 27, 'Camara Rever', '2', 0, NULL, 'A', '2023-06-29 18:38:37', 22),
(152, 5, 27, 'Control Alarma', '2', 0, NULL, 'A', '2023-06-29 18:38:37', 22),
(153, 5, 28, 'Bateria', '2', 0, NULL, 'A', '2023-06-29 18:38:37', 22),
(154, 5, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-06-29 18:38:37', 22),
(155, 5, 30, 'Observacion', 'true', 0, 'TEXTO PARA PRUEBA', 'A', '2023-06-29 18:38:37', 22),
(156, 6, 1, 'Grua', 'true', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(157, 6, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(158, 6, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(159, 6, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(160, 6, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(161, 6, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(162, 6, 7, 'Radio', '2', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(163, 6, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(164, 6, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(165, 6, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(166, 6, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(167, 6, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(168, 6, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(169, 6, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(170, 6, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:10:01', 22),
(171, 6, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:10:01', 22),
(172, 6, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:10:02', 22),
(173, 6, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(174, 6, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(175, 6, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(176, 6, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(177, 6, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(178, 6, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(179, 6, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(180, 6, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(181, 6, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(182, 6, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(183, 6, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(184, 6, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(185, 6, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:10:02', 22),
(186, 6, 30, 'Observacion', 'true', 0, 'a', 'A', '2023-07-12 19:10:02', 22),
(187, 7, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-07-12 19:11:12', 22),
(188, 7, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:11:12', 22),
(189, 7, 1, 'Grua', 'false', 0, NULL, 'A', '2023-07-12 19:11:12', 22),
(190, 7, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:11:12', 22),
(191, 7, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-07-12 19:11:12', 22),
(192, 7, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:11:12', 22),
(193, 7, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:11:12', 22),
(194, 7, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(195, 7, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(196, 7, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(197, 7, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(198, 7, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(199, 7, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(200, 7, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(201, 7, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(202, 7, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(203, 7, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:11:13', 22),
(204, 7, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(205, 7, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(206, 7, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(207, 7, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:11:13', 22),
(208, 7, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(209, 7, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(210, 7, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(211, 7, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(212, 7, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(213, 7, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(214, 7, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(215, 7, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(216, 7, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:11:14', 22),
(217, 7, 30, 'Observacion', 'true', 0, 'a', 'A', '2023-07-12 19:11:14', 22),
(218, 8, 1, 'Grua', 'true', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(219, 8, 3, 'Documentos', 'true', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(220, 8, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(221, 8, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(222, 8, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(223, 8, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:18:52', 22),
(224, 8, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(225, 8, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:18:52', 22),
(226, 8, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:18:52', 22),
(227, 8, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:18:52', 22),
(228, 8, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(229, 8, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:18:53', 22),
(230, 8, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:18:53', 22),
(231, 8, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:18:53', 22),
(232, 8, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(233, 8, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:18:53', 22),
(234, 8, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:18:53', 22),
(235, 8, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(236, 8, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(237, 8, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(238, 8, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(239, 8, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(240, 8, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(241, 8, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(242, 8, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(243, 8, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(244, 8, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(245, 8, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(246, 8, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:18:53', 22),
(247, 8, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:18:54', 22),
(248, 8, 30, 'Observacion', 'true', 0, 'A', 'A', '2023-07-12 19:18:54', 22),
(249, 9, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(250, 9, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(251, 9, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(252, 9, 1, 'Grua', 'false', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(253, 9, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(254, 9, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:21:02', 22),
(255, 9, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(256, 9, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:21:02', 22),
(257, 9, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:21:02', 22),
(258, 9, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:21:02', 22),
(259, 9, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(260, 9, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:21:03', 22),
(261, 9, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:21:03', 22),
(262, 9, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:21:03', 22),
(263, 9, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(264, 9, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:21:03', 22),
(265, 9, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:21:03', 22),
(266, 9, 18, 'Tapizado', '3', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(267, 9, 19, 'Luz Techo', '2', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(268, 9, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(269, 9, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(270, 9, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(271, 9, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:21:03', 22),
(272, 9, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(273, 9, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(274, 9, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(275, 9, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(276, 9, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(277, 9, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(278, 9, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:21:04', 22),
(279, 9, 30, 'Observacion', 'true', 0, 'a', 'A', '2023-07-12 19:21:04', 22),
(280, 10, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(281, 10, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(282, 10, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(283, 10, 1, 'Grua', 'false', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(284, 10, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:29:28', 22),
(285, 10, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(286, 10, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(287, 10, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:29:28', 22),
(288, 10, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:29:28', 22),
(289, 10, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(290, 10, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:29:28', 22),
(291, 10, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:29:29', 22),
(292, 10, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:29:29', 22),
(293, 10, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:29:29', 22),
(294, 10, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(295, 10, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:29:29', 22),
(296, 10, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:29:29', 22),
(297, 10, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(298, 10, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(299, 10, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(300, 10, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(301, 10, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(302, 10, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(303, 10, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(304, 10, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(305, 10, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(306, 10, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:29:29', 22),
(307, 10, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:29:30', 22),
(308, 10, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:29:30', 22),
(309, 10, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:29:30', 22),
(310, 10, 30, 'Observacion', 'true', 0, 'A', 'A', '2023-07-12 19:29:30', 22),
(311, 11, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:30:49', 22),
(312, 11, 1, 'Grua', 'false', 0, NULL, 'A', '2023-07-12 19:30:49', 22),
(313, 11, 4, 'Retrovisores', '2', 0, NULL, 'A', '2023-07-12 19:30:49', 22),
(314, 11, 5, 'Retrovisor Interno', '2', 0, NULL, 'A', '2023-07-12 19:30:49', 22),
(315, 11, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-07-12 19:30:49', 22),
(316, 11, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:30:49', 22),
(317, 11, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:30:49', 22),
(318, 11, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:30:49', 22),
(319, 11, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:30:50', 22),
(320, 11, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(321, 11, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(322, 11, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:30:50', 22),
(323, 11, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:30:50', 22),
(324, 11, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:30:50', 22),
(325, 11, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(326, 11, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:30:50', 22),
(327, 11, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:30:50', 22),
(328, 11, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(329, 11, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(330, 11, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(331, 11, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(332, 11, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(333, 11, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:30:50', 22),
(334, 11, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(335, 11, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(336, 11, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(337, 11, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(338, 11, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(339, 11, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(340, 11, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:30:51', 22),
(341, 11, 30, 'Observacion', 'true', 0, 'A', 'A', '2023-07-12 19:30:51', 22),
(342, 12, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:31:40', 1),
(343, 12, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-07-12 19:31:40', 1),
(344, 12, 1, 'Grua', 'false', 0, NULL, 'A', '2023-07-12 19:31:40', 1),
(345, 12, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:31:41', 1),
(346, 12, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(347, 12, 4, 'Retrovisores', '3', 0, NULL, 'A', '2023-07-12 19:31:41', 1),
(348, 12, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:31:41', 1),
(349, 12, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(350, 12, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(351, 12, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:31:41', 1),
(352, 12, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:31:41', 1),
(353, 12, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(354, 12, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(355, 12, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(356, 12, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:31:41', 1),
(357, 12, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:31:41', 1),
(358, 12, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:31:42', 1),
(359, 12, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(360, 12, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(361, 12, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(362, 12, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(363, 12, 22, 'Herramientas', '2', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(364, 12, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(365, 12, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(366, 12, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(367, 12, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(368, 12, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(369, 12, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(370, 12, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(371, 12, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:31:42', 1),
(372, 12, 30, 'Observacion', 'true', 0, 'a', 'A', '2023-07-12 19:31:43', 1),
(373, 13, 1, 'Grua', 'false', 0, NULL, 'A', '2023-07-12 19:32:47', 20),
(374, 13, 3, 'Documentos', 'false', 0, NULL, 'A', '2023-07-12 19:32:47', 20),
(375, 13, 5, 'Retrovisor Interno', '1', 0, NULL, 'A', '2023-07-12 19:32:47', 20),
(376, 13, 2, 'Llaves', 'false', 0, NULL, 'A', '2023-07-12 19:32:47', 20),
(377, 13, 6, 'Panoramicos', '1', -1, NULL, 'A', '2023-07-12 19:32:47', 20),
(378, 13, 4, 'Retrovisores', '', 0, NULL, 'A', '2023-07-12 19:32:47', 20),
(379, 13, 7, 'Radio', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(380, 13, 8, 'Parlantes', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(381, 13, 9, 'Rejillas A/A', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(382, 13, 10, 'Encendedor', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(383, 13, 11, 'Pito', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(384, 13, 12, 'Plumillas', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(385, 13, 13, 'Cinturones', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(386, 13, 14, 'Manijas', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(387, 13, 15, 'Comando ptas', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(388, 13, 16, 'Tapa Soles', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(389, 13, 17, 'Tapetes', '1', -1, NULL, 'A', '2023-07-12 19:32:48', 20),
(390, 13, 18, 'Tapizado', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(391, 13, 19, 'Luz Techo', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(392, 13, 20, 'Tapa Gasolina', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(393, 13, 21, 'Llave Pernos', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(394, 13, 22, 'Herramientas', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(395, 13, 23, 'Kit Carretera', '1', 0, NULL, 'A', '2023-07-12 19:32:48', 20),
(396, 13, 24, 'Gato', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(397, 13, 25, 'Extintor', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(398, 13, 26, 'Sensores', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(399, 13, 27, 'Camara Rever', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(400, 13, 27, 'Control Alarma', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(401, 13, 28, 'Bateria', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(402, 13, 29, 'TipoCombustible', '1', 0, NULL, 'A', '2023-07-12 19:32:49', 20),
(403, 13, 30, 'Observacion', 'true', 0, 'A', 'A', '2023-07-12 19:32:49', 20);

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
  `cantidad_vendida` decimal(7,0) DEFAULT NULL,
  `precio_venta` decimal(11,0) DEFAULT NULL,
  `precio_compra` decimal(11,2) DEFAULT NULL,
  `unidad_medida` char(3) NOT NULL,
  `fecha_ultimo_ingre` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_ultimo_salid` datetime DEFAULT NULL,
  `estante` smallint(2) NOT NULL,
  `fila` smallint(2) DEFAULT NULL COMMENT 'Si el material se encuentra en diferentes estantes o filas, esta debe ser dividida con un indicador. Ej: 1 - 2 - 3',
  `observacion` text NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `id_orden`, `id_proveedor`, `nombre`, `categoria_material`, `tipo_material`, `cantidad_actual`, `cantidad_vendida`, `precio_venta`, `precio_compra`, `unidad_medida`, `fecha_ultimo_ingre`, `fecha_ultimo_salid`, `estante`, `fila`, `observacion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, NULL, NULL, 'Pintura blanca', 32, 9, 31, 19, 15000, 10000.00, 'c/u', '2023-08-11 22:19:50', NULL, 1, 1, '', 'A', '2023-08-04 17:55:41', 1),
(2, 13, 1, 'Prueba Base de datos', NULL, 10, 54, 0, NULL, NULL, '', '2023-08-10 17:30:50', NULL, 12, NULL, '', 'A', '2023-08-10 21:22:03', 1),
(3, 13, 1, 'a', NULL, 10, 3, NULL, NULL, NULL, '', '2023-08-10 11:27:55', NULL, 13, NULL, '', 'A', '2023-08-10 21:27:55', 1),
(4, 13, 1, '2', NULL, 10, 2, NULL, NULL, NULL, '', '2023-08-10 11:32:14', NULL, 12, NULL, '', 'A', '2023-08-10 16:32:14', 1),
(5, NULL, NULL, 'Nuevo nombre', 26, 9, 35, 15, 1500, 500.00, 'c/u', '2023-08-11 22:23:53', NULL, 1, 1, '', 'A', '2023-08-11 01:56:08', 1),
(6, NULL, NULL, 'abcde fghi jklmn', 26, 9, 2, 3, 4500, 500.00, 'c/u', '2023-08-11 22:30:30', NULL, 1, 1, '', 'A', '2023-08-12 08:24:52', 1),
(7, NULL, NULL, 'e', 26, 9, 2, 2, 132, 3.00, 'c/u', '2023-08-11 22:25:03', NULL, 1, 1, '', 'A', '2023-08-12 08:25:03', 1);

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
(1, 1, 5, 1, 5, 7500.00, 'A', '2023-08-11 04:15:10', 1),
(2, 1, 1, 3, 10, 150000.00, 'A', '2023-08-11 04:15:10', 1),
(3, 1, 5, 2, 5, 7500.00, 'A', '2023-08-11 04:15:10', 1),
(4, 1, 1, 4, 4, 60000.00, 'A', '2023-08-11 04:15:10', 1),
(5, 2, 6, 0, 2, 500.00, 'A', '2023-08-12 08:24:52', 1),
(6, 3, 7, 0, 2, 3.00, 'A', '2023-08-12 08:25:03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_enc`
--

CREATE TABLE `movimiento_enc` (
  `id_movimientoenc` smallint(2) NOT NULL,
  `id_tercero` smallint(2) DEFAULT NULL,
  `id_vehiculo` smallint(2) DEFAULT NULL,
  `id_trabajador` smallint(2) DEFAULT NULL,
  `fecha_movimiento` datetime NOT NULL,
  `tipo_movimiento` smallint(2) NOT NULL,
  `estado` char(2) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `id_material` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimiento_enc`
--

INSERT INTO `movimiento_enc` (`id_movimientoenc`, `id_tercero`, `id_vehiculo`, `id_trabajador`, `fecha_movimiento`, `tipo_movimiento`, `estado`, `fecha_crea`, `usuario_crea`, `id_material`) VALUES
(1, NULL, 13, 1, '2023-08-10 18:15:10', 68, 'A', '2023-08-10 23:15:10', 1, NULL),
(2, NULL, NULL, NULL, '2023-08-12 00:00:00', 11, 'A', '2023-08-12 08:24:52', 1, NULL),
(3, NULL, NULL, NULL, '2023-08-12 00:00:00', 11, 'A', '2023-08-12 08:25:03', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero_temp`
--

CREATE TABLE `numero_temp` (
  `id_numTep` smallint(2) NOT NULL,
  `n_temporal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numero_temp`
--

INSERT INTO `numero_temp` (`id_numTep`, `n_temporal`) VALUES
(1, 42013);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_servicio`
--

CREATE TABLE `ordenes_servicio` (
  `id_orden` smallint(2) NOT NULL,
  `n_orden` varchar(15) NOT NULL,
  `id_vehiculo` smallint(2) NOT NULL,
  `kms` varchar(20) NOT NULL,
  `n_combustible` smallint(2) NOT NULL,
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

INSERT INTO `ordenes_servicio` (`id_orden`, `n_orden`, `id_vehiculo`, `kms`, `n_combustible`, `nombres`, `apellidos`, `n_identificacion`, `estado`, `fecha_entrada`, `fecha_salida`, `fecha_crea`, `usuario_crea`) VALUES
(1, '42000', 13, '12345', 36, NULL, NULL, NULL, 38, '2023-06-15', '2023-06-17', '2023-07-19 13:23:09', 22),
(2, '42001', 2, '123456', 33, NULL, NULL, NULL, 39, '2023-06-15', '2023-06-17', '2023-07-19 13:23:14', 22),
(3, '42002', 4, '74584', 35, NULL, NULL, NULL, 39, '2023-06-15', '2023-06-17', '2023-07-19 13:23:19', 22),
(4, '42003', 15, '745896', 35, NULL, NULL, NULL, 38, '2023-06-14', '2023-06-17', '2023-07-19 13:22:49', 22),
(5, '42004', 1, '200', 35, 'PRUEBA', 'ALIADOS2', '145896247', 37, '2023-06-20', '2023-06-27', '2023-07-19 13:22:15', 22),
(6, '42005', 1, '33333333333', 34, 'Moises', 'Mazo', '1111111111', 42, '2023-07-12', '2023-07-21', '2023-07-19 13:22:10', 22),
(7, '42006', 5, '333', 33, 'wqqq', 'qweqw', '1111112333', 37, '2023-07-12', '2023-07-21', '2023-07-19 13:22:04', 22),
(8, '42007', 13, '8', 35, NULL, NULL, NULL, 37, '2023-07-12', '2023-07-28', '2023-07-19 13:21:54', 22),
(9, '42010', 1, '3333', 35, 'pepito', 'bandolero', '3333333333', 37, '2023-07-11', '0000-00-00', '2023-07-19 13:59:36', 22),
(10, '42008', 7, '333', 33, NULL, NULL, NULL, 45, '2023-07-12', '0000-00-00', '2023-07-19 13:20:36', 22),
(11, '42009', 6, '9999', 34, NULL, NULL, NULL, 45, '2023-07-12', '2023-07-13', '2023-07-19 13:20:30', 22),
(12, '42011', 2, '888', 34, NULL, NULL, NULL, 45, '2023-07-12', '2023-07-29', '2023-07-19 12:37:24', 1),
(13, '42012', 13, '9', 33, NULL, NULL, NULL, 37, '2023-07-12', '2023-07-20', '2023-07-17 15:49:34', 20);

--
-- Disparadores `ordenes_servicio`
--
DELIMITER $$
CREATE TRIGGER `Numero_Orden` BEFORE INSERT ON `ordenes_servicio` FOR EACH ROW UPDATE numero_temp SET numero_temp.n_temporal = n_temporal+1
WHERE numero_temp.id_numTep = 1
$$
DELIMITER ;

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
(66, 15, 'Denegado', 'Dene', 'A', '2023-06-08 15:02:38', 2, ''),
(67, 5, 'Devolucion - Repuesto', 'Dr', 'A', '2023-06-21 13:58:30', 2, ''),
(68, 5, 'Orden Entrega', 'OrdEn', 'A', '2023-06-21 15:34:51', 1, ''),
(69, 5, 'Entrada - Repuesto', 'EnRe', 'A', '2023-02-28 16:39:02', 2, ''),
(70, 5, 'Salida - Repuesto', 'SaRe', 'A', '2023-02-28 16:39:02', 2, '');

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
(1, 23, 21, 'Cambiar el nombre del insumo Broca12', 'Me equivoque y puse el nombre de la Broca3', 'q', 65, 'N', '2023-07-25', '2023-07-25', '11:04:47', '11:04:47', 21, '2023-06-29 13:21:50'),
(2, 23, 0, 'Cambiar la cantidad de Broca12', 'Quiero cambiar la cantidad de Broca porque me apetece', NULL, 64, NULL, '2023-06-29', NULL, '08:24:24', NULL, 23, '2023-06-29 13:24:24'),
(3, 23, 0, 'Cambiar la cantidad actual de la BombillaABS3', 'Me equivoque al poner la cantidad porque soy una bruta que se da cuenta de lo que esta poniendo, paguenme unas clases', NULL, 64, NULL, '2023-06-29', NULL, '08:26:46', NULL, 23, '2023-06-29 13:26:46');

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
(7, 3, 0, 5),
(15, 4, 4, 5),
(16, 5, 7, 56),
(17, 6, 8, 5),
(18, 7, 20, 5),
(19, 8, 5, 56),
(20, 9, 8, 5),
(21, 10, 0, 5),
(22, 11, 5, 56),
(23, 12, 16, 56),
(24, 13, 6, 5),
(25, 14, 5, 56),
(26, 15, 4, 5),
(27, 16, 7, 56);

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
(3, 'Almacenista', 'Almacena el almacen', 'A', '2023-02-25 00:44:40', 2),
(4, 'Jefe de Colision', 'Este rol puede ver cada uno de sus trabajos realizados', 'A', '2023-06-23 13:15:16', 1);

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
(2, 1, '3012918888', 3, 6, 'P', 'A', '2023-06-21 13:52:06', 1),
(4, 4, '3135604242', 3, 7, 'P', 'A', '2023-04-27 17:29:20', 4),
(8, 8, '3333', 3, 7, 'P', 'A', '2023-05-03 18:29:36', 1),
(9, 9, '13123123', 3, 7, 'S', 'A', '2023-05-03 18:30:21', 1),
(10, 10, '13123123', 3, 7, 'S', 'A', '2023-05-03 18:30:21', 1),
(12, 12, '122133', 3, 7, 'P', 'A', '2023-05-03 18:33:20', 1),
(13, 13, '333333', 3, 7, 'P', 'A', '2023-05-03 18:36:12', 1),
(14, 14, '333333', 3, 7, 'P', 'A', '2023-05-03 18:36:12', 1),
(15, 15, '231333', 3, 7, 'P', 'A', '2023-05-08 13:48:16', 1),
(17, 16, '31233', 3, 7, 'S', 'A', '2023-05-04 18:25:47', 1),
(19, 16, '123533', 3, 7, 'S', 'A', '2023-05-04 14:08:34', 1),
(21, 16, '11', 3, 7, 'P', 'A', '2023-05-04 19:14:21', 1),
(23, 1, '12', 3, 7, 'P', 'A', '2023-06-15 14:43:27', 1),
(24, 17, '123', 3, 7, 'P', 'A', '2023-05-04 21:13:52', 1),
(25, 18, '3332', 3, 7, 'S', 'A', '2023-05-10 13:32:29', 4),
(26, 6, '1321325645', 3, 5, 'P', 'A', '2023-07-24 14:46:46', 22),
(30, 4, '4444', 3, 5, 'P', 'A', '2023-05-24 13:02:24', 1),
(31, 19, '1111', 3, 7, 'P', 'A', '2023-06-23 13:16:34', 20),
(32, 8, '123', 3, 5, 'P', 'A', '2023-05-29 15:08:38', 22),
(33, 9, '2423', 3, 56, 'P', 'A', '2023-05-25 18:00:04', 19),
(35, 21, '33333', 3, 7, 'P', 'A', '2023-07-25 13:35:04', 21),
(36, 22, '3012911437', 3, 7, 'P', 'A', '2023-06-02 14:24:40', 22),
(37, 23, '32412', 3, 7, 'P', 'A', '2023-05-29 15:55:22', 21),
(38, 2, '23423', 3, 6, 'P', 'A', '2023-07-26 14:11:57', 1),
(39, 10, '30129114', 3, 5, 'P', 'A', '2023-05-25 19:48:15', 22),
(40, 10, '56454', 3, 5, 'S', 'A', '2023-05-25 20:30:59', 22),
(41, 11, '30544888', 3, 5, 'P', 'A', '2023-05-25 20:47:07', 22),
(42, 12, '798456', 3, 5, 'P', 'A', '2023-05-25 20:57:55', 22),
(43, 13, '6978412', 3, 5, 'P', 'A', '2023-05-25 21:00:19', 22),
(45, 4, '234', 3, 6, 'P', 'A', '2023-05-25 21:47:09', 21),
(46, 14, '547656', 4, 5, 'P', 'A', '2023-05-25 21:48:07', 22),
(47, 15, '852147', 3, 5, 'P', 'A', '2023-05-25 21:49:20', 22),
(49, 17, '5463456', 3, 8, 'P', 'A', '2023-05-26 17:51:47', 22),
(51, 18, '61579429', 3, 5, 'P', 'A', '2023-07-25 14:24:57', 21),
(52, 19, '12312', 3, 56, 'P', 'A', '2023-05-26 18:31:12', 21),
(53, 24, '3014904556', 3, 7, 'P', 'A', '2023-05-29 15:55:05', 21),
(55, 20, '789456', 3, 5, 'P', 'A', '2023-05-29 20:10:03', 22),
(56, 3, '43645', 3, 8, 'P', 'A', '2023-05-31 17:22:47', 22),
(57, 25, '35794156', 3, 7, 'P', 'A', '2023-06-23 13:53:38', 22),
(58, 26, '7564895', 3, 7, 'P', 'A', '2023-06-01 18:37:47', 20),
(59, 27, '456189', 3, 7, 'P', 'A', '2023-06-01 19:50:40', 22),
(60, 28, '3245345', 3, 7, 'P', 'A', '2023-06-01 19:54:09', 22),
(61, 29, '654645', 3, 7, 'P', 'A', '2023-06-01 20:00:25', 22),
(62, 30, '159753', 3, 7, 'P', 'A', '2023-06-05 18:32:50', 22),
(63, 31, '67867876', 3, 7, 'P', 'A', '2023-06-05 18:54:18', 1),
(64, 32, '56546', 3, 7, 'P', 'A', '2023-06-05 19:38:37', 30),
(65, 33, '3014904554', 3, 7, 'P', 'A', '2023-06-06 17:45:58', 20),
(66, 34, '4353453', 3, 7, 'P', 'A', '2023-06-06 20:18:20', 22),
(67, 35, '159789', 3, 7, 'P', 'A', '2023-06-06 15:26:22', 35),
(68, 21, '56547567', 3, 8, 'P', 'A', '2023-06-07 18:02:55', 22),
(70, 1, '7458945566', 3, 7, 'S', 'A', '2023-06-15 19:43:27', 1),
(71, 2, '7458964444', 3, 8, 'P', 'A', '2023-06-16 18:25:54', 1),
(72, 5, '3424332432', 3, 6, 'P', 'A', '2023-06-26 20:21:42', 20),
(73, 6, '3226618010', 3, 6, 'P', 'A', '2023-07-12 13:53:00', 21),
(74, 40, '3333333333', 3, 7, 'P', 'A', '2023-06-29 19:08:01', 1),
(75, 41, '1312321312', 3, 7, 'P', 'A', '2023-06-29 19:08:41', 1),
(77, 16, '5461324564', 3, 56, 'P', 'A', '2023-07-17 21:47:17', 22),
(78, 7, '4845653256', 3, 56, 'P', 'A', '2023-07-17 21:48:06', 22),
(79, 5, '4567858968', 3, 56, 'P', 'A', '2023-07-24 14:47:02', 22);

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
(1, 2, 'CTUSPRO', '123456', '', '', '', '', 'Calle 34', 8, 'A', '0000-00-00 00:00:00', 21),
(2, 2, 'AUTECO', '9012494137', NULL, NULL, NULL, NULL, 'VIA LAS PALMAS KM 15 750 LC L 104VIA LAS PALMAS KM 15 750 LC L 104', 8, 'A', '2023-03-02 11:08:57', 1),
(3, 2, 'Sie De Colombia S A E S P', '830095452-4', NULL, NULL, NULL, NULL, 'CALLE 35 SUR 34 D 21, BOGOTA, BOGOTA, COLOMBIA', 8, 'A', '2023-03-02 11:11:50', 22),
(4, 1, '', '33333', 'Moises', 'David', 'Mazo', 'Solano', 'Caaaa', 5, 'A', '2023-05-02 13:20:40', 1),
(5, 2, 'Colpatria', '7898755', NULL, NULL, NULL, NULL, 'calle Colpatria sur', 56, 'A', '2023-05-02 13:20:47', 0),
(6, 1, '', '7894646544', 'Yuleidis', 'Paolita', 'Avilez', 'Monterroza', 'Calle', 5, 'A', '2023-05-09 08:04:35', 22),
(7, 2, 'Renting', '123123', NULL, NULL, NULL, NULL, 'calle Renting', 56, 'A', '2023-05-16 13:16:24', 0),
(8, 1, '', '798794564', 'Mas Cliente', 'sdasdjk', 'djkasd', 'djasd', 'Callleelelee', 5, 'A', '2023-05-24 13:34:28', 22),
(9, 2, 'Prueba', '1245', NULL, NULL, NULL, NULL, 'calle2', 56, 'I', '2023-05-25 13:00:04', 0),
(10, 1, '', '1044651150', 'Yosolo', 'queriavaselar', 'sabercomoteva', 'enlauniversidad', 'calleao', 5, 'I', '2023-05-25 14:48:15', 22),
(11, 1, '', '104461050', 'Isabella', 'Nojoda', 'Mierda', 'Mierdaaaaaaaaaaaaaa', 'Cllehppppppp', 5, 'I', '2023-05-25 15:47:07', 22),
(12, 1, '', '456852', 'Prueba', 'uno', 'jams', 'jamases', 'calee456789', 5, 'I', '2023-05-25 15:57:55', 22),
(13, 1, '', '12346789', 'inreible', 'waosq', 'omg', 'diomio', 'calelle', 5, 'I', '2023-05-25 16:00:18', 22),
(14, 1, '', '468', 'ARGARE', 'REGAER', 'GERRE', 'ERGER', 'DFHG', 5, 'A', '2023-05-25 16:48:07', 22),
(15, 1, '', '456951', 'waos', 'memeo', 'jpo', 'ajajkk', 'calle', 5, 'I', '2023-05-25 16:49:20', 22),
(16, 2, 'pruebaSora', '2222222222', NULL, NULL, NULL, NULL, 'calleSora', 56, 'A', '2023-05-25 16:49:54', 0),
(17, 2, 'hfgh', '5645', NULL, NULL, NULL, NULL, 'gntyj', 8, 'I', '2023-05-26 12:51:47', 22),
(18, 1, '', '1597536', 'ky', 'manyl', 'west', 'este', 'callelocooo6', 5, 'A', '2023-05-26 13:16:16', 21),
(19, 2, 'dsdasd', '123', NULL, NULL, NULL, NULL, 'qwedqwsadasd', 56, 'I', '2023-05-26 13:31:12', 0),
(20, 1, '', '1597875', 'wasa', 'uva', 'uva', 'wasa', 'wasawasa', 5, 'A', '2023-05-29 15:10:03', 22),
(21, 2, 'COLETO', '1597865', NULL, NULL, NULL, NULL, 'calle colcodeco', 8, 'A', '2023-06-07 13:02:54', 22),
(22, 1, '', '1201201201', 'Prueba', 'sin', 'correo', 'telefono y email', '', 5, 'A', '2023-07-12 13:55:55', 21),
(23, 2, 'Yamaha', '12312311', NULL, NULL, NULL, NULL, 'kr 68 # 16b', 8, 'A', '2023-07-12 13:58:06', 1),
(24, 2, 'pruebasincorrtelemal', '1478520', NULL, NULL, NULL, NULL, '', 56, 'A', '2023-07-12 13:59:51', 0),
(25, 2, '               ', '4551545', NULL, NULL, NULL, NULL, '564561632132', 8, 'I', '2023-07-25 13:58:34', 21),
(26, 2, 'dsfsdfwsdf', '234342', NULL, NULL, NULL, NULL, 'sdfsdwsd', 56, 'A', '2023-07-25 14:03:54', 0),
(27, 1, '', '1234564532', 's', 's', 'd', 'd', '', 5, 'I', '2023-07-25 14:25:56', 21);

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
(1, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'A', '2023-06-21 13:52:06', 1),
(2, 1, 1, '1111111111', 'Ordenes', '', 'Entrega', 'Pruebas', 'calle 90 #45B', 'A', '2023-07-26 14:11:57', 1),
(3, 1, 1, '22222', 'prueba', 'ewre', 'asdd', 'dfdfd', 'calle', 'I', '2023-07-25 13:51:44', 21),
(4, 1, 1, '11111', 'prueba', '', 'asdas', 'asd', 'call', 'A', '2023-05-25 16:47:32', 21),
(5, 2, 1, '111', 'FDSS', 'AFDS', 'DSF', 'SAD', 'CRA203', 'I', '2023-06-26 15:21:46', 20),
(6, 4, 1, '11212312312', 'lsjnwna', 'fga', 'sdfA', 'dsfa', 'cra56#24-343', 'A', '2023-07-25 13:50:08', 21),
(7, 2, 1, '10212212', 'Prueba ', 'Sin', 'Correo ', 'telefono y email', '', 'A', '2023-07-25 13:51:16', 21);

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
(1, 1, 1, '123123', 'Moises', 'Davi', 'Mazo', 'Solano', 'A', '', '2023-02-25 01:10:22', '$2y$10$nDIgE3.lcH5J9QajBG3spuuHoIKPiuYGqPP/qyX8VWd3BhVF7fGJ.'),
(19, 4, 1, '789456123', 'Primer', '', 'Almacenista', 'Prueba', 'A', '', '2023-05-16 18:04:18', '$2y$10$FJBrOW2j4KRPbBNG4Z4s0u85cDWrAIWnW4Qk3vqgyWsejSRQsJ0gi'),
(20, 1, 1, '1043436814', 'Yuleidis', '', 'Avilez', 'Monterroza', 'A', 'fotoUser/20Yuleidis_1.png', '2023-05-25 18:02:10', '$2y$10$UKOUUE6KkVxDVCCCrRvZBevJhNGxre39aWtL7rK8E5oFsVx7fYVM2'),
(21, 1, 1, '1044606952', 'Juan ', '', 'Padilla', 'lklk', 'A', 'fotoUser/21Juan .png', '2023-05-25 18:05:08', '$2y$10$d00tYv.yBSmuC679LsnroO0y6OTJcR.bJoulGPjHMYIjHqd2bzXTe'),
(22, 1, 1, '1044610050', 'Isabella ', 'Canelitx', 'Collante', 'Mendez', 'A', 'fotoUser/22Isabella .png', '2023-05-25 18:05:18', '$2y$10$tQYsCLOsEj9VBtHfHslkqe51oMEl2jkbS2tJty/Z8vNeKILopQ0Cy'),
(23, 3, 1, '1044605537', 'Shadia', 'MARGARITA', 'Rangel', 'Pedrozo', 'A', 'fotoUser/23Shadia_1.png', '2023-05-25 18:07:51', '$2y$10$0IkUVov6wnuuck8IPSmnVufGGMLlmgr96bFlLLrpu1jF67o202wPS'),
(24, 3, 1, '147852', 'Yule', 'Almacen', 'avilez', 'monterroza', 'A', 'fotoUser/24Yule_4.png', '2023-05-29 18:00:36', '$2y$10$MxBOjvHVD8YbtuFJ8JUaiuDaODhmpsLl7YiAQUvIi0gDC81FZWwOy'),
(25, 1, 1, '15978645', 'metro', 'bomin', 'almacenista', 'nigga', 'A', '', '2023-06-01 18:35:54', '$2y$10$RZ2rO9gm4mzat9TyP57D8eltDFIjV6FgoMaHDUDoxuqo7/lyByJOq'),
(26, 1, 1, '312649875', 'traza', 'que', 'tyga', 'kylie', 'I', '', '2023-06-01 18:37:47', '$2y$10$9m3uM0F0klncShzknGZIoezC2O0an9tPHm3L2A9.ZkoStbdOB/lGu'),
(27, 1, 1, '1697534', 'kenye', 'what', 'west', 'lights', 'I', '', '2023-06-01 19:50:40', '$2y$10$k67XbqBw9SJq9v2Id7b.Z.7MTfngD0XIoptmhSusmObtLQLQUHlDy'),
(28, 1, 1, '4543', 'rgre', 'rher', 'rhte', 'tht', 'I', '', '2023-06-01 19:54:09', '$2y$10$c4i9O8ZI.LsZck/SLCzr7.rn5D5.eAB4L.TbBDRfr8L7K/XcU2eYa'),
(29, 1, 1, '4634', 'hsdhf', 'gjhsftj', 'sgjsg', 'gfjf', 'I', '', '2023-06-01 20:00:24', '$2y$10$SUM9PTCRGMeNkpsKPDOWee8tQDae285qvAPWQE1z5K/ATGqfdY4c.'),
(30, 1, 1, '123456', 'prueba', 'numero', 'idk', 'muchas', 'A', '', '2023-06-05 18:32:50', '$2y$10$kzlMVcuARTIG/yd5IWO3sOLJ3FcWRShz2KkFuXpFUdmI7zmn17tHq'),
(31, 1, 1, '123456789', 'otra', 'prueba', 'ver', 'foto', 'A', 'fotoUser/31otra.png', '2023-06-05 18:54:17', '$2y$10$wy/GJaWUVgVJQIfnm778i.zxb5.ZiRYHcPwetT5z/sZma93YteZWW'),
(32, 1, 1, '67567', 'ujgyjm', 'ujkm,y', 'tykm', 'ukry', 'I', '', '2023-06-05 19:38:37', '$2y$10$1sXprncgCJaykhfUe9Brx./lifMA7wkwIUFBAeYHoU0Y.Ox7NEGoO'),
(33, 1, 1, '123456780', 'lalalalal', 'lallalalal', 'lalalalalla', 'lalalalalal', 'I', 'fotoUser/0lalalalal.png', '2023-06-06 17:45:58', '$2y$10$xysj4NdxCZu4r8B7ElYVa.9PYi4bxj73EUsd0EYRe2mqmN11T5qCW'),
(34, 1, 1, '56456', 'fghsth', 'hsdh', 'fdhdh', 'dhgsgdh', 'I', '', '2023-06-06 20:18:20', '$2y$10$l1YLfHxC6WPW/t8JXbVw6OClqzaG1bPy9acQIjGIcWmAXtlC9xFZa'),
(35, 2, 1, '1234566', 'barbie', 'fashionista', 'bum', 'baia', 'I', 'descarga.png', '2023-06-06 20:24:33', '$2y$10$bX52kA5ckLQMP9UeG2d28eF6BrcmJwQoJB0K2vxtSQ3bwsgi3XCzC'),
(36, 3, 1, '1231231', 'Nuevo', '', 'Usuario', 'Prueva', 'I', 'fotoUser/default.png', '2023-06-07 20:38:04', '$2y$10$mVMFZJ.IXAUb.qeljs3BkOgEwXfCpkkckqBu6lnnfm9vtfZS8dMi6'),
(37, 1, 1, '33123', 'qwe', '', 'qwe', 'qwe', 'I', 'fotoUser/default.png', '2023-06-07 20:43:19', '$2y$10$MPDlSHrR9tEtS7RNlhLqieC0Eh76esvPlWKLKEErJEzYZKGXQCFya'),
(38, 1, 1, '31231', 'edc', '', 'edc', 'edc', 'I', 'fotoUser/default.png', '2023-06-07 20:50:09', '$2y$10$9Tr39exvEmfaQlyEXJa4ye6LRk0hZ1mxkuTxrN5/6TJCV4PBslNEW'),
(39, 1, 1, '15978964', 'prueba', 'para', 'telefono', 'correo', 'I', 'fotoUser/0prueba.png', '2023-06-07 21:06:11', '$2y$10$S7XEZdoI9WjXXqA0pyr3y.7N995vjXRQRtCyvyYf9PliCUc0HeRtO'),
(40, 1, 1, '1231237', 'Nuevo', '', 'Prueba', 'Usuario', 'A', 'fotoUser/0Nuevo.png', '2023-06-29 19:08:01', '$2y$10$OTxa0kkVzPWYJHZrvSZd2OXLcbJXe734SQN3TQMzT8HzHYz88/yBe'),
(41, 1, 1, '12212', 'asda', 'sdda', 'sdasd', 'adsad', 'A', 'fotoUser/default.png', '2023-06-29 19:08:41', '$2y$10$Y3a8HuTort1uTCIh3YLqbeHPFGpHblhnSefJV3DWcuD8NteI8JrOC'),
(42, 1, 1, '124578', 'Prueba sin', 'correo', 'email', 'tel', 'A', 'fotoUser/default.png', '2023-07-12 19:03:36', '$2y$10$c6ArsWIhqRf6kYbF/.kiPOElOOPVPXuAYd52.WoT6/37kCNvVDxsu');

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
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `id_marca`, `placa`, `linea`, `modelo`, `color`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 'QWE133', '', '2017', 'Rojo', 'A', '2023-05-29 20:36:20', 1),
(2, 10, 'MOI123', '', '2018', 'Rojo', '3', '2023-05-29 21:01:58', 1),
(3, 1, 'PIO489', '', '2020', 'Amarillo', 'A', '2023-05-31 20:09:55', 20),
(4, 3, 'QWE111', '', '2021', 'Rojo Mate', 'A', '2023-06-02 18:01:59', 1),
(5, 5, 'TRY345', '', '2018', 'Amarillo', 'A', '2023-06-02 18:03:50', 1),
(6, 3, 'OIU333', '', '2020', 'Verde', 'A', '2023-06-02 18:06:46', 1),
(7, 1, 'POI333', '', '2021', 'Salmon', 'A', '2023-06-02 18:10:36', 1),
(8, 4, 'MOI333', '', '2020', 'Gris', 'A', '2023-06-02 18:13:22', 1),
(9, 8, 'QWE147', '', '2022', 'Rojo', 'A', '2023-06-02 18:25:18', 1),
(10, 3, 'DEO122', '', '2025', 'aZUL', 'A', '2023-06-02 18:39:11', 1),
(11, 1, 'WSD222', '', '2020', 'Esmeralda', 'A', '2023-06-02 19:39:13', 1),
(12, 4, 'POL741', '', '2012', 'Lila', 'A', '2023-06-02 19:56:16', 1),
(13, 3, 'POL87899', '', '2020', 'Oros', 'A', '2023-06-02 20:04:26', 22),
(14, 3, 'LOL159', '', '2021', 'Azul', 'A', '2023-06-02 20:08:02', 1),
(15, 3, 'ILO333', '', '2020', 'Azul', 'A', '2023-06-02 20:10:30', 1),
(16, 1, 'ASD123', '', '2025', 'rojo', 'A', '2023-07-25 20:53:53', 21);

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

CREATE VIEW `vw_param_det`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_param_det2`
--
DROP TABLE IF EXISTS `vw_param_det2`;

CREATE VIEW `vw_param_det2`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_usuarios`
--
DROP TABLE IF EXISTS `vw_usuarios`;

CREATE VIEW `vw_usuarios`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, `usuarios`.`id_rol` AS `id_rol`, `usuarios`.`tipo_doc` AS `tipo_doc`, `usuarios`.`n_identificacion` AS `n_identificacion`, `usuarios`.`nombre_p` AS `nombre_p`, `usuarios`.`nombre_s` AS `nombre_s`, `usuarios`.`apellido_p` AS `apellido_p`, `usuarios`.`apellido_s` AS `apellido_s`, `usuarios`.`estado` AS `estado`, `usuarios`.`foto` AS `foto`, `usuarios`.`fecha_crea` AS `fecha_crea`, `usuarios`.`contrasena` AS `contrasena` FROM `usuarios` ;

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
  ADD PRIMARY KEY (`id_email`);

--
-- Indices de la tabla `estanteria`
--
ALTER TABLE `estanteria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `filas`
--
ALTER TABLE `filas`
  ADD PRIMARY KEY (`id_fila`);

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
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  ADD PRIMARY KEY (`id_movimientodet`);

--
-- Indices de la tabla `movimiento_enc`
--
ALTER TABLE `movimiento_enc`
  ADD PRIMARY KEY (`id_movimientoenc`);

--
-- Indices de la tabla `numero_temp`
--
ALTER TABLE `numero_temp`
  ADD PRIMARY KEY (`id_numTep`);

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
  ADD PRIMARY KEY (`id_permiso`);

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
  ADD KEY `id_marca` (`id_marca`);

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
  MODIFY `id_fila` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `inv_orden`
--
ALTER TABLE `inv_orden`
  MODIFY `id_inv_orden` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT de la tabla `marca_vehiculo`
--
ALTER TABLE `marca_vehiculo`
  MODIFY `id_marca` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  MODIFY `id_movimientodet` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimiento_enc`
--
ALTER TABLE `movimiento_enc`
  MODIFY `id_movimientoenc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `numero_temp`
--
ALTER TABLE `numero_temp`
  MODIFY `id_numTep` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordenes_servicio`
--
ALTER TABLE `ordenes_servicio`
  MODIFY `id_orden` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `param_detalle`
--
ALTER TABLE `param_detalle`
  MODIFY `id_param_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  MODIFY `id_peticion` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id_propietario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `id_tercero` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tipo_marca`
--
ALTER TABLE `tipo_marca`
  MODIFY `id_marca` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `param_detalle`
--
ALTER TABLE `param_detalle`
  ADD CONSTRAINT `id_param_enc` FOREIGN KEY (`id_param_enc`) REFERENCES `param_encabezado` (`id_param_enc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `tipo_validacion` FOREIGN KEY (`tipo_validacion`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD CONSTRAINT `tipo_tercero` FOREIGN KEY (`tipo_propietario`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `tipo_telefono` FOREIGN KEY (`tipo_telefono`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD CONSTRAINT `terceros_ibfk_1` FOREIGN KEY (`tipo_doc`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `terceros_ibfk_2` FOREIGN KEY (`tipo_tercero`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `id_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`tipo_identificacion`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_doc` FOREIGN KEY (`tipo_doc`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca_vehiculo` (`id_marca`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
