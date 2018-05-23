
#DROP database IF EXISTS db_scb09;
create database db_scb09;
use db_scb09;

##############################################
################### tablas ###################
##############################################

CREATE TABLE areatrabajo(
  idArea int NOT NULL auto_increment,
  area varchar(30) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idArea)
);

CREATE TABLE cargo(
  idCargo int(11) NOT NULL auto_increment, 
  cargo varchar(30) NOT NULL,
  idArea int(11) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idCargo)
  );
 
CREATE TABLE categoriaherramienta(
  idCategoria int(11) NOT NULL auto_increment,
  nombreCategoria varchar(30) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idCategoria)
);

CREATE TABLE prestamo (
  idPrestamo int(11) NOT NULL auto_increment,
  prestado varchar(100) NOT NULL ,
  idEmpleadoEntrega int(11) NOT NULL,
  idEmpleadoRecive int(11) NOT NULL,
  cantidadTotal int(11) NOT NULL,
  activo bit(1) NOT NULL,
  PRIMARY KEY (idPrestamo)
);

CREATE TABLE detalleprestamo (
  idDetallePrestamo int(11) NOT NULL auto_increment,
  cantHerramienta int(11) NOT NULL,
  fechaInicioPrestamo datetime NOT NULL,
  fechaFinPrestamo datetime NOT NULL,  
  fechaEntrega datetime NULL,
  idHerramienta int(11) NOT NULL,
  idPrestamo int(11) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idDetallePrestamo)
);

CREATE TABLE empleado (
  idEmpleado int(11) NOT NULL auto_increment,
  nombre varchar(30) NOT NULL,
  apellido varchar(30) NOT NULL,
  direccion varchar(50) NOT NULL,
  dui varchar(10) NOT NULL,
  nit varchar(17) NOT NULL,
  tel varchar(30) NOT NULL,
  idUsuario int(11) NOT NULL,
  idCargo int(11) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idEmpleado)
);

CREATE TABLE estadoherramienta (
  idEstado int(11) NOT NULL auto_increment,
  estado varchar(30) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idEstado)
);


CREATE TABLE herramienta (
  idHerramienta int(11) NOT NULL auto_increment,
  nombre varchar(30) NOT NULL,
  idCategoria int(11) NOT NULL,
  idEstado int(11) NOT NULL,
  disponible bit(1) NOT NULL,
  activo bit(1) NOT NULL,
  PRIMARY KEY (idHerramienta)
);



CREATE TABLE tipousuario (
  idTipoUsaurio int(11) NOT NULL auto_increment,
  tipoUsuario varchar(30) NOT NULL,
  activo bit NOT NULL,
  PRIMARY KEY (idTipoUsaurio)
);

CREATE TABLE usuario (
  idUsuario int(11) NOT NULL auto_increment,
  usuario varchar(30) NOT NULL,
  clave varchar(30) NOT NULL,
  idTipoUsuario int(11) NOT NULL,
  activo bit(1) NOT NULL,
  PRIMARY KEY (idUsuario)
);


##############################################
############### llave foranias ###############
##############################################


alter table cargo add CONSTRAINT fk_cargo_areaTrabajo FOREIGN KEY (idArea) REFERENCES areatrabajo (idArea);

alter table detallePrestamo add CONSTRAINT fk_detallePrestamo_herramienta FOREIGN KEY (idHerramienta) REFERENCES herramienta (idHerramienta);
alter table detallePrestamo add CONSTRAINT fk_detallePrestamo_prestamo FOREIGN KEY (idPrestamo) REFERENCES prestamo (idPrestamo);


alter table empleado add CONSTRAINT fk_empleado_cargo FOREIGN KEY (idCargo) REFERENCES cargo (idCargo);
alter table empleado add CONSTRAINT fk_empleado_usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario);


alter table herramienta add  CONSTRAINT fk_herramienta_categoria FOREIGN KEY (idCategoria) REFERENCES categoriaherramienta (idCategoria);
alter table herramienta add  CONSTRAINT fk_herramienta_estado FOREIGN KEY (idEstado) REFERENCES estadoherramienta (idEstado);

alter table prestamo add CONSTRAINT fk_prestamo_empleado FOREIGN KEY (idEmpleadoEntrega) REFERENCES empleado (idEmpleado);
alter table prestamo add CONSTRAINT fk_prestamo_empleadoRecive FOREIGN KEY (idEmpleadoRecive) REFERENCES empleado (idEmpleado);

alter table usuario add CONSTRAINT fk_usuario_tipoUsuario FOREIGN KEY (idTipoUsuario) REFERENCES tipousuario (idTipoUsaurio);

##############################################
############### llave foranias ###############
##############################################

INSERT INTO `categoriaherramienta` (`nombreCategoria`, `activo`) VALUES ('Electrica', '1');
INSERT INTO `categoriaherramienta` (`nombreCategoria`, `activo`) VALUES ('Industrial', '1');
INSERT INTO `categoriaherramienta` (`nombreCategoria`, `activo`) VALUES ('Especiales', '1');
INSERT INTO `categoriaherramienta` (`nombreCategoria`, `activo`) VALUES ('Basica', '1');

