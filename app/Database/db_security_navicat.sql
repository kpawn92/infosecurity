/*
 Navicat Premium Data Transfer

 Source Server         : FarmaRAM
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : db_almacen

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 05/09/2022 18:24:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for op_books_disponibles
-- ----------------------------
DROP TABLE IF EXISTS `op_books_disponibles`;
CREATE TABLE `op_books_disponibles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_libro` int(11) NOT NULL,
  `c_disponibles` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_op_books_disponibles_tb_libro_1`(`fk_libro`) USING BTREE,
  CONSTRAINT `fk_op_books_disponibles_tb_libro_1` FOREIGN KEY (`fk_libro`) REFERENCES `tb_libro` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of op_books_disponibles
-- ----------------------------
INSERT INTO `op_books_disponibles` VALUES (27, 33, 10);
INSERT INTO `op_books_disponibles` VALUES (28, 32, 8);

-- ----------------------------
-- Table structure for op_historial_libroestudiante
-- ----------------------------
DROP TABLE IF EXISTS `op_historial_libroestudiante`;
CREATE TABLE `op_historial_libroestudiante`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_estudiante` int(11) NOT NULL,
  `fk_libro` int(11) NOT NULL,
  `date_entrega` int(11) NOT NULL,
  `date_devol` int(11) NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_op_historial_libroestudiante_tb_estudiante_1`(`fk_estudiante`) USING BTREE,
  INDEX `fk_op_historial_libroestudiante_tb_libro_1`(`fk_libro`) USING BTREE,
  CONSTRAINT `fk_op_historial_libroestudiante_tb_estudiante_1` FOREIGN KEY (`fk_estudiante`) REFERENCES `tb_estudiante` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_op_historial_libroestudiante_tb_libro_1` FOREIGN KEY (`fk_libro`) REFERENCES `tb_libro` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 211 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of op_historial_libroestudiante
-- ----------------------------

-- ----------------------------
-- Table structure for tb_brigada
-- ----------------------------
DROP TABLE IF EXISTS `tb_brigada`;
CREATE TABLE `tb_brigada`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brigada` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_brigada
-- ----------------------------
INSERT INTO `tb_brigada` VALUES (1, 'primera');
INSERT INTO `tb_brigada` VALUES (2, 'segunda');
INSERT INTO `tb_brigada` VALUES (3, 'tercera');

-- ----------------------------
-- Table structure for tb_carrera
-- ----------------------------
DROP TABLE IF EXISTS `tb_carrera`;
CREATE TABLE `tb_carrera`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_carrera
-- ----------------------------
INSERT INTO `tb_carrera` VALUES (1, 'Medicina');
INSERT INTO `tb_carrera` VALUES (2, 'Enfermeria');
INSERT INTO `tb_carrera` VALUES (3, 'Tecnología');

-- ----------------------------
-- Table structure for tb_estudiante
-- ----------------------------
DROP TABLE IF EXISTS `tb_estudiante`;
CREATE TABLE `tb_estudiante`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fk_municipio` int(11) NOT NULL,
  `fk_carrera` int(11) NOT NULL,
  `fk_year_academico` int(11) NOT NULL,
  `fk_brigada` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tb_estudiante_tb_carrera_1`(`fk_carrera`) USING BTREE,
  INDEX `fk_tb_estudiante_tb_municipio_1`(`fk_municipio`) USING BTREE,
  INDEX `fk_tb_estudiante_tb_brigada_1`(`fk_brigada`) USING BTREE,
  INDEX `fk_tb_estudiante_tb_year_academico_1`(`fk_year_academico`) USING BTREE,
  CONSTRAINT `fk_tb_estudiante_tb_brigada_1` FOREIGN KEY (`fk_brigada`) REFERENCES `tb_brigada` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_estudiante_tb_carrera_1` FOREIGN KEY (`fk_carrera`) REFERENCES `tb_carrera` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_estudiante_tb_municipio_1` FOREIGN KEY (`fk_municipio`) REFERENCES `tb_municipio` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tb_estudiante_tb_year_academico_1` FOREIGN KEY (`fk_year_academico`) REFERENCES `tb_year_academico` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 103 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_estudiante
-- ----------------------------
INSERT INTO `tb_estudiante` VALUES (102, '44455686564', 'PEDRO', 'SOSA GOMEZ', 'sdasdasd', 4, 1, 1, 2, 0);

-- ----------------------------
-- Table structure for tb_libro
-- ----------------------------
DROP TABLE IF EXISTS `tb_libro`;
CREATE TABLE `tb_libro`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `isbn` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_libro
-- ----------------------------
INSERT INTO `tb_libro` VALUES (32, 'RES-458', 'JS', '12.5', 'JUAN', '458-ASA458-48', 117);
INSERT INTO `tb_libro` VALUES (33, 'RES-459', 'SQL', '126.35', 'JUAN', '458-ASA458-48', 135);

-- ----------------------------
-- Table structure for tb_municipio
-- ----------------------------
DROP TABLE IF EXISTS `tb_municipio`;
CREATE TABLE `tb_municipio`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_municipio
-- ----------------------------
INSERT INTO `tb_municipio` VALUES (1, 'Manzanillo');
INSERT INTO `tb_municipio` VALUES (2, 'Niquero');
INSERT INTO `tb_municipio` VALUES (3, 'Pilon');
INSERT INTO `tb_municipio` VALUES (4, 'Campechuela');

-- ----------------------------
-- Table structure for tb_year_academico
-- ----------------------------
DROP TABLE IF EXISTS `tb_year_academico`;
CREATE TABLE `tb_year_academico`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anno_academico` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_year_academico
-- ----------------------------
INSERT INTO `tb_year_academico` VALUES (1, '1ro');
INSERT INTO `tb_year_academico` VALUES (2, '2do');
INSERT INTO `tb_year_academico` VALUES (3, '3ro');
INSERT INTO `tb_year_academico` VALUES (4, '4to');

SET FOREIGN_KEY_CHECKS = 1;
