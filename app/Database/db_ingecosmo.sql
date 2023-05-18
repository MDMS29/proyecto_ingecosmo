-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2023 a las 05:09:21
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

DROP TABLE IF EXISTS `acciones`;
CREATE TABLE IF NOT EXISTS `acciones` (
  `id_accion` smallint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_accion`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id_cargo` smallint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id_email` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_usuario` smallint(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prioridad` char(1) NOT NULL COMMENT 'P = Primaria - S = Secundaria',
  `tipo_usuario` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_email`),
  KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_usuario`, `email`, `prioridad`, `tipo_usuario`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 'mazomoiss@gmail.com', 'S', 7, 'A', '2023-05-10 13:40:15', 4),
(2, 1, 'mdmazo30@misena.edu.co', 'P', 6, 'A', '2023-03-02 14:34:47', 2),
(3, 1, 'john.doe@example.com', 'P', 8, 'A', '2023-03-02 14:47:53', 2),
(4, 1, 'sarahsmith88@gmail.com', 'S', 8, 'A', '2023-03-02 14:47:53', 2),
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
(26, 1, 'jual1010@gmail.', 'P', 7, 'A', '2023-05-10 13:40:15', 4),
(27, 17, 'juanlm1120@gmail.com', 'S', 7, 'A', '2023-05-04 21:13:52', 1),
(28, 18, 'juanlm10@gmail.co', 'P', 7, 'A', '2023-05-12 12:26:31', 4),
(29, 18, 'asdsd@gmail.com', 'S', 7, 'A', '2023-05-11 14:15:50', 4),
(31, 6, 'asdsad@gmail.com', 'S', 5, 'A', '2023-05-11 19:30:09', 4),
(32, 19, 'prueba@gmail.com', 'P', 7, 'A', '2023-05-16 18:04:18', 1),
(33, 4, 'adasd', 'P', 5, 'A', '2023-05-18 05:58:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteria`
--

DROP TABLE IF EXISTS `estanteria`;
CREATE TABLE IF NOT EXISTS `estanteria` (
  `id` smallint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `n_iconos` varchar(30) NOT NULL,
  `tipo_estante` smallint(2) NOT NULL,
  PRIMARY KEY (`id`)
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
-- Estructura de tabla para la tabla `marca_vehiculo`
--

DROP TABLE IF EXISTS `marca_vehiculo`;
CREATE TABLE IF NOT EXISTS `marca_vehiculo` (
  `id_marca` smallint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca_vehiculo`
--

INSERT INTO `marca_vehiculo` (`id_marca`, `nombre`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Chevrolet', 'A', '2023-02-28 16:40:25', 2),
(2, 'Audi', 'A', '2023-03-02 13:00:26', 2),
(3, 'BMW', 'A', '2023-03-02 13:00:26', 2),
(4, 'Dacia', 'A', '2023-03-02 13:00:26', 2),
(5, 'Ferrari', 'A', '2023-03-02 13:00:26', 2),
(6, 'Ford', 'A', '2023-03-02 13:02:25', 2),
(7, 'Honda', 'A', '2023-03-02 13:02:25', 2),
(8, 'Hyundai', 'A', '2023-03-02 13:02:25', 2),
(9, 'Infiniti', 'A', '2023-03-02 13:02:25', 2),
(10, 'Jeep', 'A', '2023-03-02 13:04:30', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

DROP TABLE IF EXISTS `materiales`;
CREATE TABLE IF NOT EXISTS `materiales` (
  `id_material` smallint(2) NOT NULL,
  `id_vehiculo` smallint(2) DEFAULT NULL,
  `id_proveedor` smallint(2) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria_material` smallint(2) NOT NULL,
  `tipo_material` smallint(2) NOT NULL,
  `cantidad_actual` decimal(5,0) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `fecha_ultimo_ingre` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_ultimo_salid` datetime DEFAULT NULL,
  `estante` smallint(2) NOT NULL,
  `fila` char(2) NOT NULL COMMENT 'Si el material se encuentra en diferentes estantes o filas, esta debe ser dividida con un indicador. Ej: 1 - 2 - 3',
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `cantidad_vendida` decimal(7,0) NOT NULL,
  PRIMARY KEY (`id_material`),
  KEY `tipo_material` (`tipo_material`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `categoria_material` (`categoria_material`),
  KEY `estante` (`estante`),
  KEY `id_vehiculo` (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `id_vehiculo`, `id_proveedor`, `nombre`, `categoria_material`, `tipo_material`, `cantidad_actual`, `precio_venta`, `precio_compra`, `fecha_ultimo_ingre`, `fecha_ultimo_salid`, `estante`, `fila`, `estado`, `fecha_crea`, `usuario_crea`, `cantidad_vendida`) VALUES
(1, NULL, 1, 'Broca38', 26, 9, 10, 2500.00, 2000.00, '2023-05-04 10:38:26', NULL, 1, 'B1', 'A', '2023-03-02 17:20:51', 2, 5),
(2, NULL, 2, 'Discos de corte 4 pulgadas walt', 30, 9, 5, 110000.00, 99900.00, '2023-05-04 10:39:58', '2023-03-01 11:12:10', 2, 'D1', 'A', '2023-03-02 21:22:24', 2, 9),
(3, 9, 3, 'Bateria316', 28, 9, 10, 35000.00, 27800.00, '2023-05-08 08:45:04', '2023-03-01 11:34:16', 3, 'A2', 'A', '2023-03-02 21:37:02', 2, 8),
(4, 7, 3, 'Bateria897', 28, 9, 2, 10000000.00, 10000000.00, '2023-05-09 10:23:52', '2023-04-10 13:34:43', 3, 'A2', 'A', '2023-04-21 23:35:27', 2, 7),
(5, 8, 2, 'Bateria42', 28, 9, 10, 80000.00, 60000.00, '2023-05-08 08:45:55', '2023-04-02 11:50:42', 3, 'A3', 'A', '2023-04-23 21:51:49', 2, 12),
(6, 13, 1, 'Batería VRLA', 28, 9, 6, 80000.00, 4000.00, '2023-05-04 10:38:08', '2023-03-02 16:14:09', 3, 'A2', 'A', '2023-04-24 02:32:30', 2, 11),
(7, 13, 3, 'Batería de AGM:', 28, 9, 3, 30000.00, 15000.00, '2023-05-04 10:34:07', '2023-04-03 16:14:09', 3, 'A1', 'A', '2023-04-24 02:32:30', 2, 14),
(8, 8, 3, 'Batería de gel', 28, 9, 43, 80000.00, 60000.00, '2023-05-04 10:38:12', '2023-04-02 11:50:42', 3, 'A3', 'A', '2023-04-24 02:34:23', 2, 32),
(9, 7, 3, 'Baterias de iones', 28, 9, 10, 700000.00, 40000.00, '2023-05-04 10:38:18', '2023-04-02 11:50:42', 3, 'A3', 'A', '2023-04-24 02:36:56', 2, 12),
(10, 9, 3, 'Pintura 326', 32, 9, 2, 1000000.00, 200000.00, '2023-05-09 09:04:37', '2023-04-03 08:38:15', 5, 'G1', 'A', '2023-04-27 18:50:50', 2, 16),
(14, NULL, NULL, 'Bateria1111', 28, 9, 12, 0.00, 123.00, '2023-05-04 10:42:46', NULL, 3, 'A4', 'A', '2023-04-29 01:02:43', 0, 0),
(15, NULL, NULL, 'Bateria1111', 28, 9, 12, 0.00, 123.00, '2023-05-04 10:42:49', NULL, 3, 'A4', 'A', '2023-04-29 01:02:49', 0, 0),
(16, NULL, NULL, 'Bateria34', 28, 9, 25, 0.00, 10000.00, '2023-05-04 10:42:51', NULL, 3, 'A4', 'A', '2023-04-29 01:05:43', 0, 0),
(17, NULL, NULL, 'Bateria21', 28, 9, 15, 20000.00, 10000.00, '2023-05-04 10:42:55', NULL, 3, 'A1', 'A', '2023-04-29 01:10:28', 0, 0),
(18, NULL, NULL, 'Broca34', 26, 9, 15, 50200.00, 12000.00, '2023-05-08 08:47:07', NULL, 1, 'B2', 'A', '2023-04-29 01:11:20', 0, 0),
(19, NULL, NULL, 'Bombillo1', 29, 9, 50, 30000.00, 20000.00, '2023-05-04 10:41:07', NULL, 4, 'C2', 'A', '2023-04-29 01:12:12', 0, 0),
(20, NULL, NULL, 'Aceite', 31, 9, 45, 25000.00, 15000.00, '2023-05-04 10:41:16', NULL, 6, 'H1', 'A', '2023-04-29 01:16:53', 0, 0),
(21, NULL, NULL, 'broca45', 26, 9, 48, 20000.00, 12000.00, '2023-05-04 10:43:44', NULL, 1, 'B2', 'A', '2023-04-29 01:22:05', 0, 0),
(22, NULL, NULL, 'cfdfgv', 28, 9, 33, 333.00, 333.00, '2023-05-04 10:43:50', NULL, 3, 'A3', 'A', '2023-05-03 23:52:33', 0, 0),
(23, NULL, NULL, 'Broca56', 26, 9, 2, 1500.00, 1200.00, '2023-05-04 10:41:35', NULL, 1, 'B3', 'A', '2023-05-03 23:54:09', 0, 0),
(24, NULL, NULL, 'Discos de corte 5 pul', 30, 9, 32, 3000.00, 2000.00, '2023-05-04 10:43:59', NULL, 2, 'D4', 'A', '2023-05-04 01:49:16', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_det`
--

DROP TABLE IF EXISTS `movimiento_det`;
CREATE TABLE IF NOT EXISTS `movimiento_det` (
  `id_movimientodet` smallint(4) NOT NULL AUTO_INCREMENT,
  `id_movimientoenc` smallint(2) NOT NULL,
  `id_material` smallint(2) NOT NULL,
  `item` smallint(2) NOT NULL,
  `cantidad` smallint(2) NOT NULL,
  `costo` decimal(11,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_movimientodet`),
  KEY `enc_detalle` (`id_movimientoenc`),
  KEY `material_det` (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimiento_det`
--

INSERT INTO `movimiento_det` (`id_movimientodet`, `id_movimientoenc`, `id_material`, `item`, `cantidad`, `costo`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 1, 1, 10, 20000.00, 'A', '2023-03-01 13:18:46', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_enc`
--

DROP TABLE IF EXISTS `movimiento_enc`;
CREATE TABLE IF NOT EXISTS `movimiento_enc` (
  `id_movimientoenc` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_tercero` smallint(2) DEFAULT NULL,
  `id_vehiculo` smallint(2) NOT NULL,
  `id_trabajador` smallint(2) DEFAULT NULL,
  `fecha_movimiento` date NOT NULL,
  `tipo_movimiento` smallint(2) NOT NULL,
  `estado` char(2) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_movimientoenc`),
  KEY `tercero_enc` (`id_tercero`),
  KEY `id_trabajador` (`id_trabajador`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `tipo_movimiento` (`tipo_movimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimiento_enc`
--

INSERT INTO `movimiento_enc` (`id_movimientoenc`, `id_tercero`, `id_vehiculo`, `id_trabajador`, `fecha_movimiento`, `tipo_movimiento`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 4, 1, NULL, '2023-05-14', 57, '45', '2023-05-15 04:53:14', 4),
(2, 4, 1, NULL, '2023-05-14', 58, '38', '2023-05-15 04:54:52', 0),
(3, 4, 1, NULL, '2023-05-16', 59, '43', '2023-05-16 16:44:45', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_detalle`
--

DROP TABLE IF EXISTS `param_detalle`;
CREATE TABLE IF NOT EXISTS `param_detalle` (
  `id_param_det` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_param_enc` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `resumen` char(5) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `n_iconos` varchar(20) NOT NULL,
  PRIMARY KEY (`id_param_det`) USING BTREE,
  KEY `id_param_enc` (`id_param_enc`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 5, 'Entrada', 'En', 'A', '2023-02-28 16:39:02', 2, ''),
(12, 5, 'Salida', 'Sa', 'A', '2023-02-28 16:39:02', 2, ''),
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
(59, 5, 'Cambio de Estado - Vehiculo', 'CEV', 'A', '2023-05-12 15:30:51', 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_encabezado`
--

DROP TABLE IF EXISTS `param_encabezado`;
CREATE TABLE IF NOT EXISTS `param_encabezado` (
  `id_param_enc` smallint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_param_enc`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(12, 'Estado Vehiculo', 'A', '2023-04-19 13:45:35', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_rol` smallint(2) NOT NULL,
  `id_accion` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo \r\n',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `id_accion` (`id_accion`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
CREATE TABLE IF NOT EXISTS `propietarios` (
  `id_propietario` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` smallint(2) NOT NULL,
  `id_tercero` smallint(2) NOT NULL,
  `tipo_propietario` smallint(2) NOT NULL,
  PRIMARY KEY (`id_propietario`),
  KEY `tercero_propietario` (`id_tercero`),
  KEY `vehiculo_propietario` (`id_vehiculo`),
  KEY `tipo_tercero` (`tipo_propietario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id_propietario`, `id_vehiculo`, `id_tercero`, `tipo_propietario`) VALUES
(1, 1, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` smallint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

DROP TABLE IF EXISTS `telefonos`;
CREATE TABLE IF NOT EXISTS `telefonos` (
  `id_telefono` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_usuario` smallint(2) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `tipo_telefono` smallint(2) NOT NULL,
  `tipo_usuario` smallint(2) NOT NULL,
  `prioridad` char(1) NOT NULL COMMENT 'P = Primaria - S = Secundaria',
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_telefono`),
  KEY `tipo_telefono` (`tipo_telefono`),
  KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id_telefono`, `id_usuario`, `numero`, `tipo_telefono`, `tipo_usuario`, `prioridad`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 2, '3012911437', 3, 5, 'P', 'A', '2023-02-28 14:52:57', 2),
(2, 1, '3012918888', 3, 6, 'S', 'A', '2023-02-28 14:52:08', 2),
(4, 4, '3135604242', 3, 7, 'P', 'A', '2023-04-27 17:29:20', 4),
(5, 5, '313213', 3, 7, 'P', 'A', '2023-05-03 18:21:31', 1),
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
(22, 1, '333339', 4, 7, 'P', 'A', '2023-05-10 13:40:15', 4),
(23, 1, '12', 3, 7, 'S', 'A', '2023-05-10 13:40:15', 4),
(24, 17, '123', 3, 7, 'P', 'A', '2023-05-04 21:13:52', 1),
(25, 18, '3332', 3, 7, 'S', 'A', '2023-05-10 13:32:29', 4),
(26, 6, '132132', 3, 5, 'P', 'A', '2023-05-11 19:30:09', 4),
(27, 19, '123123', 3, 7, 'P', 'A', '2023-05-16 18:04:18', 1),
(29, 4, '123', 3, 5, 'P', 'A', '2023-05-18 06:03:51', 1),
(30, 4, '4444', 3, 5, 'S', 'A', '2023-05-18 08:06:05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

DROP TABLE IF EXISTS `terceros`;
CREATE TABLE IF NOT EXISTS `terceros` (
  `id_tercero` smallint(2) NOT NULL AUTO_INCREMENT,
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
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_tercero`) USING BTREE,
  KEY `tipo_doc` (`tipo_doc`) USING BTREE,
  KEY `tipo_tercero` (`tipo_tercero`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`id_tercero`, `tipo_doc`, `razon_social`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `direccion`, `tipo_tercero`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 2, 'CTUSPRO', '123456', '', '', '', '', 'Calle 34', 8, 'A', '0000-00-00 00:00:00', 2),
(2, 2, 'AUTECO', '9012494137', NULL, NULL, NULL, NULL, 'VIA LAS PALMAS KM 15 750 LC L 104VIA LAS PALMAS KM 15 750 LC L 104', 8, 'A', '2023-03-02 11:08:57', 2),
(3, 2, 'Sie De Colombia S A E S P', '830095452-4', NULL, NULL, NULL, NULL, 'CALLE 35 SUR 34 D 21, BOGOTA, BOGOTA, COLOMBIA', 8, 'A', '2023-03-02 11:11:50', 2),
(4, 1, '', '33333', 'Moises', 'David', 'Mazo', 'Solano', 'Caaaa', 5, 'A', '2023-05-02 13:20:40', 1),
(5, 2, 'Colpatria', '7898755', NULL, NULL, NULL, NULL, 'c', 56, 'A', '2023-05-02 13:20:47', 0),
(6, 1, '', '789456', 'Yuleidis', 'Paola', 'Avilez', 'Monterroza', 'Calle', 5, 'A', '2023-05-09 08:04:35', 4),
(7, 2, 'Renting', '123123', NULL, NULL, NULL, NULL, 'calle 76', 56, 'A', '2023-05-16 13:16:24', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `id_trabajador` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_cargo` smallint(2) NOT NULL,
  `tipo_identificacion` smallint(2) NOT NULL,
  `n_identificacion` varchar(15) NOT NULL,
  `nombre_p` varchar(30) NOT NULL,
  `nombre_s` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_s` varchar(30) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_trabajador`),
  KEY `tipo_identificacion` (`tipo_identificacion`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `id_cargo`, `tipo_identificacion`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `direccion`, `estado`, `fecha_usuario`, `usuario_crea`) VALUES
(1, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'I', '2023-05-16 11:31:35', 2),
(2, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'A', '2023-05-16 11:38:27', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` smallint(2) NOT NULL AUTO_INCREMENT,
  `id_rol` smallint(2) NOT NULL,
  `tipo_doc` smallint(2) NOT NULL,
  `n_identificacion` varchar(15) NOT NULL,
  `nombre_p` varchar(30) NOT NULL,
  `nombre_s` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_s` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Activo - I = Inactivo',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `contrasena` varchar(300) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `tipo_doc` (`tipo_doc`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `tipo_doc`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `estado`, `fecha_crea`, `contrasena`) VALUES
(1, 1, 1, '123123', 'Moises', 'David', 'Mazo', 'Solano', 'A', '2023-02-25 01:10:22', '$2y$10$MJTlJO04TkugBK6pm0OWmu5k4isVSAjmynACyjeMWqkRT/cGKqGJC'),
(19, 3, 1, '147852', 'Primer', '', 'Almacenista', 'Prueba', 'A', '2023-05-16 18:04:18', '$2y$10$0RZuPbLwodEF.ZsvfcXrzeYTKcaUsQ9eHSEuWGV0F5X2/WknDRoRe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id_vehiculo` smallint(2) NOT NULL AUTO_INCREMENT,
  `n_orden` varchar(15) NOT NULL,
  `id_marca` smallint(2) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `linea` varchar(20) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `color` varchar(15) NOT NULL,
  `kms` varchar(10) NOT NULL,
  `n_combustible` smallint(2) NOT NULL,
  `estado` smallint(2) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `id_marca` (`id_marca`),
  KEY `n_combustible` (`n_combustible`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `n_orden`, `id_marca`, `placa`, `linea`, `modelo`, `color`, `kms`, `n_combustible`, `estado`, `fecha_entrada`, `fecha_salida`, `fecha_crea`, `usuario_crea`) VALUES
(1, '1', 1, 'qwe123', '', '2023', 'Azul', '79844', 35, 43, '2023-05-14', '2023-05-14', '2023-05-15 04:53:14', 4);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_param_det`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_param_det`;
CREATE TABLE IF NOT EXISTS `vw_param_det` (
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
DROP VIEW IF EXISTS `vw_param_det2`;
CREATE TABLE IF NOT EXISTS `vw_param_det2` (
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
-- Estructura para la vista `vw_param_det`
--
DROP TABLE IF EXISTS `vw_param_det`;

DROP VIEW IF EXISTS `vw_param_det`;
CREATE OR REPLACE VIEW `vw_param_det`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_param_det2`
--
DROP TABLE IF EXISTS `vw_param_det2`;

DROP VIEW IF EXISTS `vw_param_det2`;
CREATE OR REPLACE VIEW `vw_param_det2`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle` ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `categoria_material` FOREIGN KEY (`categoria_material`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estante` FOREIGN KEY (`estante`) REFERENCES `estanteria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `terceros` (`id_tercero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_material` FOREIGN KEY (`tipo_material`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  ADD CONSTRAINT `enc_detalle` FOREIGN KEY (`id_movimientoenc`) REFERENCES `movimiento_enc` (`id_movimientoenc`),
  ADD CONSTRAINT `material_det` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`);

--
-- Filtros para la tabla `movimiento_enc`
--
ALTER TABLE `movimiento_enc`
  ADD CONSTRAINT `movimiento_enc_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_enc_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_enc_ibfk_3` FOREIGN KEY (`tipo_movimiento`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tercero_enc` FOREIGN KEY (`id_tercero`) REFERENCES `terceros` (`id_tercero`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `param_detalle`
--
ALTER TABLE `param_detalle`
  ADD CONSTRAINT `id_param_enc` FOREIGN KEY (`id_param_enc`) REFERENCES `param_encabezado` (`id_param_enc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `id_accion` FOREIGN KEY (`id_accion`) REFERENCES `acciones` (`id_accion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD CONSTRAINT `tercero_propietario` FOREIGN KEY (`id_tercero`) REFERENCES `terceros` (`id_tercero`),
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
  ADD CONSTRAINT `estado` FOREIGN KEY (`estado`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `n_combus` FOREIGN KEY (`n_combustible`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca_vehiculo` (`id_marca`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
