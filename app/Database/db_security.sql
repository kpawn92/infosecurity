-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2022 a las 05:10:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_security`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_system`
--

CREATE TABLE `admin_system` (
  `id` int(11) NOT NULL,
  `user` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `admin_system`
--

INSERT INTO `admin_system` (`id`, `user`, `password`, `type`, `name`) VALUES
(1, 'admin', '$2y$10$KgiTC9dwQEL3ZFkO8crXzOL/h1Xr6eCRSrecx6exVWixeXo0nw7Oe', 'admin', 'Administrador New'),
(2, 'user', '$2y$10$KgiTC9dwQEL3ZFkO8crXzOL/h1Xr6eCRSrecx6exVWixeXo0nw7Oe', 'user', 'Usuario New');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_deficiencia`
--

CREATE TABLE `tb_deficiencia` (
  `id` int(11) NOT NULL,
  `insidencia` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_deficiencia`
--

INSERT INTO `tb_deficiencia` (`id`, `insidencia`) VALUES
(1, 'Acceso no autorizado'),
(2, 'Destrucción o modificación de la información y/o e'),
(3, 'Error de operación o fallas de Software'),
(4, 'Contaminación con virus'),
(5, 'Ausencia de climatización en el local'),
(6, 'Probabilidad de que ocurra fuego, derrumbe o inund'),
(7, 'Robo, Hurto o suplantación de componentes del acti'),
(8, 'Deterioro físico'),
(9, 'Daños por descargas eléctricas'),
(10, 'Fallas de Hardware'),
(11, 'Roturas de tuberías hidráulicas'),
(12, 'Período de guerra'),
(13, 'Ocurrencia de fenómenos naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_dpto`
--

CREATE TABLE `tb_dpto` (
  `id` int(11) NOT NULL,
  `dpto` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_fuente`
--

CREATE TABLE `tb_fuente` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `potencia` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `model` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ns` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hdd`
--

CREATE TABLE `tb_hdd` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_incidencia`
--

CREATE TABLE `tb_incidencia` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `incidencia` int(11) NOT NULL,
  `solucionada` int(2) NOT NULL,
  `acciones` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_solucion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inspeccion`
--

CREATE TABLE `tb_inspeccion` (
  `id` int(11) NOT NULL,
  `fecha_inspeccion` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  `accion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_lectorcompacto`
--

CREATE TABLE `tb_lectorcompacto` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `tipo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mantenimiento`
--

CREATE TABLE `tb_mantenimiento` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `observacion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_memoria`
--

CREATE TABLE `tb_memoria` (
  `id` int(11) NOT NULL,
  `fk_placa` int(11) NOT NULL,
  `tipo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_micro`
--

CREATE TABLE `tb_micro` (
  `id` int(11) NOT NULL,
  `fk_placa` int(11) NOT NULL,
  `velocidad` int(11) NOT NULL,
  `cantnucleos` int(2) NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ns` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `status_tecnico` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modem`
--

CREATE TABLE `tb_modem` (
  `id` int(11) NOT NULL,
  `inventario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `status_inv` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_monitor`
--

CREATE TABLE `tb_monitor` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `pulgadas` int(2) NOT NULL,
  `inventario` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_explotacion` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inventario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mouse`
--

CREATE TABLE `tb_mouse` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `interfaz` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_exp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_inv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_movimiento`
--

CREATE TABLE `tb_movimiento` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `motivo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(2) NOT NULL COMMENT 'entrada/salida/interno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_op_estado`
--

CREATE TABLE `tb_op_estado` (
  `id` int(11) NOT NULL,
  `idequipo` int(11) NOT NULL,
  `equipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha` int(11) NOT NULL,
  `inventario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pc`
--

CREATE TABLE `tb_pc` (
  `id` int(11) NOT NULL,
  `nombrepc` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mac` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  `sello_seguridad` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` int(11) NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `so` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fk_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_placamadre`
--

CREATE TABLE `tb_placamadre` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `socket` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `numserie` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `status_tec` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_printer`
--

CREATE TABLE `tb_printer` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `t_repuesto` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `multifuncional` int(1) NOT NULL,
  `inventario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fk_responsable` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_responsable`
--

CREATE TABLE `tb_responsable` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rotura`
--

CREATE TABLE `tb_rotura` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `tipo_rotura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observ` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_solucion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_router`
--

CREATE TABLE `tb_router` (
  `id` int(11) NOT NULL,
  `inventario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_inv` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salva`
--

CREATE TABLE `tb_salva` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_software`
--

CREATE TABLE `tb_software` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `name_soft` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `version` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fabricante` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_speaker`
--

CREATE TABLE `tb_speaker` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `inventario` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicia` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_switch`
--

CREATE TABLE `tb_switch` (
  `id` int(11) NOT NULL,
  `inventario` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `programable` int(1) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_teclado`
--

CREATE TABLE `tb_teclado` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `interfaz` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_exp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_inventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_telefono`
--

CREATE TABLE `tb_telefono` (
  `id` int(11) NOT NULL,
  `alcance` int(2) NOT NULL,
  `marca` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inventario` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fk_dpto` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ups`
--

CREATE TABLE `tb_ups` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `inventario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ns` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_virus`
--

CREATE TABLE `tb_virus` (
  `id` int(11) NOT NULL,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `tipo_virus` int(2) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `efectos_negativo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `accion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `solucionado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_system`
--
ALTER TABLE `admin_system`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tb_deficiencia`
--
ALTER TABLE `tb_deficiencia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tb_dpto`
--
ALTER TABLE `tb_dpto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tb_fuente`
--
ALTER TABLE `tb_fuente`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_fuente_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_hdd`
--
ALTER TABLE `tb_hdd`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_hdd_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_incidencia`
--
ALTER TABLE `tb_incidencia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_incidencia_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_inspeccion`
--
ALTER TABLE `tb_inspeccion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_inspeccion_tb_responsable_1` (`fk_responsable`) USING BTREE,
  ADD KEY `fk_tb_inspeccion_tb_dpto_1` (`fk_dpto`) USING BTREE;

--
-- Indices de la tabla `tb_lectorcompacto`
--
ALTER TABLE `tb_lectorcompacto`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_lectorcompacto_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_mantenimiento`
--
ALTER TABLE `tb_mantenimiento`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_mantenimiento_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_memoria`
--
ALTER TABLE `tb_memoria`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_memoria_tb_placamadre_1` (`fk_placa`) USING BTREE;

--
-- Indices de la tabla `tb_micro`
--
ALTER TABLE `tb_micro`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_micro_tb_placamadre_1` (`fk_placa`) USING BTREE;

--
-- Indices de la tabla `tb_modem`
--
ALTER TABLE `tb_modem`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_modem_tb_responsable_1` (`fk_responsable`) USING BTREE,
  ADD KEY `fk_tb_modem_tb_dpto_1` (`fk_dpto`) USING BTREE;

--
-- Indices de la tabla `tb_monitor`
--
ALTER TABLE `tb_monitor`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_monitor_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_mouse`
--
ALTER TABLE `tb_mouse`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_mouse_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_movimiento`
--
ALTER TABLE `tb_movimiento`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_movimiento_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_op_estado`
--
ALTER TABLE `tb_op_estado`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tb_pc`
--
ALTER TABLE `tb_pc`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_pc_tb_dpto_1` (`fk_dpto`) USING BTREE,
  ADD KEY `fk_tb_pc_tb_responsable_1` (`fk_responsable`) USING BTREE;

--
-- Indices de la tabla `tb_placamadre`
--
ALTER TABLE `tb_placamadre`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_placamadre_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_printer`
--
ALTER TABLE `tb_printer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_printer_tb_responsable_1` (`fk_responsable`) USING BTREE;

--
-- Indices de la tabla `tb_responsable`
--
ALTER TABLE `tb_responsable`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tb_rotura`
--
ALTER TABLE `tb_rotura`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_rotura_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_router`
--
ALTER TABLE `tb_router`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_router_tb_responsable_1` (`fk_responsable`) USING BTREE,
  ADD KEY `fk_tb_router_tb_dpto_1` (`fk_dpto`) USING BTREE;

--
-- Indices de la tabla `tb_salva`
--
ALTER TABLE `tb_salva`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_salva_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_software`
--
ALTER TABLE `tb_software`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_software_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_speaker`
--
ALTER TABLE `tb_speaker`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_speaker_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_switch`
--
ALTER TABLE `tb_switch`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_switch_tb_responsable_1` (`fk_responsable`) USING BTREE,
  ADD KEY `fk_tb_switch_tb_dpto_1` (`fk_dpto`) USING BTREE;

--
-- Indices de la tabla `tb_teclado`
--
ALTER TABLE `tb_teclado`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_teclado_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_telefono`
--
ALTER TABLE `tb_telefono`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_telefono_tb_responsable_1` (`fk_responsable`) USING BTREE,
  ADD KEY `fk_tb_telefono_tb_dpto_1` (`fk_dpto`) USING BTREE;

--
-- Indices de la tabla `tb_ups`
--
ALTER TABLE `tb_ups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_ups_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- Indices de la tabla `tb_virus`
--
ALTER TABLE `tb_virus`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tb_virus_tb_pc_1` (`fk_pc`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_system`
--
ALTER TABLE `admin_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_deficiencia`
--
ALTER TABLE `tb_deficiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_dpto`
--
ALTER TABLE `tb_dpto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_fuente`
--
ALTER TABLE `tb_fuente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_hdd`
--
ALTER TABLE `tb_hdd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_incidencia`
--
ALTER TABLE `tb_incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tb_inspeccion`
--
ALTER TABLE `tb_inspeccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_lectorcompacto`
--
ALTER TABLE `tb_lectorcompacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_mantenimiento`
--
ALTER TABLE `tb_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_memoria`
--
ALTER TABLE `tb_memoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_micro`
--
ALTER TABLE `tb_micro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_modem`
--
ALTER TABLE `tb_modem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_monitor`
--
ALTER TABLE `tb_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_mouse`
--
ALTER TABLE `tb_mouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_movimiento`
--
ALTER TABLE `tb_movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_op_estado`
--
ALTER TABLE `tb_op_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tb_pc`
--
ALTER TABLE `tb_pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_placamadre`
--
ALTER TABLE `tb_placamadre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_printer`
--
ALTER TABLE `tb_printer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_responsable`
--
ALTER TABLE `tb_responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_rotura`
--
ALTER TABLE `tb_rotura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_router`
--
ALTER TABLE `tb_router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_salva`
--
ALTER TABLE `tb_salva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_software`
--
ALTER TABLE `tb_software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_speaker`
--
ALTER TABLE `tb_speaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_switch`
--
ALTER TABLE `tb_switch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_teclado`
--
ALTER TABLE `tb_teclado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_telefono`
--
ALTER TABLE `tb_telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_ups`
--
ALTER TABLE `tb_ups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_virus`
--
ALTER TABLE `tb_virus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_fuente`
--
ALTER TABLE `tb_fuente`
  ADD CONSTRAINT `fk_tb_fuente_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_hdd`
--
ALTER TABLE `tb_hdd`
  ADD CONSTRAINT `fk_tb_hdd_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_incidencia`
--
ALTER TABLE `tb_incidencia`
  ADD CONSTRAINT `fk_tb_incidencia_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_inspeccion`
--
ALTER TABLE `tb_inspeccion`
  ADD CONSTRAINT `fk_tb_inspeccion_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`),
  ADD CONSTRAINT `fk_tb_inspeccion_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_lectorcompacto`
--
ALTER TABLE `tb_lectorcompacto`
  ADD CONSTRAINT `fk_tb_lectorcompacto_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_mantenimiento`
--
ALTER TABLE `tb_mantenimiento`
  ADD CONSTRAINT `fk_tb_mantenimiento_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_memoria`
--
ALTER TABLE `tb_memoria`
  ADD CONSTRAINT `fk_tb_memoria_tb_placamadre_1` FOREIGN KEY (`fk_placa`) REFERENCES `tb_placamadre` (`id`);

--
-- Filtros para la tabla `tb_micro`
--
ALTER TABLE `tb_micro`
  ADD CONSTRAINT `fk_tb_micro_tb_placamadre_1` FOREIGN KEY (`fk_placa`) REFERENCES `tb_placamadre` (`id`);

--
-- Filtros para la tabla `tb_modem`
--
ALTER TABLE `tb_modem`
  ADD CONSTRAINT `fk_tb_modem_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`),
  ADD CONSTRAINT `fk_tb_modem_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_monitor`
--
ALTER TABLE `tb_monitor`
  ADD CONSTRAINT `fk_tb_monitor_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_mouse`
--
ALTER TABLE `tb_mouse`
  ADD CONSTRAINT `fk_tb_mouse_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_movimiento`
--
ALTER TABLE `tb_movimiento`
  ADD CONSTRAINT `fk_tb_movimiento_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_pc`
--
ALTER TABLE `tb_pc`
  ADD CONSTRAINT `fk_tb_pc_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`),
  ADD CONSTRAINT `fk_tb_pc_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_placamadre`
--
ALTER TABLE `tb_placamadre`
  ADD CONSTRAINT `fk_tb_placamadre_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_printer`
--
ALTER TABLE `tb_printer`
  ADD CONSTRAINT `fk_tb_printer_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_rotura`
--
ALTER TABLE `tb_rotura`
  ADD CONSTRAINT `fk_tb_rotura_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_router`
--
ALTER TABLE `tb_router`
  ADD CONSTRAINT `fk_tb_router_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`),
  ADD CONSTRAINT `fk_tb_router_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_salva`
--
ALTER TABLE `tb_salva`
  ADD CONSTRAINT `fk_tb_salva_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_software`
--
ALTER TABLE `tb_software`
  ADD CONSTRAINT `fk_tb_software_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_speaker`
--
ALTER TABLE `tb_speaker`
  ADD CONSTRAINT `fk_tb_speaker_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_switch`
--
ALTER TABLE `tb_switch`
  ADD CONSTRAINT `fk_tb_switch_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`),
  ADD CONSTRAINT `fk_tb_switch_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_teclado`
--
ALTER TABLE `tb_teclado`
  ADD CONSTRAINT `fk_tb_teclado_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_telefono`
--
ALTER TABLE `tb_telefono`
  ADD CONSTRAINT `fk_tb_telefono_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`),
  ADD CONSTRAINT `fk_tb_telefono_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`);

--
-- Filtros para la tabla `tb_ups`
--
ALTER TABLE `tb_ups`
  ADD CONSTRAINT `fk_tb_ups_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);

--
-- Filtros para la tabla `tb_virus`
--
ALTER TABLE `tb_virus`
  ADD CONSTRAINT `fk_tb_virus_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
