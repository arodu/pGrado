-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2016 at 03:09 PM
-- Server version: 5.6.30-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unerg_pgrado`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tamano` varchar(20) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asuntos`
--

CREATE TABLE `asuntos` (
  `id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `num_secuencia` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf16 NOT NULL,
  `cerrado` tinyint(1) NOT NULL DEFAULT '0',
  `propietario_id` int(11) NOT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autors`
--

CREATE TABLE `autors` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `programa_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` mediumtext,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias_usuarios`
--

CREATE TABLE `categorias_usuarios` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `proyecto_id` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `tipo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `clave`, `valor`, `tipo`) VALUES
(1, 'asignacion_jurados.firma.nombre', 'Dra. Nellys Chirinos', 'impresion'),
(2, 'asignacion_jurados.firma.cargo', 'Directora Académica de Postgrado', 'impresion');

-- --------------------------------------------------------

--
-- Table structure for table `descargas`
--

CREATE TABLE `descargas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `etiqueta` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `descripcion_logs`
--

CREATE TABLE `descripcion_logs` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `prioridad` tinyint(2) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estructura` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `descripcion_logs`
--

INSERT INTO `descripcion_logs` (`id`, `code`, `prioridad`, `descripcion`, `estructura`) VALUES
(1, '000', 10, 'Sin descripcion', ''),
(2, '001', 1, 'Activacion de Usuario PreRegistrado', 'Usuario.updated.register'),
(3, '002', 1, 'Inicio de Sesion', ''),
(4, '003', 1, 'Recuperacion de Contraseña', ''),
(5, '004', 1, 'Actualizacion de Datos del Usuario', 'Usuario.updated.edit'),
(6, '005', 1, 'Cambio de Contraseña', 'Usuario.updated.editpassword'),
(7, '006', 1, 'Creacion de Datos adicionales del usuario', 'DescripcionUsuario.created.edit'),
(8, '007', 1, 'Registro de Nuevo Usuario', 'Usuario.created.register'),
(9, '008', 1, 'Actualizacion de Datos adicionales del usuario', 'DescripcionUsuario.updated.edit'),
(10, '201', 1, 'Crear Nuevo Proyecto', 'Proyecto.created.add'),
(11, '202', 1, 'Crear Autor de Proyecto', 'Autor.created.add'),
(12, '203', 1, 'Crear Revision', 'Revision.created.add'),
(13, '204', 1, 'Crear Escenario de Proyecto', 'Escenario.created.add'),
(14, '205', 1, 'Generar solicitud de compañero de Proyecto', 'Autor.created.addCompanero'),
(15, '206', 1, 'Solicitud de compañero/tutor Aceptada', 'Autor.updated.solicitud'),
(16, '303', 1, 'Edicion de Revision', 'Revision.created.edit'),
(17, '304', 1, 'Edicion de Escenario', 'Escenario.updated.escenarioEdit'),
(18, '501', 1, 'Proyecto Eliminado', 'Proyecto.delete'),
(19, '502', 1, 'Autor Eliminado', 'Autor.delete'),
(20, '503', 1, 'Revision Eliminada', 'Revision.delete'),
(21, '504', 1, 'Escenario Eliminado', 'Escenario.delete');

-- --------------------------------------------------------

--
-- Table structure for table `descripcion_tutors`
--

CREATE TABLE `descripcion_tutors` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pos_inst` varchar(60) NOT NULL,
  `escalafon` varchar(60) DEFAULT NULL,
  `dedicacion` varchar(60) DEFAULT NULL,
  `publico` mediumtext COMMENT 'Informacion publica del tutor, para ser mostrada a los estud',
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `descripcion_usuarios`
--

CREATE TABLE `descripcion_usuarios` (
  `id` int(11) NOT NULL,
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
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `escenarios`
--

CREATE TABLE `escenarios` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `persona` varchar(120) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `carta_aceptacion` tinyint(1) NOT NULL,
  `carta_implementacion` tinyint(1) NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `fase_id` int(11) NOT NULL,
  `orden` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `code`, `fase_id`, `orden`) VALUES
