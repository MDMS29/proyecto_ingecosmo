-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 17:32:03
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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

DROP TABLE IF EXISTS `cargos`;
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

DROP TABLE IF EXISTS `email`;
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
(31, 6, 'asdsad@gmail.com', 'S', 5, 'A', '2023-05-11 19:30:09', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteria`
--

DROP TABLE IF EXISTS `estanteria`;
CREATE TABLE `estanteria` (
  `id` smallint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `n_iconos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estanteria`
--

INSERT INTO `estanteria` (`id`, `nombre`, `fecha_crea`, `usuario_crea`, `estado`, `n_iconos`) VALUES
(1, 'Brocas', '2023-05-10 13:10:18', 3, 'A', 'brocas.png'),
(2, 'Discos', '2023-05-10 13:10:11', 3, 'A', 'discos.png'),
(3, 'Baterias', '2023-05-10 13:10:11', 3, 'A', 'baterias:png'),
(4, 'Bombillerias', '2023-05-10 13:10:11', 3, 'A', 'bombillerias.png'),
(5, 'Pinturas', '2023-05-10 13:10:11', 3, 'A', 'pinturas.png'),
(6, 'Aceites', '2023-05-10 13:10:11', 3, 'A', 'aceites.png'),
(7, 'Remaches', '2023-05-10 13:10:11', 3, 'A', 'remaches.png'),
(8, 'Lubricantes', '2023-05-10 13:10:11', 3, 'A', 'lubricantes.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_vehiculo`
--

DROP TABLE IF EXISTS `marca_vehiculo`;
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
CREATE TABLE `materiales` (
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
  `estante` varchar(2) NOT NULL,
  `fila` char(1) NOT NULL COMMENT 'Si el material se encuentra en diferentes estantes o filas, esta debe ser dividida con un indicador. Ej: 1 - 2 - 3',
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `cantidad_vendida` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `id_vehiculo`, `id_proveedor`, `nombre`, `categoria_material`, `tipo_material`, `cantidad_actual`, `precio_venta`, `precio_compra`, `fecha_ultimo_ingre`, `fecha_ultimo_salid`, `estante`, `fila`, `estado`, `fecha_crea`, `usuario_crea`, `cantidad_vendida`) VALUES
(1, NULL, 1, 'Broca38', 26, 9, '10', '2500.00', '2000.00', '2023-04-27 09:18:25', NULL, 'B', '1', 'A', '2023-03-02 12:20:51', 2, '5'),
(2, NULL, 2, 'Discos de corte 4 pulgadas walt', 30, 9, '5', '110000.00', '99900.00', '2023-04-27 09:17:40', '2023-03-01 11:12:10', 'A', '4', 'A', '2023-03-02 16:22:24', 2, '9'),
(3, 9, 3, 'Bateria316', 28, 9, '10', '35000.00', '27800.00', '2023-04-27 09:16:02', '2023-03-01 11:34:16', 'A', '3', 'A', '2023-03-02 16:37:02', 2, '8'),
(4, 7, 3, 'Bateria897', 28, 9, '2', '10000000.00', '10000000.00', '2023-04-27 09:17:04', '2023-04-10 13:34:43', 'b', 'a', 'A', '2023-04-21 18:35:27', 2, '7'),
(5, 8, 2, 'Bateria42', 28, 9, '10', '80000.00', '60000.00', '2023-04-27 09:16:48', '2023-04-02 11:50:42', 'B', 'A', 'A', '2023-04-23 16:51:49', 2, '12'),
(6, 13, 1, 'Batería VRLA', 28, 9, '6', '80000.00', '4000.00', '2023-04-27 09:17:27', '2023-03-02 16:14:09', 'B', 'A', 'A', '2023-04-23 21:32:30', 2, '11'),
(7, 13, 3, 'Batería de AGM:', 28, 9, '3', '30000.00', '15000.00', '2023-04-27 09:15:21', '2023-04-03 16:14:09', 'B', 'A', 'A', '2023-04-23 21:32:30', 2, '14'),
(8, 8, 3, 'Batería de gel', 28, 9, '43', '80000.00', '60000.00', '2023-04-27 09:16:39', '2023-04-02 11:50:42', 'B', 'A', 'A', '2023-04-23 21:34:23', 2, '32'),
(9, 7, 3, 'Baterias de iones', 28, 9, '10', '700000.00', '40000.00', '2023-04-27 09:16:15', '2023-04-02 11:50:42', 'B', '4', 'A', '2023-04-23 21:36:56', 2, '12'),
(10, 9, 3, 'Pintura 326', 32, 9, '2', '1000000.00', '200000.00', '2023-04-27 08:50:50', '2023-04-03 08:38:15', '1', 'A', 'A', '2023-04-27 13:50:50', 2, '16'),
(14, NULL, NULL, 'Bateria1111', 28, 9, '12', '0.00', '123.00', '2023-04-28 10:02:43', NULL, '', '', 'A', '2023-04-28 20:02:43', 0, '0'),
(15, NULL, NULL, 'Bateria1111', 28, 9, '12', '0.00', '123.00', '2023-04-28 10:02:49', NULL, '', '', 'A', '2023-04-28 20:02:49', 0, '0'),
(16, NULL, NULL, 'Bateria34', 28, 9, '25', '0.00', '10000.00', '2023-04-28 10:05:43', NULL, '', '', 'A', '2023-04-28 20:05:43', 0, '0'),
(17, NULL, NULL, 'Bateria21', 28, 9, '15', '20000.00', '10000.00', '2023-04-28 10:10:28', NULL, '', '', 'A', '2023-04-28 20:10:28', 0, '0'),
(18, NULL, NULL, 'Broca34', 26, 9, '15', '50200.00', '12000.00', '2023-04-28 10:11:20', NULL, '', '', 'A', '2023-04-28 20:11:20', 0, '0'),
(19, NULL, NULL, 'Bombillo1', 29, 9, '50', '30000.00', '20000.00', '2023-04-28 10:12:13', NULL, '', '', 'A', '2023-04-28 20:12:12', 0, '0'),
(20, NULL, NULL, 'df', 31, 9, '45', '25000.00', '15000.00', '2023-04-28 10:16:53', NULL, '', '', 'A', '2023-04-28 20:16:53', 0, '0'),
(21, NULL, NULL, 'broca45', 26, 9, '48', '20000.00', '12000.00', '2023-04-28 10:22:05', NULL, '', '', 'A', '2023-04-28 20:22:05', 0, '0'),
(22, NULL, NULL, 'brocaaa', 26, 9, '5', '5000.00', '4000.00', '2023-05-02 08:32:25', NULL, '', '', 'A', '2023-05-02 18:32:24', 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_det`
--

DROP TABLE IF EXISTS `movimiento_det`;
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
(1, 1, 1, 1, 10, '20000.00', 'A', '2023-03-01 13:18:46', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_enc`
--

DROP TABLE IF EXISTS `movimiento_enc`;
CREATE TABLE `movimiento_enc` (
  `id_movimientoenc` smallint(2) NOT NULL,
  `id_tercero` smallint(2) DEFAULT NULL,
  `id_vehiculo` smallint(2) NOT NULL,
  `id_trabajador` smallint(2) DEFAULT NULL,
  `fecha_movimiento` date NOT NULL,
  `tipo_movimiento` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimiento_enc`
--

INSERT INTO `movimiento_enc` (`id_movimientoenc`, `id_tercero`, `id_vehiculo`, `id_trabajador`, `fecha_movimiento`, `tipo_movimiento`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, 4, NULL, '2023-03-01', 11, 'A', '2023-03-01 13:20:55', 2),
(2, 1, 4, NULL, '2019-03-07', 11, 'A', '2023-03-01 14:09:23', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_detalle`
--

DROP TABLE IF EXISTS `param_detalle`;
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
(12, 'Estado Vehiculo', 'A', '2023-04-19 13:45:35', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
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
-- Estructura de tabla para la tabla `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
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
(1, 4, 4, 5),
(2, 13, 5, 56),
(5, 16, 5, 56),
(6, 5, 5, 56),
(7, 8, 5, 56),
(8, 6, 6, 5),
(9, 7, 4, 5),
(10, 9, 5, 56),
(11, 10, 6, 5),
(12, 11, 5, 56),
(13, 15, 4, 5),
(14, 17, 4, 5),
(15, 18, 5, 56),
(16, 19, 4, 5),
(17, 14, 5, 56),
(18, 12, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
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
(2, 'Superadministrador', 'Superadministra todo', 'A', '2023-02-25 00:43:43', 2),
(3, 'Almacenista', 'Almacena el almacen', 'A', '2023-02-25 00:44:40', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
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
(26, 6, '132132', 3, 5, 'P', 'A', '2023-05-11 19:30:09', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

DROP TABLE IF EXISTS `terceros`;
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
(1, 2, 'CTUSPRO', '123456', '', '', '', '', 'Calle 34', 8, 'A', '0000-00-00 00:00:00', 2),
(2, 2, 'AUTECO', '9012494137', NULL, NULL, NULL, NULL, 'VIA LAS PALMAS KM 15 750 LC L 104VIA LAS PALMAS KM 15 750 LC L 104', 8, 'A', '2023-03-02 11:08:57', 2),
(3, 2, 'Sie De Colombia S A E S P', '830095452-4', NULL, NULL, NULL, NULL, 'CALLE 35 SUR 34 D 21, BOGOTA, BOGOTA, COLOMBIA', 8, 'A', '2023-03-02 11:11:50', 2),
(4, 1, '', '33333', 'Moises', 'David', 'Mazo', 'Solano', 'Caaaa', 5, 'A', '2023-05-02 13:20:40', 0),
(5, 2, 'Colpatria', '7898755', NULL, NULL, NULL, NULL, '', 56, 'A', '2023-05-02 13:20:47', 0),
(6, 1, '', '789456', 'Yuleidis', 'Paola', 'Avilez', 'Monterroza', 'Calle', 5, 'A', '2023-05-09 08:04:35', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
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
  `fecha_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `id_cargo`, `tipo_identificacion`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `direccion`, `estado`, `fecha_usuario`, `usuario_crea`) VALUES
(1, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'A', '2023-03-02 15:59:13', 2),
(2, 1, 1, '113022222', 'Juan', 'Pedro', 'Gomez', 'Lopez', 'calle 90 #45B', 'A', '2023-03-02 15:59:18', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
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
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp(),
  `contrasena` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `tipo_doc`, `n_identificacion`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `estado`, `fecha_crea`, `contrasena`) VALUES
(1, 3, 1, '1044829940', 'Moises', 'David', 'Mazo', 'Solano', 'A', '2023-02-25 01:10:22', 'cuchicuchi'),
(2, 2, 2, '104650892', 'yuleidis', 'mercedes', 'avilez', 'yuca', 'A', '2023-02-25 17:16:47', 'yulelayuca'),
(3, 2, 1, '1043436814', 'Yuleidis', '', 'Avilez', 'Monterroza', 'A', '2023-04-26 18:05:15', '$2y$10$uc9UcDDlAZGvgd2j.kv6ueeZ6zuWv734fJnH1Nd5c77RBTMDDmxgO'),
(4, 1, 1, '123123', 'Luisa', 'Lana', 'Cantillo', 'Lara', 'A', '2023-04-27 17:25:16', '$2y$10$RkLNi2eUB261XMD3kf2f.umW9d3P8KKvaOE9gR1DwuTJ1iSkIAg8K'),
(5, 3, 1, '123123123', 'adasd', 'asd', 'asd', 'asd', 'I', '2023-05-03 18:21:31', '$2y$10$7Ut5Zut2rmO.QxqDLKMTj.r9bpK5e8d95sDqhL1qsX4g.bgzV2WJa'),
(6, 2, 1, '11213123', 'Darell', '', 'Estren', 'Orlando', 'A', '2023-05-03 18:27:46', '$2y$10$hHxhMc5K/hUH5L/6hB87nev/xyUIijOSyAuzCas.k5L9RkCcKMLkC'),
(7, 2, 1, '11213123', 'Darell', '', 'Estren', 'Orlando', 'A', '2023-05-03 18:27:47', '$2y$10$EhUPsVp.v2GV1.M1hvqB9us0NCgUUl8kokq9eFT0H8.8jN7M2gjz6'),
(8, 1, 1, '232323', 'Oscar', '', 'Uholo', 'uuuu', 'I', '2023-05-03 18:29:36', '$2y$10$7ogWlwoMFzXvU0kfaktiw.2eUqXpkCMmR/zgmpw3y1O8OoHoph3A2'),
(9, 1, 1, '111', 'aaa', 'aaa', 'aaa', 'aa', 'I', '2023-05-03 18:30:21', '$2y$10$yHRAOkxhz6a7oIl.lN3I0uQq3HzsBmXlty2VRi.t6ff2Y/beaEEoC'),
(10, 1, 1, '111', 'aaa', 'aaa', 'aaa', 'aa', 'I', '2023-05-03 18:30:21', '$2y$10$HCSd1lM1Xlr2FLIDhVBZjuRB8hkv33TL6NtSAWL5PKBQscvWF8NMO'),
(11, 1, 1, '312213213', 'qweqw', '', 'qwew', 'qweqwe', 'I', '2023-05-03 18:33:20', '$2y$10$ji7sD9zENTv8J/gYVV7OUOq4t/avxm82JEHm4WyJgf9PTjTkrS59a'),
(12, 1, 1, '312213213', 'qweqw', '', 'qwew', 'qweqwe', 'I', '2023-05-03 18:33:20', '$2y$10$zSQwXcXhiVstYsY8DEVk3.6zOaLlpgfLcI2YnZQxvUsdiwRtj3pKu'),
(13, 1, 1, '1231233', 'sasas', 'sdasad', 'sdasda', 'sasad', 'I', '2023-05-03 18:36:12', '$2y$10$dA/sFpYWTECPR9.UEtj5oe3ygxFzIw2vqkKDRIR0S1gzG9opv5n6y'),
(14, 1, 1, '1231233', 'sasas', 'sdasad', 'sdasda', 'sasad', 'I', '2023-05-03 18:36:12', '$2y$10$vm/wDjF9DAkA1QJF8aiJZOjDzw/YWphXsYw3h17n/SUrMHIBVOQEW'),
(15, 1, 1, '3333333', 'sasa', 'sdasda', 'dasas', 'dsasda', 'I', '2023-05-03 18:37:40', '$2y$10$Q/eWBFuGHQqMHM9k6Wukfe49DRDJjC/g2YElBBg14XjgMlqwbwJGe'),
(16, 1, 1, '1233333', 'asdasdasd', 'asdasd', 'asda', 'sdasd', 'I', '2023-05-03 18:39:33', '$2y$10$Kxjo/AkanqB69BHrNnuphO4iIz9Usr1i8Kv/Iq.5dcpy9ynQ8fBJu'),
(17, 1, 1, '123', 'Prueba', 'De', 'Tipo', 'Telefono', 'I', '2023-05-04 21:13:52', '$2y$10$rSGN.oI04b5eX8Aa8DDrg.YXdYkwcea34PTBnyS9JcS3SV1Fmh6Gu'),
(18, 3, 1, '147852369', 'ADAD', 'dasdaSD', 'ADASD', 'SDAS', 'A', '2023-05-09 17:57:15', '$2y$10$pcJGJDoiQl0btIL3UUZUyuTeJ41i76eHrM2lZvcEb2Rqv1Ql8d60m');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos` (
  `id_vehiculo` smallint(2) NOT NULL,
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
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `n_orden`, `id_marca`, `placa`, `linea`, `modelo`, `color`, `kms`, `n_combustible`, `estado`, `fecha_entrada`, `fecha_salida`, `fecha_crea`, `usuario_crea`) VALUES
(4, '42853', 1, 'ABC-123', 'Vitara', '2012', 'Rojo', '82500', 36, 38, '2023-05-08', '2023-05-08', '2023-05-08 12:27:48', 4),
(5, '42854', 2, 'MJO-765', 'A4', '2020', 'Azul', '100000', 35, 38, '2023-04-19', '2023-05-07', '2023-05-08 12:27:48', 4),
(6, '42855', 3, 'FHD-4567', 'X4', '2021', 'Gris', '52000', 33, 39, '2023-04-19', '2023-05-17', '2023-05-08 12:27:48', 4),
(7, '42856', 4, 'TGB-3210', 'Duster', '2019', 'Naranja', '6954', 34, 40, '2023-04-19', '2023-05-01', '2023-05-08 12:27:48', 4),
(8, '42857', 5, 'LKM-9684', 'California', '2022', 'Rojo', '45621', 36, 41, '2023-04-19', '2023-05-17', '2023-05-08 12:27:48', 4),
(9, '42858', 6, 'PQR-7531', 'Fiesta', '2023', 'Negro', '1567', 33, 42, '2023-04-19', '2023-05-08', '2023-05-08 12:27:48', 4),
(10, '42859', 7, 'NJH-2468', 'Jazz', '2021', 'Blanco', '111', 33, 43, '2023-04-19', '2023-05-08', '2023-05-08 12:27:48', 0),
(11, '42860', 8, 'VFD-1098', 'Genesis', '2020', 'Azul', '4567', 36, 44, '2023-04-19', '2023-05-08', '2023-05-08 12:27:48', 4),
(12, '42861', 9, 'RTY-4123', 'Q60', '2018', 'Dorado', '20000', 33, 45, '2023-04-19', '2023-05-08', '2023-05-08 12:27:48', 0),
(13, '42862', 10, 'ZXC-8756', 'Compass', '2015', 'Gris', '25000', 35, 38, '2023-04-19', '2023-05-02', '2023-05-08 12:27:48', 4),
(14, '78945', 2, 'QWE123', '', '2007', 'Rojo', '123333', 34, 45, '2023-05-08', '2023-05-12', '2023-05-08 20:51:40', 0),
(15, '33333', 1, 'QWE122', '', '2007', 'Rosado', '7899', 34, 44, '2023-05-08', '2023-05-12', '2023-05-08 20:53:11', 0),
(16, '33333', 1, 'QWE121', '', '2007', 'Rosadda', '7899', 34, 44, '2023-05-08', '2023-05-09', '2023-05-08 20:54:16', 0),
(17, '78946', 9, 'RTY852', '', '2011', 'Amarillo', '7888', 36, 38, '2023-05-09', '2023-05-11', '2023-05-09 19:23:53', 4),
(18, '78947', 5, 'QWE132', '', '2009', 'Blanco', '33333', 34, 45, '2023-05-10', '2023-05-11', '2023-05-10 18:58:48', 4),
(19, '78948', 2, 'QWE223', '', '2008', 'Maguenta', '1222', 35, 38, '2023-05-09', '2023-05-10', '2023-05-10 19:07:47', 0);

-- --------------------------------------------------------

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
  ADD KEY `id_vehiculo` (`id_vehiculo`);

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
  ADD KEY `vehiculo_enc` (`id_vehiculo`),
  ADD KEY `tipo_movimiento` (`tipo_movimiento`),
  ADD KEY `id_trabajador` (`id_trabajador`);

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
  ADD KEY `tipo_usuario` (`tipo_usuario`),
  ADD KEY `telefonos_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`id_tercero`) USING BTREE,
  ADD KEY `tipo_doc` (`tipo_doc`) USING BTREE,
  ADD KEY `tipo_tercero` (`tipo_tercero`);

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
  ADD KEY `n_combustible` (`n_combustible`),
  ADD KEY `estado` (`estado`);

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
  MODIFY `id_email` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `estanteria`
--
ALTER TABLE `estanteria`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `marca_vehiculo`
--
ALTER TABLE `marca_vehiculo`
  MODIFY `id_marca` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `movimiento_det`
--
ALTER TABLE `movimiento_det`
  MODIFY `id_movimientodet` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimiento_enc`
--
ALTER TABLE `movimiento_enc`
  MODIFY `id_movimientoenc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `param_detalle`
--
ALTER TABLE `param_detalle`
  MODIFY `id_param_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `param_encabezado`
--
ALTER TABLE `param_encabezado`
  MODIFY `id_param_enc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id_propietario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `id_tercero` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  ADD CONSTRAINT `id_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `tercero_enc` FOREIGN KEY (`id_tercero`) REFERENCES `terceros` (`id_tercero`),
  ADD CONSTRAINT `tipo_movimiento` FOREIGN KEY (`tipo_movimiento`) REFERENCES `param_detalle` (`id_param_det`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_enc` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`);

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
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
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


--
-- Estructura Stand-in para la vista `vw_param_det`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_param_det`;
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
DROP VIEW IF EXISTS `vw_param_det2`;
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
-- Estructura para la vista `vw_param_det`
--
DROP TABLE IF EXISTS `vw_param_det`;

DROP VIEW IF EXISTS `vw_param_det`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_param_det`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle``param_detalle`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_param_det2`
--
DROP TABLE IF EXISTS `vw_param_det2`;

DROP VIEW IF EXISTS `vw_param_det2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_param_det2`  AS SELECT `param_detalle`.`id_param_det` AS `id_param_det`, `param_detalle`.`id_param_enc` AS `id_param_enc`, `param_detalle`.`nombre` AS `nombre`, `param_detalle`.`resumen` AS `resumen`, `param_detalle`.`estado` AS `estado`, `param_detalle`.`fecha_crea` AS `fecha_crea`, `param_detalle`.`usuario_crea` AS `usuario_crea`, `param_detalle`.`n_iconos` AS `n_iconos` FROM `param_detalle``param_detalle`  ;

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
