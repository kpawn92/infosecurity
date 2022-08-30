/*
 Navicat Premium Data Transfer

 Source Server         : FarmaRAM
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : db_security

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 29/08/2022 19:07:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_system
-- ----------------------------
DROP TABLE IF EXISTS `admin_system`;
CREATE TABLE `admin_system`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_system
-- ----------------------------
INSERT INTO `admin_system` VALUES (1, 'admin', '$2y$10$KgiTC9dwQEL3ZFkO8crXzOL/h1Xr6eCRSrecx6exVWixeXo0nw7Oe', 'admin', 'Juan Sosa Castillo');
INSERT INTO `admin_system` VALUES (2, 'user', '$2y$10$KgiTC9dwQEL3ZFkO8crXzOL/h1Xr6eCRSrecx6exVWixeXo0nw7Oe', 'user', 'Alejandro Pozo Castro');

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form
-- ----------------------------
INSERT INTO `form` VALUES (1, 'Alejandro', 'Pozo Castro');
INSERT INTO `form` VALUES (2, 'Leandro', 'Pozo Castro');
INSERT INTO `form` VALUES (3, 'Leandro', 'Pozo Castro');
INSERT INTO `form` VALUES (4, 'Lastre', 'Juan Rose');
INSERT INTO `form` VALUES (5, 'Leandro', 'Pozo Castro');
INSERT INTO `form` VALUES (6, 'Marlene', 'Castro');
INSERT INTO `form` VALUES (7, 'Juan Carlos', 'Wide');
INSERT INTO `form` VALUES (8, '', '');
INSERT INTO `form` VALUES (9, 'Lastre', 'Sosa Castillo');

-- ----------------------------
-- Table structure for tb_deficiencia
-- ----------------------------
DROP TABLE IF EXISTS `tb_deficiencia`;
CREATE TABLE `tb_deficiencia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insidencia` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_deficiencia
-- ----------------------------
INSERT INTO `tb_deficiencia` VALUES (1, 'Acceso no autorizado');
INSERT INTO `tb_deficiencia` VALUES (2, 'Destrucción o modificación de la información y/o e');
INSERT INTO `tb_deficiencia` VALUES (3, 'Error de operación o fallas de Software');
INSERT INTO `tb_deficiencia` VALUES (4, 'Contaminación con virus');
INSERT INTO `tb_deficiencia` VALUES (5, 'Ausencia de climatización en el local');
INSERT INTO `tb_deficiencia` VALUES (6, 'Probabilidad de que ocurra fuego, derrumbe o inund');
INSERT INTO `tb_deficiencia` VALUES (7, 'Robo, Hurto o suplantación de componentes del acti');
INSERT INTO `tb_deficiencia` VALUES (8, 'Deterioro físico');
INSERT INTO `tb_deficiencia` VALUES (9, 'Daños por descargas eléctricas');
INSERT INTO `tb_deficiencia` VALUES (10, 'Fallas de Hardware');
INSERT INTO `tb_deficiencia` VALUES (11, 'Roturas de tuberías hidráulicas');
INSERT INTO `tb_deficiencia` VALUES (12, 'Período de guerra');
INSERT INTO `tb_deficiencia` VALUES (13, 'Ocurrencia de fenómenos naturales');

-- ----------------------------
-- Table structure for tb_dpto
-- ----------------------------
DROP TABLE IF EXISTS `tb_dpto`;
CREATE TABLE `tb_dpto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dpto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_dpto
-- ----------------------------
INSERT INTO `tb_dpto` VALUES (9, 'Nodo');
INSERT INTO `tb_dpto` VALUES (10, 'Farmacia');
INSERT INTO `tb_dpto` VALUES (11, 'Docencia');
INSERT INTO `tb_dpto` VALUES (12, 'Dirección');
INSERT INTO `tb_dpto` VALUES (13, 'Admisión');

-- ----------------------------
-- Table structure for tb_fuente
-- ----------------------------
DROP TABLE IF EXISTS `tb_fuente`;
CREATE TABLE `tb_fuente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `potencia` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `model` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ns` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_fuente_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_fuente_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_fuente
-- ----------------------------
INSERT INTO `tb_fuente` VALUES (5, 2, '456w', 'seagate', 'ASDE558', '44222FFFXZ2', 1);
INSERT INTO `tb_fuente` VALUES (6, 4, '456w', 'seagate', 'STNL15154582', '44222FFFXZ5', 3);
INSERT INTO `tb_fuente` VALUES (7, 5, '456w', 'seagate', 'ASDE558', '44222FFFXZ', 1);

-- ----------------------------
-- Table structure for tb_hdd
-- ----------------------------
DROP TABLE IF EXISTS `tb_hdd`;
CREATE TABLE `tb_hdd`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_hdd_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_hdd_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_hdd
-- ----------------------------
INSERT INTO `tb_hdd` VALUES (3, 2, 1000, 'seagate', 'STN5456', '554545sasds5', 2);
INSERT INTO `tb_hdd` VALUES (4, 4, 1000, 'BTY-82', 'STN5456', '44222FFFXZ5852', 2);
INSERT INTO `tb_hdd` VALUES (5, 5, 1000, 'BTY-82', 'HT258', '44222FFFXZ5852W', 2);
INSERT INTO `tb_hdd` VALUES (6, 2, 1000, 'seagate', '1212121256', '44222FF45', 1);

-- ----------------------------
-- Table structure for tb_incidencia
-- ----------------------------
DROP TABLE IF EXISTS `tb_incidencia`;
CREATE TABLE `tb_incidencia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `incidencia` int(11) NOT NULL,
  `solucionada` int(2) NOT NULL,
  `acciones` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha_solucion` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_incidencia_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_incidencia_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_incidencia
-- ----------------------------
INSERT INTO `tb_incidencia` VALUES (2, 2, 1642009500, 2, 2, 'medidas a tomar', NULL);
INSERT INTO `tb_incidencia` VALUES (3, 4, 1643219100, 4, 1, 'se tomo medidas', NULL);
INSERT INTO `tb_incidencia` VALUES (4, 4, 1641428580, 1, 2, 'medidas a tomar', NULL);
INSERT INTO `tb_incidencia` VALUES (5, 2, 1644452580, 1, 1, 'resuelto', NULL);
INSERT INTO `tb_incidencia` VALUES (6, 2, 1645057380, 1, 1, 'resuelto', NULL);
INSERT INTO `tb_incidencia` VALUES (7, 2, 1648077840, 1, 1, 'resuelto', NULL);
INSERT INTO `tb_incidencia` VALUES (8, 4, 1648077840, 1, 1, 'resuelto', NULL);
INSERT INTO `tb_incidencia` VALUES (9, 2, 1649546640, 1, 1, 'se tomo medidas', NULL);
INSERT INTO `tb_incidencia` VALUES (10, 2, 1649546640, 1, 1, 'medidas a tomar', NULL);
INSERT INTO `tb_incidencia` VALUES (11, 2, 1649546640, 1, 1, 'se tomo medidas', NULL);
INSERT INTO `tb_incidencia` VALUES (13, 2, 1643158740, 1, 1, 'resuelto', NULL);
INSERT INTO `tb_incidencia` VALUES (14, 2, 1647530520, 3, 1, 'medidas a tomar', NULL);
INSERT INTO `tb_incidencia` VALUES (15, 2, 1647458640, 2, 1, 'medidas a tomar', NULL);
INSERT INTO `tb_incidencia` VALUES (19, 2, 1650822420, 1, 1, 'en observación', NULL);
INSERT INTO `tb_incidencia` VALUES (20, 4, 1650901560, 1, 1, 'en observación', NULL);
INSERT INTO `tb_incidencia` VALUES (21, 6, 1650901560, 4, 2, 'en observación', NULL);
INSERT INTO `tb_incidencia` VALUES (22, 6, 1651499460, 4, 1, 'Se le dio un matenimiento a las pc, fue actualizad', NULL);
INSERT INTO `tb_incidencia` VALUES (23, 4, 1661814360, 2, 1, 'aaaaa', NULL);

-- ----------------------------
-- Table structure for tb_inspeccion
-- ----------------------------
DROP TABLE IF EXISTS `tb_inspeccion`;
CREATE TABLE `tb_inspeccion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inspeccion` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  `accion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_inspeccion_tb_responsable_1`(`fk_responsable`) USING BTREE,
  INDEX `fk_tb_inspeccion_tb_dpto_1`(`fk_dpto`) USING BTREE,
  CONSTRAINT `fk_tb_inspeccion_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_inspeccion_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_inspeccion
-- ----------------------------
INSERT INTO `tb_inspeccion` VALUES (4, 1649521020, 4, 9, 'todo aparentemente bien');
INSERT INTO `tb_inspeccion` VALUES (5, 1649549280, 4, 9, 'plan de medidas');
INSERT INTO `tb_inspeccion` VALUES (6, 1641431340, 4, 9, 'todo aparentemente contro');
INSERT INTO `tb_inspeccion` VALUES (7, 1642122540, 4, 9, 'Otras medidas');
INSERT INTO `tb_inspeccion` VALUES (8, 1645060140, 4, 9, 'plan de medidas');
INSERT INTO `tb_inspeccion` VALUES (9, 1647389340, 4, 10, 'Otras medidas');
INSERT INTO `tb_inspeccion` VALUES (11, 1651498740, 6, 10, 'se detectaron 4  incidencias, 4 virus, y se tomaro');
INSERT INTO `tb_inspeccion` VALUES (12, 1651517220, 5, 11, 'Se tomo medidas');
INSERT INTO `tb_inspeccion` VALUES (13, 1661814300, 5, 11, 'se revisaron los expedientes');

-- ----------------------------
-- Table structure for tb_lectorcompacto
-- ----------------------------
DROP TABLE IF EXISTS `tb_lectorcompacto`;
CREATE TABLE `tb_lectorcompacto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `tipo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_lectorcompacto_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_lectorcompacto_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_lectorcompacto
-- ----------------------------
INSERT INTO `tb_lectorcompacto` VALUES (4, 2, 'DVD', 'LG', 'LG-45822', '45787AASWS', 1);

-- ----------------------------
-- Table structure for tb_mantenimiento
-- ----------------------------
DROP TABLE IF EXISTS `tb_mantenimiento`;
CREATE TABLE `tb_mantenimiento`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `observacion` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_mantenimiento_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_mantenimiento_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_mantenimiento
-- ----------------------------
INSERT INTO `tb_mantenimiento` VALUES (2, 2, 1610041440, 'aaaa');
INSERT INTO `tb_mantenimiento` VALUES (3, 2, 1649206860, '');
INSERT INTO `tb_mantenimiento` VALUES (4, 4, 1649466060, '');
INSERT INTO `tb_mantenimiento` VALUES (5, 5, 1649725260, '');
INSERT INTO `tb_mantenimiento` VALUES (6, 6, 1649984460, '');
INSERT INTO `tb_mantenimiento` VALUES (8, 2, 1651523340, '');

-- ----------------------------
-- Table structure for tb_memoria
-- ----------------------------
DROP TABLE IF EXISTS `tb_memoria`;
CREATE TABLE `tb_memoria`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_placa` int(11) NOT NULL,
  `tipo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_memoria_tb_placamadre_1`(`fk_placa`) USING BTREE,
  CONSTRAINT `fk_tb_memoria_tb_placamadre_1` FOREIGN KEY (`fk_placa`) REFERENCES `tb_placamadre` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_memoria
-- ----------------------------
INSERT INTO `tb_memoria` VALUES (4, 7, '2', 1000, 'seagate', 'STN5456', '44222FFFXZ5', 3);
INSERT INTO `tb_memoria` VALUES (6, 6, '4', 2000, 'no tiene', 'HT258', '554545sasds', 3);

-- ----------------------------
-- Table structure for tb_micro
-- ----------------------------
DROP TABLE IF EXISTS `tb_micro`;
CREATE TABLE `tb_micro`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_placa` int(11) NOT NULL,
  `velocidad` int(11) NOT NULL,
  `cantnucleos` int(2) NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ns` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status_tecnico` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_micro_tb_placamadre_1`(`fk_placa`) USING BTREE,
  CONSTRAINT `fk_tb_micro_tb_placamadre_1` FOREIGN KEY (`fk_placa`) REFERENCES `tb_placamadre` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_micro
-- ----------------------------
INSERT INTO `tb_micro` VALUES (5, 6, 4, 4, 'LG', 'STN5456', '554545sasds5', 3);
INSERT INTO `tb_micro` VALUES (6, 7, 4, 4, 'seagate', 'STN5456', '44222FFFXZ585', 1);
INSERT INTO `tb_micro` VALUES (7, 8, 4, 4, 'BTY-82', '12121212', '44222FFFXZ2345IOU', 2);

-- ----------------------------
-- Table structure for tb_modem
-- ----------------------------
DROP TABLE IF EXISTS `tb_modem`;
CREATE TABLE `tb_modem`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `status_inv` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_modem_tb_responsable_1`(`fk_responsable`) USING BTREE,
  INDEX `fk_tb_modem_tb_dpto_1`(`fk_dpto`) USING BTREE,
  CONSTRAINT `fk_tb_modem_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_modem_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_modem
-- ----------------------------
INSERT INTO `tb_modem` VALUES (3, '12321321322', '132123sdasad', 'STN5456', 2, 2, 4, 9);

-- ----------------------------
-- Table structure for tb_monitor
-- ----------------------------
DROP TABLE IF EXISTS `tb_monitor`;
CREATE TABLE `tb_monitor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `pulgadas` int(2) NOT NULL,
  `inventario` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha_explotacion` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inventario` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_monitor_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_monitor_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_monitor
-- ----------------------------
INSERT INTO `tb_monitor` VALUES (7, 2, 1, 19, '458458GFD', 'LG', 'HT258', '44222FFFX41', 1179369240, 1, 1);

-- ----------------------------
-- Table structure for tb_mouse
-- ----------------------------
DROP TABLE IF EXISTS `tb_mouse`;
CREATE TABLE `tb_mouse`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `interfaz` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_exp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_inv` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_mouse_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_mouse_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_mouse
-- ----------------------------
INSERT INTO `tb_mouse` VALUES (3, 2, 'USB', '456584216sa', 'hunkley', 'asa58', '45854dsadw', 1650992460, 3, 1);

-- ----------------------------
-- Table structure for tb_movimiento
-- ----------------------------
DROP TABLE IF EXISTS `tb_movimiento`;
CREATE TABLE `tb_movimiento`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `motivo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(2) NOT NULL COMMENT 'entrada/salida/interno',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_movimiento_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_movimiento_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_movimiento
-- ----------------------------
INSERT INTO `tb_movimiento` VALUES (2, 2, 1651501200, 'Se traslado para el nodo, revision del la CPU', 3);

-- ----------------------------
-- Table structure for tb_op_estado
-- ----------------------------
DROP TABLE IF EXISTS `tb_op_estado`;
CREATE TABLE `tb_op_estado`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idequipo` int(11) NOT NULL,
  `equipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha` int(11) NOT NULL,
  `inventario` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_op_estado
-- ----------------------------
INSERT INTO `tb_op_estado` VALUES (20, 6, 'placamadre', 1, 1649374585, NULL);
INSERT INTO `tb_op_estado` VALUES (21, 7, 'placamadre', 1, 1649374602, NULL);
INSERT INTO `tb_op_estado` VALUES (22, 8, 'placamadre', 1, 1649374705, NULL);
INSERT INTO `tb_op_estado` VALUES (23, 5, 'microprocesador', 3, 1649376361, NULL);
INSERT INTO `tb_op_estado` VALUES (24, 6, 'microprocesador', 1, 1649376409, NULL);
INSERT INTO `tb_op_estado` VALUES (25, 7, 'microprocesador', 2, 1649376559, NULL);
INSERT INTO `tb_op_estado` VALUES (27, 4, 'Memoria Ram', 3, 1649376634, NULL);
INSERT INTO `tb_op_estado` VALUES (29, 5, 'Fuente interna', 1, 1649376832, NULL);
INSERT INTO `tb_op_estado` VALUES (30, 6, 'Fuente interna', 3, 1649376852, NULL);
INSERT INTO `tb_op_estado` VALUES (31, 7, 'Fuente interna', 1, 1651271820, NULL);
INSERT INTO `tb_op_estado` VALUES (32, 3, 'Disco duro', 2, 1649376924, NULL);
INSERT INTO `tb_op_estado` VALUES (33, 4, 'Disco duro', 2, 1649376938, NULL);
INSERT INTO `tb_op_estado` VALUES (34, 5, 'Disco duro', 2, 1651272000, NULL);
INSERT INTO `tb_op_estado` VALUES (35, 3, 'Teclado', 2, 1649382720, 2);
INSERT INTO `tb_op_estado` VALUES (36, 4, 'Teclado', 2, 1649382660, 3);
INSERT INTO `tb_op_estado` VALUES (37, 5, 'Teclado', 1, 1649377184, 1);
INSERT INTO `tb_op_estado` VALUES (38, 3, 'Modem', 2, 1650983700, 2);
INSERT INTO `tb_op_estado` VALUES (39, 4, 'Lector CD/DVD', 1, 1650983649, NULL);
INSERT INTO `tb_op_estado` VALUES (40, 3, 'Mouse', 3, 1651272840, 1);
INSERT INTO `tb_op_estado` VALUES (46, 6, 'Disco duro', 1, 1651523747, NULL);
INSERT INTO `tb_op_estado` VALUES (47, 6, 'Memoria Ram', 3, 1651530022, NULL);
INSERT INTO `tb_op_estado` VALUES (48, 7, 'Monitor', 1, 1651545311, 1);

-- ----------------------------
-- Table structure for tb_pc
-- ----------------------------
DROP TABLE IF EXISTS `tb_pc`;
CREATE TABLE `tb_pc`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrepc` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mac` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  `sello_seguridad` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` int(11) NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `so` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_pc_tb_dpto_1`(`fk_dpto`) USING BTREE,
  INDEX `fk_tb_pc_tb_responsable_1`(`fk_responsable`) USING BTREE,
  CONSTRAINT `fk_tb_pc_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_pc_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_pc
-- ----------------------------
INSERT INTO `tb_pc` VALUES (2, 'Servidor', '192.168.1.100', '45sase4822854', '45257LL45', 9, '45sse4458', 1646067180, 'Founder', '45er', 'Debian 10', 5);
INSERT INTO `tb_pc` VALUES (4, 'Firewall', '192.168.1.3', '48as4585468452', '45855485854', 9, '58455SDES58', 1273684440, 'Founder', 'H8154', 'Pfesense', 4);
INSERT INTO `tb_pc` VALUES (5, 'PC00', '192.168.1.100', 'cd3452df453f', '57485', 9, '0002515', 1399505640, 'no tiene', 'HT258', 'windows 10', 4);
INSERT INTO `tb_pc` VALUES (6, 'Farmacia-00', '192.168.1.152', '45:sd:aw:e5:d5:s5', 'sdad23232', 10, 'asasasw2344', 1368052560, 'no tiene', 'FFE-455', 'windows 7', 6);
INSERT INTO `tb_pc` VALUES (7, 'SeguridadIn', '192.168.1.122', 'AS:DA:S4:35:46:AS', '45658421612SASR', 9, '45sse445845', 1650993420, 'LTEC', 'LG-45822', 'Win10', 4);

-- ----------------------------
-- Table structure for tb_placamadre
-- ----------------------------
DROP TABLE IF EXISTS `tb_placamadre`;
CREATE TABLE `tb_placamadre`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `socket` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numserie` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status_tec` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_placamadre_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_placamadre_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_placamadre
-- ----------------------------
INSERT INTO `tb_placamadre` VALUES (6, 2, '1150', 'BTY-82', 'HT258', '21321358455', 1);
INSERT INTO `tb_placamadre` VALUES (7, 4, '1150', 'HT81', 'STN5456', '97989899', 1);
INSERT INTO `tb_placamadre` VALUES (8, 5, '1150', 'BTY-82', 'HT258', '2132135845ES', 1);

-- ----------------------------
-- Table structure for tb_printer
-- ----------------------------
DROP TABLE IF EXISTS `tb_printer`;
CREATE TABLE `tb_printer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `t_repuesto` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `multifuncional` int(1) NOT NULL,
  `inventario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fk_responsable` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_printer_tb_responsable_1`(`fk_responsable`) USING BTREE,
  CONSTRAINT `fk_tb_printer_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_printer
-- ----------------------------

-- ----------------------------
-- Table structure for tb_responsable
-- ----------------------------
DROP TABLE IF EXISTS `tb_responsable`;
CREATE TABLE `tb_responsable`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_responsable
-- ----------------------------
INSERT INTO `tb_responsable` VALUES (4, 'Alejandro', 'Pozo Castro', 'Informatico');
INSERT INTO `tb_responsable` VALUES (5, 'Oscar', 'Wide', 'Seguridad Informática');
INSERT INTO `tb_responsable` VALUES (6, 'Yamita', 'Sosa Castillo', 'Jefe de departamento');

-- ----------------------------
-- Table structure for tb_rotura
-- ----------------------------
DROP TABLE IF EXISTS `tb_rotura`;
CREATE TABLE `tb_rotura`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `tipo_rotura` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `observ` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha_solucion` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_rotura_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_rotura_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_rotura
-- ----------------------------
INSERT INTO `tb_rotura` VALUES (1, 2, 1647363000, 'prueba', 'ddddd', 1648675620);
INSERT INTO `tb_rotura` VALUES (3, 2, 1651519920, 'aaaa', '', 1653015420);

-- ----------------------------
-- Table structure for tb_router
-- ----------------------------
DROP TABLE IF EXISTS `tb_router`;
CREATE TABLE `tb_router`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventario` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_inv` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_router_tb_responsable_1`(`fk_responsable`) USING BTREE,
  INDEX `fk_tb_router_tb_dpto_1`(`fk_dpto`) USING BTREE,
  CONSTRAINT `fk_tb_router_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_router_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_router
-- ----------------------------

-- ----------------------------
-- Table structure for tb_salva
-- ----------------------------
DROP TABLE IF EXISTS `tb_salva`;
CREATE TABLE `tb_salva`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_salva_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_salva_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_salva
-- ----------------------------
INSERT INTO `tb_salva` VALUES (4, 2, 1651501260, 'Servidor', 'Se resguardo la informacion ');
INSERT INTO `tb_salva` VALUES (5, 4, 1645135080, 'salva del servidor', 'salva');

-- ----------------------------
-- Table structure for tb_software
-- ----------------------------
DROP TABLE IF EXISTS `tb_software`;
CREATE TABLE `tb_software`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `name_soft` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `version` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fabricante` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_software_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_software_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_software
-- ----------------------------

-- ----------------------------
-- Table structure for tb_speaker
-- ----------------------------
DROP TABLE IF EXISTS `tb_speaker`;
CREATE TABLE `tb_speaker`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `inventario` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicia` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_speaker_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_speaker_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_speaker
-- ----------------------------

-- ----------------------------
-- Table structure for tb_switch
-- ----------------------------
DROP TABLE IF EXISTS `tb_switch`;
CREATE TABLE `tb_switch`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventario` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `programable` int(1) NULL DEFAULT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_dpto` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_switch_tb_responsable_1`(`fk_responsable`) USING BTREE,
  INDEX `fk_tb_switch_tb_dpto_1`(`fk_dpto`) USING BTREE,
  CONSTRAINT `fk_tb_switch_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_switch_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_switch
-- ----------------------------

-- ----------------------------
-- Table structure for tb_teclado
-- ----------------------------
DROP TABLE IF EXISTS `tb_teclado`;
CREATE TABLE `tb_teclado`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `interfaz` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha_exp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_inventario` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_teclado_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_teclado_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_teclado
-- ----------------------------
INSERT INTO `tb_teclado` VALUES (3, 2, 'uSB', '458458', 'LG', 'STN5456', 1463617020, 2, 2);
INSERT INTO `tb_teclado` VALUES (4, 4, 'USB', '1232132132', 'LG', '12121212', 1273018680, 2, 3);
INSERT INTO `tb_teclado` VALUES (5, 5, 'PC-2', '45845834', 'LG', 'STN5456', 1546391940, 1, 1);

-- ----------------------------
-- Table structure for tb_telefono
-- ----------------------------
DROP TABLE IF EXISTS `tb_telefono`;
CREATE TABLE `tb_telefono`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alcance` int(2) NOT NULL,
  `marca` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `inventario` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fk_dpto` int(11) NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_telefono_tb_responsable_1`(`fk_responsable`) USING BTREE,
  INDEX `fk_tb_telefono_tb_dpto_1`(`fk_dpto`) USING BTREE,
  CONSTRAINT `fk_tb_telefono_tb_dpto_1` FOREIGN KEY (`fk_dpto`) REFERENCES `tb_dpto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_telefono_tb_responsable_1` FOREIGN KEY (`fk_responsable`) REFERENCES `tb_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_telefono
-- ----------------------------

-- ----------------------------
-- Table structure for tb_ups
-- ----------------------------
DROP TABLE IF EXISTS `tb_ups`;
CREATE TABLE `tb_ups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `inventario` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modelo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ns` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `status_inv` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_ups_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_ups_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_ups
-- ----------------------------

-- ----------------------------
-- Table structure for tb_virus
-- ----------------------------
DROP TABLE IF EXISTS `tb_virus`;
CREATE TABLE `tb_virus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pc` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `tipo_virus` int(2) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `efectos_negativo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `accion` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `solucionado` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_virus_tb_pc_1`(`fk_pc`) USING BTREE,
  CONSTRAINT `fk_tb_virus_tb_pc_1` FOREIGN KEY (`fk_pc`) REFERENCES `tb_pc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_virus
-- ----------------------------
INSERT INTO `tb_virus` VALUES (2, 2, 1647211140, 1, 'fasdas', 'sdasd', 'asdasd', 2);
INSERT INTO `tb_virus` VALUES (3, 2, 1651499160, 2, 'en la particion c:', 'daños a la informacion ', 'se tomaron medidas', 1);

SET FOREIGN_KEY_CHECKS = 1;