(1, 'En Espera', 'espera', 0, 0),
(2, 'Solicitud', 'solicitud', 4, 1),
(3, 'Reprobado', 'reprobado', 4, 2),
(4, 'Si Condicionado', 'si_cond', 4, 3),
(5, 'Si con Observaciones', 'si_observ', 4, 4),
(6, 'Si Aprobado', 'aprobado', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fases`
--

CREATE TABLE `fases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT ' ',
  `orden` int(2) NOT NULL,
  `tiene_jurados` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fases`
--

INSERT INTO `fases` (`id`, `nombre`, `code`, `orden`, `tiene_jurados`) VALUES
(1, 'Propuesta', 'propuesta', 1, 1),
(2, 'Proyecto de Grado I', 'grado1', 2, 0),
(3, 'Proyecto de Grado II', 'grado2', 3, 0),
(4, 'PreDefensa', 'predefensa', 4, 0),
(5, 'Defensa', 'defensa', 5, 1),
(6, 'Publicado', 'publicado', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `fase_id` int(11) DEFAULT NULL,
  `meta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `activo`, `fase_id`, `meta`) VALUES
(1, 'Cohorte 2015-1', 1, 1, '{"fases":{"5":null,"1":{"no_consj_area":"3","fecha_consj_area":"14-06-2015","fecha_comun":"14-06-2015"}}}');

-- --------------------------------------------------------

--
-- Table structure for table `jurados`
--

CREATE TABLE `jurados` (
  `id` int(11) NOT NULL,
  `tipo_jurado_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `fase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `descripcion_log_id` int(11) DEFAULT NULL,
  `related_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `observacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `usuario_id`, `descripcion_log_id`, `related_id`, `created`, `observacion`) VALUES
(1, 1, 1, 1, '2016-07-19 15:08:43', 'code:Programa.created.add;');

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id` bigint(20) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `principal_mensaje_id` int(11) NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(11) NOT NULL,
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
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perfils`
--

CREATE TABLE `perfils` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(12) NOT NULL,
  `code` varchar(10) NOT NULL,
  `fase_activo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perfils`
--

INSERT INTO `perfils` (`id`, `nombre`, `tipo`, `code`, `fase_activo`) VALUES
(1, 'Estudiante', 'basico', 'estudiante', NULL),
(2, 'Tutor Académico', 'profesor', 'tutoracad', NULL),
(3, 'Tutor Metodológico', 'profesor', 'tutormetod', 'grado2,predefensa'),
(4, 'Administrador', 'coord', 'admin', NULL),
(5, 'Root', 'developer', 'root', ''),
(6, 'Coordinacion PG', 'coord', 'coordpg', NULL),
(7, 'Invitado', 'coord', 'invitado', NULL),
(8, 'Docente PGI', 'profesor', 'profpg1', 'grado1');

-- --------------------------------------------------------

--
-- Table structure for table `perfils_usuarios`
--

