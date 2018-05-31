drop database if exists db_scb09;
create database db_scb09;
use db_scb09;

-- ----------------------------
-- Table structure for `areatrabajo`
-- ----------------------------
DROP TABLE IF EXISTS `areatrabajo`;
CREATE TABLE `areatrabajo` (
`idArea`  int(11) NOT NULL AUTO_INCREMENT ,
`area`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idArea`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of areatrabajo
-- ----------------------------
BEGIN;
INSERT INTO `areatrabajo` VALUES ('1', 'Adminstracion', ''), ('2', 'Bodega', ''), ('3', 'Informatica', ''), ('4', 'Constrccion', '');
COMMIT;

-- ----------------------------
-- Table structure for `cargo`
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
`idCargo`  int(11) NOT NULL AUTO_INCREMENT ,
`cargo`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idArea`  int(11) NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idCargo`),
FOREIGN KEY (`idArea`) REFERENCES `areatrabajo` (`idArea`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_cargo_areaTrabajo` (`idArea`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of cargo
-- ----------------------------
BEGIN;
INSERT INTO `cargo` VALUES ('1', 'Gerente', '1', ''), ('2', 'Adminstrador de bodega', '2', ''), ('3', 'Dessarrollador', '3', ''), ('4', 'Obrero', '4', ''), ('5', 'Arquitecto', '4', ''), ('6', 'Alvañil', '4', ''), ('7', 'supervisor de obrea', '4', '');
COMMIT;

-- ----------------------------
-- Table structure for `categoriaherramienta`
-- ----------------------------
DROP TABLE IF EXISTS `categoriaherramienta`;
CREATE TABLE `categoriaherramienta` (
`idCategoria`  int(11) NOT NULL AUTO_INCREMENT ,
`nombreCategoria`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idCategoria`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of categoriaherramienta
-- ----------------------------
BEGIN;
INSERT INTO `categoriaherramienta` VALUES ('1', 'Electrica', ''), ('2', 'Industrial', ''), ('3', 'Especiales', ''), ('4', 'Basica', '');
COMMIT;

-- ----------------------------
-- Table structure for `detalleprestamo`
-- ----------------------------
DROP TABLE IF EXISTS `detalleprestamo`;
CREATE TABLE `detalleprestamo` (
`idDetallePrestamo`  int(11) NOT NULL AUTO_INCREMENT ,
`fechaInicioPrestamo`  datetime NOT NULL ,
`fechaFinPrestamo`  datetime NOT NULL ,
`fechaEntrega`  datetime NULL DEFAULT NULL ,
`idHerramienta`  int(11) NOT NULL ,
`idPrestamo`  int(11) NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idDetallePrestamo`),
FOREIGN KEY (`idHerramienta`) REFERENCES `herramienta` (`idHerramienta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_detallePrestamo_herramienta` (`idHerramienta`) USING BTREE ,
INDEX `fk_detallePrestamo_prestamo` (`idPrestamo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of detalleprestamo
-- ----------------------------
BEGIN;
INSERT INTO `detalleprestamo` VALUES ('1', '2018-05-22 13:39:06', '2018-05-24 13:39:28', '2018-05-24 08:39:53', '6', '1', ''), ('2', '2018-05-22 13:39:06', '2018-05-24 13:39:28', '2018-05-24 08:39:53', '3', '1', ''), ('3', '2018-05-24 12:46:07', '2018-05-29 12:46:12', '2018-05-29 12:46:18', '16', '2', ''), ('4', '0000-00-00 00:00:00', '2018-05-29 12:47:40', '2018-05-29 12:47:47', '5', '3', ''), ('5', '2018-05-24 12:46:07', '2018-05-29 12:46:12', '2018-05-29 12:46:18', '16', '2', ''), ('6', '2018-05-24 12:46:07', '2018-05-29 12:46:12', '2018-05-29 12:46:18', '15', '2', ''), ('7', '2018-05-24 12:46:07', '2018-05-29 12:46:12', '2018-05-29 12:46:18', '15', '2', ''), ('8', '2018-05-24 12:46:07', '2018-05-29 12:46:12', '2018-05-29 12:46:18', '18', '2', ''), ('9', '2018-05-24 12:46:07', '2018-05-29 12:46:12', '2018-05-29 12:46:18', '8', '2', '');
COMMIT;

-- ----------------------------
-- Table structure for `empleado`
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
`idEmpleado`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`apellido`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`direccion`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`dui`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nit`  varchar(17) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tel`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idUsuario`  int(11) NOT NULL ,
`idCargo`  int(11) NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idEmpleado`),
FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_empleado_cargo` (`idCargo`) USING BTREE ,
INDEX `fk_empleado_usuario` (`idUsuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=12

;

-- ----------------------------
-- Records of empleado
-- ----------------------------
BEGIN;
INSERT INTO `empleado` VALUES ('1', 'Oscar', 'Benitez', 'San Emigdio', '12345678-1', '14-122545-22-1', '2323-2321', '2', '2', ''), ('2', 'Andrea', 'Rosales', 'San Salvador', '23145678-8', '12-1548999-52-1', '2312-4556', '2', '2', ''), ('3', 'Efrain', 'Benitez', 'Los Angeles', '12345670-7', '14-122545-22-3', '2323-0320', '2', '2', ''), ('4', 'William', 'Rosales', 'San Emigdio', '12345678-1', '14-122545-22-1', '2323-2321', '2', '2', ''), ('5', 'Ernesto', 'Benitez', 'San Emigdio', '12345678-1', '14-122545-22-1', '2323-2321', '2', '2', ''), ('6', 'Oscar Efrain', 'Benitez', 'Cojutepeque', '12345678-0', '14-122545-22-0', '2323-2320', '1', '1', ''), ('7', 'Andrea', 'Martinez', 'San Marcos', '23145678-8', '12-1548999-52-1', '2312-4556', '2', '2', ''), ('8', 'Oscar Efrain', 'Benitez', 'Cojutepeque', '12345678-0', '14-122545-22-0', '2323-2320', '1', '1', ''), ('9', 'Manuel', 'Gonzalez', 'San Miguel', '02345678-0', '04-122545-22-0', '0323-2320', '2', '1', ''), ('11', 'Edmundo', 'Gonzalez', 'Santa Tecla', '12345678-1', '0155454', '2323-2321', '3', '4', '');
COMMIT;

-- ----------------------------
-- Table structure for `estadoherramienta`
-- ----------------------------
DROP TABLE IF EXISTS `estadoherramienta`;
CREATE TABLE `estadoherramienta` (
`idEstado`  int(11) NOT NULL AUTO_INCREMENT ,
`estado`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idEstado`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of estadoherramienta
-- ----------------------------
BEGIN;
INSERT INTO `estadoherramienta` VALUES ('1', 'Nueva', ''), ('2', 'Exelentes condiciones', ''), ('3', 'Buena', ''), ('4', 'Mala', ''), ('5', 'En reparacion', '');
COMMIT;

-- ----------------------------
-- Table structure for `herramienta`
-- ----------------------------
DROP TABLE IF EXISTS `herramienta`;
CREATE TABLE `herramienta` (
`idHerramienta`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idCategoria`  int(11) NOT NULL ,
`idEstado`  int(11) NOT NULL ,
`disponible`  bit(1) NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idHerramienta`),
FOREIGN KEY (`idCategoria`) REFERENCES `categoriaherramienta` (`idCategoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idEstado`) REFERENCES `estadoherramienta` (`idEstado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_herramienta_categoria` (`idCategoria`) USING BTREE ,
INDEX `fk_herramienta_estado` (`idEstado`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=22

;

-- ----------------------------
-- Records of herramienta
-- ----------------------------
BEGIN;
INSERT INTO `herramienta` VALUES ('1', 'Pala', '1', '3', '', ''), ('2', 'Serrucho eléctrico', '1', '1', '', ''), ('3', 'Pulidora', '1', '2', '', ''), ('4', 'Martillo eléctrico', '1', '5', '', ''), ('5', 'Mescladora de concreto', '2', '3', '', ''), ('6', 'Palas duple', '4', '1', '', ''), ('7', 'Cubetas', '4', '5', '', ''), ('8', 'Carretillas', '4', '2', '', ''), ('9', 'Cuchara', '4', '1', '', ''), ('10', 'Plomo', '4', '2', '', ''), ('11', 'Cáñamo bollos ', '4', '1', '', ''), ('12', 'Niveletas', '4', '2', '', ''), ('13', 'Mangueras', '4', '1', '', ''), ('14', 'Lamparas', '4', '3', '', ''), ('15', 'Lazos', '4', '3', '', ''), ('16', 'Cascos', '2', '4', '', ''), ('17', 'Guantes en par', '2', '1', '', ''), ('18', 'Lentes de protección', '2', '1', '', ''), ('19', 'Tapones para oídos', '2', '1', '', ''), ('20', 'Casco con protección de oídos', '2', '1', '', ''), ('21', 'Saranda', '4', '2', '', '');
COMMIT;

-- ----------------------------
-- Table structure for `prestamo`
-- ----------------------------
DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE `prestamo` (
`idPrestamo`  int(11) NOT NULL AUTO_INCREMENT ,
`descripcion`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idEmpleadoEntrega`  int(11) NOT NULL ,
`idEmpleadoRecive`  int(11) NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idPrestamo`),
FOREIGN KEY (`idEmpleadoEntrega`) REFERENCES `empleado` (`idEmpleado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idEmpleadoRecive`) REFERENCES `empleado` (`idEmpleado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_prestamo_empleado` (`idEmpleadoEntrega`) USING BTREE ,
INDEX `fk_prestamo_empleadoRecive` (`idEmpleadoRecive`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=13

;

-- ----------------------------
-- Records of prestamo
-- ----------------------------
BEGIN;
INSERT INTO `prestamo` VALUES ('1', 'Prestamo para constrcccion ilopango', '1', '2', ''), ('2', 'Prestamo para constrcccion fonceca', '1', '3', ''), ('3', 'Simple prestamo', '1', '4', ''), ('4', 'Otro prestamo', '1', '2', ''), ('5', 'Otro Prestamo', '1', '2', ''), ('6', 'Otro Prestamo', '1', '5', ''), ('7', 'Otro Prestamo', '1', '9', ''), ('8', 'mi prestamo', '1', '9', ''), ('9', 'Otro Prestamo mas', '2', '8', ''), ('10', 'Prestamo para constrcccion fonceca', '1', '3', ''), ('11', 'Prestamo para constrcccion fonceca', '1', '3', ''), ('12', 'Otro Prestamo de una carreta', '1', '3', '');
COMMIT;

-- ----------------------------
-- Table structure for `tipousuario`
-- ----------------------------
DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
`idTipoUsaurio`  int(11) NOT NULL AUTO_INCREMENT ,
`tipoUsuario`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idTipoUsaurio`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of tipousuario
-- ----------------------------
BEGIN;
INSERT INTO `tipousuario` VALUES ('1', 'Admin', ''), ('2', 'Estandar', '');
COMMIT;

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
`idUsuario`  int(11) NOT NULL AUTO_INCREMENT ,
`usuario`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`clave`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idTipoUsuario`  int(11) NOT NULL ,
`activo`  bit(1) NOT NULL ,
PRIMARY KEY (`idUsuario`),
FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsaurio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_usuario_tipoUsuario` (`idTipoUsuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES ('1', 'neto', '123', '1', ''), ('2', 'Andrea', 'hola', '2', ''), ('3', 'Edmundo', '456', '2', '');
COMMIT;

-- ----------------------------
-- Auto increment value for `areatrabajo`
-- ----------------------------
ALTER TABLE `areatrabajo` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `cargo`
-- ----------------------------
ALTER TABLE `cargo` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for `categoriaherramienta`
-- ----------------------------
ALTER TABLE `categoriaherramienta` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `detalleprestamo`
-- ----------------------------
ALTER TABLE `detalleprestamo` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for `empleado`
-- ----------------------------
ALTER TABLE `empleado` AUTO_INCREMENT=12;

-- ----------------------------
-- Auto increment value for `estadoherramienta`
-- ----------------------------
ALTER TABLE `estadoherramienta` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for `herramienta`
-- ----------------------------
ALTER TABLE `herramienta` AUTO_INCREMENT=22;

-- ----------------------------
-- Auto increment value for `prestamo`
-- ----------------------------
ALTER TABLE `prestamo` AUTO_INCREMENT=13;

-- ----------------------------
-- Auto increment value for `tipousuario`
-- ----------------------------
ALTER TABLE `tipousuario` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `usuario`
-- ----------------------------
ALTER TABLE `usuario` AUTO_INCREMENT=4;
