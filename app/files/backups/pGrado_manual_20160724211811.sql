-- Database: `unerg_pgrado`
-- Generation time: Sun 24th Jul 2016 21:18:11


-- Desactivar la comprobación de la integridad referencial
SET FOREIGN_KEY_CHECKS = 0;


-- Table:  `archivos`

DROP TABLE IF EXISTS archivos;

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tamano` varchar(20) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto_id` (`proyecto_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO archivos VALUES('1','preview-unerg.png','99505','image/png','/var/www/html/pGrado-testing-v0.3/app/files/proyectos/6//preview-unerg.png','6','5','2016-07-24 16:57:10');



-- Table:  `asuntos`

DROP TABLE IF EXISTS asuntos;

CREATE TABLE `asuntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `num_secuencia` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf16 NOT NULL,
  `cerrado` tinyint(1) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO asuntos VALUES('1','12','6','1','qwdqwdqwdwq','','5','1','2016-07-24 16:58:03','2016-07-24 16:58:03');



-- Table:  `autors`

DROP TABLE IF EXISTS autors;

CREATE TABLE `autors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `proyecto_id` (`proyecto_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `tipo_autor_id` (`tipo_autor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

INSERT INTO autors VALUES('54','6','3','1','2016-07-23 10:56:12','2016-07-23 10:56:12','1');
INSERT INTO autors VALUES('62','8','1','1','2016-07-24 10:59:49','2016-07-24 10:59:49','1');



-- Table:  `categorias`

DROP TABLE IF EXISTS categorias;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` mediumtext,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `programa_id` (`programa_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO categorias VALUES('1','1',NULL,'Aplicaciones Web para Internet e Intranet','','1','2','1');
INSERT INTO categorias VALUES('2','1',NULL,'Redes','','3','4','1');
INSERT INTO categorias VALUES('3','1',NULL,'Inligencia Artificial','','5','6','1');
INSERT INTO categorias VALUES('4','1',NULL,'Sistemas de Información','','7','8','1');
INSERT INTO categorias VALUES('5','1',NULL,'Software Educativo','','9','10','1');



-- Table:  `categorias_usuarios`

DROP TABLE IF EXISTS categorias_usuarios;

CREATE TABLE `categorias_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




-- Table:  `comentarios`

DROP TABLE IF EXISTS comentarios;

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `proyecto_id` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `proyecto_id` (`proyecto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO comentarios VALUES('1','5',' qwdqwdqwdwq','2016-07-24 16:57:29','2016-07-24 16:57:29','6','');
INSERT INTO comentarios VALUES('2','5',' dqwdqwdqw','2016-07-24 17:13:06','2016-07-24 17:13:06','6','');



-- Table:  `config`

DROP TABLE IF EXISTS config;

CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(100) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `tipo` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clave` (`clave`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO config VALUES('1','asignacion_jurados.firma.nombre','Dr. Jackson Garcia','impresion');
INSERT INTO config VALUES('2','asignacion_jurados.firma.cargo','Decano del Area de Ingeniería de Sistemas','impresion');



-- Table:  `descargas`

DROP TABLE IF EXISTS descargas;

CREATE TABLE `descargas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `etiqueta` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO descargas VALUES('1','Formato de Informe','explicacion de informe ','Formatos de Impresión','Comenzar.pdf','application/pdf','2016-07-19 15:54:41','2016-07-21 12:53:47','1','1');



-- Table:  `descripcion_logs`

DROP TABLE IF EXISTS descripcion_logs;

CREATE TABLE `descripcion_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `prioridad` tinyint(2) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estructura` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `estructura` (`estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO descripcion_logs VALUES('1','000','10','Sin descripcion','');
INSERT INTO descripcion_logs VALUES('2','001','1','Activacion de Usuario PreRegistrado','Usuario.updated.register');
INSERT INTO descripcion_logs VALUES('3','002','1','Inicio de Sesion','');
INSERT INTO descripcion_logs VALUES('4','003','1','Recuperacion de Contraseña','');
INSERT INTO descripcion_logs VALUES('5','004','1','Actualizacion de Datos del Usuario','Usuario.updated.edit');
INSERT INTO descripcion_logs VALUES('6','005','1','Cambio de Contraseña','Usuario.updated.editpassword');
INSERT INTO descripcion_logs VALUES('7','006','1','Creacion de Datos adicionales del usuario','DescripcionUsuario.created.edit');
INSERT INTO descripcion_logs VALUES('8','007','1','Registro de Nuevo Usuario','Usuario.created.register');
INSERT INTO descripcion_logs VALUES('9','008','1','Actualizacion de Datos adicionales del usuario','DescripcionUsuario.updated.edit');
INSERT INTO descripcion_logs VALUES('10','201','1','Crear Nuevo Proyecto','Proyecto.created.add');
INSERT INTO descripcion_logs VALUES('11','202','1','Crear Autor de Proyecto','Autor.created.add');
INSERT INTO descripcion_logs VALUES('12','203','1','Crear Revision','Revision.created.add');
INSERT INTO descripcion_logs VALUES('13','204','1','Crear Escenario de Proyecto','Escenario.created.add');
INSERT INTO descripcion_logs VALUES('14','205','1','Generar solicitud de compañero de Proyecto','Autor.created.addCompanero');
INSERT INTO descripcion_logs VALUES('15','206','1','Solicitud de compañero/tutor Aceptada','Autor.updated.solicitud');
INSERT INTO descripcion_logs VALUES('16','303','1','Edicion de Revision','Revision.created.edit');
INSERT INTO descripcion_logs VALUES('17','304','1','Edicion de Escenario','Escenario.updated.escenarioEdit');
INSERT INTO descripcion_logs VALUES('18','501','1','Proyecto Eliminado','Proyecto.delete');
INSERT INTO descripcion_logs VALUES('19','502','1','Autor Eliminado','Autor.delete');
INSERT INTO descripcion_logs VALUES('20','503','1','Revision Eliminada','Revision.delete');
INSERT INTO descripcion_logs VALUES('21','504','1','Escenario Eliminado','Escenario.delete');



-- Table:  `descripcion_tutors`

DROP TABLE IF EXISTS descripcion_tutors;

CREATE TABLE `descripcion_tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `pos_inst` varchar(60) NOT NULL,
  `escalafon` varchar(60) DEFAULT NULL,
  `dedicacion` varchar(60) DEFAULT NULL,
  `publico` mediumtext COMMENT 'Informacion publica del tutor, para ser mostrada a los estud',
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO descripcion_tutors VALUES('1','1','1','3','4',NULL,'2016-07-22 16:11:04');
INSERT INTO descripcion_tutors VALUES('2','5','1','1','2',NULL,'2016-07-24 16:40:34');



-- Table:  `descripcion_usuarios`

DROP TABLE IF EXISTS descripcion_usuarios;

CREATE TABLE `descripcion_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `telf_cel` varchar(20) NOT NULL,
  `telf_trab` varchar(20) DEFAULT NULL,
  `telf_hab` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `titulo_obtenido` varchar(100) DEFAULT NULL,
  `profesion` varchar(60) DEFAULT NULL,
  `inst_labora` varchar(100) DEFAULT NULL,
  `nivel_academico` varchar(20) DEFAULT NULL,
  `resumen_curricular` mediumtext,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO descripcion_usuarios VALUES('1','3','(2312)312-3123',NULL,'(1231)231-2312','123123',NULL,NULL,NULL,NULL,NULL,'2016-07-19 19:21:16');
INSERT INTO descripcion_usuarios VALUES('2','4','(1231)231-2312',NULL,'(1231)231-2312','123123',NULL,NULL,NULL,NULL,NULL,'2016-07-22 12:31:29');
INSERT INTO descripcion_usuarios VALUES('3','1','(1231)231-2312',NULL,'(1231)231-2312','113123',NULL,NULL,NULL,NULL,NULL,'2016-07-22 16:11:04');
INSERT INTO descripcion_usuarios VALUES('4','5','(0231)231-2312',NULL,'(0123)123-1231','131',NULL,NULL,NULL,NULL,NULL,'2016-07-24 16:40:34');



-- Table:  `escenarios`

DROP TABLE IF EXISTS escenarios;

CREATE TABLE `escenarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `persona` varchar(120) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `carta_aceptacion` tinyint(1) NOT NULL,
  `carta_implementacion` tinyint(1) NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto_id` (`proyecto_id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO escenarios VALUES('6','6','234234 dqwdqwd','234234','23412312','23423','(0234)-2342342','1','','2016-07-24 19:52:40');
INSERT INTO escenarios VALUES('8','8','','','','','','','','2016-07-24 10:59:50');



-- Table:  `estados`

DROP TABLE IF EXISTS estados;

CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `fase_id` int(11) NOT NULL,
  `orden` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `fase_id` (`fase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO estados VALUES('1','En Espera','espera','0','0');
INSERT INTO estados VALUES('2','Solicitud','solicitud','4','1');
INSERT INTO estados VALUES('3','Reprobado','reprobado','4','2');
INSERT INTO estados VALUES('4','Si Condicionado','si_cond','4','3');
INSERT INTO estados VALUES('5','Si con Observaciones','si_observ','4','4');
INSERT INTO estados VALUES('6','Si Aprobado','aprobado','4','5');



-- Table:  `fases`

DROP TABLE IF EXISTS fases;

CREATE TABLE `fases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT ' ',
  `orden` int(2) NOT NULL,
  `tiene_jurados` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO fases VALUES('1','Propuesta','propuesta','1','');
INSERT INTO fases VALUES('2','Proyecto de Grado I','grado1','2','');
INSERT INTO fases VALUES('3','Proyecto de Grado II','grado2','3','');
INSERT INTO fases VALUES('4','PreDefensa','predefensa','4','');
INSERT INTO fases VALUES('5','Defensa','defensa','5','1');
INSERT INTO fases VALUES('6','Publicado','publicado','6','');



-- Table:  `grupos`

DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `fase_id` int(11) DEFAULT NULL,
  `meta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fase_id` (`fase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO grupos VALUES('1','Cohorte 2015-1','1','1','{\"fases\":{\"5\":{\"no_consj_area\":\"2\",\"fecha_consj_area\":\"2016-07-07\",\"fecha_comun\":\"2016-07-30\"}}}');



-- Table:  `jurados`

DROP TABLE IF EXISTS jurados;

CREATE TABLE `jurados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_jurado_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `fase_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto_id` (`proyecto_id`),
  KEY `fase_id` (`fase_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `tipo_jurado_id` (`tipo_jurado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO jurados VALUES('1','1','1','8','5');
INSERT INTO jurados VALUES('2','2','1','8','5');
INSERT INTO jurados VALUES('4','3','1','8','5');
INSERT INTO jurados VALUES('5','2','5','6','5');
INSERT INTO jurados VALUES('6','2','1','6','5');



-- Table:  `logs`

DROP TABLE IF EXISTS logs;

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `descripcion_log_id` int(11) DEFAULT NULL,
  `related_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `descripcion_log_id` (`descripcion_log_id`),
  KEY `related_id` (`related_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1168 DEFAULT CHARSET=utf8;

INSERT INTO logs VALUES('1','1','1','1','2016-07-19 15:08:43','code:Programa.created.add;');
INSERT INTO logs VALUES('2','1','1','1','2016-07-19 15:47:47','code:Categoria.created.add;');
INSERT INTO logs VALUES('3','1','1','2','2016-07-19 15:47:59','code:Categoria.created.add;');
INSERT INTO logs VALUES('4','1','1','3','2016-07-19 15:48:15','code:Categoria.created.add;');
INSERT INTO logs VALUES('5','1','1','3','2016-07-19 15:48:22','code:Categoria.updated.edit;');
INSERT INTO logs VALUES('6','1','1','4','2016-07-19 15:48:35','code:Categoria.created.add;');
INSERT INTO logs VALUES('7','1','1','5','2016-07-19 15:49:07','code:Categoria.created.add;');
INSERT INTO logs VALUES('8','1','10','1','2016-07-19 15:49:49',NULL);
INSERT INTO logs VALUES('9','1','11','1','2016-07-19 15:49:50',NULL);
INSERT INTO logs VALUES('10','1','11','2','2016-07-19 15:49:50',NULL);
INSERT INTO logs VALUES('11','1','12','1','2016-07-19 15:49:50',NULL);
INSERT INTO logs VALUES('12','1','13','1','2016-07-19 15:49:50',NULL);
INSERT INTO logs VALUES('13','1','1','1','2016-07-19 15:49:50','code:Meta.created.add;');
INSERT INTO logs VALUES('14','1','1','1','2016-07-19 15:50:43','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('15','1','1','1','2016-07-19 15:54:41','code:Descarga.created.add;');
INSERT INTO logs VALUES('16','1','1','1','2016-07-19 15:54:58','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('17','1','1','1','2016-07-19 15:55:05','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('18','1','1','1','2016-07-19 15:55:36','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('19','1','1','1','2016-07-19 15:56:11','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('20','1','1','1','2016-07-19 15:56:26','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('21','1','1','1','2016-07-19 15:56:32','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('22','1','1','1','2016-07-19 15:56:36','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('23','1','1','1','2016-07-19 15:56:41','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('24','1','1','1','2016-07-19 15:56:47','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('25','1','1','1','2016-07-19 15:56:52','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('26','1','1','1','2016-07-19 15:56:57','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('27','1','1','1','2016-07-19 15:59:38','code:Archivo.created.add;');
INSERT INTO logs VALUES('28','1','1','2','2016-07-19 15:59:57','code:Archivo.created.add;');
INSERT INTO logs VALUES('29','1','1','2','2016-07-19 16:00:01','code:Archivo.delete;');
INSERT INTO logs VALUES('30','1','1','1','2016-07-19 16:00:05','code:Archivo.delete;');
INSERT INTO logs VALUES('31','1','1','3','2016-07-19 16:00:21','code:Archivo.created.add;');
INSERT INTO logs VALUES('32','1','1','3','2016-07-19 16:00:24','code:Archivo.delete;');
INSERT INTO logs VALUES('33','1','1','1','2016-07-19 16:01:04','code:Escenario.updated.escenario_edit;');
INSERT INTO logs VALUES('34','1','1','1','2016-07-19 16:01:14','code:Escenario.updated.escenario_edit;');
INSERT INTO logs VALUES('35','1','3',NULL,'2016-07-19 18:49:11',NULL);
INSERT INTO logs VALUES('36',NULL,'8','3','2016-07-19 19:20:49',NULL);
INSERT INTO logs VALUES('37','3','3',NULL,'2016-07-19 19:20:56',NULL);
INSERT INTO logs VALUES('38','3','5','3','2016-07-19 19:21:16',NULL);
INSERT INTO logs VALUES('39','3','7','1','2016-07-19 19:21:16',NULL);
INSERT INTO logs VALUES('40','3','10','2','2016-07-19 19:22:34',NULL);
INSERT INTO logs VALUES('41','3','11','3','2016-07-19 19:22:34',NULL);
INSERT INTO logs VALUES('42','3','12','2','2016-07-19 19:22:34',NULL);
INSERT INTO logs VALUES('43','3','13','2','2016-07-19 19:22:34',NULL);
INSERT INTO logs VALUES('44','3','1','2','2016-07-19 19:22:35','code:Meta.created.add;');
INSERT INTO logs VALUES('45','1','3',NULL,'2016-07-19 20:06:19',NULL);
INSERT INTO logs VALUES('46','1','3',NULL,'2016-07-20 07:46:08',NULL);
INSERT INTO logs VALUES('47','1','3',NULL,'2016-07-20 13:20:18',NULL);
INSERT INTO logs VALUES('48','1','1','1','2016-07-20 13:33:51','code:Asunto.created.add;');
INSERT INTO logs VALUES('49','1','1','1','2016-07-20 13:33:51','code:Meta.updated.add;');
INSERT INTO logs VALUES('50','1','1','2','2016-07-20 13:34:10','code:Asunto.created.add;');
INSERT INTO logs VALUES('51','1','1','1','2016-07-20 13:34:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('52','1','1','3','2016-07-20 13:35:14','code:Asunto.created.add;');
INSERT INTO logs VALUES('53','1','1','1','2016-07-20 13:35:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('54','1','1','3','2016-07-20 13:36:04','code:Meta.created.add;');
INSERT INTO logs VALUES('55','1','1','3','2016-07-20 13:36:04','code:Meta.updated.add;');
INSERT INTO logs VALUES('56','1','1','1','2016-07-20 13:36:04','code:Meta.updated.add;');
INSERT INTO logs VALUES('57','1','1','1','2016-07-20 13:37:18','code:Meta.updated.edit;');
INSERT INTO logs VALUES('58','1','1','3','2016-07-20 13:37:19','code:Meta.updated.edit;');
INSERT INTO logs VALUES('59','1','1','1','2016-07-20 13:37:19','code:Meta.updated.edit;');
INSERT INTO logs VALUES('60','1','1','3','2016-07-20 13:39:20','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('61','1','1','3','2016-07-20 13:39:20','code:Meta.updated.edit;');
INSERT INTO logs VALUES('62','1','1','1','2016-07-20 13:39:20','code:Meta.updated.edit;');
INSERT INTO logs VALUES('63','1','1','3','2016-07-20 13:39:52','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('64','1','1','3','2016-07-20 13:39:52','code:Meta.updated.edit;');
INSERT INTO logs VALUES('65','1','1','1','2016-07-20 13:39:52','code:Meta.updated.edit;');
INSERT INTO logs VALUES('66','1','1','3','2016-07-20 13:40:10','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('67','1','1','3','2016-07-20 13:40:10','code:Meta.updated.edit;');
INSERT INTO logs VALUES('68','1','1','1','2016-07-20 13:40:10','code:Meta.updated.edit;');
INSERT INTO logs VALUES('69','1','1','3','2016-07-20 13:40:17','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('70','1','1','3','2016-07-20 13:40:17','code:Meta.updated.edit;');
INSERT INTO logs VALUES('71','1','1','1','2016-07-20 13:40:17','code:Meta.updated.edit;');
INSERT INTO logs VALUES('72','1','1','3','2016-07-20 13:41:11','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('73','1','1','3','2016-07-20 13:41:11','code:Meta.updated.edit;');
INSERT INTO logs VALUES('74','1','1','1','2016-07-20 13:41:11','code:Meta.updated.edit;');
INSERT INTO logs VALUES('75','1','1','3','2016-07-20 13:41:45','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('76','1','1','3','2016-07-20 13:41:45','code:Meta.updated.edit;');
INSERT INTO logs VALUES('77','1','1','1','2016-07-20 13:41:45','code:Meta.updated.edit;');
INSERT INTO logs VALUES('78','1','1','3','2016-07-20 13:41:52','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('79','1','1','3','2016-07-20 13:41:53','code:Meta.updated.edit;');
INSERT INTO logs VALUES('80','1','1','1','2016-07-20 13:41:53','code:Meta.updated.edit;');
INSERT INTO logs VALUES('81','1','1','3','2016-07-20 13:42:12','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('82','1','1','3','2016-07-20 13:42:13','code:Meta.updated.edit;');
INSERT INTO logs VALUES('83','1','1','1','2016-07-20 13:42:13','code:Meta.updated.edit;');
INSERT INTO logs VALUES('84','1','1','3','2016-07-20 13:42:42','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('85','1','1','3','2016-07-20 13:42:43','code:Meta.updated.edit;');
INSERT INTO logs VALUES('86','1','1','1','2016-07-20 13:42:43','code:Meta.updated.edit;');
INSERT INTO logs VALUES('87','1','1','3','2016-07-20 13:43:25','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('88','1','1','3','2016-07-20 13:43:26','code:Meta.updated.edit;');
INSERT INTO logs VALUES('89','1','1','1','2016-07-20 13:43:26','code:Meta.updated.edit;');
INSERT INTO logs VALUES('90','1','1','3','2016-07-20 13:43:53','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('91','1','1','3','2016-07-20 13:43:53','code:Meta.updated.edit;');
INSERT INTO logs VALUES('92','1','1','1','2016-07-20 13:43:53','code:Meta.updated.edit;');
INSERT INTO logs VALUES('93','1','1','3','2016-07-20 13:44:17','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('94','1','1','3','2016-07-20 13:44:17','code:Meta.updated.edit;');
INSERT INTO logs VALUES('95','1','1','1','2016-07-20 13:44:17','code:Meta.updated.edit;');
INSERT INTO logs VALUES('96','1','1','3','2016-07-20 13:45:53','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('97','1','1','3','2016-07-20 13:45:53','code:Meta.updated.edit;');
INSERT INTO logs VALUES('98','1','1','1','2016-07-20 13:45:53','code:Meta.updated.edit;');
INSERT INTO logs VALUES('99','1','1','3','2016-07-20 13:46:12','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('100','1','1','3','2016-07-20 13:46:12','code:Meta.updated.edit;');
INSERT INTO logs VALUES('101','1','1','1','2016-07-20 13:46:12','code:Meta.updated.edit;');
INSERT INTO logs VALUES('102','1','1','3','2016-07-20 13:46:18','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('103','1','1','3','2016-07-20 13:46:18','code:Meta.updated.edit;');
INSERT INTO logs VALUES('104','1','1','1','2016-07-20 13:46:18','code:Meta.updated.edit;');
INSERT INTO logs VALUES('105','1','1','3','2016-07-20 13:46:23','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('106','1','1','3','2016-07-20 13:46:23','code:Meta.updated.edit;');
INSERT INTO logs VALUES('107','1','1','1','2016-07-20 13:46:23','code:Meta.updated.edit;');
INSERT INTO logs VALUES('108','1','1','3','2016-07-20 13:46:40','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('109','1','1','3','2016-07-20 13:46:40','code:Meta.updated.edit;');
INSERT INTO logs VALUES('110','1','1','1','2016-07-20 13:46:40','code:Meta.updated.edit;');
INSERT INTO logs VALUES('111','1','1','3','2016-07-20 13:47:36','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('112','1','1','3','2016-07-20 13:47:36','code:Meta.updated.edit;');
INSERT INTO logs VALUES('113','1','1','1','2016-07-20 13:47:36','code:Meta.updated.edit;');
INSERT INTO logs VALUES('114','1','1','3','2016-07-20 13:47:48','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('115','1','1','3','2016-07-20 13:47:49','code:Meta.updated.edit;');
INSERT INTO logs VALUES('116','1','1','1','2016-07-20 13:47:49','code:Meta.updated.edit;');
INSERT INTO logs VALUES('117','1','1','3','2016-07-20 13:48:19','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('118','1','1','3','2016-07-20 13:48:19','code:Meta.updated.edit;');
INSERT INTO logs VALUES('119','1','1','1','2016-07-20 13:48:19','code:Meta.updated.edit;');
INSERT INTO logs VALUES('120','1','1','3','2016-07-20 13:51:15','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('121','1','1','3','2016-07-20 13:51:15','code:Meta.updated.edit;');
INSERT INTO logs VALUES('122','1','1','1','2016-07-20 13:51:15','code:Meta.updated.edit;');
INSERT INTO logs VALUES('123','1','1','3','2016-07-20 13:51:22','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('124','1','1','3','2016-07-20 13:51:22','code:Meta.updated.edit;');
INSERT INTO logs VALUES('125','1','1','1','2016-07-20 13:51:22','code:Meta.updated.edit;');
INSERT INTO logs VALUES('126','1','1','3','2016-07-20 13:51:45','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('127','1','1','3','2016-07-20 13:51:45','code:Meta.updated.edit;');
INSERT INTO logs VALUES('128','1','1','1','2016-07-20 13:51:45','code:Meta.updated.edit;');
INSERT INTO logs VALUES('129','1','1','4','2016-07-20 14:04:18','code:Asunto.created.add;');
INSERT INTO logs VALUES('130','1','1','3','2016-07-20 14:04:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('131','1','1','1','2016-07-20 14:04:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('132','1','1','2','2016-07-20 14:04:24','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('133','1','1','3','2016-07-20 14:04:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('134','1','1','1','2016-07-20 14:04:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('135','1','1','5','2016-07-20 14:05:35','code:Asunto.created.add;');
INSERT INTO logs VALUES('136','1','1','2','2016-07-20 14:05:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('137','1','1','6','2016-07-20 14:06:30','code:Asunto.created.add;');
INSERT INTO logs VALUES('138','1','1','2','2016-07-20 14:06:30','code:Meta.updated.add;');
INSERT INTO logs VALUES('139','1','1','6','2016-07-20 14:06:35','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('140','1','1','2','2016-07-20 14:06:35','code:Meta.updated.edit;');
INSERT INTO logs VALUES('141','1','1','6','2016-07-20 14:06:41','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('142','1','1','2','2016-07-20 14:06:41','code:Meta.updated.edit;');
INSERT INTO logs VALUES('143','1','1','6','2016-07-20 14:06:46','code:Asunto.updated.change;');
INSERT INTO logs VALUES('144','1','1','2','2016-07-20 14:06:46','code:Meta.updated.change;');
INSERT INTO logs VALUES('145','1','1','4','2016-07-20 14:08:16','code:Meta.created.add;');
INSERT INTO logs VALUES('146','1','1','4','2016-07-20 14:08:16','code:Meta.updated.add;');
INSERT INTO logs VALUES('147','1','1','2','2016-07-20 14:08:16','code:Meta.updated.add;');
INSERT INTO logs VALUES('148','1','1','2','2016-07-20 14:08:36','code:Meta.updated.edit;');
INSERT INTO logs VALUES('149','1','1','4','2016-07-20 14:08:36','code:Meta.updated.edit;');
INSERT INTO logs VALUES('150','1','1','2','2016-07-20 14:08:36','code:Meta.updated.edit;');
INSERT INTO logs VALUES('151','1','1','4','2016-07-20 14:08:43','code:Meta.updated.edit;');
INSERT INTO logs VALUES('152','1','1','4','2016-07-20 14:08:43','code:Meta.updated.edit;');
INSERT INTO logs VALUES('153','1','1','2','2016-07-20 14:08:43','code:Meta.updated.edit;');
INSERT INTO logs VALUES('154','1','1','2','2016-07-20 14:08:55','code:Meta.updated.change;');
INSERT INTO logs VALUES('155','1','1','4','2016-07-20 14:08:55','code:Meta.updated.change;');
INSERT INTO logs VALUES('156','1','1','2','2016-07-20 14:08:55','code:Meta.updated.change;');
INSERT INTO logs VALUES('157','1','1','1','2016-07-20 14:09:38','code:Comentario.created.add;');
INSERT INTO logs VALUES('158','1','1','1','2016-07-20 14:11:12','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('159','1','1','1','2016-07-20 14:11:21','code:Comentario.updated.delete;');
INSERT INTO logs VALUES('160','1','1','2','2016-07-20 14:19:19','code:Comentario.created.add;');
INSERT INTO logs VALUES('161','1','1','2','2016-07-20 14:19:24','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('162','3','3',NULL,'2016-07-20 14:19:50',NULL);
INSERT INTO logs VALUES('163','1','1','7','2016-07-20 14:26:35','code:Asunto.created.add;');
INSERT INTO logs VALUES('164','1','1','4','2016-07-20 14:26:35','code:Meta.updated.add;');
INSERT INTO logs VALUES('165','1','1','2','2016-07-20 14:26:35','code:Meta.updated.add;');
INSERT INTO logs VALUES('166','1','1','7','2016-07-20 14:27:56','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('167','1','1','4','2016-07-20 14:27:56','code:Meta.updated.edit;');
INSERT INTO logs VALUES('168','1','1','2','2016-07-20 14:27:56','code:Meta.updated.edit;');
INSERT INTO logs VALUES('169','1','1','7','2016-07-20 14:28:10','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('170','1','1','4','2016-07-20 14:28:11','code:Meta.updated.edit;');
INSERT INTO logs VALUES('171','1','1','2','2016-07-20 14:28:11','code:Meta.updated.edit;');
INSERT INTO logs VALUES('172','3','1','7','2016-07-20 14:28:33','code:Asunto.updated.change;');
INSERT INTO logs VALUES('173','3','1','4','2016-07-20 14:28:34','code:Meta.updated.change;');
INSERT INTO logs VALUES('174','3','1','2','2016-07-20 14:28:34','code:Meta.updated.change;');
INSERT INTO logs VALUES('175','3','1','4','2016-07-20 14:30:55','code:Meta.updated.edit;');
INSERT INTO logs VALUES('176','3','1','4','2016-07-20 14:30:55','code:Meta.updated.edit;');
INSERT INTO logs VALUES('177','3','1','2','2016-07-20 14:30:55','code:Meta.updated.edit;');
INSERT INTO logs VALUES('178','1','1','4','2016-07-20 14:31:06','code:Meta.updated.edit;');
INSERT INTO logs VALUES('179','1','1','4','2016-07-20 14:31:06','code:Meta.updated.edit;');
INSERT INTO logs VALUES('180','1','1','2','2016-07-20 14:31:06','code:Meta.updated.edit;');
INSERT INTO logs VALUES('181','1','1','3','2016-07-20 14:31:54','code:Comentario.created.add;');
INSERT INTO logs VALUES('182','3','1','4','2016-07-20 14:31:58','code:Comentario.created.add;');
INSERT INTO logs VALUES('183','3','1','4','2016-07-20 14:32:21','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('184','3','1','4','2016-07-20 14:38:53','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('185','3','1','5','2016-07-20 14:53:32','code:Comentario.created.add;');
INSERT INTO logs VALUES('186','3','1','6','2016-07-20 14:55:44','code:Comentario.created.add;');
INSERT INTO logs VALUES('187','3','1','6','2016-07-20 14:56:31','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('188','1','1','7','2016-07-20 14:58:31','code:Comentario.created.add;');
INSERT INTO logs VALUES('189','1','1','7','2016-07-20 14:58:37','code:Comentario.updated.delete;');
INSERT INTO logs VALUES('190','1','1','5','2016-07-20 15:59:44','code:Asunto.updated.edit;');
INSERT INTO logs VALUES('191','1','1','4','2016-07-20 15:59:44','code:Meta.updated.edit;');
INSERT INTO logs VALUES('192','1','1','2','2016-07-20 15:59:44','code:Meta.updated.edit;');
INSERT INTO logs VALUES('193','1','1','8','2016-07-20 15:59:49','code:Asunto.created.add;');
INSERT INTO logs VALUES('194','1','1','4','2016-07-20 15:59:49','code:Meta.updated.add;');
INSERT INTO logs VALUES('195','1','1','2','2016-07-20 15:59:49','code:Meta.updated.add;');
INSERT INTO logs VALUES('196','1','1','5','2016-07-20 15:59:53','code:Asunto.updated.change;');
INSERT INTO logs VALUES('197','1','1','4','2016-07-20 15:59:53','code:Meta.updated.change;');
INSERT INTO logs VALUES('198','1','1','2','2016-07-20 15:59:53','code:Meta.updated.change;');
INSERT INTO logs VALUES('199','1','1','8','2016-07-20 16:00:00','code:Asunto.updated.change;');
INSERT INTO logs VALUES('200','1','1','4','2016-07-20 16:00:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('201','1','1','2','2016-07-20 16:00:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('202','1','1','9','2016-07-20 16:00:16','code:Asunto.created.add;');
INSERT INTO logs VALUES('203','1','1','4','2016-07-20 16:00:16','code:Meta.updated.add;');
INSERT INTO logs VALUES('204','1','1','2','2016-07-20 16:00:16','code:Meta.updated.add;');
INSERT INTO logs VALUES('205','1','1','5','2016-07-20 16:00:57','code:Meta.created.add;');
INSERT INTO logs VALUES('206','1','1','5','2016-07-20 16:00:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('207','1','1','4','2016-07-20 16:00:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('208','1','1','2','2016-07-20 16:00:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('209','1','1','2','2016-07-20 16:01:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('210','1','1','5','2016-07-20 16:01:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('211','1','1','4','2016-07-20 16:01:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('212','1','1','2','2016-07-20 16:01:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('213','1','1','2','2016-07-20 16:01:30','code:Meta.updated.edit;');
INSERT INTO logs VALUES('214','1','1','5','2016-07-20 16:01:30','code:Meta.updated.edit;');
INSERT INTO logs VALUES('215','1','1','4','2016-07-20 16:01:30','code:Meta.updated.edit;');
INSERT INTO logs VALUES('216','1','1','2','2016-07-20 16:01:30','code:Meta.updated.edit;');
INSERT INTO logs VALUES('217','1','1','2','2016-07-20 16:01:39','code:Meta.updated.change;');
INSERT INTO logs VALUES('218','1','1','5','2016-07-20 16:01:39','code:Meta.updated.change;');
INSERT INTO logs VALUES('219','1','1','4','2016-07-20 16:01:39','code:Meta.updated.change;');
INSERT INTO logs VALUES('220','1','1','2','2016-07-20 16:01:39','code:Meta.updated.change;');
INSERT INTO logs VALUES('221','1','1','2','2016-07-20 16:01:50','code:Meta.updated.change;');
INSERT INTO logs VALUES('222','1','1','5','2016-07-20 16:01:50','code:Meta.updated.change;');
INSERT INTO logs VALUES('223','1','1','4','2016-07-20 16:01:50','code:Meta.updated.change;');
INSERT INTO logs VALUES('224','1','1','2','2016-07-20 16:01:50','code:Meta.updated.change;');
INSERT INTO logs VALUES('225','1','1','1','2016-07-20 16:01:58','code:Archivo.created.add;');
INSERT INTO logs VALUES('226','1','1','1','2016-07-20 16:02:06','code:Archivo.delete;');
INSERT INTO logs VALUES('227','3','3',NULL,'2016-07-20 16:03:58',NULL);
INSERT INTO logs VALUES('228','3','3',NULL,'2016-07-20 17:23:04',NULL);
INSERT INTO logs VALUES('229','1','3',NULL,'2016-07-20 17:56:57',NULL);
INSERT INTO logs VALUES('230','3','3',NULL,'2016-07-20 17:57:31',NULL);
INSERT INTO logs VALUES('231','3','3',NULL,'2016-07-20 17:58:06',NULL);
INSERT INTO logs VALUES('232','1','3',NULL,'2016-07-20 17:58:26',NULL);
INSERT INTO logs VALUES('233','3','3',NULL,'2016-07-20 17:58:58',NULL);
INSERT INTO logs VALUES('234','1','3',NULL,'2016-07-20 18:00:24',NULL);
INSERT INTO logs VALUES('235','3','3',NULL,'2016-07-20 18:00:50',NULL);
INSERT INTO logs VALUES('236','3','3',NULL,'2016-07-20 18:04:40',NULL);
INSERT INTO logs VALUES('237','3','3',NULL,'2016-07-20 18:06:19',NULL);
INSERT INTO logs VALUES('238','3','3',NULL,'2016-07-20 18:10:03',NULL);
INSERT INTO logs VALUES('239','1','3',NULL,'2016-07-20 18:10:53',NULL);
INSERT INTO logs VALUES('240','3','3',NULL,'2016-07-20 18:11:28',NULL);
INSERT INTO logs VALUES('241','3','1','6','2016-07-20 18:14:14','code:Meta.created.add;');
INSERT INTO logs VALUES('242','3','1','5','2016-07-20 18:14:17','code:Meta.updated.add;');
INSERT INTO logs VALUES('243','3','1','4','2016-07-20 18:14:17','code:Meta.updated.add;');
INSERT INTO logs VALUES('244','3','1','2','2016-07-20 18:14:17','code:Meta.updated.add;');
INSERT INTO logs VALUES('245','3','1','6','2016-07-20 18:14:17','code:Meta.updated.add;');
INSERT INTO logs VALUES('246','3','1','6','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('247','3','1','5','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('248','3','1','4','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('249','3','1','2','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('250','3','1','6','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('251','3','1','6','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('252','3','1','5','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('253','3','1','4','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('254','3','1','2','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('255','3','1','6','2016-07-20 18:14:27','code:Meta.updated.edit;');
INSERT INTO logs VALUES('256','3','1','6','2016-07-20 18:14:28','code:Meta.updated.edit;');
INSERT INTO logs VALUES('257','3','1','5','2016-07-20 18:14:28','code:Meta.updated.edit;');
INSERT INTO logs VALUES('258','3','1','4','2016-07-20 18:14:28','code:Meta.updated.edit;');
INSERT INTO logs VALUES('259','3','1','2','2016-07-20 18:14:28','code:Meta.updated.edit;');
INSERT INTO logs VALUES('260','3','1','6','2016-07-20 18:14:28','code:Meta.updated.edit;');
INSERT INTO logs VALUES('261','3','1','7','2016-07-20 18:14:36','code:Meta.created.add;');
INSERT INTO logs VALUES('262','3','1','5','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('263','3','1','7','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('264','3','1','4','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('265','3','1','2','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('266','3','1','6','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('267','3','1','8','2016-07-20 18:14:36','code:Meta.created.add;');
INSERT INTO logs VALUES('268','3','1','5','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('269','3','1','7','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('270','3','1','8','2016-07-20 18:14:36','code:Meta.updated.add;');
INSERT INTO logs VALUES('271','3','1','4','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('272','3','1','2','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('273','3','1','6','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('274','3','1','9','2016-07-20 18:14:37','code:Meta.created.add;');
INSERT INTO logs VALUES('275','3','1','5','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('276','3','1','7','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('277','3','1','8','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('278','3','1','9','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('279','3','1','4','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('280','3','1','2','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('281','3','1','6','2016-07-20 18:14:37','code:Meta.updated.add;');
INSERT INTO logs VALUES('282','3','3',NULL,'2016-07-20 18:21:42',NULL);
INSERT INTO logs VALUES('283','3','1','10','2016-07-20 18:21:53','code:Asunto.created.add;');
INSERT INTO logs VALUES('284','3','1','5','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('285','3','1','7','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('286','3','1','8','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('287','3','1','9','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('288','3','1','4','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('289','3','1','2','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('290','3','1','6','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('291','3','1','11','2016-07-20 18:21:53','code:Asunto.created.add;');
INSERT INTO logs VALUES('292','3','1','5','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('293','3','1','7','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('294','3','1','8','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('295','3','1','9','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('296','3','1','4','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('297','3','1','2','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('298','3','1','6','2016-07-20 18:21:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('299','3','1','12','2016-07-20 18:21:54','code:Asunto.created.add;');
INSERT INTO logs VALUES('300','3','1','5','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('301','3','1','7','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('302','3','1','8','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('303','3','1','9','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('304','3','1','4','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('305','3','1','2','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('306','3','1','6','2016-07-20 18:21:54','code:Meta.updated.add;');
INSERT INTO logs VALUES('307','3','1','13','2016-07-20 18:22:52','code:Asunto.created.add;');
INSERT INTO logs VALUES('308','3','1','5','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('309','3','1','7','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('310','3','1','8','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('311','3','1','9','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('312','3','1','4','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('313','3','1','2','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('314','3','1','6','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('315','3','1','14','2016-07-20 18:22:52','code:Asunto.created.add;');
INSERT INTO logs VALUES('316','3','1','5','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('317','3','1','7','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('318','3','1','8','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('319','3','1','9','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('320','3','1','4','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('321','3','1','2','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('322','3','1','6','2016-07-20 18:22:52','code:Meta.updated.add;');
INSERT INTO logs VALUES('323','3','1','15','2016-07-20 18:22:52','code:Asunto.created.add;');
INSERT INTO logs VALUES('324','3','1','5','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('325','3','1','7','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('326','3','1','8','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('327','3','1','9','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('328','3','1','4','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('329','3','1','2','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('330','3','1','6','2016-07-20 18:22:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('331','3','1','16','2016-07-20 18:23:59','code:Asunto.created.add;');
INSERT INTO logs VALUES('332','3','1','5','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('333','3','1','7','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('334','3','1','8','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('335','3','1','9','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('336','3','1','4','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('337','3','1','2','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('338','3','1','6','2016-07-20 18:23:59','code:Meta.updated.add;');
INSERT INTO logs VALUES('339','3','1','17','2016-07-20 18:24:05','code:Asunto.created.add;');
INSERT INTO logs VALUES('340','3','1','5','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('341','3','1','7','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('342','3','1','8','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('343','3','1','9','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('344','3','1','4','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('345','3','1','2','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('346','3','1','6','2016-07-20 18:24:05','code:Meta.updated.add;');
INSERT INTO logs VALUES('347','3','1','18','2016-07-20 18:43:27','code:Asunto.created.add;');
INSERT INTO logs VALUES('348','3','1','5','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('349','3','1','7','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('350','3','1','8','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('351','3','1','9','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('352','3','1','4','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('353','3','1','2','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('354','3','1','6','2016-07-20 18:43:27','code:Meta.updated.add;');
INSERT INTO logs VALUES('355','3','1','19','2016-07-20 18:43:31','code:Asunto.created.add;');
INSERT INTO logs VALUES('356','3','1','5','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('357','3','1','7','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('358','3','1','8','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('359','3','1','9','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('360','3','1','4','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('361','3','1','2','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('362','3','1','6','2016-07-20 18:43:31','code:Meta.updated.add;');
INSERT INTO logs VALUES('363','3','1','20','2016-07-20 18:43:32','code:Asunto.created.add;');
INSERT INTO logs VALUES('364','3','1','5','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('365','3','1','7','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('366','3','1','8','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('367','3','1','9','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('368','3','1','4','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('369','3','1','2','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('370','3','1','6','2016-07-20 18:43:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('371','3','1','21','2016-07-20 18:44:13','code:Asunto.created.add;');
INSERT INTO logs VALUES('372','3','1','5','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('373','3','1','7','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('374','3','1','8','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('375','3','1','9','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('376','3','1','4','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('377','3','1','2','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('378','3','1','6','2016-07-20 18:44:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('379','3','1','22','2016-07-20 18:44:26','code:Asunto.created.add;');
INSERT INTO logs VALUES('380','3','1','5','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('381','3','1','7','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('382','3','1','8','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('383','3','1','9','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('384','3','1','4','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('385','3','1','2','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('386','3','1','6','2016-07-20 18:44:26','code:Meta.updated.add;');
INSERT INTO logs VALUES('387','3','1','23','2016-07-20 18:46:17','code:Asunto.created.add;');
INSERT INTO logs VALUES('388','3','1','5','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('389','3','1','7','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('390','3','1','8','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('391','3','1','9','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('392','3','1','4','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('393','3','1','2','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('394','3','1','6','2016-07-20 18:46:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('395','3','1','24','2016-07-20 18:46:56','code:Asunto.created.add;');
INSERT INTO logs VALUES('396','3','1','5','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('397','3','1','7','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('398','3','1','8','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('399','3','1','9','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('400','3','1','4','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('401','3','1','2','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('402','3','1','6','2016-07-20 18:46:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('403','3','1','25','2016-07-20 18:47:08','code:Asunto.created.add;');
INSERT INTO logs VALUES('404','3','1','5','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('405','3','1','7','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('406','3','1','8','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('407','3','1','9','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('408','3','1','4','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('409','3','1','2','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('410','3','1','6','2016-07-20 18:47:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('411','3','1','26','2016-07-20 18:47:13','code:Asunto.created.add;');
INSERT INTO logs VALUES('412','3','1','5','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('413','3','1','7','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('414','3','1','8','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('415','3','1','9','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('416','3','1','4','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('417','3','1','2','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('418','3','1','6','2016-07-20 18:47:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('419','3','1','27','2016-07-20 18:47:19','code:Asunto.created.add;');
INSERT INTO logs VALUES('420','3','1','5','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('421','3','1','7','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('422','3','1','8','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('423','3','1','9','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('424','3','1','4','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('425','3','1','2','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('426','3','1','6','2016-07-20 18:47:19','code:Meta.updated.add;');
INSERT INTO logs VALUES('427','3','1','28','2016-07-20 18:49:05','code:Asunto.created.add;');
INSERT INTO logs VALUES('428','3','1','5','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('429','3','1','7','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('430','3','1','8','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('431','3','1','9','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('432','3','1','4','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('433','3','1','2','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('434','3','1','6','2016-07-20 18:49:06','code:Meta.updated.add;');
INSERT INTO logs VALUES('435','3','1','29','2016-07-20 18:49:14','code:Asunto.created.add;');
INSERT INTO logs VALUES('436','3','1','5','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('437','3','1','7','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('438','3','1','8','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('439','3','1','9','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('440','3','1','4','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('441','3','1','2','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('442','3','1','6','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('443','3','1','30','2016-07-20 18:49:14','code:Asunto.created.add;');
INSERT INTO logs VALUES('444','3','1','5','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('445','3','1','7','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('446','3','1','8','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('447','3','1','9','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('448','3','1','4','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('449','3','1','2','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('450','3','1','6','2016-07-20 18:49:14','code:Meta.updated.add;');
INSERT INTO logs VALUES('451','3','1','31','2016-07-20 18:49:14','code:Asunto.created.add;');
INSERT INTO logs VALUES('452','3','1','5','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('453','3','1','7','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('454','3','1','8','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('455','3','1','9','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('456','3','1','4','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('457','3','1','2','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('458','3','1','6','2016-07-20 18:49:15','code:Meta.updated.add;');
INSERT INTO logs VALUES('459','3','1','32','2016-07-20 18:52:57','code:Asunto.created.add;');
INSERT INTO logs VALUES('460','3','1','5','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('461','3','1','7','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('462','3','1','8','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('463','3','1','9','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('464','3','1','4','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('465','3','1','2','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('466','3','1','6','2016-07-20 18:52:57','code:Meta.updated.add;');
INSERT INTO logs VALUES('467','3','1','33','2016-07-20 18:53:02','code:Asunto.created.add;');
INSERT INTO logs VALUES('468','3','1','5','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('469','3','1','7','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('470','3','1','8','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('471','3','1','9','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('472','3','1','4','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('473','3','1','2','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('474','3','1','6','2016-07-20 18:53:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('475','3','1','34','2016-07-20 18:53:10','code:Asunto.created.add;');
INSERT INTO logs VALUES('476','3','1','5','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('477','3','1','7','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('478','3','1','8','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('479','3','1','9','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('480','3','1','4','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('481','3','1','2','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('482','3','1','6','2016-07-20 18:53:10','code:Meta.updated.add;');
INSERT INTO logs VALUES('483','3','1','35','2016-07-20 18:57:33','code:Asunto.created.add;');
INSERT INTO logs VALUES('484','3','1','5','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('485','3','1','7','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('486','3','1','8','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('487','3','1','9','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('488','3','1','4','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('489','3','1','2','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('490','3','1','6','2016-07-20 18:57:33','code:Meta.updated.add;');
INSERT INTO logs VALUES('491','3','1','36','2016-07-20 18:57:55','code:Asunto.created.add;');
INSERT INTO logs VALUES('492','3','1','5','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('493','3','1','7','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('494','3','1','8','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('495','3','1','9','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('496','3','1','4','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('497','3','1','2','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('498','3','1','6','2016-07-20 18:57:55','code:Meta.updated.add;');
INSERT INTO logs VALUES('499','3','1','37','2016-07-20 19:00:53','code:Asunto.created.add;');
INSERT INTO logs VALUES('500','3','1','5','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('501','3','1','7','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('502','3','1','8','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('503','3','1','9','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('504','3','1','4','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('505','3','1','2','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('506','3','1','6','2016-07-20 19:00:53','code:Meta.updated.add;');
INSERT INTO logs VALUES('507','3','1','8','2016-07-20 19:06:42','code:Comentario.created.add;');
INSERT INTO logs VALUES('508','3','1','9','2016-07-20 19:06:46','code:Comentario.created.add;');
INSERT INTO logs VALUES('509','3','1','10','2016-07-20 19:06:52','code:Comentario.created.add;');
INSERT INTO logs VALUES('510','3','1','11','2016-07-20 19:06:56','code:Comentario.created.add;');
INSERT INTO logs VALUES('511','3','1','12','2016-07-20 19:07:03','code:Comentario.created.add;');
INSERT INTO logs VALUES('512','3','1','2','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('513','3','1','5','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('514','3','1','7','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('515','3','1','8','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('516','3','1','9','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('517','3','1','4','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('518','3','1','2','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('519','3','1','6','2016-07-20 19:07:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('520','3','1','2','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('521','3','1','5','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('522','3','1','7','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('523','3','1','8','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('524','3','1','9','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('525','3','1','4','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('526','3','1','2','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('527','3','1','6','2016-07-20 19:07:16','code:Meta.updated.change;');
INSERT INTO logs VALUES('528','3','1','4','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('529','3','1','5','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('530','3','1','7','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('531','3','1','8','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('532','3','1','9','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('533','3','1','4','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('534','3','1','2','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('535','3','1','6','2016-07-20 19:07:19','code:Meta.updated.change;');
INSERT INTO logs VALUES('536','3','1','2','2016-07-20 19:07:23','code:Meta.updated.edit;');
INSERT INTO logs VALUES('537','3','1','5','2016-07-20 19:07:23','code:Meta.updated.edit;');
INSERT INTO logs VALUES('538','3','1','7','2016-07-20 19:07:23','code:Meta.updated.edit;');
INSERT INTO logs VALUES('539','3','1','8','2016-07-20 19:07:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('540','3','1','9','2016-07-20 19:07:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('541','3','1','4','2016-07-20 19:07:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('542','3','1','2','2016-07-20 19:07:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('543','3','1','6','2016-07-20 19:07:24','code:Meta.updated.edit;');
INSERT INTO logs VALUES('544','3','1','10','2016-07-20 19:07:32','code:Meta.created.add;');
INSERT INTO logs VALUES('545','3','1','5','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('546','3','1','10','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('547','3','1','7','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('548','3','1','8','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('549','3','1','9','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('550','3','1','4','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('551','3','1','2','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('552','3','1','6','2016-07-20 19:07:32','code:Meta.updated.add;');
INSERT INTO logs VALUES('553','3','1','2','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('554','3','1','5','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('555','3','1','10','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('556','3','1','7','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('557','3','1','8','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('558','3','1','9','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('559','3','1','4','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('560','3','1','2','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('561','3','1','6','2016-07-20 19:07:56','code:Meta.updated.change;');
INSERT INTO logs VALUES('562','3','1','2','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('563','3','1','5','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('564','3','1','10','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('565','3','1','7','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('566','3','1','8','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('567','3','1','9','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('568','3','1','4','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('569','3','1','2','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('570','3','1','6','2016-07-20 19:08:00','code:Meta.updated.change;');
INSERT INTO logs VALUES('571','3','1','2','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('572','3','1','5','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('573','3','1','10','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('574','3','1','7','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('575','3','1','8','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('576','3','1','9','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('577','3','1','4','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('578','3','1','2','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('579','3','1','6','2016-07-20 19:08:03','code:Meta.updated.change;');
INSERT INTO logs VALUES('580','3','1','38','2016-07-20 19:08:46','code:Asunto.created.add;');
INSERT INTO logs VALUES('581','3','1','5','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('582','3','1','10','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('583','3','1','7','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('584','3','1','8','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('585','3','1','9','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('586','3','1','4','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('587','3','1','2','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('588','3','1','6','2016-07-20 19:08:46','code:Meta.updated.add;');
INSERT INTO logs VALUES('589','3','1','39','2016-07-20 19:08:56','code:Asunto.created.add;');
INSERT INTO logs VALUES('590','3','1','5','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('591','3','1','10','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('592','3','1','7','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('593','3','1','8','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('594','3','1','9','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('595','3','1','4','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('596','3','1','2','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('597','3','1','6','2016-07-20 19:08:56','code:Meta.updated.add;');
INSERT INTO logs VALUES('598','3','1','34','2016-07-20 19:09:07','code:Asunto.updated.change;');
INSERT INTO logs VALUES('599','3','1','5','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('600','3','1','10','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('601','3','1','7','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('602','3','1','8','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('603','3','1','9','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('604','3','1','4','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('605','3','1','2','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('606','3','1','6','2016-07-20 19:09:07','code:Meta.updated.change;');
INSERT INTO logs VALUES('607','3','1','36','2016-07-20 19:09:12','code:Asunto.updated.change;');
INSERT INTO logs VALUES('608','3','1','5','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('609','3','1','10','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('610','3','1','7','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('611','3','1','8','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('612','3','1','9','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('613','3','1','4','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('614','3','1','2','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('615','3','1','6','2016-07-20 19:09:12','code:Meta.updated.change;');
INSERT INTO logs VALUES('616','3','1','32','2016-07-20 19:09:17','code:Asunto.updated.change;');
INSERT INTO logs VALUES('617','3','1','5','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('618','3','1','10','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('619','3','1','7','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('620','3','1','8','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('621','3','1','9','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('622','3','1','4','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('623','3','1','2','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('624','3','1','6','2016-07-20 19:09:17','code:Meta.updated.change;');
INSERT INTO logs VALUES('625','3','1','38','2016-07-20 19:09:22','code:Asunto.updated.change;');
INSERT INTO logs VALUES('626','3','1','5','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('627','3','1','10','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('628','3','1','7','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('629','3','1','8','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('630','3','1','9','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('631','3','1','4','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('632','3','1','2','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('633','3','1','6','2016-07-20 19:09:22','code:Meta.updated.change;');
INSERT INTO logs VALUES('634','3','1','39','2016-07-20 19:09:25','code:Asunto.updated.change;');
INSERT INTO logs VALUES('635','3','1','5','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('636','3','1','10','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('637','3','1','7','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('638','3','1','8','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('639','3','1','9','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('640','3','1','4','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('641','3','1','2','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('642','3','1','6','2016-07-20 19:09:26','code:Meta.updated.change;');
INSERT INTO logs VALUES('643','3','1','31','2016-07-20 19:09:30','code:Asunto.updated.change;');
INSERT INTO logs VALUES('644','3','1','5','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('645','3','1','10','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('646','3','1','7','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('647','3','1','8','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('648','3','1','9','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('649','3','1','4','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('650','3','1','2','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('651','3','1','6','2016-07-20 19:09:31','code:Meta.updated.change;');
INSERT INTO logs VALUES('652','1','3',NULL,'2016-07-20 22:40:57',NULL);
INSERT INTO logs VALUES('653','1','1','13','2016-07-20 22:42:21','code:Comentario.created.add;');
INSERT INTO logs VALUES('654','1','1','13','2016-07-20 22:42:31','code:Comentario.updated.delete;');
INSERT INTO logs VALUES('655','1','3',NULL,'2016-07-21 09:38:15',NULL);
INSERT INTO logs VALUES('656','1','3',NULL,'2016-07-21 12:44:49',NULL);
INSERT INTO logs VALUES('657','1','1','1','2016-07-21 12:53:07','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('658','1','1','1','2016-07-21 12:53:21','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('659','1','1','1','2016-07-21 12:53:29','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('660','1','1','1','2016-07-21 12:53:47','code:Descarga.updated.edit;');
INSERT INTO logs VALUES('661','1','3',NULL,'2016-07-21 13:04:45',NULL);
INSERT INTO logs VALUES('662','1','1','3','2016-07-21 13:06:46','code:Asunto.updated.change;');
INSERT INTO logs VALUES('663','1','1','3','2016-07-21 13:06:46','code:Meta.updated.change;');
INSERT INTO logs VALUES('664','1','1','1','2016-07-21 13:06:46','code:Meta.updated.change;');
INSERT INTO logs VALUES('665','1','1','2','2016-07-21 13:06:49','code:Asunto.updated.change;');
INSERT INTO logs VALUES('666','1','1','3','2016-07-21 13:06:49','code:Meta.updated.change;');
INSERT INTO logs VALUES('667','1','1','1','2016-07-21 13:06:49','code:Meta.updated.change;');
INSERT INTO logs VALUES('668','1','1','2','2016-07-21 13:07:01','code:Asunto.updated.change;');
INSERT INTO logs VALUES('669','1','1','3','2016-07-21 13:07:01','code:Meta.updated.change;');
INSERT INTO logs VALUES('670','1','1','1','2016-07-21 13:07:01','code:Meta.updated.change;');
INSERT INTO logs VALUES('671','1','1','40','2016-07-21 13:07:28','code:Asunto.created.add;');
INSERT INTO logs VALUES('672','1','1','3','2016-07-21 13:07:28','code:Meta.updated.add;');
INSERT INTO logs VALUES('673','1','1','1','2016-07-21 13:07:28','code:Meta.updated.add;');
INSERT INTO logs VALUES('674','1','3',NULL,'2016-07-21 13:43:47',NULL);
INSERT INTO logs VALUES('675','1','3',NULL,'2016-07-21 16:15:59',NULL);
INSERT INTO logs VALUES('676','1','3',NULL,'2016-07-21 17:50:05',NULL);
INSERT INTO logs VALUES('677','1','16','3','2016-07-21 18:03:44',NULL);
INSERT INTO logs VALUES('678','1','14','4','2016-07-21 18:25:52',NULL);
INSERT INTO logs VALUES('679','1','19','4','2016-07-21 18:26:03',NULL);
INSERT INTO logs VALUES('680','1','14','5','2016-07-21 18:26:50',NULL);
INSERT INTO logs VALUES('681','1','19','5','2016-07-21 18:26:56',NULL);
INSERT INTO logs VALUES('682','3','3',NULL,'2016-07-21 20:29:54',NULL);
INSERT INTO logs VALUES('683','3','10','3','2016-07-21 20:31:29',NULL);
INSERT INTO logs VALUES('684','3','11','6','2016-07-21 20:31:29',NULL);
INSERT INTO logs VALUES('685','3','12','4','2016-07-21 20:31:29',NULL);
INSERT INTO logs VALUES('686','3','13','3','2016-07-21 20:31:29',NULL);
INSERT INTO logs VALUES('687','3','1','11','2016-07-21 20:31:29','code:Meta.created.add;');
INSERT INTO logs VALUES('688','3','19','3','2016-07-21 20:34:59',NULL);
INSERT INTO logs VALUES('689','3','20','2','2016-07-21 20:34:59',NULL);
INSERT INTO logs VALUES('690','3','1','1','2016-07-21 20:34:59','code:Comentario.delete;');
INSERT INTO logs VALUES('691','3','1','2','2016-07-21 20:34:59','code:Comentario.delete;');
INSERT INTO logs VALUES('692','3','1','3','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('693','3','1','4','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('694','3','1','5','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('695','3','1','6','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('696','3','1','7','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('697','3','1','8','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('698','3','1','9','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('699','3','1','10','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('700','3','1','11','2016-07-21 20:35:00','code:Comentario.delete;');
INSERT INTO logs VALUES('701','3','1','12','2016-07-21 20:35:01','code:Comentario.delete;');
INSERT INTO logs VALUES('702','3','1','2','2016-07-21 20:35:01','code:Meta.delete;');
INSERT INTO logs VALUES('703','3','1','6','2016-07-21 20:35:01','code:Meta.delete;');
INSERT INTO logs VALUES('704','3','1','5','2016-07-21 20:35:01','code:Asunto.delete;');
INSERT INTO logs VALUES('705','3','1','6','2016-07-21 20:35:01','code:Asunto.delete;');
INSERT INTO logs VALUES('706','3','1','7','2016-07-21 20:35:01','code:Asunto.delete;');
INSERT INTO logs VALUES('707','3','1','8','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('708','3','1','9','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('709','3','1','10','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('710','3','1','11','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('711','3','1','12','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('712','3','1','13','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('713','3','1','14','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('714','3','1','15','2016-07-21 20:35:02','code:Asunto.delete;');
INSERT INTO logs VALUES('715','3','1','16','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('716','3','1','17','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('717','3','1','18','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('718','3','1','19','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('719','3','1','20','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('720','3','1','21','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('721','3','1','22','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('722','3','1','23','2016-07-21 20:35:03','code:Asunto.delete;');
INSERT INTO logs VALUES('723','3','1','24','2016-07-21 20:35:04','code:Asunto.delete;');
INSERT INTO logs VALUES('724','3','1','25','2016-07-21 20:35:04','code:Asunto.delete;');
INSERT INTO logs VALUES('725','3','1','26','2016-07-21 20:35:04','code:Asunto.delete;');
INSERT INTO logs VALUES('726','3','1','27','2016-07-21 20:35:04','code:Asunto.delete;');
INSERT INTO logs VALUES('727','3','1','28','2016-07-21 20:35:04','code:Asunto.delete;');
INSERT INTO logs VALUES('728','3','1','29','2016-07-21 20:35:04','code:Asunto.delete;');
INSERT INTO logs VALUES('729','3','1','30','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('730','3','1','31','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('731','3','1','32','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('732','3','1','33','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('733','3','1','34','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('734','3','1','35','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('735','3','1','36','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('736','3','1','37','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('737','3','1','38','2016-07-21 20:35:05','code:Asunto.delete;');
INSERT INTO logs VALUES('738','3','1','39','2016-07-21 20:35:06','code:Asunto.delete;');
INSERT INTO logs VALUES('739','3','21','2','2016-07-21 20:35:06',NULL);
INSERT INTO logs VALUES('740','3','18','2','2016-07-21 20:35:06',NULL);
INSERT INTO logs VALUES('741','1','1','7','2016-07-21 20:35:15','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('742','1','19','7','2016-07-21 20:35:35',NULL);
INSERT INTO logs VALUES('743','1','1','8','2016-07-21 20:37:02','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('744','1','19','8','2016-07-21 20:37:13',NULL);
INSERT INTO logs VALUES('745','1','1','9','2016-07-21 20:37:30','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('746','1','19','9','2016-07-21 20:38:24',NULL);
INSERT INTO logs VALUES('747','1','1','10','2016-07-21 20:38:32','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('748','1','19','10','2016-07-21 20:38:39',NULL);
INSERT INTO logs VALUES('749','1','1','11','2016-07-21 20:38:59','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('750','1','19','11','2016-07-21 20:39:20',NULL);
INSERT INTO logs VALUES('751','1','1','12','2016-07-21 20:41:49','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('752','1','19','12','2016-07-21 20:47:29',NULL);
INSERT INTO logs VALUES('753','1','1','13','2016-07-21 20:47:43','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('754','1','19','13','2016-07-21 20:47:51',NULL);
INSERT INTO logs VALUES('755','1','1','14','2016-07-21 20:48:04','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('756','1','19','14','2016-07-21 20:50:03',NULL);
INSERT INTO logs VALUES('757','1','1','15','2016-07-21 20:50:11','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('758','1','19','15','2016-07-21 20:53:19',NULL);
INSERT INTO logs VALUES('759','1','1','16','2016-07-21 20:53:34','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('760','1','1','1','2016-07-21 20:54:35','code:Meta.updated.edit;');
INSERT INTO logs VALUES('761','1','1','3','2016-07-21 20:54:35','code:Meta.updated.edit;');
INSERT INTO logs VALUES('762','1','1','1','2016-07-21 20:54:35','code:Meta.updated.edit;');
INSERT INTO logs VALUES('763','1','1','1','2016-07-21 20:54:44','code:Meta.updated.edit;');
INSERT INTO logs VALUES('764','1','1','3','2016-07-21 20:54:44','code:Meta.updated.edit;');
INSERT INTO logs VALUES('765','1','1','1','2016-07-21 20:54:44','code:Meta.updated.edit;');
INSERT INTO logs VALUES('766','1','19','16','2016-07-21 21:29:58',NULL);
INSERT INTO logs VALUES('767','1','1','17','2016-07-21 21:30:35','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('768','1','19','17','2016-07-21 21:30:50',NULL);
INSERT INTO logs VALUES('769','1','1','18','2016-07-21 21:35:08','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('770','3','3',NULL,'2016-07-21 21:35:35',NULL);
INSERT INTO logs VALUES('771','3','15','18','2016-07-21 21:35:48',NULL);
INSERT INTO logs VALUES('772','3','19','18','2016-07-21 21:39:12',NULL);
INSERT INTO logs VALUES('773','1','3',NULL,'2016-07-21 21:50:26',NULL);
INSERT INTO logs VALUES('774','1','1','19','2016-07-21 21:51:31','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('775','1','19','1','2016-07-21 21:51:39',NULL);
INSERT INTO logs VALUES('776','3','15','19','2016-07-21 21:52:25',NULL);
INSERT INTO logs VALUES('777','3','1','1','2016-07-21 22:06:35','code:Escenario.updated.escenario_edit;');
INSERT INTO logs VALUES('778','1','3',NULL,'2016-07-21 22:18:51',NULL);
INSERT INTO logs VALUES('779','1','3',NULL,'2016-07-21 22:20:14',NULL);
INSERT INTO logs VALUES('780','1','3',NULL,'2016-07-21 22:22:06',NULL);
INSERT INTO logs VALUES('781','1','1','41','2016-07-21 22:23:13','code:Asunto.created.add;');
INSERT INTO logs VALUES('782','1','1','11','2016-07-21 22:23:13','code:Meta.updated.add;');
INSERT INTO logs VALUES('783','1','1','42','2016-07-21 22:23:18','code:Asunto.created.add;');
INSERT INTO logs VALUES('784','1','1','11','2016-07-21 22:23:18','code:Meta.updated.add;');
INSERT INTO logs VALUES('785','1','1','42','2016-07-21 22:23:24','code:Asunto.updated.change;');
INSERT INTO logs VALUES('786','1','1','11','2016-07-21 22:23:24','code:Meta.updated.change;');
INSERT INTO logs VALUES('787','1','1','1','2016-07-21 22:23:52','code:Archivo.created.add;');
INSERT INTO logs VALUES('788','1','1','14','2016-07-21 22:23:56','code:Comentario.created.add;');
INSERT INTO logs VALUES('789','1','1','15','2016-07-21 22:23:59','code:Comentario.created.add;');
INSERT INTO logs VALUES('790','1','1','14','2016-07-21 22:24:05','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('791','1','19','6','2016-07-21 22:39:41',NULL);
INSERT INTO logs VALUES('792','1','20','4','2016-07-21 22:39:41',NULL);
INSERT INTO logs VALUES('793','1','1','14','2016-07-21 22:39:41','code:Comentario.delete;');
INSERT INTO logs VALUES('794','1','1','15','2016-07-21 22:39:41','code:Comentario.delete;');
INSERT INTO logs VALUES('795','1','1','1','2016-07-21 22:39:42','code:Archivo.delete;');
INSERT INTO logs VALUES('796','1','1','11','2016-07-21 22:39:42','code:Meta.delete;');
INSERT INTO logs VALUES('797','1','1','41','2016-07-21 22:39:42','code:Asunto.delete;');
INSERT INTO logs VALUES('798','1','1','42','2016-07-21 22:39:42','code:Asunto.delete;');
INSERT INTO logs VALUES('799','1','21','3','2016-07-21 22:39:42',NULL);
INSERT INTO logs VALUES('800','1','18','3','2016-07-21 22:39:42',NULL);
INSERT INTO logs VALUES('801','1','3',NULL,'2016-07-22 10:27:28',NULL);
INSERT INTO logs VALUES('802','1','19','2','2016-07-22 10:37:23',NULL);
INSERT INTO logs VALUES('803','1','10','2','2016-07-22 10:52:53',NULL);
INSERT INTO logs VALUES('804','1','11','20','2016-07-22 10:52:53',NULL);
INSERT INTO logs VALUES('805','1','12','4','2016-07-22 10:52:53',NULL);
INSERT INTO logs VALUES('806','1','13','2','2016-07-22 10:52:53',NULL);
INSERT INTO logs VALUES('807','1','1','4','2016-07-22 10:52:53','code:Meta.created.add;');
INSERT INTO logs VALUES('808','1','1','21','2016-07-22 11:07:51','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('809','1','19','21','2016-07-22 11:08:03',NULL);
INSERT INTO logs VALUES('810','1','1','22','2016-07-22 11:09:02','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('811','1','19','22','2016-07-22 11:09:33',NULL);
INSERT INTO logs VALUES('812','1','1','23','2016-07-22 11:09:42','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('813','1','19','23','2016-07-22 11:10:38',NULL);
INSERT INTO logs VALUES('814','1','1','24','2016-07-22 11:10:45','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('815','1','19','24','2016-07-22 11:11:18',NULL);
INSERT INTO logs VALUES('816','1','1','25','2016-07-22 11:11:28','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('817','1','19','25','2016-07-22 11:12:16',NULL);
INSERT INTO logs VALUES('818','1','1','26','2016-07-22 11:12:21','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('819','1','19','26','2016-07-22 11:13:12',NULL);
INSERT INTO logs VALUES('820','1','1','27','2016-07-22 11:13:17','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('821','3','3',NULL,'2016-07-22 11:49:09',NULL);
INSERT INTO logs VALUES('822','3','1','28','2016-07-22 11:49:18','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('823','3','1','29','2016-07-22 11:49:23','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('824','1','1','30','2016-07-22 11:49:51','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('825','1','19','30','2016-07-22 11:50:09',NULL);
INSERT INTO logs VALUES('826','3','19','28','2016-07-22 12:01:22',NULL);
INSERT INTO logs VALUES('827','3','19','29','2016-07-22 12:01:42',NULL);
INSERT INTO logs VALUES('828','3','1','31','2016-07-22 12:02:41','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('829','3','1','32','2016-07-22 12:02:45','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('830','3','19','31','2016-07-22 12:02:56',NULL);
INSERT INTO logs VALUES('831','3','19','32','2016-07-22 12:03:03',NULL);
INSERT INTO logs VALUES('832','3','1','33','2016-07-22 12:03:09','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('833','3','19','33','2016-07-22 12:03:14',NULL);
INSERT INTO logs VALUES('834','3','1','34','2016-07-22 12:03:20','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('835','3','1','35','2016-07-22 12:03:26','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('836','3','19','34','2016-07-22 12:04:36',NULL);
INSERT INTO logs VALUES('837','3','19','35','2016-07-22 12:04:43',NULL);
INSERT INTO logs VALUES('838','3','1','36','2016-07-22 12:04:49','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('839','3','1','37','2016-07-22 12:04:53','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('840',NULL,'8','4','2016-07-22 12:23:52',NULL);
INSERT INTO logs VALUES('841','4','3',NULL,'2016-07-22 12:23:57',NULL);
INSERT INTO logs VALUES('842','4','5','4','2016-07-22 12:31:29',NULL);
INSERT INTO logs VALUES('843','4','7','2','2016-07-22 12:31:29',NULL);
INSERT INTO logs VALUES('844','4','1','4','2016-07-22 12:57:37','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('845','4','1','4','2016-07-22 12:58:52','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('846','4','1','4','2016-07-22 13:05:50','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('847','4','1','4','2016-07-22 13:06:34','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('848','4','3',NULL,'2016-07-22 13:09:18',NULL);
INSERT INTO logs VALUES('849','4','1','4','2016-07-22 13:09:34','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('850','4','1','4','2016-07-22 13:18:45','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('851','4','1','4','2016-07-22 13:19:26','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('852','4','1','4','2016-07-22 13:22:24','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('853','1','3',NULL,'2016-07-22 13:27:12',NULL);
INSERT INTO logs VALUES('854','1','1','1','2016-07-22 13:55:45','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('855','1','3',NULL,'2016-07-22 15:25:49',NULL);
INSERT INTO logs VALUES('856','1','3',NULL,'2016-07-22 15:29:30',NULL);
INSERT INTO logs VALUES('857','1','1','1','2016-07-22 15:34:03','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('858','1','1','14','2016-07-22 15:47:47','code:Comentario.created.add;');
INSERT INTO logs VALUES('859','1','1','14','2016-07-22 15:48:21','code:Comentario.updated.edit;');
INSERT INTO logs VALUES('860','1','1','14','2016-07-22 15:48:28','code:Comentario.updated.delete;');
INSERT INTO logs VALUES('861','1','1','5','2016-07-22 15:49:00','code:Meta.created.add;');
INSERT INTO logs VALUES('862','1','1','5','2016-07-22 15:49:00','code:Meta.updated.add;');
INSERT INTO logs VALUES('863','1','1','4','2016-07-22 15:49:00','code:Meta.updated.add;');
INSERT INTO logs VALUES('864','1','1','41','2016-07-22 15:49:07','code:Asunto.created.add;');
INSERT INTO logs VALUES('865','1','1','5','2016-07-22 15:49:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('866','1','1','4','2016-07-22 15:49:08','code:Meta.updated.add;');
INSERT INTO logs VALUES('867','1','3',NULL,'2016-07-22 16:10:26',NULL);
INSERT INTO logs VALUES('868','1','5','1','2016-07-22 16:11:04',NULL);
INSERT INTO logs VALUES('869','1','1','1','2016-07-22 16:11:04','code:DescripcionTutor.created.edit;');
INSERT INTO logs VALUES('870','1','7','3','2016-07-22 16:11:04',NULL);
INSERT INTO logs VALUES('871','1','1','1','2016-07-22 16:16:05','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('872','1','1','1','2016-07-22 16:16:37','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('873','1','1','38','2016-07-22 16:22:39','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('874','3','3',NULL,'2016-07-22 16:23:51',NULL);
INSERT INTO logs VALUES('875','3','15','38','2016-07-22 16:23:59',NULL);
INSERT INTO logs VALUES('876','3','3',NULL,'2016-07-22 16:47:17',NULL);
INSERT INTO logs VALUES('877','3','1','15','2016-07-22 17:09:07','code:Comentario.created.add;');
INSERT INTO logs VALUES('878','1','19','20','2016-07-22 17:12:04',NULL);
INSERT INTO logs VALUES('879','1','1','39','2016-07-22 17:12:11','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('880','1','19','39','2016-07-22 17:13:26',NULL);
INSERT INTO logs VALUES('881','3','19','27','2016-07-22 17:17:15',NULL);
INSERT INTO logs VALUES('882','3','1','40','2016-07-22 17:17:20','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('883','3','1','41','2016-07-22 17:17:32','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('884','1','15','41','2016-07-22 17:17:52',NULL);
INSERT INTO logs VALUES('885','1','15','37','2016-07-22 17:17:56',NULL);
INSERT INTO logs VALUES('886','3','19','40','2016-07-22 17:18:15',NULL);
INSERT INTO logs VALUES('887','1','3',NULL,'2016-07-22 18:09:28',NULL);
INSERT INTO logs VALUES('888','1','3',NULL,'2016-07-22 18:11:19',NULL);
INSERT INTO logs VALUES('889','1','3',NULL,'2016-07-22 18:12:03',NULL);
INSERT INTO logs VALUES('890','1','3',NULL,'2016-07-22 18:21:06',NULL);
INSERT INTO logs VALUES('891','1','10','3','2016-07-22 18:37:04',NULL);
INSERT INTO logs VALUES('892','1','11','42','2016-07-22 18:37:04',NULL);
INSERT INTO logs VALUES('893','1','12','5','2016-07-22 18:37:04',NULL);
INSERT INTO logs VALUES('894','1','13','3','2016-07-22 18:37:04',NULL);
INSERT INTO logs VALUES('895','1','1','6','2016-07-22 18:37:05','code:Meta.created.add;');
INSERT INTO logs VALUES('896','1','16','6','2016-07-22 21:57:49',NULL);
INSERT INTO logs VALUES('897','1','10','4','2016-07-22 22:04:33',NULL);
INSERT INTO logs VALUES('898','1','11','43','2016-07-22 22:04:33',NULL);
INSERT INTO logs VALUES('899','1','11','44','2016-07-22 22:04:33',NULL);
INSERT INTO logs VALUES('900','1','12','7','2016-07-22 22:04:33',NULL);
INSERT INTO logs VALUES('901','1','13','4','2016-07-22 22:04:33',NULL);
INSERT INTO logs VALUES('902','1','1','7','2016-07-22 22:04:33','code:Meta.created.add;');
INSERT INTO logs VALUES('903','1','3',NULL,'2016-07-22 22:21:21',NULL);
INSERT INTO logs VALUES('904','1','1','45','2016-07-22 22:51:15','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('905','1','19','45','2016-07-22 22:55:21',NULL);
INSERT INTO logs VALUES('906','1','1','46','2016-07-22 22:55:26','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('907','3','3',NULL,'2016-07-22 22:57:45',NULL);
INSERT INTO logs VALUES('908','3','19','19','2016-07-22 22:58:04',NULL);
INSERT INTO logs VALUES('909','3','19','36','2016-07-22 22:58:04',NULL);
INSERT INTO logs VALUES('910','3','19','37','2016-07-22 22:58:04',NULL);
INSERT INTO logs VALUES('911','3','20','1','2016-07-22 22:58:04',NULL);
INSERT INTO logs VALUES('912','3','20','3','2016-07-22 22:58:05',NULL);
INSERT INTO logs VALUES('913','3','1','13','2016-07-22 22:58:05','code:Comentario.delete;');
INSERT INTO logs VALUES('914','3','1','1','2016-07-22 22:58:05','code:Meta.delete;');
INSERT INTO logs VALUES('915','3','1','1','2016-07-22 22:58:05','code:Asunto.delete;');
INSERT INTO logs VALUES('916','3','1','2','2016-07-22 22:58:05','code:Asunto.delete;');
INSERT INTO logs VALUES('917','3','1','3','2016-07-22 22:58:06','code:Asunto.delete;');
INSERT INTO logs VALUES('918','3','1','4','2016-07-22 22:58:06','code:Asunto.delete;');
INSERT INTO logs VALUES('919','3','1','40','2016-07-22 22:58:06','code:Asunto.delete;');
INSERT INTO logs VALUES('920','3','21','1','2016-07-22 22:58:06',NULL);
INSERT INTO logs VALUES('921','3','18','1','2016-07-22 22:58:06',NULL);
INSERT INTO logs VALUES('922','1','1','47','2016-07-22 22:58:13','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('923','1','1','42','2016-07-22 23:04:00','code:Asunto.created.add;');
INSERT INTO logs VALUES('924','1','1','6','2016-07-22 23:04:00','code:Meta.updated.add;');
INSERT INTO logs VALUES('925','1','1','16','2016-07-22 23:04:09','code:Comentario.created.add;');
INSERT INTO logs VALUES('926','1','3',NULL,'2016-07-23 09:37:15',NULL);
INSERT INTO logs VALUES('927','1','1','4','2016-07-23 09:41:51','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('928','1','19','42','2016-07-23 10:12:15',NULL);
INSERT INTO logs VALUES('929','1','1','48','2016-07-23 10:12:20','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('930','3','3',NULL,'2016-07-23 10:27:02',NULL);
INSERT INTO logs VALUES('931','1','10','5','2016-07-23 10:27:30',NULL);
INSERT INTO logs VALUES('932','1','11','49','2016-07-23 10:27:30',NULL);
INSERT INTO logs VALUES('933','1','11','50','2016-07-23 10:27:30',NULL);
INSERT INTO logs VALUES('934','1','12','8','2016-07-23 10:27:30',NULL);
INSERT INTO logs VALUES('935','1','13','5','2016-07-23 10:27:30',NULL);
INSERT INTO logs VALUES('936','1','1','8','2016-07-23 10:27:30','code:Meta.created.add;');
INSERT INTO logs VALUES('937','3','15','47','2016-07-23 10:28:05',NULL);
INSERT INTO logs VALUES('938','1','19','49','2016-07-23 10:28:23',NULL);
INSERT INTO logs VALUES('939','1','19','50','2016-07-23 10:28:23',NULL);
INSERT INTO logs VALUES('940','1','20','8','2016-07-23 10:28:24',NULL);
INSERT INTO logs VALUES('941','1','1','8','2016-07-23 10:28:24','code:Meta.delete;');
INSERT INTO logs VALUES('942','1','21','5','2016-07-23 10:28:24',NULL);
INSERT INTO logs VALUES('943','1','18','5','2016-07-23 10:28:24',NULL);
INSERT INTO logs VALUES('944','3','19','38','2016-07-23 10:29:23',NULL);
INSERT INTO logs VALUES('945','3','19','41','2016-07-23 10:29:23',NULL);
INSERT INTO logs VALUES('946','3','20','4','2016-07-23 10:29:24',NULL);
INSERT INTO logs VALUES('947','3','1','14','2016-07-23 10:29:24','code:Comentario.delete;');
INSERT INTO logs VALUES('948','3','1','15','2016-07-23 10:29:24','code:Comentario.delete;');
INSERT INTO logs VALUES('949','3','1','4','2016-07-23 10:29:24','code:Meta.delete;');
INSERT INTO logs VALUES('950','3','1','41','2016-07-23 10:29:24','code:Asunto.delete;');
INSERT INTO logs VALUES('951','3','21','2','2016-07-23 10:29:24',NULL);
INSERT INTO logs VALUES('952','3','18','2','2016-07-23 10:29:25',NULL);
INSERT INTO logs VALUES('953','3','19','46','2016-07-23 10:29:33',NULL);
INSERT INTO logs VALUES('954','3','19','47','2016-07-23 10:29:33',NULL);
INSERT INTO logs VALUES('955','3','19','48','2016-07-23 10:29:34',NULL);
INSERT INTO logs VALUES('956','3','20','5','2016-07-23 10:29:34',NULL);
INSERT INTO logs VALUES('957','3','20','6','2016-07-23 10:29:34',NULL);
INSERT INTO logs VALUES('958','3','1','16','2016-07-23 10:29:34','code:Comentario.delete;');
INSERT INTO logs VALUES('959','3','1','6','2016-07-23 10:29:34','code:Meta.delete;');
INSERT INTO logs VALUES('960','3','1','42','2016-07-23 10:29:35','code:Asunto.delete;');
INSERT INTO logs VALUES('961','3','21','3','2016-07-23 10:29:35',NULL);
INSERT INTO logs VALUES('962','3','18','3','2016-07-23 10:29:35',NULL);
INSERT INTO logs VALUES('963','1','1','51','2016-07-23 10:29:45','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('964','3','19','51','2016-07-23 10:30:32',NULL);
INSERT INTO logs VALUES('965','1','1','52','2016-07-23 10:30:42','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('966','3','15','52','2016-07-23 10:30:49',NULL);
INSERT INTO logs VALUES('967','3','19','52','2016-07-23 10:47:42',NULL);
INSERT INTO logs VALUES('968','1','1','53','2016-07-23 10:48:04','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('969','1','19','43','2016-07-23 10:52:03',NULL);
INSERT INTO logs VALUES('970','3','15','53','2016-07-23 10:54:06',NULL);
INSERT INTO logs VALUES('971','3','19','44','2016-07-23 10:54:26',NULL);
INSERT INTO logs VALUES('972','3','19','53','2016-07-23 10:54:35',NULL);
INSERT INTO logs VALUES('973','3','20','7','2016-07-23 10:54:36',NULL);
INSERT INTO logs VALUES('974','3','1','7','2016-07-23 10:54:36','code:Meta.delete;');
INSERT INTO logs VALUES('975','3','21','4','2016-07-23 10:54:36',NULL);
INSERT INTO logs VALUES('976','3','18','4','2016-07-23 10:54:36',NULL);
INSERT INTO logs VALUES('977','3','10','6','2016-07-23 10:56:12',NULL);
INSERT INTO logs VALUES('978','3','11','54','2016-07-23 10:56:12',NULL);
INSERT INTO logs VALUES('979','3','11','55','2016-07-23 10:56:12',NULL);
INSERT INTO logs VALUES('980','3','12','9','2016-07-23 10:56:12',NULL);
INSERT INTO logs VALUES('981','3','13','6','2016-07-23 10:56:13',NULL);
INSERT INTO logs VALUES('982','3','1','9','2016-07-23 10:56:13','code:Meta.created.add;');
INSERT INTO logs VALUES('983','1','19','55','2016-07-23 10:57:22',NULL);
INSERT INTO logs VALUES('984','3','1','56','2016-07-23 10:57:39','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('985','1','15','56','2016-07-23 10:58:59',NULL);
INSERT INTO logs VALUES('986','1','10','7','2016-07-23 11:06:53',NULL);
INSERT INTO logs VALUES('987','1','11','57','2016-07-23 11:06:53',NULL);
INSERT INTO logs VALUES('988','1','11','58','2016-07-23 11:06:54',NULL);
INSERT INTO logs VALUES('989','1','12','10','2016-07-23 11:06:54',NULL);
INSERT INTO logs VALUES('990','1','13','7','2016-07-23 11:06:54',NULL);
INSERT INTO logs VALUES('991','1','1','10','2016-07-23 11:06:54','code:Meta.created.add;');
INSERT INTO logs VALUES('992','1','1','59','2016-07-23 11:08:49','code:Autor.created.add_estudiante;');
INSERT INTO logs VALUES('993','1','3',NULL,'2016-07-23 12:16:33',NULL);
INSERT INTO logs VALUES('994','1','1','7','2016-07-23 12:21:05','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('995','1','1','7','2016-07-23 12:22:00','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('996','1','1','7','2016-07-23 12:22:19','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('997','1','1','7','2016-07-23 12:22:28','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('998','1','1','7','2016-07-23 12:22:33','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('999','1','1','7','2016-07-23 12:22:51','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1000','1','1','7','2016-07-23 12:23:39','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1001','1','1','7','2016-07-23 12:23:45','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1002','1','1','7','2016-07-23 12:23:51','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1003','1','1','7','2016-07-23 12:24:00','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1004','1','1','7','2016-07-23 12:24:11','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1005','1','1','7','2016-07-23 12:25:19','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1006','1','1','7','2016-07-23 12:25:25','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1007','1','1','7','2016-07-23 12:25:38','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1008','1','1','7','2016-07-23 12:26:04','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1009','1','1','7','2016-07-23 12:26:09','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1010','1','1','7','2016-07-23 12:26:25','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1011','1','1','7','2016-07-23 12:27:15','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1012','1','1','7','2016-07-23 12:27:20','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1013','1','1','7','2016-07-23 12:27:24','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1014','1','1','7','2016-07-23 12:28:04','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1015','1','1','7','2016-07-23 12:28:09','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1016','3','3',NULL,'2016-07-23 12:32:12',NULL);
INSERT INTO logs VALUES('1017','3','1','6','2016-07-23 12:32:44','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1018','3','15','59','2016-07-23 12:54:06',NULL);
INSERT INTO logs VALUES('1019','1','19','56','2016-07-23 13:00:36',NULL);
INSERT INTO logs VALUES('1020','3','1','60','2016-07-23 13:00:50','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1021','3','1','61','2016-07-23 13:00:55','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1022','1','3',NULL,'2016-07-23 14:27:10',NULL);
INSERT INTO logs VALUES('1023','1','3',NULL,'2016-07-23 19:40:38',NULL);
INSERT INTO logs VALUES('1024','1','16','11','2016-07-23 19:44:29',NULL);
INSERT INTO logs VALUES('1025','1','3',NULL,'2016-07-23 20:17:43',NULL);
INSERT INTO logs VALUES('1026','3','3',NULL,'2016-07-23 20:43:05',NULL);
INSERT INTO logs VALUES('1027','1','15','61','2016-07-23 20:52:13',NULL);
INSERT INTO logs VALUES('1028','1','3',NULL,'2016-07-24 09:55:47',NULL);
INSERT INTO logs VALUES('1029','1','10','8','2016-07-24 10:59:49',NULL);
INSERT INTO logs VALUES('1030','1','11','62','2016-07-24 10:59:49',NULL);
INSERT INTO logs VALUES('1031','1','11','63','2016-07-24 10:59:49',NULL);
INSERT INTO logs VALUES('1032','1','12','12','2016-07-24 10:59:50',NULL);
INSERT INTO logs VALUES('1033','1','13','8','2016-07-24 10:59:50',NULL);
INSERT INTO logs VALUES('1034','1','1','11','2016-07-24 10:59:50','code:Meta.created.add;');
INSERT INTO logs VALUES('1035','1','1','6','2016-07-24 11:07:08','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1036','1','1','6','2016-07-24 11:07:15','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1037','1','1','6','2016-07-24 11:07:19','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1038','1','19','57','2016-07-24 11:20:21',NULL);
INSERT INTO logs VALUES('1039','1','19','58','2016-07-24 11:20:22',NULL);
INSERT INTO logs VALUES('1040','1','19','59','2016-07-24 11:20:22',NULL);
INSERT INTO logs VALUES('1041','1','20','10','2016-07-24 11:20:22',NULL);
INSERT INTO logs VALUES('1042','1','20','11','2016-07-24 11:20:22',NULL);
INSERT INTO logs VALUES('1043','1','1','10','2016-07-24 11:20:23','code:Meta.delete;');
INSERT INTO logs VALUES('1044','1','21','7','2016-07-24 11:20:23',NULL);
INSERT INTO logs VALUES('1045','1','18','7','2016-07-24 11:20:23',NULL);
INSERT INTO logs VALUES('1046','1','1','8','2016-07-24 11:41:06','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1047','1','1','8','2016-07-24 11:41:26','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1048','1','1','8','2016-07-24 11:41:37','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1049','1','1','8','2016-07-24 11:42:46','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1050','1','1','8','2016-07-24 11:42:52','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1051','1','1','8','2016-07-24 11:43:01','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1052','1','3',NULL,'2016-07-24 12:44:59',NULL);
INSERT INTO logs VALUES('1053','1','1','1','2016-07-24 12:54:56','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1054','1','1','1','2016-07-24 12:55:00','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1055','1','1','1','2016-07-24 12:55:07','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1056','1','1','1','2016-07-24 12:59:39','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1057','1','1','1','2016-07-24 12:59:42','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1058','1','1','1','2016-07-24 13:03:04','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1059','1','1','1','2016-07-24 13:13:49','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('1060','1','1','1','2016-07-24 14:34:55','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1061','1','1','1','2016-07-24 14:35:26','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1062','1','1','1','2016-07-24 14:35:29','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1063','1','1','1','2016-07-24 14:35:31','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1064','1','1','1','2016-07-24 14:35:32','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1065','1','1','1','2016-07-24 14:35:46','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1066','1','1','1','2016-07-24 14:35:47','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1067','1','1','1','2016-07-24 14:35:48','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1068','1','1','1','2016-07-24 14:35:49','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1069','1','1','1','2016-07-24 14:35:50','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1070','1','1','1','2016-07-24 14:35:51','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1071','1','1','1','2016-07-24 14:36:19','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1072','1','1','1','2016-07-24 14:36:35','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1073','1','1','1','2016-07-24 14:36:38','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1074','1','1','1','2016-07-24 14:40:30','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1075','1','1','1','2016-07-24 14:41:32','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1076','1','1','1','2016-07-24 14:41:40','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1077','1','1','1','2016-07-24 14:41:43','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1078','1','1','1','2016-07-24 14:41:45','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1079','1','1','8','2016-07-24 14:55:37','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1080','1','1','1','2016-07-24 14:57:10','code:Jurado.created.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1081','1','1','2','2016-07-24 14:57:10','code:Jurado.created.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1082','1','1','1','2016-07-24 14:58:34','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1083','1','1','2','2016-07-24 14:58:34','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1084','1','1','6','2016-07-24 15:46:11','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1085','1','1','6','2016-07-24 15:54:49','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1086','1','1','6','2016-07-24 15:55:08','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1087','1','1','1','2016-07-24 16:13:01','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1088','1','1','2','2016-07-24 16:13:01','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1089','1','1','3','2016-07-24 16:13:01','code:Jurado.created.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1090','1','1','1','2016-07-24 16:13:28','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1091','1','1','2','2016-07-24 16:13:28','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1092','1','1','4','2016-07-24 16:13:28','code:Jurado.created.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1093','1','5','2','2016-07-24 16:37:47',NULL);
INSERT INTO logs VALUES('1094','1','19','63','2016-07-24 16:38:24',NULL);
INSERT INTO logs VALUES('1095','1','19','60','2016-07-24 16:38:35',NULL);
INSERT INTO logs VALUES('1096','1','1','7','2016-07-24 16:38:44','code:PerfilsUsuario.delete;');
INSERT INTO logs VALUES('1097','1','1','9','2016-07-24 16:38:44','code:PerfilsUsuario.delete;');
INSERT INTO logs VALUES('1098','1','1','2','2016-07-24 16:38:44','code:Usuario.delete;');
INSERT INTO logs VALUES('1099','1','1','5','2016-07-24 16:39:22','code:Usuario.created.add;');
INSERT INTO logs VALUES('1100','5','2','5','2016-07-24 16:39:58',NULL);
INSERT INTO logs VALUES('1101','5','3',NULL,'2016-07-24 16:40:06',NULL);
INSERT INTO logs VALUES('1102','5','5','5','2016-07-24 16:40:34',NULL);
INSERT INTO logs VALUES('1103','5','1','2','2016-07-24 16:40:34','code:DescripcionTutor.created.edit;');
INSERT INTO logs VALUES('1104','5','7','4','2016-07-24 16:40:34',NULL);
INSERT INTO logs VALUES('1105','1','1','64','2016-07-24 16:43:35','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1106','5','15','64','2016-07-24 16:47:04',NULL);
INSERT INTO logs VALUES('1107','5','15','64','2016-07-24 16:49:22',NULL);
INSERT INTO logs VALUES('1108','5','19','64','2016-07-24 16:51:55',NULL);
INSERT INTO logs VALUES('1109','3','3',NULL,'2016-07-24 16:52:43',NULL);
INSERT INTO logs VALUES('1110','3','1','65','2016-07-24 16:52:56','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1111','5','19','65','2016-07-24 16:53:05',NULL);
INSERT INTO logs VALUES('1112','3','1','66','2016-07-24 16:56:24','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1113','5','19','66','2016-07-24 16:56:36',NULL);
INSERT INTO logs VALUES('1114','3','1','67','2016-07-24 16:56:49','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1115','5','15','67','2016-07-24 16:56:55',NULL);
INSERT INTO logs VALUES('1116','5','1','1','2016-07-24 16:57:10','code:Archivo.created.add;');
INSERT INTO logs VALUES('1117','5','16','13','2016-07-24 16:57:23',NULL);
INSERT INTO logs VALUES('1118','5','1','1','2016-07-24 16:57:29','code:Comentario.created.add;');
INSERT INTO logs VALUES('1119','5','1','12','2016-07-24 16:57:38','code:Meta.created.add;');
INSERT INTO logs VALUES('1120','5','1','12','2016-07-24 16:57:38','code:Meta.updated.add;');
INSERT INTO logs VALUES('1121','5','1','9','2016-07-24 16:57:38','code:Meta.updated.add;');
INSERT INTO logs VALUES('1122','5','1','12','2016-07-24 16:57:46','code:Meta.updated.edit;');
INSERT INTO logs VALUES('1123','5','1','12','2016-07-24 16:57:46','code:Meta.updated.edit;');
INSERT INTO logs VALUES('1124','5','1','9','2016-07-24 16:57:46','code:Meta.updated.edit;');
INSERT INTO logs VALUES('1125','5','1','12','2016-07-24 16:57:49','code:Meta.updated.change;');
INSERT INTO logs VALUES('1126','5','1','12','2016-07-24 16:57:49','code:Meta.updated.change;');
INSERT INTO logs VALUES('1127','5','1','9','2016-07-24 16:57:49','code:Meta.updated.change;');
INSERT INTO logs VALUES('1128','5','1','12','2016-07-24 16:57:52','code:Meta.updated.change;');
INSERT INTO logs VALUES('1129','5','1','12','2016-07-24 16:57:52','code:Meta.updated.change;');
INSERT INTO logs VALUES('1130','5','1','9','2016-07-24 16:57:52','code:Meta.updated.change;');
INSERT INTO logs VALUES('1131','5','1','1','2016-07-24 16:58:03','code:Asunto.created.add;');
INSERT INTO logs VALUES('1132','5','1','12','2016-07-24 16:58:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('1133','5','1','9','2016-07-24 16:58:03','code:Meta.updated.add;');
INSERT INTO logs VALUES('1134','5','1','6','2016-07-24 16:58:55','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1135','5','1','6','2016-07-24 16:59:02','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1136','5','1','6','2016-07-24 16:59:20','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1137','5','1','6','2016-07-24 16:59:37','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1138','3','1','6','2016-07-24 17:00:40','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1139','5','19','67','2016-07-24 17:01:08',NULL);
INSERT INTO logs VALUES('1140','1','3',NULL,'2016-07-24 17:01:29',NULL);
INSERT INTO logs VALUES('1141','1','19','61','2016-07-24 17:02:11',NULL);
INSERT INTO logs VALUES('1142','1','1','68','2016-07-24 17:02:35','code:Autor.created.add_tutor;');
INSERT INTO logs VALUES('1143','1','1','5','2016-07-24 17:02:45','code:Jurado.created.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1144','5','3',NULL,'2016-07-24 17:11:16',NULL);
INSERT INTO logs VALUES('1145','5','1','2','2016-07-24 17:13:06','code:Comentario.created.add;');
INSERT INTO logs VALUES('1146','1','3',NULL,'2016-07-24 19:41:20',NULL);
INSERT INTO logs VALUES('1147','5','3',NULL,'2016-07-24 19:41:45',NULL);
INSERT INTO logs VALUES('1148','1','3',NULL,'2016-07-24 19:42:49',NULL);
INSERT INTO logs VALUES('1149','3','3',NULL,'2016-07-24 19:45:04',NULL);
INSERT INTO logs VALUES('1150','3','16','14','2016-07-24 19:45:28',NULL);
INSERT INTO logs VALUES('1151','3','16','15','2016-07-24 19:46:26',NULL);
INSERT INTO logs VALUES('1152','1','1','6','2016-07-24 19:49:28','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1153','3','1','6','2016-07-24 19:49:42','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1154','3','1','6','2016-07-24 19:51:49','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1155','3','1','6','2016-07-24 19:51:54','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1156','3','1','6','2016-07-24 19:52:35','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1157','3','1','6','2016-07-24 19:52:40','code:Escenario.updated.edit;');
INSERT INTO logs VALUES('1158','1','19','68','2016-07-24 20:03:22',NULL);
INSERT INTO logs VALUES('1159','1','1','6','2016-07-24 20:04:13','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1160','1','1','6','2016-07-24 20:05:01','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1161','1','1','1','2016-07-24 20:07:25','code:Planilla.created.aprobacionPropuesta;');
INSERT INTO logs VALUES('1162','1','1','6','2016-07-24 20:09:01','code:Proyecto.updated.proyectos_edit;');
INSERT INTO logs VALUES('1163','1','1','5','2016-07-24 20:13:59','code:Jurado.updated.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1164','1','1','6','2016-07-24 20:13:59','code:Jurado.created.proyectos_asignacion_jurados;');
INSERT INTO logs VALUES('1165','1','1','1','2016-07-24 20:34:08','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1166','1','1','1','2016-07-24 20:34:29','code:Grupo.updated.editar_datos_impresion;');
INSERT INTO logs VALUES('1167','1','3',NULL,'2016-07-24 21:15:05',NULL);



-- Table:  `mensajes`

DROP TABLE IF EXISTS mensajes;

CREATE TABLE `mensajes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `principal_mensaje_id` int(11) NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `principal_mensaje_id` (`principal_mensaje_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO mensajes VALUES('1','2','1','','2016-07-19 15:49:50');
INSERT INTO mensajes VALUES('2','3','6','','2016-07-21 18:25:53');
INSERT INTO mensajes VALUES('3','3','8','','2016-07-21 18:26:03');
INSERT INTO mensajes VALUES('4','3','10','','2016-07-21 18:26:50');
INSERT INTO mensajes VALUES('5','3','12','','2016-07-21 18:26:57');
INSERT INTO mensajes VALUES('6','3','14','','2016-07-21 20:35:36');
INSERT INTO mensajes VALUES('7','3','16','','2016-07-21 20:37:13');
INSERT INTO mensajes VALUES('8','3','18','','2016-07-21 20:38:24');
INSERT INTO mensajes VALUES('9','3','20','','2016-07-21 20:38:39');
INSERT INTO mensajes VALUES('10','3','22','','2016-07-21 20:39:20');
INSERT INTO mensajes VALUES('11','3','24','','2016-07-21 20:47:29');
INSERT INTO mensajes VALUES('12','3','26','','2016-07-21 20:47:51');
INSERT INTO mensajes VALUES('13','3','28','','2016-07-21 20:50:03');
INSERT INTO mensajes VALUES('14','3','30','','2016-07-21 20:53:19');
INSERT INTO mensajes VALUES('15','1','31','','2016-07-21 21:35:48');
INSERT INTO mensajes VALUES('16','2','35','','2016-07-22 10:37:23');
INSERT INTO mensajes VALUES('17','2','37','','2016-07-22 11:08:04');
INSERT INTO mensajes VALUES('18','2','39','','2016-07-22 11:09:33');
INSERT INTO mensajes VALUES('19','2','41','','2016-07-22 11:10:38');
INSERT INTO mensajes VALUES('20','2','43','','2016-07-22 11:11:18');
INSERT INTO mensajes VALUES('21','2','45','','2016-07-22 11:12:16');
INSERT INTO mensajes VALUES('22','2','47','','2016-07-22 11:13:12');
INSERT INTO mensajes VALUES('23','1','48','','2016-07-22 16:24:00');
INSERT INTO mensajes VALUES('24','3','49','','2016-07-22 17:17:52');
INSERT INTO mensajes VALUES('25','3','50','','2016-07-22 17:17:56');
INSERT INTO mensajes VALUES('26','2','52','','2016-07-22 22:04:33');
INSERT INTO mensajes VALUES('27','2','53','','2016-07-23 10:27:30');
INSERT INTO mensajes VALUES('28','1','55','','2016-07-23 10:30:32');
INSERT INTO mensajes VALUES('29','1','56','','2016-07-23 10:30:49');
INSERT INTO mensajes VALUES('30','1','57','','2016-07-23 10:56:13');
INSERT INTO mensajes VALUES('31','2','58','','2016-07-23 11:06:54');
INSERT INTO mensajes VALUES('32','3','59','','2016-07-23 19:44:30');
INSERT INTO mensajes VALUES('33','2','60','','2016-07-24 10:59:50');
INSERT INTO mensajes VALUES('34','3','61','','2016-07-24 16:57:23');
INSERT INTO mensajes VALUES('35','1','61','','2016-07-24 16:57:23');



-- Table:  `metas`

DROP TABLE IF EXISTS metas;

CREATE TABLE `metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `culminacion` date DEFAULT NULL,
  `cerrado` tinyint(1) NOT NULL DEFAULT '0',
  `completado` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '1',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO metas VALUES('9','6','default',NULL,NULL,'','0','3','1','4','0','2016-07-23 10:56:13','2016-07-24 16:58:03');
INSERT INTO metas VALUES('11','8','default',NULL,NULL,'','0','1','5','6','0','2016-07-24 10:59:50','2016-07-24 10:59:50');
INSERT INTO metas VALUES('12','6','qdqdqwdwdqwdqd','qwdqwd','2016-07-28','','0','2','2','3','9','2016-07-24 16:57:38','2016-07-24 16:58:03');



-- Table:  `perfils`

DROP TABLE IF EXISTS perfils;

CREATE TABLE `perfils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(12) NOT NULL,
  `code` varchar(10) NOT NULL,
  `fase_activo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO perfils VALUES('1','Estudiante','basico','estudiante',NULL);
INSERT INTO perfils VALUES('2','Tutor Académico','profesor','tutoracad',NULL);
INSERT INTO perfils VALUES('3','Tutor Metodológico','profesor','tutormetod','grado2,predefensa');
INSERT INTO perfils VALUES('4','Administrador','coord','admin',NULL);
INSERT INTO perfils VALUES('5','Root','developer','root','');
INSERT INTO perfils VALUES('6','Coordinacion PG','coord','coordpg',NULL);
INSERT INTO perfils VALUES('7','Invitado','coord','invitado',NULL);
INSERT INTO perfils VALUES('8','Docente PGI','profesor','profpg1','grado1');



-- Table:  `perfils_usuarios`

DROP TABLE IF EXISTS perfils_usuarios;

CREATE TABLE `perfils_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO perfils_usuarios VALUES('1','1','1');
INSERT INTO perfils_usuarios VALUES('2','2','1');
INSERT INTO perfils_usuarios VALUES('3','3','1');
INSERT INTO perfils_usuarios VALUES('4','4','1');
INSERT INTO perfils_usuarios VALUES('5','6','1');
INSERT INTO perfils_usuarios VALUES('6','1','11');
INSERT INTO perfils_usuarios VALUES('10','1','12');
INSERT INTO perfils_usuarios VALUES('11','1','13');
INSERT INTO perfils_usuarios VALUES('12','1','3');
INSERT INTO perfils_usuarios VALUES('13','1','4');
INSERT INTO perfils_usuarios VALUES('14','2','5');
INSERT INTO perfils_usuarios VALUES('15','3','5');



-- Table:  `planillas`

DROP TABLE IF EXISTS planillas;

CREATE TABLE `planillas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) NOT NULL,
  `principal_planilla_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `tipo_planilla_id` int(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `principal_planilla_id` (`principal_planilla_id`),
  KEY `proyecto_id` (`proyecto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO planillas VALUES('1','6','0','2016-07-24 20:07:25','1','{\"jurados_id\":null}');



-- Table:  `principal_mensajes`

DROP TABLE IF EXISTS principal_mensajes;

CREATE TABLE `principal_mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_mensaje_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` mediumtext,
  `enlace` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_mensaje_id` (`tipo_mensaje_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

INSERT INTO principal_mensajes VALUES('1','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('2','2','Alberto Rodriguez ha modificado el escenario del Proyecto',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('3','2','Alberto Rodriguez ha modificado el escenario del Proyecto',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('4','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('5','4','Alberto Rodriguez ha agregado un Estudiante al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('6','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"index\"}');
INSERT INTO principal_mensajes VALUES('7','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('8','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('9','4','Alberto Rodriguez ha agregado un Estudiante al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('10','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"index\"}');
INSERT INTO principal_mensajes VALUES('11','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('12','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('13','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('14','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('15','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('16','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('17','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('18','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('19','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('20','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('21','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('22','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('23','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('24','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('25','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('26','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('27','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('28','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('29','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('30','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('31','7','Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('32','7','Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('33','2','Fulano De Tal ha modificado el escenario del Proyecto',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('34','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('35','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('36','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('37','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('38','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('39','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('40','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Metodológico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('41','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('42','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Metodológico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('43','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('44','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('45','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('46','9','Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":null}');
INSERT INTO principal_mensajes VALUES('47','9','Su invitación al Proyecto # ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('48','7','Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #2',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"2\"}');
INSERT INTO principal_mensajes VALUES('49','7','Alberto Rodriguez ha aceptado la solicitud de pertenecer al Proyecto #2',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"2\"}');
INSERT INTO principal_mensajes VALUES('50','7','Alberto Rodriguez ha aceptado la solicitud de pertenecer al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('51','2','Alberto Rodriguez ha actualizado la revision del Proyecto #3',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"3\"}');
INSERT INTO principal_mensajes VALUES('52','5','Lo han invitado a ser parte de un Proyecto, #4',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('53','5','Lo han invitado a ser parte de un Proyecto, #5',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('54','7','Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #3',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"3\"}');
INSERT INTO principal_mensajes VALUES('55','8','Fulano De Tal NO ha aceptado la solicitud de pertenecer al Proyecto #4',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"4\"}');
INSERT INTO principal_mensajes VALUES('56','7','Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #4',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"4\"}');
INSERT INTO principal_mensajes VALUES('57','5','Lo han invitado a ser parte de un Proyecto, #6',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('58','5','Lo han invitado a ser parte de un Proyecto, #7',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('59','2','Alberto Rodriguez ha actualizado la revision del Proyecto #7',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"7\"}');
INSERT INTO principal_mensajes VALUES('60','5','Lo han invitado a ser parte de un Proyecto, #8',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('61','2','Aholimar Hernandez ha actualizado la revision del Proyecto #6',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"6\"}');
INSERT INTO principal_mensajes VALUES('62','2','Fulano De Tal ha actualizado la revision del Proyecto #6',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"6\"}');
INSERT INTO principal_mensajes VALUES('63','2','Fulano De Tal ha actualizado la revision del Proyecto #6',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"6\"}');



-- Table:  `principal_planillas`

DROP TABLE IF EXISTS principal_planillas;

CREATE TABLE `principal_planillas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` mediumtext,
  `tipo_planilla_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_planilla_id` (`tipo_planilla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




-- Table:  `programas`

DROP TABLE IF EXISTS programas;

CREATE TABLE `programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `grado` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `tipo_programa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_programa_id` (`tipo_programa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO programas VALUES('1','Ingeniería en Informática','Ingeniero en Informática','1','1');



-- Table:  `proyectos`

DROP TABLE IF EXISTS proyectos;

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `programa_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `fase_id` int(11) NOT NULL COMMENT 'propuesta,proyecto1,proyecto2,predefensa,defensa,publicacion',
  `estado_id` int(11) NOT NULL COMMENT 'stanby,cursando,solitud,aprobado,reprobado',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `bloqueado` tinyint(1) NOT NULL DEFAULT '0',
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fase_id` (`fase_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `estado_id` (`estado_id`),
  KEY `programa_id` (`programa_id`),
  KEY `grupo_id` (`grupo_id`),
  KEY `sede_id` (`sede_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO proyectos VALUES('6','qwdqw','2','1','1','5','1','2016-07-23 10:56:12','2016-07-24 20:09:01','1','','1');
INSERT INTO proyectos VALUES('8','qweqwe','3','1','1','5','1','2016-07-24 10:59:49','2016-07-24 14:55:37','1','','1');



-- Table:  `revisions`

DROP TABLE IF EXISTS revisions;

CREATE TABLE `revisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` mediumtext NOT NULL,
  `resumen` mediumtext NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `etiquetas` varchar(255) NOT NULL,
  `observaciones` mediumtext NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `metadata` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated` (`updated`),
  KEY `etiquetas` (`etiquetas`),
  KEY `usuario_id` (`usuario_id`),
  KEY `proyecto_id` (`proyecto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO revisions VALUES('9','wdqwd','qwdqwd','qwdqw','qwdq','','6','2016-07-23 10:56:12','3',NULL);
INSERT INTO revisions VALUES('12','qweqweqw','qweqwe','qeqweqw','qweqw','qweqw','8','2016-07-24 10:59:50','1',NULL);
INSERT INTO revisions VALUES('13','wdqwdqwdw','qwdqwdqwdqw','qwdqwdqwwq','qwdq,2123,12312','qdqwdqwd','6','2016-07-24 16:57:23','5',NULL);
INSERT INTO revisions VALUES('14','wdqwdqwdw wedwefwefwef','qwdqwdqwdqw wewefwefwefwef<br>','qwdqwdqwwqwefwefwefw','qwdq,2123,12312','qdqwdqwd','6','2016-07-24 19:45:28','3',NULL);
INSERT INTO revisions VALUES('15','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod \r\ntempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea \r\ncommodi consequat. Quis aute iure reprehenderit in voluptate velit esse \r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat \r\ncupiditat non proident, sunt in culpa qui officia deserunt mollit anim \r\nid est laborum.<br>','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod \r\ntempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea \r\ncommodi consequat. Quis aute iure reprehenderit in voluptate velit esse \r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat \r\ncupiditat non proident, sunt in culpa qui officia deserunt mollit anim \r\nid est laborum.<br>','Lorem, ipsum, dolor sit amet','','6','2016-07-24 19:46:26','3',NULL);



-- Table:  `sedes`

DROP TABLE IF EXISTS sedes;

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO sedes VALUES('1','San Juan de los Morros');
INSERT INTO sedes VALUES('2','Ortiz');
INSERT INTO sedes VALUES('3','Sombrero');



-- Table:  `tipo_autors`

DROP TABLE IF EXISTS tipo_autors;

CREATE TABLE `tipo_autors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL COMMENT 'Estudiante,Tutor Academico,Tutor Metodologico',
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tipo_autors VALUES('1','Estudiante','estudiante');
INSERT INTO tipo_autors VALUES('2','Tutor Académico','tutoracad');
INSERT INTO tipo_autors VALUES('3','Tutor Metodológico','tutormetod');



-- Table:  `tipo_jurados`

DROP TABLE IF EXISTS tipo_jurados;

CREATE TABLE `tipo_jurados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `code` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tipo_jurados VALUES('1','Coordinador','coordinador');
INSERT INTO tipo_jurados VALUES('2','Principal','principal');
INSERT INTO tipo_jurados VALUES('3','Suplente','suplente');



-- Table:  `tipo_mensajes`

DROP TABLE IF EXISTS tipo_mensajes;

CREATE TABLE `tipo_mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `code` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO tipo_mensajes VALUES('1','{\"icon\":\"fa-exclamation-circle\",\"color\":\"info\"}','Mensaje de Notificación','generico');
INSERT INTO tipo_mensajes VALUES('2','{\"icon\":\"fa-book\",\"color\":\"primary\"}','Proyecto Modificado','proy-edit');
INSERT INTO tipo_mensajes VALUES('3','{\"icon\":\"fa-trash-o\",\"color\":\"danger\"}','Proyecto Eliminado','proy-delet');
INSERT INTO tipo_mensajes VALUES('4','{\"icon\":\"fa-users\",\"color\":\"success\"}','Invitar autor a un proyecto','autor-add');
INSERT INTO tipo_mensajes VALUES('5','{\"icon\":\"fa-link\",\"color\":\"success\"}','ha sido invitado a un proyecto','autor-inv');
INSERT INTO tipo_mensajes VALUES('7','{\"icon\":\"fa-thumbs-o-up\",\"color\":\"primary\"}','Han aceptado la solicitud de pertenecer al proyecto','autor-solsi');
INSERT INTO tipo_mensajes VALUES('8','{\"icon\":\"fa-unlink\",\"color\":\"warning\"}','NO han aceptado la solicitud de pertenecer al proyecto','autor-solno');
INSERT INTO tipo_mensajes VALUES('9','{\"icon\":\" fa-unlink\",\"color\":\"danger\"}','Invitación a Proyecto Revocada','autor-delet');



-- Table:  `tipo_planillas`

DROP TABLE IF EXISTS tipo_planillas;

CREATE TABLE `tipo_planillas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO tipo_planillas VALUES('1','Planilla de Aprobación de Propuesta','aprob-prop');



-- Table:  `tipo_programas`

DROP TABLE IF EXISTS tipo_programas;

CREATE TABLE `tipo_programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `code` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tipo_programas VALUES('1','Pre-Grado','pregrado');
INSERT INTO tipo_programas VALUES('2','Curso no conducente','diplomado');
INSERT INTO tipo_programas VALUES('3','Especialización','especia');
INSERT INTO tipo_programas VALUES('4','Maestría','master');
INSERT INTO tipo_programas VALUES('5','Doctorado','doctor');



-- Table:  `tipo_usuarios`

DROP TABLE IF EXISTS tipo_usuarios;

CREATE TABLE `tipo_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL DEFAULT ' ' COMMENT 'estudiante,profesor',
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tipo_usuarios VALUES('1','Estudiante','estudiante');
INSERT INTO tipo_usuarios VALUES('2','Profesor','profesor');



-- Table:  `usuarios`

DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(9) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sede_id` int(11) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `updated_foto` datetime NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `actualizado` tinyint(1) NOT NULL DEFAULT '0',
  `observaciones` mediumtext,
  `hash` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sede_id` (`sede_id`),
  KEY `tipo_usuario_id` (`tipo_usuario_id`),
  KEY `cedula` (`cedula`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES('1','16407820','$2a$10$NzxSjApyZ9zhc4qaxazhNuehyeNLdLwDJHAbgUq1CNhykpmyCliuG','Alberto','Rodriguez','M','arod.unerg@gmail.com','1','2','2015-06-05 00:40:34','2016-07-22 16:16:37','2015-09-08 17:34:52','f36f880bad2ebb45e82827a631db999365d7751b.jpg','1','1','1','','0351f11b6f2c15f9631536f60b73976699a2c86d');
INSERT INTO usuarios VALUES('3','123456','$2a$10$ccb6iG6ezSCGy3feCGNglu9b3oxceehPysrqGrP6Vv6BzX6kSi6U.','Fulano','De Tal','M','fulano@gmail.com','1','1','2016-07-19 19:20:49','2016-07-19 19:21:16','0000-00-00 00:00:00',NULL,'1','','1',NULL,'b6b9e1f2892224cf0821f2155f22321b7373c2e5');
INSERT INTO usuarios VALUES('4','111111','$2a$10$hU/C9yumMNtu2SiEsoh7.OjSSkDNPR8XdhGVS.3Wd1D40DYR7B0MS','uno','uno','F','uno@example.com','1','1','2016-07-22 12:23:52','2016-07-22 13:22:24','0000-00-00 00:00:00','50b69bd5d59fc4dfec1f65bc18eb314bb3c2dd14.jpg','1','','1',NULL,'d8e6ee1374f492edfd2a9c952d67dc6472e72f65');
INSERT INTO usuarios VALUES('5','17062851','$2a$10$yvkG.xN25DSxhzP5K8Grregiq3tCL/DnYox2BI1zZuoKSMz2pYAyq','Aholimar','Hernandez','F','a.hernandez.unerg@gmail.com','1','2','2016-07-24 16:39:22','2016-07-24 16:40:34','0000-00-00 00:00:00',NULL,'1','','1','','851e5e9431b4c2cd3e1f026aeca4b07ccc769879');



-- Activar la comprobación de la integridad referencial
SET FOREIGN_KEY_CHECKS = 1;