CREATE TABLE `perfils_usuarios` (
  `id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perfils_usuarios`
--

INSERT INTO `perfils_usuarios` (`id`, `perfil_id`, `usuario_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 6, 1),
(6, 1, 11),
(7, 2, 2),
(9, 3, 2),
(10, 1, 12),
(11, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `planillas`
--

CREATE TABLE `planillas` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `principal_planilla_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `tipo_planilla_id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `principal_mensajes`
--

CREATE TABLE `principal_mensajes` (
  `id` int(11) NOT NULL,
  `tipo_mensaje_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` mediumtext,
  `enlace` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `principal_planillas`
--

CREATE TABLE `principal_planillas` (
  `id` int(11) NOT NULL,
  `data` mediumtext,
  `tipo_planilla_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `grado` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `tipo_programa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `grado`, `activo`, `tipo_programa_id`) VALUES
(1, 'Ingeniería en Informática', 'Ingeniero en Informática', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
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
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `id` int(11) NOT NULL,
  `titulo` mediumtext NOT NULL,
  `resumen` mediumtext NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `etiquetas` varchar(255) NOT NULL,
  `observaciones` mediumtext NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `metadata` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`) VALUES
(1, 'San Juan de los Morros'),
(2, 'Ortiz'),
(3, 'Sombrero');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_autors`
--

CREATE TABLE `tipo_autors` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL COMMENT 'Estudiante,Tutor Academico,Tutor Metodologico',
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_autors`
--

INSERT INTO `tipo_autors` (`id`, `nombre`, `code`) VALUES
(1, 'Estudiante', 'estudiante'),
(2, 'Tutor Académico', 'tutoracad'),
(3, 'Tutor Metodológico', 'tutormetod');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_jurados`
--

CREATE TABLE `tipo_jurados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_jurados`
--

INSERT INTO `tipo_jurados` (`id`, `nombre`, `code`) VALUES
(1, 'Coordinador', 'coordinador'),
(2, 'Principal', 'principal'),
(3, 'Suplente', 'suplente');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_mensajes`
--

CREATE TABLE `tipo_mensajes` (
  `id` int(11) NOT NULL,
  `meta` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_mensajes`
--

INSERT INTO `tipo_mensajes` (`id`, `meta`, `descripcion`, `code`) VALUES
(1, '{"icon":"fa-exclamation-circle","color":"info"}', 'Mensaje de Notificación', 'generico'),
(2, '{"icon":"fa-book","color":"primary"}', 'Proyecto Modificado', 'proy-edit'),
(3, '{"icon":"fa-trash-o","color":"danger"}', 'Proyecto Eliminado', 'proy-delet'),
(4, '{"icon":"fa-users","color":"success"}', 'Invitar autor a un proyecto', 'autor-add'),
(5, '{"icon":"fa-link","color":"success"}', 'ha sido invitado a un proyecto', 'autor-inv'),
(7, '{"icon":"fa-thumbs-o-up","color":"primary"}', 'Han aceptado la solicitud de pertenecer al proyecto', 'autor-solsi'),
(8, '{"icon":"fa-unlink","color":"warning"}', 'NO han aceptado la solicitud de pertenecer al proyecto', 'autor-solno'),
(9, '{"icon":" fa-unlink","color":"danger"}', 'Invitación a Proyecto Revocada', 'autor-delet');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_planillas`
--

CREATE TABLE `tipo_planillas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_planillas`
--

INSERT INTO `tipo_planillas` (`id`, `nombre`, `code`) VALUES
(1, 'Planilla de Aprobación de Propuesta', 'aprob-prop');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_programas`
--

CREATE TABLE `tipo_programas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_programas`
--

INSERT INTO `tipo_programas` (`id`, `nombre`, `code`) VALUES
(1, 'Pre-Grado', 'pregrado'),
(2, 'Curso no conducente', 'diplomado'),
(3, 'Especialización', 'especia'),
(4, 'Maestría', 'master'),
(5, 'Doctorado', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL DEFAULT ' ' COMMENT 'estudiante,profesor',
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `nombre`, `code`) VALUES
(1, 'Estudiante', 'estudiante'),
(2, 'Profesor', 'profesor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
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
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `actualizado` tinyint(1) NOT NULL DEFAULT '0',
  `observaciones` mediumtext,
  `hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `password`, `nombres`, `apellidos`, `sexo`, `email`, `sede_id`, `tipo_usuario_id`, `created`, `updated`, `updated_foto`, `activo`, `admin`, `actualizado`, `observaciones`, `hash`) VALUES
(1, '16407820', '$2a$10$NzxSjApyZ9zhc4qaxazhNuehyeNLdLwDJHAbgUq1CNhykpmyCliuG', 'Alberto', 'Rodriguez', 'M', 'arod.unerg@gmail.com', 1, 2, '2015-06-05 00:40:34', '2016-07-19 08:12:36', '2015-09-08 17:34:52', 1, 1, 1, '', '97db8edee485da0d739e158ff80440595cb036d9'),
(2, '17062851', '$2a$10$kMf12j8pokK3RmDZeF1dLuZ3i0HTnbYrzSRSdBIcWbZ2MzRwImPAO', 'Aholimar', 'Hernandez', 'F', 'asd4@gmail.com', 1, 2, '2015-01-01 00:00:00', '2016-06-05 18:04:10', '0000-00-00 00:00:00', 1, 1, 1, '', 'da4b9237bacccdf19c0760cab7aec4a8359010b0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_id` (`proyecto_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `asuntos`
--
ALTER TABLE `asuntos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_id` (`proyecto_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tipo_autor_id` (`tipo_autor_id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programa_id` (`programa_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `categorias_usuarios`
--
ALTER TABLE `categorias_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clave` (`clave`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descripcion_logs`
--
ALTER TABLE `descripcion_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `estructura` (`estructura`);

--
-- Indexes for table `descripcion_tutors`
--
ALTER TABLE `descripcion_tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `descripcion_usuarios`
--
ALTER TABLE `descripcion_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `escenarios`
--
ALTER TABLE `escenarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_id` (`proyecto_id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `fase_id` (`fase_id`);

--
-- Indexes for table `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fase_id` (`fase_id`);

--
-- Indexes for table `jurados`
--
ALTER TABLE `jurados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_id` (`proyecto_id`),
  ADD KEY `fase_id` (`fase_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tipo_jurado_id` (`tipo_jurado_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `descripcion_log_id` (`descripcion_log_id`),
  ADD KEY `related_id` (`related_id`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `principal_mensaje_id` (`principal_mensaje_id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `perfils_usuarios`
--
ALTER TABLE `perfils_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_id` (`perfil_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `planillas`
--
ALTER TABLE `planillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `principal_planilla_id` (`principal_planilla_id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indexes for table `principal_mensajes`
--
ALTER TABLE `principal_mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_mensaje_id` (`tipo_mensaje_id`);

--
-- Indexes for table `principal_planillas`
--
ALTER TABLE `principal_planillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_planilla_id` (`tipo_planilla_id`);

--
-- Indexes for table `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_programa_id` (`tipo_programa_id`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fase_id` (`fase_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `programa_id` (`programa_id`),
  ADD KEY `grupo_id` (`grupo_id`),
  ADD KEY `sede_id` (`sede_id`);

--
-- Indexes for table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated` (`updated`),
  ADD KEY `etiquetas` (`etiquetas`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indexes for table `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_autors`
--
ALTER TABLE `tipo_autors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tipo_jurados`
--
ALTER TABLE `tipo_jurados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tipo_mensajes`
--
ALTER TABLE `tipo_mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tipo_planillas`
--
ALTER TABLE `tipo_planillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tipo_programas`
--
ALTER TABLE `tipo_programas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sede_id` (`sede_id`),
  ADD KEY `tipo_usuario_id` (`tipo_usuario_id`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `hash` (`hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asuntos`
--
ALTER TABLE `asuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorias_usuarios`
--
ALTER TABLE `categorias_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `descargas`
--
ALTER TABLE `descargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `descripcion_logs`
--
ALTER TABLE `descripcion_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `descripcion_tutors`
--
ALTER TABLE `descripcion_tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `descripcion_usuarios`
--
ALTER TABLE `descripcion_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escenarios`
--
ALTER TABLE `escenarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fases`
--
ALTER TABLE `fases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jurados`
--
ALTER TABLE `jurados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `perfils_usuarios`
--
ALTER TABLE `perfils_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `planillas`
--
ALTER TABLE `planillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `principal_mensajes`
--
ALTER TABLE `principal_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `principal_planillas`
--
ALTER TABLE `principal_planillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_autors`
--
ALTER TABLE `tipo_autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_jurados`
--
ALTER TABLE `tipo_jurados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_mensajes`
--
ALTER TABLE `tipo_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tipo_planillas`
--
ALTER TABLE `tipo_planillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipo_programas`
--
ALTER TABLE `tipo_programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