INSERT INTO `estadoherramienta` (`estado`, `activo`) VALUES ('Nueva', '1');
INSERT INTO `estadoherramienta` (`estado`, `activo`) VALUES ('Exelentes condiciones', '1');
INSERT INTO `estadoherramienta` (`estado`, `activo`) VALUES ('Buena', '1');
INSERT INTO `estadoherramienta` (`estado`, `activo`) VALUES ('defectuosas', '1');
INSERT INTO `estadoherramienta` (`estado`, `activo`) VALUES ('En reparacion', '1');

INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Serrucho tradicional',  '4', '2', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Serrucho eléctrico', '1', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Pulidora', '1', '2', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Martillo eléctrico', '1', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Mescladora de concreto', '2', '3', '0', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Palas', '4', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Cubetas', '4', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Carretillas', '4', '2', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Cuchara', '4', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Plomo', '4', '2', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Cáñamo bollos ', '4', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Niveletas', '4', '2', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Mangueras', '4', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Lamparas', '4', '3', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Lazos', '4', '3', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Cascos', '2', '2', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Guantes en par', '2', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Lentes de protección', '2', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Tapones para oídos', '2', '1', '1', '1');
INSERT INTO `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`) VALUES ('Casco con protección de oídos', '2', '1', '1', '1');

INSERT INTO `tipousuario` (`tipoUsuario`, `activo`) VALUES ('Admin', '1');
INSERT INTO `tipousuario` (`tipoUsuario`, `activo`) VALUES ('Estandar', '1');

INSERT INTO `usuario` (`usuario`, `clave`, `idTipoUsuario`, `activo`) VALUES ('neto', '123', '1', '1');
INSERT INTO `usuario` (`usuario`, `clave`, `idTipoUsuario`, `activo`) VALUES ('Andrea', '123', '2', '1');

INSERT INTO `areatrabajo` (`area`, `activo`) VALUES ('Adminstracion', '1');
INSERT INTO `areatrabajo` (`area`, `activo`) VALUES ('Bodega', '1');
INSERT INTO `areatrabajo` (`area`, `activo`) VALUES ('Informatica', '1');
INSERT INTO `areatrabajo` (`area`, `activo`) VALUES ('Constrccion', '1');

INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('Gerente', '1', '1');
INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('Adminstrador de bodega', '2', '1');
INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('Dessarrollador', '3', '1');
INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('Obrero', '4', '1');
INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('Arquitecto', '4', '1');
INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('Alvañil', '4', '1');
INSERT INTO `cargo` (`cargo`, `idArea`, `activo`) VALUES ('supervisor de obrea', '4', '1');



INSERT INTO `empleado` (`nombre`, `apellido`, `direccion`, `dui`, `nit`, `tel`, `idUsuario`, `idCargo`, `activo`) VALUES ('William', 'Rosales', 'San Emigdio', '12345678-9', '14-122545-22-2', '2323-2323', '1', '1', '1');
INSERT INTO `empleado` (`nombre`, `apellido`, `direccion`, `dui`, `nit`, `tel`, `idUsuario`, `idCargo`, `activo`) VALUES ('Andrea', 'Martinez', 'San Marcos', '23145678-8', '12-1548999-52-1', '2312-4556', '2', '2', '1');
INSERT INTO empleado (nombre, apellido, direccion, dui, nit, tel, idUsuario, idCargo, activo) VALUES ('Oscar', 'Rosales', 'San Emigdio', '12345670-9', '14-122545-22-1', '2323-0323', '1', '1', '1');

INSERT INTO `prestamo` (`prestado`, `idEmpleadoEntrega`, `idEmpleadoRecive`, `cantidadTotal`, `activo`) VALUES ('Prestamo para constrcccion ilopango', '1', '2', '0', '1');
INSERT INTO `prestamo` (`prestado`, `idEmpleadoEntrega`, `idEmpleadoRecive`, `cantidadTotal`, `activo`) VALUES ('Prestamo para constrcccion fonceca', '1', '2', '7', '1');

INSERT INTO `detalleprestamo` (`cantHerramienta`, `fechaInicioPrestamo`, `fechaFinPrestamo`, `fechaEntrega`, `idHerramienta`, `idPrestamo`, `activo`) VALUES ('10', '2018-05-22 13:39:06', '2018-05-24 13:39:28', '2018-05-24 08:39:53', '6', '1', '1');
INSERT INTO `detalleprestamo` (`cantHerramienta`, `fechaInicioPrestamo`, `fechaFinPrestamo`, `fechaEntrega`, `idHerramienta`, `idPrestamo`, `activo`) VALUES ('5', '2018-05-22 13:39:06', '2018-05-24 13:39:28', '2018-05-24 08:39:53', '3', '1', '1');

select count(*) as Cantidad,categoriaherramienta.nombreCategoria from herramienta inner join categoriaherramienta on herramienta.idCategoria = categoriaherramienta.idCategoria and  herramienta.activo=1 group by herramienta.idCategoria;
select h.nombre from herramienta as h inner join estadoherramienta as es on h.idEstado=es.idEstado and es.estado like '%defectuosas%';

select cargo.* from empleado as emp, cargo where cargo.idCargo=emp.idCargo and activo=1;
#idHerramienta, nombre, idCategoria, idEstado, disponible, activo
#select * from categoriaherramienta;
#idCategoria, nombreCategoria, activo

#select count(*) as Cantidad,categoriaherramienta.nombreCategoria from herramienta inner join categoriaherramienta on herramienta.idCategoria = categoriaherramienta.idCategoria and  herramienta.activo=1 group by herramienta.idCategoria;
