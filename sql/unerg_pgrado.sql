-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2016 at 07:45 AM
-- Server version: 5.6.31-0ubuntu0.15.10.1
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

--
-- Dumping data for table `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `tamano`, `tipo`, `ruta`, `proyecto_id`, `usuario_id`, `created`) VALUES
(1, 'preview-unerg.png', '99505', 'image/png', '/var/www/html/pGrado-testing-v0.3/app/files/proyectos/6//preview-unerg.png', 6, 5, '2016-07-24 16:57:10');

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
  `usuario_id` int(11) NOT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asuntos`
--

INSERT INTO `asuntos` (`id`, `meta_id`, `proyecto_id`, `num_secuencia`, `descripcion`, `cerrado`, `usuario_id`, `responsable_id`, `created`, `updated`) VALUES
(1, 12, 6, 1, 'qwdqwdqwdwq', 0, 5, 1, '2016-07-24 16:58:03', '2016-07-24 16:58:03'),
(2, 11, 8, 1, 'wdqwdqwdqwd', 0, 1, 1, '2016-07-24 21:42:19', '2016-07-24 21:42:19'),
(3, 12, 6, 2, 'Firmar carta de aceptacion', 0, 1, 3, '2016-07-24 21:52:47', '2016-07-24 21:52:47');

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

--
-- Dumping data for table `autors`
--

INSERT INTO `autors` (`id`, `proyecto_id`, `usuario_id`, `tipo_autor_id`, `created`, `updated`, `activo`) VALUES
(54, 6, 3, 1, '2016-07-23 10:56:12', '2016-07-23 10:56:12', 1),
(62, 8, 1, 1, '2016-07-24 10:59:49', '2016-07-24 10:59:49', 1),
(69, 6, 1, 2, '2016-07-24 21:52:58', '2016-07-24 21:53:08', 1);

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

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `programa_id`, `parent_id`, `nombre`, `descripcion`, `lft`, `rght`, `activo`) VALUES
(1, 1, NULL, 'Aplicaciones Web para Internet e Intranet', '', 1, 2, 1),
(2, 1, NULL, 'Redes', '', 3, 4, 1),
(3, 1, NULL, 'Inligencia Artificial', '', 5, 6, 1),
(4, 1, NULL, 'Sistemas de Información', '', 7, 8, 1),
(5, 1, NULL, 'Software Educativo', '', 9, 10, 1);

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

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario_id`, `texto`, `created`, `updated`, `proyecto_id`, `eliminado`) VALUES
(1, 5, ' qwdqwdqwdwq', '2016-07-24 16:57:29', '2016-07-24 16:57:29', 6, 0),
(2, 5, ' dqwdqwdqw', '2016-07-24 17:13:06', '2016-07-24 17:13:06', 6, 0);

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
(1, 'asignacion_jurados.firma.nombre', 'Dr. Jackson Garcia', 'impresion'),
(2, 'asignacion_jurados.firma.cargo', 'Decano del Area de Ingeniería de Sistemas', 'impresion');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `descargas`
--

INSERT INTO `descargas` (`id`, `nombre`, `descripcion`, `etiqueta`, `archivo`, `tipo`, `created`, `updated`, `usuario_id`, `active`) VALUES
(1, 'Formato de Informe', 'explicacion de informe ', 'Formatos de Impresión', 'Comenzar.pdf', 'application/pdf', '2016-07-19 15:54:41', '2016-07-21 12:53:47', 1, 1);

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

--
-- Dumping data for table `descripcion_tutors`
--

INSERT INTO `descripcion_tutors` (`id`, `usuario_id`, `pos_inst`, `escalafon`, `dedicacion`, `publico`, `updated`) VALUES
(1, 1, '1', '3', '4', NULL, '2016-07-22 16:11:04'),
(2, 5, '1', '1', '2', NULL, '2016-07-24 16:40:34');

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

--
-- Dumping data for table `descripcion_usuarios`
--

INSERT INTO `descripcion_usuarios` (`id`, `usuario_id`, `telf_cel`, `telf_trab`, `telf_hab`, `direccion`, `titulo_obtenido`, `profesion`, `inst_labora`, `nivel_academico`, `resumen_curricular`, `updated`) VALUES
(1, 3, '(2312)312-3123', NULL, '(1231)231-2312', '123123', NULL, NULL, NULL, NULL, NULL, '2016-07-19 19:21:16'),
(2, 4, '(1231)231-2312', NULL, '(1231)231-2312', '123123', NULL, NULL, NULL, NULL, NULL, '2016-07-22 12:31:29'),
(3, 1, '(1231)231-2312', NULL, '(1231)231-2312', '113123', NULL, NULL, NULL, NULL, NULL, '2016-07-22 16:11:04'),
(4, 5, '(0231)231-2312', NULL, '(0123)123-1231', '131', NULL, NULL, NULL, NULL, NULL, '2016-07-24 16:40:34');

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

--
-- Dumping data for table `escenarios`
--

INSERT INTO `escenarios` (`id`, `proyecto_id`, `nombre`, `direccion`, `cedula`, `persona`, `telefono`, `carta_aceptacion`, `carta_implementacion`, `updated`) VALUES
(6, 6, '234234 dqwdqwd', '234234', '23412312', '23423', '(0234)-2342342', 1, 0, '2016-07-24 19:52:40'),
(8, 8, '', '', '', '', '', 0, 0, '2016-07-24 10:59:50');

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
(1, 'Propuesta', 'propuesta', 1, 0),
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
(1, 'Cohorte 2015-1', 1, 1, '{"fases":{"5":{"no_consj_area":"2","fecha_consj_area":"2016-07-07","fecha_comun":"2016-07-30"}}}');

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

--
-- Dumping data for table `jurados`
--

INSERT INTO `jurados` (`id`, `tipo_jurado_id`, `usuario_id`, `proyecto_id`, `fase_id`) VALUES
(1, 1, 1, 8, 5),
(2, 2, 1, 8, 5),
(4, 3, 1, 8, 5),
(5, 2, 5, 6, 5),
(6, 2, 1, 6, 5);

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
(1, 1, 1, 1, '2016-07-19 15:08:43', 'code:Programa.created.add;'),
(2, 1, 1, 1, '2016-07-19 15:47:47', 'code:Categoria.created.add;'),
(3, 1, 1, 2, '2016-07-19 15:47:59', 'code:Categoria.created.add;'),
(4, 1, 1, 3, '2016-07-19 15:48:15', 'code:Categoria.created.add;'),
(5, 1, 1, 3, '2016-07-19 15:48:22', 'code:Categoria.updated.edit;'),
(6, 1, 1, 4, '2016-07-19 15:48:35', 'code:Categoria.created.add;'),
(7, 1, 1, 5, '2016-07-19 15:49:07', 'code:Categoria.created.add;'),
(8, 1, 10, 1, '2016-07-19 15:49:49', NULL),
(9, 1, 11, 1, '2016-07-19 15:49:50', NULL),
(10, 1, 11, 2, '2016-07-19 15:49:50', NULL),
(11, 1, 12, 1, '2016-07-19 15:49:50', NULL),
(12, 1, 13, 1, '2016-07-19 15:49:50', NULL),
(13, 1, 1, 1, '2016-07-19 15:49:50', 'code:Meta.created.add;'),
(14, 1, 1, 1, '2016-07-19 15:50:43', 'code:Proyecto.updated.proyectos_edit;'),
(15, 1, 1, 1, '2016-07-19 15:54:41', 'code:Descarga.created.add;'),
(16, 1, 1, 1, '2016-07-19 15:54:58', 'code:Descarga.updated.edit;'),
(17, 1, 1, 1, '2016-07-19 15:55:05', 'code:Descarga.updated.edit;'),
(18, 1, 1, 1, '2016-07-19 15:55:36', 'code:Descarga.updated.edit;'),
(19, 1, 1, 1, '2016-07-19 15:56:11', 'code:Descarga.updated.edit;'),
(20, 1, 1, 1, '2016-07-19 15:56:26', 'code:Descarga.updated.edit;'),
(21, 1, 1, 1, '2016-07-19 15:56:32', 'code:Descarga.updated.edit;'),
(22, 1, 1, 1, '2016-07-19 15:56:36', 'code:Descarga.updated.edit;'),
(23, 1, 1, 1, '2016-07-19 15:56:41', 'code:Descarga.updated.edit;'),
(24, 1, 1, 1, '2016-07-19 15:56:47', 'code:Descarga.updated.edit;'),
(25, 1, 1, 1, '2016-07-19 15:56:52', 'code:Descarga.updated.edit;'),
(26, 1, 1, 1, '2016-07-19 15:56:57', 'code:Descarga.updated.edit;'),
(27, 1, 1, 1, '2016-07-19 15:59:38', 'code:Archivo.created.add;'),
(28, 1, 1, 2, '2016-07-19 15:59:57', 'code:Archivo.created.add;'),
(29, 1, 1, 2, '2016-07-19 16:00:01', 'code:Archivo.delete;'),
(30, 1, 1, 1, '2016-07-19 16:00:05', 'code:Archivo.delete;'),
(31, 1, 1, 3, '2016-07-19 16:00:21', 'code:Archivo.created.add;'),
(32, 1, 1, 3, '2016-07-19 16:00:24', 'code:Archivo.delete;'),
(33, 1, 1, 1, '2016-07-19 16:01:04', 'code:Escenario.updated.escenario_edit;'),
(34, 1, 1, 1, '2016-07-19 16:01:14', 'code:Escenario.updated.escenario_edit;'),
(35, 1, 3, NULL, '2016-07-19 18:49:11', NULL),
(36, NULL, 8, 3, '2016-07-19 19:20:49', NULL),
(37, 3, 3, NULL, '2016-07-19 19:20:56', NULL),
(38, 3, 5, 3, '2016-07-19 19:21:16', NULL),
(39, 3, 7, 1, '2016-07-19 19:21:16', NULL),
(40, 3, 10, 2, '2016-07-19 19:22:34', NULL),
(41, 3, 11, 3, '2016-07-19 19:22:34', NULL),
(42, 3, 12, 2, '2016-07-19 19:22:34', NULL),
(43, 3, 13, 2, '2016-07-19 19:22:34', NULL),
(44, 3, 1, 2, '2016-07-19 19:22:35', 'code:Meta.created.add;'),
(45, 1, 3, NULL, '2016-07-19 20:06:19', NULL),
(46, 1, 3, NULL, '2016-07-20 07:46:08', NULL),
(47, 1, 3, NULL, '2016-07-20 13:20:18', NULL),
(48, 1, 1, 1, '2016-07-20 13:33:51', 'code:Asunto.created.add;'),
(49, 1, 1, 1, '2016-07-20 13:33:51', 'code:Meta.updated.add;'),
(50, 1, 1, 2, '2016-07-20 13:34:10', 'code:Asunto.created.add;'),
(51, 1, 1, 1, '2016-07-20 13:34:10', 'code:Meta.updated.add;'),
(52, 1, 1, 3, '2016-07-20 13:35:14', 'code:Asunto.created.add;'),
(53, 1, 1, 1, '2016-07-20 13:35:14', 'code:Meta.updated.add;'),
(54, 1, 1, 3, '2016-07-20 13:36:04', 'code:Meta.created.add;'),
(55, 1, 1, 3, '2016-07-20 13:36:04', 'code:Meta.updated.add;'),
(56, 1, 1, 1, '2016-07-20 13:36:04', 'code:Meta.updated.add;'),
(57, 1, 1, 1, '2016-07-20 13:37:18', 'code:Meta.updated.edit;'),
(58, 1, 1, 3, '2016-07-20 13:37:19', 'code:Meta.updated.edit;'),
(59, 1, 1, 1, '2016-07-20 13:37:19', 'code:Meta.updated.edit;'),
(60, 1, 1, 3, '2016-07-20 13:39:20', 'code:Asunto.updated.edit;'),
(61, 1, 1, 3, '2016-07-20 13:39:20', 'code:Meta.updated.edit;'),
(62, 1, 1, 1, '2016-07-20 13:39:20', 'code:Meta.updated.edit;'),
(63, 1, 1, 3, '2016-07-20 13:39:52', 'code:Asunto.updated.edit;'),
(64, 1, 1, 3, '2016-07-20 13:39:52', 'code:Meta.updated.edit;'),
(65, 1, 1, 1, '2016-07-20 13:39:52', 'code:Meta.updated.edit;'),
(66, 1, 1, 3, '2016-07-20 13:40:10', 'code:Asunto.updated.edit;'),
(67, 1, 1, 3, '2016-07-20 13:40:10', 'code:Meta.updated.edit;'),
(68, 1, 1, 1, '2016-07-20 13:40:10', 'code:Meta.updated.edit;'),
(69, 1, 1, 3, '2016-07-20 13:40:17', 'code:Asunto.updated.edit;'),
(70, 1, 1, 3, '2016-07-20 13:40:17', 'code:Meta.updated.edit;'),
(71, 1, 1, 1, '2016-07-20 13:40:17', 'code:Meta.updated.edit;'),
(72, 1, 1, 3, '2016-07-20 13:41:11', 'code:Asunto.updated.edit;'),
(73, 1, 1, 3, '2016-07-20 13:41:11', 'code:Meta.updated.edit;'),
(74, 1, 1, 1, '2016-07-20 13:41:11', 'code:Meta.updated.edit;'),
(75, 1, 1, 3, '2016-07-20 13:41:45', 'code:Asunto.updated.edit;'),
(76, 1, 1, 3, '2016-07-20 13:41:45', 'code:Meta.updated.edit;'),
(77, 1, 1, 1, '2016-07-20 13:41:45', 'code:Meta.updated.edit;'),
(78, 1, 1, 3, '2016-07-20 13:41:52', 'code:Asunto.updated.edit;'),
(79, 1, 1, 3, '2016-07-20 13:41:53', 'code:Meta.updated.edit;'),
(80, 1, 1, 1, '2016-07-20 13:41:53', 'code:Meta.updated.edit;'),
(81, 1, 1, 3, '2016-07-20 13:42:12', 'code:Asunto.updated.edit;'),
(82, 1, 1, 3, '2016-07-20 13:42:13', 'code:Meta.updated.edit;'),
(83, 1, 1, 1, '2016-07-20 13:42:13', 'code:Meta.updated.edit;'),
(84, 1, 1, 3, '2016-07-20 13:42:42', 'code:Asunto.updated.edit;'),
(85, 1, 1, 3, '2016-07-20 13:42:43', 'code:Meta.updated.edit;'),
(86, 1, 1, 1, '2016-07-20 13:42:43', 'code:Meta.updated.edit;'),
(87, 1, 1, 3, '2016-07-20 13:43:25', 'code:Asunto.updated.edit;'),
(88, 1, 1, 3, '2016-07-20 13:43:26', 'code:Meta.updated.edit;'),
(89, 1, 1, 1, '2016-07-20 13:43:26', 'code:Meta.updated.edit;'),
(90, 1, 1, 3, '2016-07-20 13:43:53', 'code:Asunto.updated.edit;'),
(91, 1, 1, 3, '2016-07-20 13:43:53', 'code:Meta.updated.edit;'),
(92, 1, 1, 1, '2016-07-20 13:43:53', 'code:Meta.updated.edit;'),
(93, 1, 1, 3, '2016-07-20 13:44:17', 'code:Asunto.updated.edit;'),
(94, 1, 1, 3, '2016-07-20 13:44:17', 'code:Meta.updated.edit;'),
(95, 1, 1, 1, '2016-07-20 13:44:17', 'code:Meta.updated.edit;'),
(96, 1, 1, 3, '2016-07-20 13:45:53', 'code:Asunto.updated.edit;'),
(97, 1, 1, 3, '2016-07-20 13:45:53', 'code:Meta.updated.edit;'),
(98, 1, 1, 1, '2016-07-20 13:45:53', 'code:Meta.updated.edit;'),
(99, 1, 1, 3, '2016-07-20 13:46:12', 'code:Asunto.updated.edit;'),
(100, 1, 1, 3, '2016-07-20 13:46:12', 'code:Meta.updated.edit;'),
(101, 1, 1, 1, '2016-07-20 13:46:12', 'code:Meta.updated.edit;'),
(102, 1, 1, 3, '2016-07-20 13:46:18', 'code:Asunto.updated.edit;'),
(103, 1, 1, 3, '2016-07-20 13:46:18', 'code:Meta.updated.edit;'),
(104, 1, 1, 1, '2016-07-20 13:46:18', 'code:Meta.updated.edit;'),
(105, 1, 1, 3, '2016-07-20 13:46:23', 'code:Asunto.updated.edit;'),
(106, 1, 1, 3, '2016-07-20 13:46:23', 'code:Meta.updated.edit;'),
(107, 1, 1, 1, '2016-07-20 13:46:23', 'code:Meta.updated.edit;'),
(108, 1, 1, 3, '2016-07-20 13:46:40', 'code:Asunto.updated.edit;'),
(109, 1, 1, 3, '2016-07-20 13:46:40', 'code:Meta.updated.edit;'),
(110, 1, 1, 1, '2016-07-20 13:46:40', 'code:Meta.updated.edit;'),
(111, 1, 1, 3, '2016-07-20 13:47:36', 'code:Asunto.updated.edit;'),
(112, 1, 1, 3, '2016-07-20 13:47:36', 'code:Meta.updated.edit;'),
(113, 1, 1, 1, '2016-07-20 13:47:36', 'code:Meta.updated.edit;'),
(114, 1, 1, 3, '2016-07-20 13:47:48', 'code:Asunto.updated.edit;'),
(115, 1, 1, 3, '2016-07-20 13:47:49', 'code:Meta.updated.edit;'),
(116, 1, 1, 1, '2016-07-20 13:47:49', 'code:Meta.updated.edit;'),
(117, 1, 1, 3, '2016-07-20 13:48:19', 'code:Asunto.updated.edit;'),
(118, 1, 1, 3, '2016-07-20 13:48:19', 'code:Meta.updated.edit;'),
(119, 1, 1, 1, '2016-07-20 13:48:19', 'code:Meta.updated.edit;'),
(120, 1, 1, 3, '2016-07-20 13:51:15', 'code:Asunto.updated.edit;'),
(121, 1, 1, 3, '2016-07-20 13:51:15', 'code:Meta.updated.edit;'),
(122, 1, 1, 1, '2016-07-20 13:51:15', 'code:Meta.updated.edit;'),
(123, 1, 1, 3, '2016-07-20 13:51:22', 'code:Asunto.updated.edit;'),
(124, 1, 1, 3, '2016-07-20 13:51:22', 'code:Meta.updated.edit;'),
(125, 1, 1, 1, '2016-07-20 13:51:22', 'code:Meta.updated.edit;'),
(126, 1, 1, 3, '2016-07-20 13:51:45', 'code:Asunto.updated.edit;'),
(127, 1, 1, 3, '2016-07-20 13:51:45', 'code:Meta.updated.edit;'),
(128, 1, 1, 1, '2016-07-20 13:51:45', 'code:Meta.updated.edit;'),
(129, 1, 1, 4, '2016-07-20 14:04:18', 'code:Asunto.created.add;'),
(130, 1, 1, 3, '2016-07-20 14:04:19', 'code:Meta.updated.add;'),
(131, 1, 1, 1, '2016-07-20 14:04:19', 'code:Meta.updated.add;'),
(132, 1, 1, 2, '2016-07-20 14:04:24', 'code:Asunto.updated.edit;'),
(133, 1, 1, 3, '2016-07-20 14:04:24', 'code:Meta.updated.edit;'),
(134, 1, 1, 1, '2016-07-20 14:04:24', 'code:Meta.updated.edit;'),
(135, 1, 1, 5, '2016-07-20 14:05:35', 'code:Asunto.created.add;'),
(136, 1, 1, 2, '2016-07-20 14:05:36', 'code:Meta.updated.add;'),
(137, 1, 1, 6, '2016-07-20 14:06:30', 'code:Asunto.created.add;'),
(138, 1, 1, 2, '2016-07-20 14:06:30', 'code:Meta.updated.add;'),
(139, 1, 1, 6, '2016-07-20 14:06:35', 'code:Asunto.updated.edit;'),
(140, 1, 1, 2, '2016-07-20 14:06:35', 'code:Meta.updated.edit;'),
(141, 1, 1, 6, '2016-07-20 14:06:41', 'code:Asunto.updated.edit;'),
(142, 1, 1, 2, '2016-07-20 14:06:41', 'code:Meta.updated.edit;'),
(143, 1, 1, 6, '2016-07-20 14:06:46', 'code:Asunto.updated.change;'),
(144, 1, 1, 2, '2016-07-20 14:06:46', 'code:Meta.updated.change;'),
(145, 1, 1, 4, '2016-07-20 14:08:16', 'code:Meta.created.add;'),
(146, 1, 1, 4, '2016-07-20 14:08:16', 'code:Meta.updated.add;'),
(147, 1, 1, 2, '2016-07-20 14:08:16', 'code:Meta.updated.add;'),
(148, 1, 1, 2, '2016-07-20 14:08:36', 'code:Meta.updated.edit;'),
(149, 1, 1, 4, '2016-07-20 14:08:36', 'code:Meta.updated.edit;'),
(150, 1, 1, 2, '2016-07-20 14:08:36', 'code:Meta.updated.edit;'),
(151, 1, 1, 4, '2016-07-20 14:08:43', 'code:Meta.updated.edit;'),
(152, 1, 1, 4, '2016-07-20 14:08:43', 'code:Meta.updated.edit;'),
(153, 1, 1, 2, '2016-07-20 14:08:43', 'code:Meta.updated.edit;'),
(154, 1, 1, 2, '2016-07-20 14:08:55', 'code:Meta.updated.change;'),
(155, 1, 1, 4, '2016-07-20 14:08:55', 'code:Meta.updated.change;'),
(156, 1, 1, 2, '2016-07-20 14:08:55', 'code:Meta.updated.change;'),
(157, 1, 1, 1, '2016-07-20 14:09:38', 'code:Comentario.created.add;'),
(158, 1, 1, 1, '2016-07-20 14:11:12', 'code:Comentario.updated.edit;'),
(159, 1, 1, 1, '2016-07-20 14:11:21', 'code:Comentario.updated.delete;'),
(160, 1, 1, 2, '2016-07-20 14:19:19', 'code:Comentario.created.add;'),
(161, 1, 1, 2, '2016-07-20 14:19:24', 'code:Comentario.updated.edit;'),
(162, 3, 3, NULL, '2016-07-20 14:19:50', NULL),
(163, 1, 1, 7, '2016-07-20 14:26:35', 'code:Asunto.created.add;'),
(164, 1, 1, 4, '2016-07-20 14:26:35', 'code:Meta.updated.add;'),
(165, 1, 1, 2, '2016-07-20 14:26:35', 'code:Meta.updated.add;'),
(166, 1, 1, 7, '2016-07-20 14:27:56', 'code:Asunto.updated.edit;'),
(167, 1, 1, 4, '2016-07-20 14:27:56', 'code:Meta.updated.edit;'),
(168, 1, 1, 2, '2016-07-20 14:27:56', 'code:Meta.updated.edit;'),
(169, 1, 1, 7, '2016-07-20 14:28:10', 'code:Asunto.updated.edit;'),
(170, 1, 1, 4, '2016-07-20 14:28:11', 'code:Meta.updated.edit;'),
(171, 1, 1, 2, '2016-07-20 14:28:11', 'code:Meta.updated.edit;'),
(172, 3, 1, 7, '2016-07-20 14:28:33', 'code:Asunto.updated.change;'),
(173, 3, 1, 4, '2016-07-20 14:28:34', 'code:Meta.updated.change;'),
(174, 3, 1, 2, '2016-07-20 14:28:34', 'code:Meta.updated.change;'),
(175, 3, 1, 4, '2016-07-20 14:30:55', 'code:Meta.updated.edit;'),
(176, 3, 1, 4, '2016-07-20 14:30:55', 'code:Meta.updated.edit;'),
(177, 3, 1, 2, '2016-07-20 14:30:55', 'code:Meta.updated.edit;'),
(178, 1, 1, 4, '2016-07-20 14:31:06', 'code:Meta.updated.edit;'),
(179, 1, 1, 4, '2016-07-20 14:31:06', 'code:Meta.updated.edit;'),
(180, 1, 1, 2, '2016-07-20 14:31:06', 'code:Meta.updated.edit;'),
(181, 1, 1, 3, '2016-07-20 14:31:54', 'code:Comentario.created.add;'),
(182, 3, 1, 4, '2016-07-20 14:31:58', 'code:Comentario.created.add;'),
(183, 3, 1, 4, '2016-07-20 14:32:21', 'code:Comentario.updated.edit;'),
(184, 3, 1, 4, '2016-07-20 14:38:53', 'code:Comentario.updated.edit;'),
(185, 3, 1, 5, '2016-07-20 14:53:32', 'code:Comentario.created.add;'),
(186, 3, 1, 6, '2016-07-20 14:55:44', 'code:Comentario.created.add;'),
(187, 3, 1, 6, '2016-07-20 14:56:31', 'code:Comentario.updated.edit;'),
(188, 1, 1, 7, '2016-07-20 14:58:31', 'code:Comentario.created.add;'),
(189, 1, 1, 7, '2016-07-20 14:58:37', 'code:Comentario.updated.delete;'),
(190, 1, 1, 5, '2016-07-20 15:59:44', 'code:Asunto.updated.edit;'),
(191, 1, 1, 4, '2016-07-20 15:59:44', 'code:Meta.updated.edit;'),
(192, 1, 1, 2, '2016-07-20 15:59:44', 'code:Meta.updated.edit;'),
(193, 1, 1, 8, '2016-07-20 15:59:49', 'code:Asunto.created.add;'),
(194, 1, 1, 4, '2016-07-20 15:59:49', 'code:Meta.updated.add;'),
(195, 1, 1, 2, '2016-07-20 15:59:49', 'code:Meta.updated.add;'),
(196, 1, 1, 5, '2016-07-20 15:59:53', 'code:Asunto.updated.change;'),
(197, 1, 1, 4, '2016-07-20 15:59:53', 'code:Meta.updated.change;'),
(198, 1, 1, 2, '2016-07-20 15:59:53', 'code:Meta.updated.change;'),
(199, 1, 1, 8, '2016-07-20 16:00:00', 'code:Asunto.updated.change;'),
(200, 1, 1, 4, '2016-07-20 16:00:00', 'code:Meta.updated.change;'),
(201, 1, 1, 2, '2016-07-20 16:00:00', 'code:Meta.updated.change;'),
(202, 1, 1, 9, '2016-07-20 16:00:16', 'code:Asunto.created.add;'),
(203, 1, 1, 4, '2016-07-20 16:00:16', 'code:Meta.updated.add;'),
(204, 1, 1, 2, '2016-07-20 16:00:16', 'code:Meta.updated.add;'),
(205, 1, 1, 5, '2016-07-20 16:00:57', 'code:Meta.created.add;'),
(206, 1, 1, 5, '2016-07-20 16:00:57', 'code:Meta.updated.add;'),
(207, 1, 1, 4, '2016-07-20 16:00:57', 'code:Meta.updated.add;'),
(208, 1, 1, 2, '2016-07-20 16:00:57', 'code:Meta.updated.add;'),
(209, 1, 1, 2, '2016-07-20 16:01:03', 'code:Meta.updated.change;'),
(210, 1, 1, 5, '2016-07-20 16:01:03', 'code:Meta.updated.change;'),
(211, 1, 1, 4, '2016-07-20 16:01:03', 'code:Meta.updated.change;'),
(212, 1, 1, 2, '2016-07-20 16:01:03', 'code:Meta.updated.change;'),
(213, 1, 1, 2, '2016-07-20 16:01:30', 'code:Meta.updated.edit;'),
(214, 1, 1, 5, '2016-07-20 16:01:30', 'code:Meta.updated.edit;'),
(215, 1, 1, 4, '2016-07-20 16:01:30', 'code:Meta.updated.edit;'),
(216, 1, 1, 2, '2016-07-20 16:01:30', 'code:Meta.updated.edit;'),
(217, 1, 1, 2, '2016-07-20 16:01:39', 'code:Meta.updated.change;'),
(218, 1, 1, 5, '2016-07-20 16:01:39', 'code:Meta.updated.change;'),
(219, 1, 1, 4, '2016-07-20 16:01:39', 'code:Meta.updated.change;'),
(220, 1, 1, 2, '2016-07-20 16:01:39', 'code:Meta.updated.change;'),
(221, 1, 1, 2, '2016-07-20 16:01:50', 'code:Meta.updated.change;'),
(222, 1, 1, 5, '2016-07-20 16:01:50', 'code:Meta.updated.change;'),
(223, 1, 1, 4, '2016-07-20 16:01:50', 'code:Meta.updated.change;'),
(224, 1, 1, 2, '2016-07-20 16:01:50', 'code:Meta.updated.change;'),
(225, 1, 1, 1, '2016-07-20 16:01:58', 'code:Archivo.created.add;'),
(226, 1, 1, 1, '2016-07-20 16:02:06', 'code:Archivo.delete;'),
(227, 3, 3, NULL, '2016-07-20 16:03:58', NULL),
(228, 3, 3, NULL, '2016-07-20 17:23:04', NULL),
(229, 1, 3, NULL, '2016-07-20 17:56:57', NULL),
(230, 3, 3, NULL, '2016-07-20 17:57:31', NULL),
(231, 3, 3, NULL, '2016-07-20 17:58:06', NULL),
(232, 1, 3, NULL, '2016-07-20 17:58:26', NULL),
(233, 3, 3, NULL, '2016-07-20 17:58:58', NULL),
(234, 1, 3, NULL, '2016-07-20 18:00:24', NULL),
(235, 3, 3, NULL, '2016-07-20 18:00:50', NULL),
(236, 3, 3, NULL, '2016-07-20 18:04:40', NULL),
(237, 3, 3, NULL, '2016-07-20 18:06:19', NULL),
(238, 3, 3, NULL, '2016-07-20 18:10:03', NULL),
(239, 1, 3, NULL, '2016-07-20 18:10:53', NULL),
(240, 3, 3, NULL, '2016-07-20 18:11:28', NULL),
(241, 3, 1, 6, '2016-07-20 18:14:14', 'code:Meta.created.add;'),
(242, 3, 1, 5, '2016-07-20 18:14:17', 'code:Meta.updated.add;'),
(243, 3, 1, 4, '2016-07-20 18:14:17', 'code:Meta.updated.add;'),
(244, 3, 1, 2, '2016-07-20 18:14:17', 'code:Meta.updated.add;'),
(245, 3, 1, 6, '2016-07-20 18:14:17', 'code:Meta.updated.add;'),
(246, 3, 1, 6, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(247, 3, 1, 5, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(248, 3, 1, 4, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(249, 3, 1, 2, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(250, 3, 1, 6, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(251, 3, 1, 6, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(252, 3, 1, 5, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(253, 3, 1, 4, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(254, 3, 1, 2, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(255, 3, 1, 6, '2016-07-20 18:14:27', 'code:Meta.updated.edit;'),
(256, 3, 1, 6, '2016-07-20 18:14:28', 'code:Meta.updated.edit;'),
(257, 3, 1, 5, '2016-07-20 18:14:28', 'code:Meta.updated.edit;'),
(258, 3, 1, 4, '2016-07-20 18:14:28', 'code:Meta.updated.edit;'),
(259, 3, 1, 2, '2016-07-20 18:14:28', 'code:Meta.updated.edit;'),
(260, 3, 1, 6, '2016-07-20 18:14:28', 'code:Meta.updated.edit;'),
(261, 3, 1, 7, '2016-07-20 18:14:36', 'code:Meta.created.add;'),
(262, 3, 1, 5, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(263, 3, 1, 7, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(264, 3, 1, 4, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(265, 3, 1, 2, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(266, 3, 1, 6, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(267, 3, 1, 8, '2016-07-20 18:14:36', 'code:Meta.created.add;'),
(268, 3, 1, 5, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(269, 3, 1, 7, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(270, 3, 1, 8, '2016-07-20 18:14:36', 'code:Meta.updated.add;'),
(271, 3, 1, 4, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(272, 3, 1, 2, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(273, 3, 1, 6, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(274, 3, 1, 9, '2016-07-20 18:14:37', 'code:Meta.created.add;'),
(275, 3, 1, 5, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(276, 3, 1, 7, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(277, 3, 1, 8, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(278, 3, 1, 9, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(279, 3, 1, 4, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(280, 3, 1, 2, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(281, 3, 1, 6, '2016-07-20 18:14:37', 'code:Meta.updated.add;'),
(282, 3, 3, NULL, '2016-07-20 18:21:42', NULL),
(283, 3, 1, 10, '2016-07-20 18:21:53', 'code:Asunto.created.add;'),
(284, 3, 1, 5, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(285, 3, 1, 7, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(286, 3, 1, 8, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(287, 3, 1, 9, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(288, 3, 1, 4, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(289, 3, 1, 2, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(290, 3, 1, 6, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(291, 3, 1, 11, '2016-07-20 18:21:53', 'code:Asunto.created.add;'),
(292, 3, 1, 5, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(293, 3, 1, 7, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(294, 3, 1, 8, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(295, 3, 1, 9, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(296, 3, 1, 4, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(297, 3, 1, 2, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(298, 3, 1, 6, '2016-07-20 18:21:53', 'code:Meta.updated.add;'),
(299, 3, 1, 12, '2016-07-20 18:21:54', 'code:Asunto.created.add;'),
(300, 3, 1, 5, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(301, 3, 1, 7, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(302, 3, 1, 8, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(303, 3, 1, 9, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(304, 3, 1, 4, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(305, 3, 1, 2, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(306, 3, 1, 6, '2016-07-20 18:21:54', 'code:Meta.updated.add;'),
(307, 3, 1, 13, '2016-07-20 18:22:52', 'code:Asunto.created.add;'),
(308, 3, 1, 5, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(309, 3, 1, 7, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(310, 3, 1, 8, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(311, 3, 1, 9, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(312, 3, 1, 4, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(313, 3, 1, 2, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(314, 3, 1, 6, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(315, 3, 1, 14, '2016-07-20 18:22:52', 'code:Asunto.created.add;'),
(316, 3, 1, 5, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(317, 3, 1, 7, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(318, 3, 1, 8, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(319, 3, 1, 9, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(320, 3, 1, 4, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(321, 3, 1, 2, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(322, 3, 1, 6, '2016-07-20 18:22:52', 'code:Meta.updated.add;'),
(323, 3, 1, 15, '2016-07-20 18:22:52', 'code:Asunto.created.add;'),
(324, 3, 1, 5, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(325, 3, 1, 7, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(326, 3, 1, 8, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(327, 3, 1, 9, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(328, 3, 1, 4, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(329, 3, 1, 2, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(330, 3, 1, 6, '2016-07-20 18:22:53', 'code:Meta.updated.add;'),
(331, 3, 1, 16, '2016-07-20 18:23:59', 'code:Asunto.created.add;'),
(332, 3, 1, 5, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(333, 3, 1, 7, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(334, 3, 1, 8, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(335, 3, 1, 9, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(336, 3, 1, 4, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(337, 3, 1, 2, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(338, 3, 1, 6, '2016-07-20 18:23:59', 'code:Meta.updated.add;'),
(339, 3, 1, 17, '2016-07-20 18:24:05', 'code:Asunto.created.add;'),
(340, 3, 1, 5, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(341, 3, 1, 7, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(342, 3, 1, 8, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(343, 3, 1, 9, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(344, 3, 1, 4, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(345, 3, 1, 2, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(346, 3, 1, 6, '2016-07-20 18:24:05', 'code:Meta.updated.add;'),
(347, 3, 1, 18, '2016-07-20 18:43:27', 'code:Asunto.created.add;'),
(348, 3, 1, 5, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(349, 3, 1, 7, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(350, 3, 1, 8, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(351, 3, 1, 9, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(352, 3, 1, 4, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(353, 3, 1, 2, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(354, 3, 1, 6, '2016-07-20 18:43:27', 'code:Meta.updated.add;'),
(355, 3, 1, 19, '2016-07-20 18:43:31', 'code:Asunto.created.add;'),
(356, 3, 1, 5, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(357, 3, 1, 7, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(358, 3, 1, 8, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(359, 3, 1, 9, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(360, 3, 1, 4, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(361, 3, 1, 2, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(362, 3, 1, 6, '2016-07-20 18:43:31', 'code:Meta.updated.add;'),
(363, 3, 1, 20, '2016-07-20 18:43:32', 'code:Asunto.created.add;'),
(364, 3, 1, 5, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(365, 3, 1, 7, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(366, 3, 1, 8, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(367, 3, 1, 9, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(368, 3, 1, 4, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(369, 3, 1, 2, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(370, 3, 1, 6, '2016-07-20 18:43:32', 'code:Meta.updated.add;'),
(371, 3, 1, 21, '2016-07-20 18:44:13', 'code:Asunto.created.add;'),
(372, 3, 1, 5, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(373, 3, 1, 7, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(374, 3, 1, 8, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(375, 3, 1, 9, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(376, 3, 1, 4, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(377, 3, 1, 2, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(378, 3, 1, 6, '2016-07-20 18:44:14', 'code:Meta.updated.add;'),
(379, 3, 1, 22, '2016-07-20 18:44:26', 'code:Asunto.created.add;'),
(380, 3, 1, 5, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(381, 3, 1, 7, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(382, 3, 1, 8, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(383, 3, 1, 9, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(384, 3, 1, 4, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(385, 3, 1, 2, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(386, 3, 1, 6, '2016-07-20 18:44:26', 'code:Meta.updated.add;'),
(387, 3, 1, 23, '2016-07-20 18:46:17', 'code:Asunto.created.add;'),
(388, 3, 1, 5, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(389, 3, 1, 7, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(390, 3, 1, 8, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(391, 3, 1, 9, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(392, 3, 1, 4, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(393, 3, 1, 2, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(394, 3, 1, 6, '2016-07-20 18:46:18', 'code:Meta.updated.add;'),
(395, 3, 1, 24, '2016-07-20 18:46:56', 'code:Asunto.created.add;'),
(396, 3, 1, 5, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(397, 3, 1, 7, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(398, 3, 1, 8, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(399, 3, 1, 9, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(400, 3, 1, 4, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(401, 3, 1, 2, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(402, 3, 1, 6, '2016-07-20 18:46:56', 'code:Meta.updated.add;'),
(403, 3, 1, 25, '2016-07-20 18:47:08', 'code:Asunto.created.add;'),
(404, 3, 1, 5, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(405, 3, 1, 7, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(406, 3, 1, 8, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(407, 3, 1, 9, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(408, 3, 1, 4, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(409, 3, 1, 2, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(410, 3, 1, 6, '2016-07-20 18:47:08', 'code:Meta.updated.add;'),
(411, 3, 1, 26, '2016-07-20 18:47:13', 'code:Asunto.created.add;'),
(412, 3, 1, 5, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(413, 3, 1, 7, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(414, 3, 1, 8, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(415, 3, 1, 9, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(416, 3, 1, 4, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(417, 3, 1, 2, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(418, 3, 1, 6, '2016-07-20 18:47:13', 'code:Meta.updated.add;'),
(419, 3, 1, 27, '2016-07-20 18:47:19', 'code:Asunto.created.add;'),
(420, 3, 1, 5, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(421, 3, 1, 7, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(422, 3, 1, 8, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(423, 3, 1, 9, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(424, 3, 1, 4, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(425, 3, 1, 2, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(426, 3, 1, 6, '2016-07-20 18:47:19', 'code:Meta.updated.add;'),
(427, 3, 1, 28, '2016-07-20 18:49:05', 'code:Asunto.created.add;'),
(428, 3, 1, 5, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(429, 3, 1, 7, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(430, 3, 1, 8, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(431, 3, 1, 9, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(432, 3, 1, 4, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(433, 3, 1, 2, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(434, 3, 1, 6, '2016-07-20 18:49:06', 'code:Meta.updated.add;'),
(435, 3, 1, 29, '2016-07-20 18:49:14', 'code:Asunto.created.add;'),
(436, 3, 1, 5, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(437, 3, 1, 7, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(438, 3, 1, 8, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(439, 3, 1, 9, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(440, 3, 1, 4, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(441, 3, 1, 2, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(442, 3, 1, 6, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(443, 3, 1, 30, '2016-07-20 18:49:14', 'code:Asunto.created.add;'),
(444, 3, 1, 5, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(445, 3, 1, 7, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(446, 3, 1, 8, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(447, 3, 1, 9, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(448, 3, 1, 4, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(449, 3, 1, 2, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(450, 3, 1, 6, '2016-07-20 18:49:14', 'code:Meta.updated.add;'),
(451, 3, 1, 31, '2016-07-20 18:49:14', 'code:Asunto.created.add;'),
(452, 3, 1, 5, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(453, 3, 1, 7, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(454, 3, 1, 8, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(455, 3, 1, 9, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(456, 3, 1, 4, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(457, 3, 1, 2, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(458, 3, 1, 6, '2016-07-20 18:49:15', 'code:Meta.updated.add;'),
(459, 3, 1, 32, '2016-07-20 18:52:57', 'code:Asunto.created.add;'),
(460, 3, 1, 5, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(461, 3, 1, 7, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(462, 3, 1, 8, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(463, 3, 1, 9, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(464, 3, 1, 4, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(465, 3, 1, 2, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(466, 3, 1, 6, '2016-07-20 18:52:57', 'code:Meta.updated.add;'),
(467, 3, 1, 33, '2016-07-20 18:53:02', 'code:Asunto.created.add;'),
(468, 3, 1, 5, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(469, 3, 1, 7, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(470, 3, 1, 8, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(471, 3, 1, 9, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(472, 3, 1, 4, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(473, 3, 1, 2, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(474, 3, 1, 6, '2016-07-20 18:53:03', 'code:Meta.updated.add;'),
(475, 3, 1, 34, '2016-07-20 18:53:10', 'code:Asunto.created.add;'),
(476, 3, 1, 5, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(477, 3, 1, 7, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(478, 3, 1, 8, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(479, 3, 1, 9, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(480, 3, 1, 4, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(481, 3, 1, 2, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(482, 3, 1, 6, '2016-07-20 18:53:10', 'code:Meta.updated.add;'),
(483, 3, 1, 35, '2016-07-20 18:57:33', 'code:Asunto.created.add;'),
(484, 3, 1, 5, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(485, 3, 1, 7, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(486, 3, 1, 8, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(487, 3, 1, 9, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(488, 3, 1, 4, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(489, 3, 1, 2, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(490, 3, 1, 6, '2016-07-20 18:57:33', 'code:Meta.updated.add;'),
(491, 3, 1, 36, '2016-07-20 18:57:55', 'code:Asunto.created.add;'),
(492, 3, 1, 5, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(493, 3, 1, 7, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(494, 3, 1, 8, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(495, 3, 1, 9, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(496, 3, 1, 4, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(497, 3, 1, 2, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(498, 3, 1, 6, '2016-07-20 18:57:55', 'code:Meta.updated.add;'),
(499, 3, 1, 37, '2016-07-20 19:00:53', 'code:Asunto.created.add;'),
(500, 3, 1, 5, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(501, 3, 1, 7, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(502, 3, 1, 8, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(503, 3, 1, 9, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(504, 3, 1, 4, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(505, 3, 1, 2, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(506, 3, 1, 6, '2016-07-20 19:00:53', 'code:Meta.updated.add;'),
(507, 3, 1, 8, '2016-07-20 19:06:42', 'code:Comentario.created.add;'),
(508, 3, 1, 9, '2016-07-20 19:06:46', 'code:Comentario.created.add;'),
(509, 3, 1, 10, '2016-07-20 19:06:52', 'code:Comentario.created.add;'),
(510, 3, 1, 11, '2016-07-20 19:06:56', 'code:Comentario.created.add;'),
(511, 3, 1, 12, '2016-07-20 19:07:03', 'code:Comentario.created.add;'),
(512, 3, 1, 2, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(513, 3, 1, 5, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(514, 3, 1, 7, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(515, 3, 1, 8, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(516, 3, 1, 9, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(517, 3, 1, 4, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(518, 3, 1, 2, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(519, 3, 1, 6, '2016-07-20 19:07:12', 'code:Meta.updated.change;'),
(520, 3, 1, 2, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(521, 3, 1, 5, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(522, 3, 1, 7, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(523, 3, 1, 8, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(524, 3, 1, 9, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(525, 3, 1, 4, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(526, 3, 1, 2, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(527, 3, 1, 6, '2016-07-20 19:07:16', 'code:Meta.updated.change;'),
(528, 3, 1, 4, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(529, 3, 1, 5, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(530, 3, 1, 7, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(531, 3, 1, 8, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(532, 3, 1, 9, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(533, 3, 1, 4, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(534, 3, 1, 2, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(535, 3, 1, 6, '2016-07-20 19:07:19', 'code:Meta.updated.change;'),
(536, 3, 1, 2, '2016-07-20 19:07:23', 'code:Meta.updated.edit;'),
(537, 3, 1, 5, '2016-07-20 19:07:23', 'code:Meta.updated.edit;'),
(538, 3, 1, 7, '2016-07-20 19:07:23', 'code:Meta.updated.edit;'),
(539, 3, 1, 8, '2016-07-20 19:07:24', 'code:Meta.updated.edit;'),
(540, 3, 1, 9, '2016-07-20 19:07:24', 'code:Meta.updated.edit;'),
(541, 3, 1, 4, '2016-07-20 19:07:24', 'code:Meta.updated.edit;'),
(542, 3, 1, 2, '2016-07-20 19:07:24', 'code:Meta.updated.edit;'),
(543, 3, 1, 6, '2016-07-20 19:07:24', 'code:Meta.updated.edit;'),
(544, 3, 1, 10, '2016-07-20 19:07:32', 'code:Meta.created.add;'),
(545, 3, 1, 5, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(546, 3, 1, 10, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(547, 3, 1, 7, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(548, 3, 1, 8, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(549, 3, 1, 9, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(550, 3, 1, 4, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(551, 3, 1, 2, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(552, 3, 1, 6, '2016-07-20 19:07:32', 'code:Meta.updated.add;'),
(553, 3, 1, 2, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(554, 3, 1, 5, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(555, 3, 1, 10, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(556, 3, 1, 7, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(557, 3, 1, 8, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(558, 3, 1, 9, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(559, 3, 1, 4, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(560, 3, 1, 2, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(561, 3, 1, 6, '2016-07-20 19:07:56', 'code:Meta.updated.change;'),
(562, 3, 1, 2, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(563, 3, 1, 5, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(564, 3, 1, 10, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(565, 3, 1, 7, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(566, 3, 1, 8, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(567, 3, 1, 9, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(568, 3, 1, 4, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(569, 3, 1, 2, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(570, 3, 1, 6, '2016-07-20 19:08:00', 'code:Meta.updated.change;'),
(571, 3, 1, 2, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(572, 3, 1, 5, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(573, 3, 1, 10, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(574, 3, 1, 7, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(575, 3, 1, 8, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(576, 3, 1, 9, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(577, 3, 1, 4, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(578, 3, 1, 2, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(579, 3, 1, 6, '2016-07-20 19:08:03', 'code:Meta.updated.change;'),
(580, 3, 1, 38, '2016-07-20 19:08:46', 'code:Asunto.created.add;'),
(581, 3, 1, 5, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(582, 3, 1, 10, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(583, 3, 1, 7, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(584, 3, 1, 8, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(585, 3, 1, 9, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(586, 3, 1, 4, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(587, 3, 1, 2, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(588, 3, 1, 6, '2016-07-20 19:08:46', 'code:Meta.updated.add;'),
(589, 3, 1, 39, '2016-07-20 19:08:56', 'code:Asunto.created.add;'),
(590, 3, 1, 5, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(591, 3, 1, 10, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(592, 3, 1, 7, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(593, 3, 1, 8, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(594, 3, 1, 9, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(595, 3, 1, 4, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(596, 3, 1, 2, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(597, 3, 1, 6, '2016-07-20 19:08:56', 'code:Meta.updated.add;'),
(598, 3, 1, 34, '2016-07-20 19:09:07', 'code:Asunto.updated.change;'),
(599, 3, 1, 5, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(600, 3, 1, 10, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(601, 3, 1, 7, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(602, 3, 1, 8, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(603, 3, 1, 9, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(604, 3, 1, 4, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(605, 3, 1, 2, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(606, 3, 1, 6, '2016-07-20 19:09:07', 'code:Meta.updated.change;'),
(607, 3, 1, 36, '2016-07-20 19:09:12', 'code:Asunto.updated.change;'),
(608, 3, 1, 5, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(609, 3, 1, 10, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(610, 3, 1, 7, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(611, 3, 1, 8, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(612, 3, 1, 9, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(613, 3, 1, 4, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(614, 3, 1, 2, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(615, 3, 1, 6, '2016-07-20 19:09:12', 'code:Meta.updated.change;'),
(616, 3, 1, 32, '2016-07-20 19:09:17', 'code:Asunto.updated.change;'),
(617, 3, 1, 5, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(618, 3, 1, 10, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(619, 3, 1, 7, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(620, 3, 1, 8, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(621, 3, 1, 9, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(622, 3, 1, 4, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(623, 3, 1, 2, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(624, 3, 1, 6, '2016-07-20 19:09:17', 'code:Meta.updated.change;'),
(625, 3, 1, 38, '2016-07-20 19:09:22', 'code:Asunto.updated.change;'),
(626, 3, 1, 5, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(627, 3, 1, 10, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(628, 3, 1, 7, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(629, 3, 1, 8, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(630, 3, 1, 9, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(631, 3, 1, 4, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(632, 3, 1, 2, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(633, 3, 1, 6, '2016-07-20 19:09:22', 'code:Meta.updated.change;'),
(634, 3, 1, 39, '2016-07-20 19:09:25', 'code:Asunto.updated.change;'),
(635, 3, 1, 5, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(636, 3, 1, 10, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(637, 3, 1, 7, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(638, 3, 1, 8, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(639, 3, 1, 9, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(640, 3, 1, 4, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(641, 3, 1, 2, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(642, 3, 1, 6, '2016-07-20 19:09:26', 'code:Meta.updated.change;'),
(643, 3, 1, 31, '2016-07-20 19:09:30', 'code:Asunto.updated.change;'),
(644, 3, 1, 5, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(645, 3, 1, 10, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(646, 3, 1, 7, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(647, 3, 1, 8, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(648, 3, 1, 9, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(649, 3, 1, 4, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(650, 3, 1, 2, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(651, 3, 1, 6, '2016-07-20 19:09:31', 'code:Meta.updated.change;'),
(652, 1, 3, NULL, '2016-07-20 22:40:57', NULL),
(653, 1, 1, 13, '2016-07-20 22:42:21', 'code:Comentario.created.add;'),
(654, 1, 1, 13, '2016-07-20 22:42:31', 'code:Comentario.updated.delete;'),
(655, 1, 3, NULL, '2016-07-21 09:38:15', NULL),
(656, 1, 3, NULL, '2016-07-21 12:44:49', NULL),
(657, 1, 1, 1, '2016-07-21 12:53:07', 'code:Descarga.updated.edit;'),
(658, 1, 1, 1, '2016-07-21 12:53:21', 'code:Descarga.updated.edit;'),
(659, 1, 1, 1, '2016-07-21 12:53:29', 'code:Descarga.updated.edit;'),
(660, 1, 1, 1, '2016-07-21 12:53:47', 'code:Descarga.updated.edit;'),
(661, 1, 3, NULL, '2016-07-21 13:04:45', NULL),
(662, 1, 1, 3, '2016-07-21 13:06:46', 'code:Asunto.updated.change;'),
(663, 1, 1, 3, '2016-07-21 13:06:46', 'code:Meta.updated.change;'),
(664, 1, 1, 1, '2016-07-21 13:06:46', 'code:Meta.updated.change;'),
(665, 1, 1, 2, '2016-07-21 13:06:49', 'code:Asunto.updated.change;'),
(666, 1, 1, 3, '2016-07-21 13:06:49', 'code:Meta.updated.change;'),
(667, 1, 1, 1, '2016-07-21 13:06:49', 'code:Meta.updated.change;'),
(668, 1, 1, 2, '2016-07-21 13:07:01', 'code:Asunto.updated.change;'),
(669, 1, 1, 3, '2016-07-21 13:07:01', 'code:Meta.updated.change;'),
(670, 1, 1, 1, '2016-07-21 13:07:01', 'code:Meta.updated.change;'),
(671, 1, 1, 40, '2016-07-21 13:07:28', 'code:Asunto.created.add;'),
(672, 1, 1, 3, '2016-07-21 13:07:28', 'code:Meta.updated.add;'),
(673, 1, 1, 1, '2016-07-21 13:07:28', 'code:Meta.updated.add;'),
(674, 1, 3, NULL, '2016-07-21 13:43:47', NULL),
(675, 1, 3, NULL, '2016-07-21 16:15:59', NULL),
(676, 1, 3, NULL, '2016-07-21 17:50:05', NULL),
(677, 1, 16, 3, '2016-07-21 18:03:44', NULL),
(678, 1, 14, 4, '2016-07-21 18:25:52', NULL),
(679, 1, 19, 4, '2016-07-21 18:26:03', NULL),
(680, 1, 14, 5, '2016-07-21 18:26:50', NULL),
(681, 1, 19, 5, '2016-07-21 18:26:56', NULL),
(682, 3, 3, NULL, '2016-07-21 20:29:54', NULL),
(683, 3, 10, 3, '2016-07-21 20:31:29', NULL),
(684, 3, 11, 6, '2016-07-21 20:31:29', NULL),
(685, 3, 12, 4, '2016-07-21 20:31:29', NULL),
(686, 3, 13, 3, '2016-07-21 20:31:29', NULL),
(687, 3, 1, 11, '2016-07-21 20:31:29', 'code:Meta.created.add;'),
(688, 3, 19, 3, '2016-07-21 20:34:59', NULL),
(689, 3, 20, 2, '2016-07-21 20:34:59', NULL),
(690, 3, 1, 1, '2016-07-21 20:34:59', 'code:Comentario.delete;'),
(691, 3, 1, 2, '2016-07-21 20:34:59', 'code:Comentario.delete;'),
(692, 3, 1, 3, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(693, 3, 1, 4, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(694, 3, 1, 5, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(695, 3, 1, 6, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(696, 3, 1, 7, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(697, 3, 1, 8, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(698, 3, 1, 9, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(699, 3, 1, 10, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(700, 3, 1, 11, '2016-07-21 20:35:00', 'code:Comentario.delete;'),
(701, 3, 1, 12, '2016-07-21 20:35:01', 'code:Comentario.delete;'),
(702, 3, 1, 2, '2016-07-21 20:35:01', 'code:Meta.delete;'),
(703, 3, 1, 6, '2016-07-21 20:35:01', 'code:Meta.delete;'),
(704, 3, 1, 5, '2016-07-21 20:35:01', 'code:Asunto.delete;'),
(705, 3, 1, 6, '2016-07-21 20:35:01', 'code:Asunto.delete;'),
(706, 3, 1, 7, '2016-07-21 20:35:01', 'code:Asunto.delete;'),
(707, 3, 1, 8, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(708, 3, 1, 9, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(709, 3, 1, 10, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(710, 3, 1, 11, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(711, 3, 1, 12, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(712, 3, 1, 13, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(713, 3, 1, 14, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(714, 3, 1, 15, '2016-07-21 20:35:02', 'code:Asunto.delete;'),
(715, 3, 1, 16, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(716, 3, 1, 17, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(717, 3, 1, 18, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(718, 3, 1, 19, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(719, 3, 1, 20, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(720, 3, 1, 21, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(721, 3, 1, 22, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(722, 3, 1, 23, '2016-07-21 20:35:03', 'code:Asunto.delete;'),
(723, 3, 1, 24, '2016-07-21 20:35:04', 'code:Asunto.delete;'),
(724, 3, 1, 25, '2016-07-21 20:35:04', 'code:Asunto.delete;'),
(725, 3, 1, 26, '2016-07-21 20:35:04', 'code:Asunto.delete;'),
(726, 3, 1, 27, '2016-07-21 20:35:04', 'code:Asunto.delete;'),
(727, 3, 1, 28, '2016-07-21 20:35:04', 'code:Asunto.delete;'),
(728, 3, 1, 29, '2016-07-21 20:35:04', 'code:Asunto.delete;'),
(729, 3, 1, 30, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(730, 3, 1, 31, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(731, 3, 1, 32, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(732, 3, 1, 33, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(733, 3, 1, 34, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(734, 3, 1, 35, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(735, 3, 1, 36, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(736, 3, 1, 37, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(737, 3, 1, 38, '2016-07-21 20:35:05', 'code:Asunto.delete;'),
(738, 3, 1, 39, '2016-07-21 20:35:06', 'code:Asunto.delete;'),
(739, 3, 21, 2, '2016-07-21 20:35:06', NULL),
(740, 3, 18, 2, '2016-07-21 20:35:06', NULL),
(741, 1, 1, 7, '2016-07-21 20:35:15', 'code:Autor.created.add_estudiante;'),
(742, 1, 19, 7, '2016-07-21 20:35:35', NULL),
(743, 1, 1, 8, '2016-07-21 20:37:02', 'code:Autor.created.add_estudiante;'),
(744, 1, 19, 8, '2016-07-21 20:37:13', NULL),
(745, 1, 1, 9, '2016-07-21 20:37:30', 'code:Autor.created.add_estudiante;'),
(746, 1, 19, 9, '2016-07-21 20:38:24', NULL),
(747, 1, 1, 10, '2016-07-21 20:38:32', 'code:Autor.created.add_estudiante;'),
(748, 1, 19, 10, '2016-07-21 20:38:39', NULL),
(749, 1, 1, 11, '2016-07-21 20:38:59', 'code:Autor.created.add_estudiante;'),
(750, 1, 19, 11, '2016-07-21 20:39:20', NULL),
(751, 1, 1, 12, '2016-07-21 20:41:49', 'code:Autor.created.add_estudiante;'),
(752, 1, 19, 12, '2016-07-21 20:47:29', NULL),
(753, 1, 1, 13, '2016-07-21 20:47:43', 'code:Autor.created.add_estudiante;'),
(754, 1, 19, 13, '2016-07-21 20:47:51', NULL),
(755, 1, 1, 14, '2016-07-21 20:48:04', 'code:Autor.created.add_estudiante;'),
(756, 1, 19, 14, '2016-07-21 20:50:03', NULL),
(757, 1, 1, 15, '2016-07-21 20:50:11', 'code:Autor.created.add_estudiante;'),
(758, 1, 19, 15, '2016-07-21 20:53:19', NULL),
(759, 1, 1, 16, '2016-07-21 20:53:34', 'code:Autor.created.add_estudiante;'),
(760, 1, 1, 1, '2016-07-21 20:54:35', 'code:Meta.updated.edit;'),
(761, 1, 1, 3, '2016-07-21 20:54:35', 'code:Meta.updated.edit;'),
(762, 1, 1, 1, '2016-07-21 20:54:35', 'code:Meta.updated.edit;'),
(763, 1, 1, 1, '2016-07-21 20:54:44', 'code:Meta.updated.edit;'),
(764, 1, 1, 3, '2016-07-21 20:54:44', 'code:Meta.updated.edit;'),
(765, 1, 1, 1, '2016-07-21 20:54:44', 'code:Meta.updated.edit;'),
(766, 1, 19, 16, '2016-07-21 21:29:58', NULL),
(767, 1, 1, 17, '2016-07-21 21:30:35', 'code:Autor.created.add_estudiante;'),
(768, 1, 19, 17, '2016-07-21 21:30:50', NULL),
(769, 1, 1, 18, '2016-07-21 21:35:08', 'code:Autor.created.add_estudiante;'),
(770, 3, 3, NULL, '2016-07-21 21:35:35', NULL),
(771, 3, 15, 18, '2016-07-21 21:35:48', NULL),
(772, 3, 19, 18, '2016-07-21 21:39:12', NULL),
(773, 1, 3, NULL, '2016-07-21 21:50:26', NULL),
(774, 1, 1, 19, '2016-07-21 21:51:31', 'code:Autor.created.add_estudiante;'),
(775, 1, 19, 1, '2016-07-21 21:51:39', NULL),
(776, 3, 15, 19, '2016-07-21 21:52:25', NULL),
(777, 3, 1, 1, '2016-07-21 22:06:35', 'code:Escenario.updated.escenario_edit;'),
(778, 1, 3, NULL, '2016-07-21 22:18:51', NULL),
(779, 1, 3, NULL, '2016-07-21 22:20:14', NULL),
(780, 1, 3, NULL, '2016-07-21 22:22:06', NULL),
(781, 1, 1, 41, '2016-07-21 22:23:13', 'code:Asunto.created.add;'),
(782, 1, 1, 11, '2016-07-21 22:23:13', 'code:Meta.updated.add;'),
(783, 1, 1, 42, '2016-07-21 22:23:18', 'code:Asunto.created.add;'),
(784, 1, 1, 11, '2016-07-21 22:23:18', 'code:Meta.updated.add;'),
(785, 1, 1, 42, '2016-07-21 22:23:24', 'code:Asunto.updated.change;'),
(786, 1, 1, 11, '2016-07-21 22:23:24', 'code:Meta.updated.change;'),
(787, 1, 1, 1, '2016-07-21 22:23:52', 'code:Archivo.created.add;'),
(788, 1, 1, 14, '2016-07-21 22:23:56', 'code:Comentario.created.add;'),
(789, 1, 1, 15, '2016-07-21 22:23:59', 'code:Comentario.created.add;'),
(790, 1, 1, 14, '2016-07-21 22:24:05', 'code:Comentario.updated.edit;'),
(791, 1, 19, 6, '2016-07-21 22:39:41', NULL),
(792, 1, 20, 4, '2016-07-21 22:39:41', NULL),
(793, 1, 1, 14, '2016-07-21 22:39:41', 'code:Comentario.delete;'),
(794, 1, 1, 15, '2016-07-21 22:39:41', 'code:Comentario.delete;'),
(795, 1, 1, 1, '2016-07-21 22:39:42', 'code:Archivo.delete;');
INSERT INTO `logs` (`id`, `usuario_id`, `descripcion_log_id`, `related_id`, `created`, `observacion`) VALUES
(796, 1, 1, 11, '2016-07-21 22:39:42', 'code:Meta.delete;'),
(797, 1, 1, 41, '2016-07-21 22:39:42', 'code:Asunto.delete;'),
(798, 1, 1, 42, '2016-07-21 22:39:42', 'code:Asunto.delete;'),
(799, 1, 21, 3, '2016-07-21 22:39:42', NULL),
(800, 1, 18, 3, '2016-07-21 22:39:42', NULL),
(801, 1, 3, NULL, '2016-07-22 10:27:28', NULL),
(802, 1, 19, 2, '2016-07-22 10:37:23', NULL),
(803, 1, 10, 2, '2016-07-22 10:52:53', NULL),
(804, 1, 11, 20, '2016-07-22 10:52:53', NULL),
(805, 1, 12, 4, '2016-07-22 10:52:53', NULL),
(806, 1, 13, 2, '2016-07-22 10:52:53', NULL),
(807, 1, 1, 4, '2016-07-22 10:52:53', 'code:Meta.created.add;'),
(808, 1, 1, 21, '2016-07-22 11:07:51', 'code:Autor.created.add_tutor;'),
(809, 1, 19, 21, '2016-07-22 11:08:03', NULL),
(810, 1, 1, 22, '2016-07-22 11:09:02', 'code:Autor.created.add_tutor;'),
(811, 1, 19, 22, '2016-07-22 11:09:33', NULL),
(812, 1, 1, 23, '2016-07-22 11:09:42', 'code:Autor.created.add_tutor;'),
(813, 1, 19, 23, '2016-07-22 11:10:38', NULL),
(814, 1, 1, 24, '2016-07-22 11:10:45', 'code:Autor.created.add_tutor;'),
(815, 1, 19, 24, '2016-07-22 11:11:18', NULL),
(816, 1, 1, 25, '2016-07-22 11:11:28', 'code:Autor.created.add_tutor;'),
(817, 1, 19, 25, '2016-07-22 11:12:16', NULL),
(818, 1, 1, 26, '2016-07-22 11:12:21', 'code:Autor.created.add_tutor;'),
(819, 1, 19, 26, '2016-07-22 11:13:12', NULL),
(820, 1, 1, 27, '2016-07-22 11:13:17', 'code:Autor.created.add_tutor;'),
(821, 3, 3, NULL, '2016-07-22 11:49:09', NULL),
(822, 3, 1, 28, '2016-07-22 11:49:18', 'code:Autor.created.add_tutor;'),
(823, 3, 1, 29, '2016-07-22 11:49:23', 'code:Autor.created.add_tutor;'),
(824, 1, 1, 30, '2016-07-22 11:49:51', 'code:Autor.created.add_estudiante;'),
(825, 1, 19, 30, '2016-07-22 11:50:09', NULL),
(826, 3, 19, 28, '2016-07-22 12:01:22', NULL),
(827, 3, 19, 29, '2016-07-22 12:01:42', NULL),
(828, 3, 1, 31, '2016-07-22 12:02:41', 'code:Autor.created.add_tutor;'),
(829, 3, 1, 32, '2016-07-22 12:02:45', 'code:Autor.created.add_tutor;'),
(830, 3, 19, 31, '2016-07-22 12:02:56', NULL),
(831, 3, 19, 32, '2016-07-22 12:03:03', NULL),
(832, 3, 1, 33, '2016-07-22 12:03:09', 'code:Autor.created.add_tutor;'),
(833, 3, 19, 33, '2016-07-22 12:03:14', NULL),
(834, 3, 1, 34, '2016-07-22 12:03:20', 'code:Autor.created.add_tutor;'),
(835, 3, 1, 35, '2016-07-22 12:03:26', 'code:Autor.created.add_tutor;'),
(836, 3, 19, 34, '2016-07-22 12:04:36', NULL),
(837, 3, 19, 35, '2016-07-22 12:04:43', NULL),
(838, 3, 1, 36, '2016-07-22 12:04:49', 'code:Autor.created.add_tutor;'),
(839, 3, 1, 37, '2016-07-22 12:04:53', 'code:Autor.created.add_tutor;'),
(840, NULL, 8, 4, '2016-07-22 12:23:52', NULL),
(841, 4, 3, NULL, '2016-07-22 12:23:57', NULL),
(842, 4, 5, 4, '2016-07-22 12:31:29', NULL),
(843, 4, 7, 2, '2016-07-22 12:31:29', NULL),
(844, 4, 1, 4, '2016-07-22 12:57:37', 'code:Usuario.updated.add_foto;'),
(845, 4, 1, 4, '2016-07-22 12:58:52', 'code:Usuario.updated.add_foto;'),
(846, 4, 1, 4, '2016-07-22 13:05:50', 'code:Usuario.updated.add_foto;'),
(847, 4, 1, 4, '2016-07-22 13:06:34', 'code:Usuario.updated.add_foto;'),
(848, 4, 3, NULL, '2016-07-22 13:09:18', NULL),
(849, 4, 1, 4, '2016-07-22 13:09:34', 'code:Usuario.updated.add_foto;'),
(850, 4, 1, 4, '2016-07-22 13:18:45', 'code:Usuario.updated.add_foto;'),
(851, 4, 1, 4, '2016-07-22 13:19:26', 'code:Usuario.updated.add_foto;'),
(852, 4, 1, 4, '2016-07-22 13:22:24', 'code:Usuario.updated.add_foto;'),
(853, 1, 3, NULL, '2016-07-22 13:27:12', NULL),
(854, 1, 1, 1, '2016-07-22 13:55:45', 'code:Usuario.updated.add_foto;'),
(855, 1, 3, NULL, '2016-07-22 15:25:49', NULL),
(856, 1, 3, NULL, '2016-07-22 15:29:30', NULL),
(857, 1, 1, 1, '2016-07-22 15:34:03', 'code:Usuario.updated.add_foto;'),
(858, 1, 1, 14, '2016-07-22 15:47:47', 'code:Comentario.created.add;'),
(859, 1, 1, 14, '2016-07-22 15:48:21', 'code:Comentario.updated.edit;'),
(860, 1, 1, 14, '2016-07-22 15:48:28', 'code:Comentario.updated.delete;'),
(861, 1, 1, 5, '2016-07-22 15:49:00', 'code:Meta.created.add;'),
(862, 1, 1, 5, '2016-07-22 15:49:00', 'code:Meta.updated.add;'),
(863, 1, 1, 4, '2016-07-22 15:49:00', 'code:Meta.updated.add;'),
(864, 1, 1, 41, '2016-07-22 15:49:07', 'code:Asunto.created.add;'),
(865, 1, 1, 5, '2016-07-22 15:49:08', 'code:Meta.updated.add;'),
(866, 1, 1, 4, '2016-07-22 15:49:08', 'code:Meta.updated.add;'),
(867, 1, 3, NULL, '2016-07-22 16:10:26', NULL),
(868, 1, 5, 1, '2016-07-22 16:11:04', NULL),
(869, 1, 1, 1, '2016-07-22 16:11:04', 'code:DescripcionTutor.created.edit;'),
(870, 1, 7, 3, '2016-07-22 16:11:04', NULL),
(871, 1, 1, 1, '2016-07-22 16:16:05', 'code:Usuario.updated.add_foto;'),
(872, 1, 1, 1, '2016-07-22 16:16:37', 'code:Usuario.updated.add_foto;'),
(873, 1, 1, 38, '2016-07-22 16:22:39', 'code:Autor.created.add_estudiante;'),
(874, 3, 3, NULL, '2016-07-22 16:23:51', NULL),
(875, 3, 15, 38, '2016-07-22 16:23:59', NULL),
(876, 3, 3, NULL, '2016-07-22 16:47:17', NULL),
(877, 3, 1, 15, '2016-07-22 17:09:07', 'code:Comentario.created.add;'),
(878, 1, 19, 20, '2016-07-22 17:12:04', NULL),
(879, 1, 1, 39, '2016-07-22 17:12:11', 'code:Autor.created.add_tutor;'),
(880, 1, 19, 39, '2016-07-22 17:13:26', NULL),
(881, 3, 19, 27, '2016-07-22 17:17:15', NULL),
(882, 3, 1, 40, '2016-07-22 17:17:20', 'code:Autor.created.add_tutor;'),
(883, 3, 1, 41, '2016-07-22 17:17:32', 'code:Autor.created.add_tutor;'),
(884, 1, 15, 41, '2016-07-22 17:17:52', NULL),
(885, 1, 15, 37, '2016-07-22 17:17:56', NULL),
(886, 3, 19, 40, '2016-07-22 17:18:15', NULL),
(887, 1, 3, NULL, '2016-07-22 18:09:28', NULL),
(888, 1, 3, NULL, '2016-07-22 18:11:19', NULL),
(889, 1, 3, NULL, '2016-07-22 18:12:03', NULL),
(890, 1, 3, NULL, '2016-07-22 18:21:06', NULL),
(891, 1, 10, 3, '2016-07-22 18:37:04', NULL),
(892, 1, 11, 42, '2016-07-22 18:37:04', NULL),
(893, 1, 12, 5, '2016-07-22 18:37:04', NULL),
(894, 1, 13, 3, '2016-07-22 18:37:04', NULL),
(895, 1, 1, 6, '2016-07-22 18:37:05', 'code:Meta.created.add;'),
(896, 1, 16, 6, '2016-07-22 21:57:49', NULL),
(897, 1, 10, 4, '2016-07-22 22:04:33', NULL),
(898, 1, 11, 43, '2016-07-22 22:04:33', NULL),
(899, 1, 11, 44, '2016-07-22 22:04:33', NULL),
(900, 1, 12, 7, '2016-07-22 22:04:33', NULL),
(901, 1, 13, 4, '2016-07-22 22:04:33', NULL),
(902, 1, 1, 7, '2016-07-22 22:04:33', 'code:Meta.created.add;'),
(903, 1, 3, NULL, '2016-07-22 22:21:21', NULL),
(904, 1, 1, 45, '2016-07-22 22:51:15', 'code:Autor.created.add_tutor;'),
(905, 1, 19, 45, '2016-07-22 22:55:21', NULL),
(906, 1, 1, 46, '2016-07-22 22:55:26', 'code:Autor.created.add_tutor;'),
(907, 3, 3, NULL, '2016-07-22 22:57:45', NULL),
(908, 3, 19, 19, '2016-07-22 22:58:04', NULL),
(909, 3, 19, 36, '2016-07-22 22:58:04', NULL),
(910, 3, 19, 37, '2016-07-22 22:58:04', NULL),
(911, 3, 20, 1, '2016-07-22 22:58:04', NULL),
(912, 3, 20, 3, '2016-07-22 22:58:05', NULL),
(913, 3, 1, 13, '2016-07-22 22:58:05', 'code:Comentario.delete;'),
(914, 3, 1, 1, '2016-07-22 22:58:05', 'code:Meta.delete;'),
(915, 3, 1, 1, '2016-07-22 22:58:05', 'code:Asunto.delete;'),
(916, 3, 1, 2, '2016-07-22 22:58:05', 'code:Asunto.delete;'),
(917, 3, 1, 3, '2016-07-22 22:58:06', 'code:Asunto.delete;'),
(918, 3, 1, 4, '2016-07-22 22:58:06', 'code:Asunto.delete;'),
(919, 3, 1, 40, '2016-07-22 22:58:06', 'code:Asunto.delete;'),
(920, 3, 21, 1, '2016-07-22 22:58:06', NULL),
(921, 3, 18, 1, '2016-07-22 22:58:06', NULL),
(922, 1, 1, 47, '2016-07-22 22:58:13', 'code:Autor.created.add_estudiante;'),
(923, 1, 1, 42, '2016-07-22 23:04:00', 'code:Asunto.created.add;'),
(924, 1, 1, 6, '2016-07-22 23:04:00', 'code:Meta.updated.add;'),
(925, 1, 1, 16, '2016-07-22 23:04:09', 'code:Comentario.created.add;'),
(926, 1, 3, NULL, '2016-07-23 09:37:15', NULL),
(927, 1, 1, 4, '2016-07-23 09:41:51', 'code:Proyecto.updated.proyectos_edit;'),
(928, 1, 19, 42, '2016-07-23 10:12:15', NULL),
(929, 1, 1, 48, '2016-07-23 10:12:20', 'code:Autor.created.add_tutor;'),
(930, 3, 3, NULL, '2016-07-23 10:27:02', NULL),
(931, 1, 10, 5, '2016-07-23 10:27:30', NULL),
(932, 1, 11, 49, '2016-07-23 10:27:30', NULL),
(933, 1, 11, 50, '2016-07-23 10:27:30', NULL),
(934, 1, 12, 8, '2016-07-23 10:27:30', NULL),
(935, 1, 13, 5, '2016-07-23 10:27:30', NULL),
(936, 1, 1, 8, '2016-07-23 10:27:30', 'code:Meta.created.add;'),
(937, 3, 15, 47, '2016-07-23 10:28:05', NULL),
(938, 1, 19, 49, '2016-07-23 10:28:23', NULL),
(939, 1, 19, 50, '2016-07-23 10:28:23', NULL),
(940, 1, 20, 8, '2016-07-23 10:28:24', NULL),
(941, 1, 1, 8, '2016-07-23 10:28:24', 'code:Meta.delete;'),
(942, 1, 21, 5, '2016-07-23 10:28:24', NULL),
(943, 1, 18, 5, '2016-07-23 10:28:24', NULL),
(944, 3, 19, 38, '2016-07-23 10:29:23', NULL),
(945, 3, 19, 41, '2016-07-23 10:29:23', NULL),
(946, 3, 20, 4, '2016-07-23 10:29:24', NULL),
(947, 3, 1, 14, '2016-07-23 10:29:24', 'code:Comentario.delete;'),
(948, 3, 1, 15, '2016-07-23 10:29:24', 'code:Comentario.delete;'),
(949, 3, 1, 4, '2016-07-23 10:29:24', 'code:Meta.delete;'),
(950, 3, 1, 41, '2016-07-23 10:29:24', 'code:Asunto.delete;'),
(951, 3, 21, 2, '2016-07-23 10:29:24', NULL),
(952, 3, 18, 2, '2016-07-23 10:29:25', NULL),
(953, 3, 19, 46, '2016-07-23 10:29:33', NULL),
(954, 3, 19, 47, '2016-07-23 10:29:33', NULL),
(955, 3, 19, 48, '2016-07-23 10:29:34', NULL),
(956, 3, 20, 5, '2016-07-23 10:29:34', NULL),
(957, 3, 20, 6, '2016-07-23 10:29:34', NULL),
(958, 3, 1, 16, '2016-07-23 10:29:34', 'code:Comentario.delete;'),
(959, 3, 1, 6, '2016-07-23 10:29:34', 'code:Meta.delete;'),
(960, 3, 1, 42, '2016-07-23 10:29:35', 'code:Asunto.delete;'),
(961, 3, 21, 3, '2016-07-23 10:29:35', NULL),
(962, 3, 18, 3, '2016-07-23 10:29:35', NULL),
(963, 1, 1, 51, '2016-07-23 10:29:45', 'code:Autor.created.add_estudiante;'),
(964, 3, 19, 51, '2016-07-23 10:30:32', NULL),
(965, 1, 1, 52, '2016-07-23 10:30:42', 'code:Autor.created.add_estudiante;'),
(966, 3, 15, 52, '2016-07-23 10:30:49', NULL),
(967, 3, 19, 52, '2016-07-23 10:47:42', NULL),
(968, 1, 1, 53, '2016-07-23 10:48:04', 'code:Autor.created.add_estudiante;'),
(969, 1, 19, 43, '2016-07-23 10:52:03', NULL),
(970, 3, 15, 53, '2016-07-23 10:54:06', NULL),
(971, 3, 19, 44, '2016-07-23 10:54:26', NULL),
(972, 3, 19, 53, '2016-07-23 10:54:35', NULL),
(973, 3, 20, 7, '2016-07-23 10:54:36', NULL),
(974, 3, 1, 7, '2016-07-23 10:54:36', 'code:Meta.delete;'),
(975, 3, 21, 4, '2016-07-23 10:54:36', NULL),
(976, 3, 18, 4, '2016-07-23 10:54:36', NULL),
(977, 3, 10, 6, '2016-07-23 10:56:12', NULL),
(978, 3, 11, 54, '2016-07-23 10:56:12', NULL),
(979, 3, 11, 55, '2016-07-23 10:56:12', NULL),
(980, 3, 12, 9, '2016-07-23 10:56:12', NULL),
(981, 3, 13, 6, '2016-07-23 10:56:13', NULL),
(982, 3, 1, 9, '2016-07-23 10:56:13', 'code:Meta.created.add;'),
(983, 1, 19, 55, '2016-07-23 10:57:22', NULL),
(984, 3, 1, 56, '2016-07-23 10:57:39', 'code:Autor.created.add_tutor;'),
(985, 1, 15, 56, '2016-07-23 10:58:59', NULL),
(986, 1, 10, 7, '2016-07-23 11:06:53', NULL),
(987, 1, 11, 57, '2016-07-23 11:06:53', NULL),
(988, 1, 11, 58, '2016-07-23 11:06:54', NULL),
(989, 1, 12, 10, '2016-07-23 11:06:54', NULL),
(990, 1, 13, 7, '2016-07-23 11:06:54', NULL),
(991, 1, 1, 10, '2016-07-23 11:06:54', 'code:Meta.created.add;'),
(992, 1, 1, 59, '2016-07-23 11:08:49', 'code:Autor.created.add_estudiante;'),
(993, 1, 3, NULL, '2016-07-23 12:16:33', NULL),
(994, 1, 1, 7, '2016-07-23 12:21:05', 'code:Escenario.updated.edit;'),
(995, 1, 1, 7, '2016-07-23 12:22:00', 'code:Escenario.updated.edit;'),
(996, 1, 1, 7, '2016-07-23 12:22:19', 'code:Escenario.updated.edit;'),
(997, 1, 1, 7, '2016-07-23 12:22:28', 'code:Escenario.updated.edit;'),
(998, 1, 1, 7, '2016-07-23 12:22:33', 'code:Escenario.updated.edit;'),
(999, 1, 1, 7, '2016-07-23 12:22:51', 'code:Escenario.updated.edit;'),
(1000, 1, 1, 7, '2016-07-23 12:23:39', 'code:Escenario.updated.edit;'),
(1001, 1, 1, 7, '2016-07-23 12:23:45', 'code:Escenario.updated.edit;'),
(1002, 1, 1, 7, '2016-07-23 12:23:51', 'code:Escenario.updated.edit;'),
(1003, 1, 1, 7, '2016-07-23 12:24:00', 'code:Escenario.updated.edit;'),
(1004, 1, 1, 7, '2016-07-23 12:24:11', 'code:Escenario.updated.edit;'),
(1005, 1, 1, 7, '2016-07-23 12:25:19', 'code:Escenario.updated.edit;'),
(1006, 1, 1, 7, '2016-07-23 12:25:25', 'code:Escenario.updated.edit;'),
(1007, 1, 1, 7, '2016-07-23 12:25:38', 'code:Escenario.updated.edit;'),
(1008, 1, 1, 7, '2016-07-23 12:26:04', 'code:Escenario.updated.edit;'),
(1009, 1, 1, 7, '2016-07-23 12:26:09', 'code:Escenario.updated.edit;'),
(1010, 1, 1, 7, '2016-07-23 12:26:25', 'code:Escenario.updated.edit;'),
(1011, 1, 1, 7, '2016-07-23 12:27:15', 'code:Escenario.updated.edit;'),
(1012, 1, 1, 7, '2016-07-23 12:27:20', 'code:Escenario.updated.edit;'),
(1013, 1, 1, 7, '2016-07-23 12:27:24', 'code:Escenario.updated.edit;'),
(1014, 1, 1, 7, '2016-07-23 12:28:04', 'code:Escenario.updated.edit;'),
(1015, 1, 1, 7, '2016-07-23 12:28:09', 'code:Escenario.updated.edit;'),
(1016, 3, 3, NULL, '2016-07-23 12:32:12', NULL),
(1017, 3, 1, 6, '2016-07-23 12:32:44', 'code:Escenario.updated.edit;'),
(1018, 3, 15, 59, '2016-07-23 12:54:06', NULL),
(1019, 1, 19, 56, '2016-07-23 13:00:36', NULL),
(1020, 3, 1, 60, '2016-07-23 13:00:50', 'code:Autor.created.add_tutor;'),
(1021, 3, 1, 61, '2016-07-23 13:00:55', 'code:Autor.created.add_tutor;'),
(1022, 1, 3, NULL, '2016-07-23 14:27:10', NULL),
(1023, 1, 3, NULL, '2016-07-23 19:40:38', NULL),
(1024, 1, 16, 11, '2016-07-23 19:44:29', NULL),
(1025, 1, 3, NULL, '2016-07-23 20:17:43', NULL),
(1026, 3, 3, NULL, '2016-07-23 20:43:05', NULL),
(1027, 1, 15, 61, '2016-07-23 20:52:13', NULL),
(1028, 1, 3, NULL, '2016-07-24 09:55:47', NULL),
(1029, 1, 10, 8, '2016-07-24 10:59:49', NULL),
(1030, 1, 11, 62, '2016-07-24 10:59:49', NULL),
(1031, 1, 11, 63, '2016-07-24 10:59:49', NULL),
(1032, 1, 12, 12, '2016-07-24 10:59:50', NULL),
(1033, 1, 13, 8, '2016-07-24 10:59:50', NULL),
(1034, 1, 1, 11, '2016-07-24 10:59:50', 'code:Meta.created.add;'),
(1035, 1, 1, 6, '2016-07-24 11:07:08', 'code:Escenario.updated.edit;'),
(1036, 1, 1, 6, '2016-07-24 11:07:15', 'code:Escenario.updated.edit;'),
(1037, 1, 1, 6, '2016-07-24 11:07:19', 'code:Escenario.updated.edit;'),
(1038, 1, 19, 57, '2016-07-24 11:20:21', NULL),
(1039, 1, 19, 58, '2016-07-24 11:20:22', NULL),
(1040, 1, 19, 59, '2016-07-24 11:20:22', NULL),
(1041, 1, 20, 10, '2016-07-24 11:20:22', NULL),
(1042, 1, 20, 11, '2016-07-24 11:20:22', NULL),
(1043, 1, 1, 10, '2016-07-24 11:20:23', 'code:Meta.delete;'),
(1044, 1, 21, 7, '2016-07-24 11:20:23', NULL),
(1045, 1, 18, 7, '2016-07-24 11:20:23', NULL),
(1046, 1, 1, 8, '2016-07-24 11:41:06', 'code:Proyecto.updated.proyectos_edit;'),
(1047, 1, 1, 8, '2016-07-24 11:41:26', 'code:Proyecto.updated.proyectos_edit;'),
(1048, 1, 1, 8, '2016-07-24 11:41:37', 'code:Proyecto.updated.proyectos_edit;'),
(1049, 1, 1, 8, '2016-07-24 11:42:46', 'code:Proyecto.updated.proyectos_edit;'),
(1050, 1, 1, 8, '2016-07-24 11:42:52', 'code:Proyecto.updated.proyectos_edit;'),
(1051, 1, 1, 8, '2016-07-24 11:43:01', 'code:Proyecto.updated.proyectos_edit;'),
(1052, 1, 3, NULL, '2016-07-24 12:44:59', NULL),
(1053, 1, 1, 1, '2016-07-24 12:54:56', 'code:Grupo.updated.datos_impresion;'),
(1054, 1, 1, 1, '2016-07-24 12:55:00', 'code:Grupo.updated.datos_impresion;'),
(1055, 1, 1, 1, '2016-07-24 12:55:07', 'code:Grupo.updated.datos_impresion;'),
(1056, 1, 1, 1, '2016-07-24 12:59:39', 'code:Grupo.updated.datos_impresion;'),
(1057, 1, 1, 1, '2016-07-24 12:59:42', 'code:Grupo.updated.datos_impresion;'),
(1058, 1, 1, 1, '2016-07-24 13:03:04', 'code:Grupo.updated.datos_impresion;'),
(1059, 1, 1, 1, '2016-07-24 13:13:49', 'code:Grupo.updated.datos_impresion;'),
(1060, 1, 1, 1, '2016-07-24 14:34:55', 'code:Grupo.updated.editar_datos_impresion;'),
(1061, 1, 1, 1, '2016-07-24 14:35:26', 'code:Grupo.updated.editar_datos_impresion;'),
(1062, 1, 1, 1, '2016-07-24 14:35:29', 'code:Grupo.updated.editar_datos_impresion;'),
(1063, 1, 1, 1, '2016-07-24 14:35:31', 'code:Grupo.updated.editar_datos_impresion;'),
(1064, 1, 1, 1, '2016-07-24 14:35:32', 'code:Grupo.updated.editar_datos_impresion;'),
(1065, 1, 1, 1, '2016-07-24 14:35:46', 'code:Grupo.updated.editar_datos_impresion;'),
(1066, 1, 1, 1, '2016-07-24 14:35:47', 'code:Grupo.updated.editar_datos_impresion;'),
(1067, 1, 1, 1, '2016-07-24 14:35:48', 'code:Grupo.updated.editar_datos_impresion;'),
(1068, 1, 1, 1, '2016-07-24 14:35:49', 'code:Grupo.updated.editar_datos_impresion;'),
(1069, 1, 1, 1, '2016-07-24 14:35:50', 'code:Grupo.updated.editar_datos_impresion;'),
(1070, 1, 1, 1, '2016-07-24 14:35:51', 'code:Grupo.updated.editar_datos_impresion;'),
(1071, 1, 1, 1, '2016-07-24 14:36:19', 'code:Grupo.updated.editar_datos_impresion;'),
(1072, 1, 1, 1, '2016-07-24 14:36:35', 'code:Grupo.updated.editar_datos_impresion;'),
(1073, 1, 1, 1, '2016-07-24 14:36:38', 'code:Grupo.updated.editar_datos_impresion;'),
(1074, 1, 1, 1, '2016-07-24 14:40:30', 'code:Grupo.updated.editar_datos_impresion;'),
(1075, 1, 1, 1, '2016-07-24 14:41:32', 'code:Grupo.updated.editar_datos_impresion;'),
(1076, 1, 1, 1, '2016-07-24 14:41:40', 'code:Grupo.updated.editar_datos_impresion;'),
(1077, 1, 1, 1, '2016-07-24 14:41:43', 'code:Grupo.updated.editar_datos_impresion;'),
(1078, 1, 1, 1, '2016-07-24 14:41:45', 'code:Grupo.updated.editar_datos_impresion;'),
(1079, 1, 1, 8, '2016-07-24 14:55:37', 'code:Proyecto.updated.proyectos_edit;'),
(1080, 1, 1, 1, '2016-07-24 14:57:10', 'code:Jurado.created.proyectos_asignacion_jurados;'),
(1081, 1, 1, 2, '2016-07-24 14:57:10', 'code:Jurado.created.proyectos_asignacion_jurados;'),
(1082, 1, 1, 1, '2016-07-24 14:58:34', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1083, 1, 1, 2, '2016-07-24 14:58:34', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1084, 1, 1, 6, '2016-07-24 15:46:11', 'code:Proyecto.updated.proyectos_edit;'),
(1085, 1, 1, 6, '2016-07-24 15:54:49', 'code:Proyecto.updated.proyectos_edit;'),
(1086, 1, 1, 6, '2016-07-24 15:55:08', 'code:Proyecto.updated.proyectos_edit;'),
(1087, 1, 1, 1, '2016-07-24 16:13:01', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1088, 1, 1, 2, '2016-07-24 16:13:01', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1089, 1, 1, 3, '2016-07-24 16:13:01', 'code:Jurado.created.proyectos_asignacion_jurados;'),
(1090, 1, 1, 1, '2016-07-24 16:13:28', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1091, 1, 1, 2, '2016-07-24 16:13:28', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1092, 1, 1, 4, '2016-07-24 16:13:28', 'code:Jurado.created.proyectos_asignacion_jurados;'),
(1093, 1, 5, 2, '2016-07-24 16:37:47', NULL),
(1094, 1, 19, 63, '2016-07-24 16:38:24', NULL),
(1095, 1, 19, 60, '2016-07-24 16:38:35', NULL),
(1096, 1, 1, 7, '2016-07-24 16:38:44', 'code:PerfilsUsuario.delete;'),
(1097, 1, 1, 9, '2016-07-24 16:38:44', 'code:PerfilsUsuario.delete;'),
(1098, 1, 1, 2, '2016-07-24 16:38:44', 'code:Usuario.delete;'),
(1099, 1, 1, 5, '2016-07-24 16:39:22', 'code:Usuario.created.add;'),
(1100, 5, 2, 5, '2016-07-24 16:39:58', NULL),
(1101, 5, 3, NULL, '2016-07-24 16:40:06', NULL),
(1102, 5, 5, 5, '2016-07-24 16:40:34', NULL),
(1103, 5, 1, 2, '2016-07-24 16:40:34', 'code:DescripcionTutor.created.edit;'),
(1104, 5, 7, 4, '2016-07-24 16:40:34', NULL),
(1105, 1, 1, 64, '2016-07-24 16:43:35', 'code:Autor.created.add_tutor;'),
(1106, 5, 15, 64, '2016-07-24 16:47:04', NULL),
(1107, 5, 15, 64, '2016-07-24 16:49:22', NULL),
(1108, 5, 19, 64, '2016-07-24 16:51:55', NULL),
(1109, 3, 3, NULL, '2016-07-24 16:52:43', NULL),
(1110, 3, 1, 65, '2016-07-24 16:52:56', 'code:Autor.created.add_tutor;'),
(1111, 5, 19, 65, '2016-07-24 16:53:05', NULL),
(1112, 3, 1, 66, '2016-07-24 16:56:24', 'code:Autor.created.add_tutor;'),
(1113, 5, 19, 66, '2016-07-24 16:56:36', NULL),
(1114, 3, 1, 67, '2016-07-24 16:56:49', 'code:Autor.created.add_tutor;'),
(1115, 5, 15, 67, '2016-07-24 16:56:55', NULL),
(1116, 5, 1, 1, '2016-07-24 16:57:10', 'code:Archivo.created.add;'),
(1117, 5, 16, 13, '2016-07-24 16:57:23', NULL),
(1118, 5, 1, 1, '2016-07-24 16:57:29', 'code:Comentario.created.add;'),
(1119, 5, 1, 12, '2016-07-24 16:57:38', 'code:Meta.created.add;'),
(1120, 5, 1, 12, '2016-07-24 16:57:38', 'code:Meta.updated.add;'),
(1121, 5, 1, 9, '2016-07-24 16:57:38', 'code:Meta.updated.add;'),
(1122, 5, 1, 12, '2016-07-24 16:57:46', 'code:Meta.updated.edit;'),
(1123, 5, 1, 12, '2016-07-24 16:57:46', 'code:Meta.updated.edit;'),
(1124, 5, 1, 9, '2016-07-24 16:57:46', 'code:Meta.updated.edit;'),
(1125, 5, 1, 12, '2016-07-24 16:57:49', 'code:Meta.updated.change;'),
(1126, 5, 1, 12, '2016-07-24 16:57:49', 'code:Meta.updated.change;'),
(1127, 5, 1, 9, '2016-07-24 16:57:49', 'code:Meta.updated.change;'),
(1128, 5, 1, 12, '2016-07-24 16:57:52', 'code:Meta.updated.change;'),
(1129, 5, 1, 12, '2016-07-24 16:57:52', 'code:Meta.updated.change;'),
(1130, 5, 1, 9, '2016-07-24 16:57:52', 'code:Meta.updated.change;'),
(1131, 5, 1, 1, '2016-07-24 16:58:03', 'code:Asunto.created.add;'),
(1132, 5, 1, 12, '2016-07-24 16:58:03', 'code:Meta.updated.add;'),
(1133, 5, 1, 9, '2016-07-24 16:58:03', 'code:Meta.updated.add;'),
(1134, 5, 1, 6, '2016-07-24 16:58:55', 'code:Escenario.updated.edit;'),
(1135, 5, 1, 6, '2016-07-24 16:59:02', 'code:Escenario.updated.edit;'),
(1136, 5, 1, 6, '2016-07-24 16:59:20', 'code:Escenario.updated.edit;'),
(1137, 5, 1, 6, '2016-07-24 16:59:37', 'code:Escenario.updated.edit;'),
(1138, 3, 1, 6, '2016-07-24 17:00:40', 'code:Escenario.updated.edit;'),
(1139, 5, 19, 67, '2016-07-24 17:01:08', NULL),
(1140, 1, 3, NULL, '2016-07-24 17:01:29', NULL),
(1141, 1, 19, 61, '2016-07-24 17:02:11', NULL),
(1142, 1, 1, 68, '2016-07-24 17:02:35', 'code:Autor.created.add_tutor;'),
(1143, 1, 1, 5, '2016-07-24 17:02:45', 'code:Jurado.created.proyectos_asignacion_jurados;'),
(1144, 5, 3, NULL, '2016-07-24 17:11:16', NULL),
(1145, 5, 1, 2, '2016-07-24 17:13:06', 'code:Comentario.created.add;'),
(1146, 1, 3, NULL, '2016-07-24 19:41:20', NULL),
(1147, 5, 3, NULL, '2016-07-24 19:41:45', NULL),
(1148, 1, 3, NULL, '2016-07-24 19:42:49', NULL),
(1149, 3, 3, NULL, '2016-07-24 19:45:04', NULL),
(1150, 3, 16, 14, '2016-07-24 19:45:28', NULL),
(1151, 3, 16, 15, '2016-07-24 19:46:26', NULL),
(1152, 1, 1, 6, '2016-07-24 19:49:28', 'code:Proyecto.updated.proyectos_edit;'),
(1153, 3, 1, 6, '2016-07-24 19:49:42', 'code:Escenario.updated.edit;'),
(1154, 3, 1, 6, '2016-07-24 19:51:49', 'code:Escenario.updated.edit;'),
(1155, 3, 1, 6, '2016-07-24 19:51:54', 'code:Escenario.updated.edit;'),
(1156, 3, 1, 6, '2016-07-24 19:52:35', 'code:Escenario.updated.edit;'),
(1157, 3, 1, 6, '2016-07-24 19:52:40', 'code:Escenario.updated.edit;'),
(1158, 1, 19, 68, '2016-07-24 20:03:22', NULL),
(1159, 1, 1, 6, '2016-07-24 20:04:13', 'code:Proyecto.updated.proyectos_edit;'),
(1160, 1, 1, 6, '2016-07-24 20:05:01', 'code:Proyecto.updated.proyectos_edit;'),
(1161, 1, 1, 1, '2016-07-24 20:07:25', 'code:Planilla.created.aprobacionPropuesta;'),
(1162, 1, 1, 6, '2016-07-24 20:09:01', 'code:Proyecto.updated.proyectos_edit;'),
(1163, 1, 1, 5, '2016-07-24 20:13:59', 'code:Jurado.updated.proyectos_asignacion_jurados;'),
(1164, 1, 1, 6, '2016-07-24 20:13:59', 'code:Jurado.created.proyectos_asignacion_jurados;'),
(1165, 1, 1, 1, '2016-07-24 20:34:08', 'code:Grupo.updated.editar_datos_impresion;'),
(1166, 1, 1, 1, '2016-07-24 20:34:29', 'code:Grupo.updated.editar_datos_impresion;'),
(1167, 1, 3, NULL, '2016-07-24 21:15:05', NULL),
(1168, 1, 1, 8, '2016-07-24 21:33:26', 'code:Proyecto.updated.proyectos_edit;'),
(1169, 1, 1, 11, '2016-07-24 21:36:04', 'code:Meta.updated.change;'),
(1170, 1, 1, 11, '2016-07-24 21:36:05', 'code:Meta.updated.change;'),
(1171, 1, 1, 11, '2016-07-24 21:36:11', 'code:Meta.updated.change;'),
(1172, 1, 1, 11, '2016-07-24 21:36:12', 'code:Meta.updated.change;'),
(1173, 1, 1, 2, '2016-07-24 21:42:19', 'code:Asunto.created.add;'),
(1174, 1, 1, 11, '2016-07-24 21:42:19', 'code:Meta.updated.add;'),
(1175, 1, 1, 8, '2016-07-24 21:43:46', 'code:Proyecto.updated.proyectos_edit;'),
(1176, 1, 1, 8, '2016-07-24 21:44:35', 'code:Proyecto.updated.proyectos_edit;'),
(1177, 1, 1, 6, '2016-07-24 21:46:39', 'code:Proyecto.updated.proyectos_edit;'),
(1178, 1, 1, 6, '2016-07-24 21:50:57', 'code:Proyecto.updated.proyectos_edit;'),
(1179, 1, 1, 3, '2016-07-24 21:52:47', 'code:Asunto.created.add;'),
(1180, 1, 1, 12, '2016-07-24 21:52:47', 'code:Meta.updated.add;'),
(1181, 1, 1, 9, '2016-07-24 21:52:47', 'code:Meta.updated.add;'),
(1182, 1, 1, 69, '2016-07-24 21:52:58', 'code:Autor.created.add_tutor;'),
(1183, 1, 15, 69, '2016-07-24 21:53:08', NULL);

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

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id`, `usuario_id`, `principal_mensaje_id`, `leido`, `created`) VALUES
(1, 2, 1, 0, '2016-07-19 15:49:50'),
(2, 3, 6, 0, '2016-07-21 18:25:53'),
(3, 3, 8, 0, '2016-07-21 18:26:03'),
(4, 3, 10, 0, '2016-07-21 18:26:50'),
(5, 3, 12, 0, '2016-07-21 18:26:57'),
(6, 3, 14, 0, '2016-07-21 20:35:36'),
(7, 3, 16, 0, '2016-07-21 20:37:13'),
(8, 3, 18, 0, '2016-07-21 20:38:24'),
(9, 3, 20, 0, '2016-07-21 20:38:39'),
(10, 3, 22, 0, '2016-07-21 20:39:20'),
(11, 3, 24, 0, '2016-07-21 20:47:29'),
(12, 3, 26, 0, '2016-07-21 20:47:51'),
(13, 3, 28, 0, '2016-07-21 20:50:03'),
(14, 3, 30, 0, '2016-07-21 20:53:19'),
(15, 1, 31, 0, '2016-07-21 21:35:48'),
(16, 2, 35, 0, '2016-07-22 10:37:23'),
(17, 2, 37, 0, '2016-07-22 11:08:04'),
(18, 2, 39, 0, '2016-07-22 11:09:33'),
(19, 2, 41, 0, '2016-07-22 11:10:38'),
(20, 2, 43, 0, '2016-07-22 11:11:18'),
(21, 2, 45, 0, '2016-07-22 11:12:16'),
(22, 2, 47, 0, '2016-07-22 11:13:12'),
(23, 1, 48, 0, '2016-07-22 16:24:00'),
(24, 3, 49, 0, '2016-07-22 17:17:52'),
(25, 3, 50, 0, '2016-07-22 17:17:56'),
(26, 2, 52, 0, '2016-07-22 22:04:33'),
(27, 2, 53, 0, '2016-07-23 10:27:30'),
(28, 1, 55, 0, '2016-07-23 10:30:32'),
(29, 1, 56, 0, '2016-07-23 10:30:49'),
(30, 1, 57, 0, '2016-07-23 10:56:13'),
(31, 2, 58, 0, '2016-07-23 11:06:54'),
(32, 3, 59, 0, '2016-07-23 19:44:30'),
(33, 2, 60, 0, '2016-07-24 10:59:50'),
(34, 3, 61, 0, '2016-07-24 16:57:23'),
(35, 1, 61, 0, '2016-07-24 16:57:23');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `proyecto_id`, `titulo`, `descripcion`, `culminacion`, `cerrado`, `completado`, `total`, `lft`, `rght`, `parent_id`, `created`, `updated`) VALUES
(9, 6, 'default', NULL, NULL, 0, 0, 4, 1, 4, 0, '2016-07-23 10:56:13', '2016-07-24 21:52:47'),
(11, 8, 'default', NULL, NULL, 0, 0, 2, 5, 6, 0, '2016-07-24 10:59:50', '2016-07-24 21:42:19'),
(12, 6, 'qdqdqwdwdqwdqd', 'qwdqwd', '2016-07-28', 0, 0, 3, 2, 3, 9, '2016-07-24 16:57:38', '2016-07-24 21:52:47');

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
(10, 1, 12),
(11, 1, 13),
(12, 1, 3),
(13, 1, 4),
(14, 2, 5),
(15, 3, 5);

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

--
-- Dumping data for table `planillas`
--

INSERT INTO `planillas` (`id`, `proyecto_id`, `principal_planilla_id`, `created`, `tipo_planilla_id`, `data`) VALUES
(1, 6, 0, '2016-07-24 20:07:25', 1, '{"jurados_id":null}');

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

--
-- Dumping data for table `principal_mensajes`
--

INSERT INTO `principal_mensajes` (`id`, `tipo_mensaje_id`, `titulo`, `contenido`, `enlace`) VALUES
(1, 5, 'Lo han invitado a ser parte de un Proyecto, #1', NULL, '{"controller":"proyectos","action":"indexTutorAcad"}'),
(2, 2, 'Alberto Rodriguez ha modificado el escenario del Proyecto', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(3, 2, 'Alberto Rodriguez ha modificado el escenario del Proyecto', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(4, 2, 'Alberto Rodriguez ha actualizado la revision del Proyecto #1', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(5, 4, 'Alberto Rodriguez ha agregado un Estudiante al Proyecto #1', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(6, 5, 'Lo han invitado a ser parte de un Proyecto, #1', NULL, '{"controller":"proyectos","action":"index"}'),
(7, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(8, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(9, 4, 'Alberto Rodriguez ha agregado un Estudiante al Proyecto #1', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(10, 5, 'Lo han invitado a ser parte de un Proyecto, #1', NULL, '{"controller":"proyectos","action":"index"}'),
(11, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(12, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(13, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(14, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(15, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(16, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(17, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(18, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(19, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(20, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(21, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(22, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(23, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(24, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(25, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(26, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(27, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(28, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(29, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Estudiante', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(30, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(31, 7, 'Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #1', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(32, 7, 'Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #1', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(33, 2, 'Fulano De Tal ha modificado el escenario del Proyecto', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(34, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(35, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(36, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(37, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(38, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(39, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(40, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Metodológico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(41, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(42, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Metodológico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(43, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(44, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(45, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(46, 9, 'Alberto Rodriguez ha revocado la invitacion al Proyecto # de un Tutor Académico', NULL, '{"controller":"proyectos","action":"view","0":null}'),
(47, 9, 'Su invitación al Proyecto # ha sido revocada', NULL, NULL),
(48, 7, 'Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #2', NULL, '{"controller":"proyectos","action":"view","0":"2"}'),
(49, 7, 'Alberto Rodriguez ha aceptado la solicitud de pertenecer al Proyecto #2', NULL, '{"controller":"proyectos","action":"view","0":"2"}'),
(50, 7, 'Alberto Rodriguez ha aceptado la solicitud de pertenecer al Proyecto #1', NULL, '{"controller":"proyectos","action":"view","0":"1"}'),
(51, 2, 'Alberto Rodriguez ha actualizado la revision del Proyecto #3', NULL, '{"controller":"proyectos","action":"view","0":"3"}'),
(52, 5, 'Lo han invitado a ser parte de un Proyecto, #4', NULL, '{"controller":"proyectos","action":"indexTutorAcad"}'),
(53, 5, 'Lo han invitado a ser parte de un Proyecto, #5', NULL, '{"controller":"proyectos","action":"indexTutorAcad"}'),
(54, 7, 'Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #3', NULL, '{"controller":"proyectos","action":"view","0":"3"}'),
(55, 8, 'Fulano De Tal NO ha aceptado la solicitud de pertenecer al Proyecto #4', NULL, '{"controller":"proyectos","action":"view","0":"4"}'),
(56, 7, 'Fulano De Tal ha aceptado la solicitud de pertenecer al Proyecto #4', NULL, '{"controller":"proyectos","action":"view","0":"4"}'),
(57, 5, 'Lo han invitado a ser parte de un Proyecto, #6', NULL, '{"controller":"proyectos","action":"indexTutorAcad"}'),
(58, 5, 'Lo han invitado a ser parte de un Proyecto, #7', NULL, '{"controller":"proyectos","action":"indexTutorAcad"}'),
(59, 2, 'Alberto Rodriguez ha actualizado la revision del Proyecto #7', NULL, '{"controller":"proyectos","action":"view","0":"7"}'),
(60, 5, 'Lo han invitado a ser parte de un Proyecto, #8', NULL, '{"controller":"proyectos","action":"indexTutorAcad"}'),
(61, 2, 'Aholimar Hernandez ha actualizado la revision del Proyecto #6', NULL, '{"controller":"proyectos","action":"view","0":"6"}'),
(62, 2, 'Fulano De Tal ha actualizado la revision del Proyecto #6', NULL, '{"controller":"proyectos","action":"view","0":"6"}'),
(63, 2, 'Fulano De Tal ha actualizado la revision del Proyecto #6', NULL, '{"controller":"proyectos","action":"view","0":"6"}');

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
(1, 'Ingeniería en Informática', 'Ingeniero en Informática', 1, 1);

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

--
-- Dumping data for table `proyectos`
--

INSERT INTO `proyectos` (`id`, `tema`, `categoria_id`, `programa_id`, `sede_id`, `fase_id`, `estado_id`, `created`, `updated`, `activo`, `bloqueado`, `grupo_id`) VALUES
(6, 'qwdqw', 2, 1, 1, 5, 1, '2016-07-23 10:56:12', '2016-07-24 21:50:57', 0, 0, 1),
(8, 'qweqwe', 3, 1, 1, 6, 1, '2016-07-24 10:59:49', '2016-07-24 21:44:35', 1, 1, 1);

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

--
-- Dumping data for table `revisions`
--

INSERT INTO `revisions` (`id`, `titulo`, `resumen`, `descripcion`, `etiquetas`, `observaciones`, `proyecto_id`, `updated`, `usuario_id`, `metadata`) VALUES
(9, 'wdqwd', 'qwdqwd', 'qwdqw', 'qwdq', '', 6, '2016-07-23 10:56:12', 3, NULL),
(12, 'qweqweqw', 'qweqwe', 'qeqweqw', 'qweqw', 'qweqw', 8, '2016-07-24 10:59:50', 1, NULL),
(13, 'wdqwdqwdw', 'qwdqwdqwdqw', 'qwdqwdqwwq', 'qwdq,2123,12312', 'qdqwdqwd', 6, '2016-07-24 16:57:23', 5, NULL),
(14, 'wdqwdqwdw wedwefwefwef', 'qwdqwdqwdqw wewefwefwefwef<br>', 'qwdqwdqwwqwefwefwefw', 'qwdq,2123,12312', 'qdqwdqwd', 6, '2016-07-24 19:45:28', 3, NULL),
(15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod \r\ntempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea \r\ncommodi consequat. Quis aute iure reprehenderit in voluptate velit esse \r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat \r\ncupiditat non proident, sunt in culpa qui officia deserunt mollit anim \r\nid est laborum.<br>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod \r\ntempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea \r\ncommodi consequat. Quis aute iure reprehenderit in voluptate velit esse \r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat \r\ncupiditat non proident, sunt in culpa qui officia deserunt mollit anim \r\nid est laborum.<br>', 'Lorem, ipsum, dolor sit amet', '', 6, '2016-07-24 19:46:26', 3, NULL);

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
  `avatar` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `actualizado` tinyint(1) NOT NULL DEFAULT '0',
  `observaciones` mediumtext,
  `hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `password`, `nombres`, `apellidos`, `sexo`, `email`, `sede_id`, `tipo_usuario_id`, `created`, `updated`, `updated_foto`, `avatar`, `activo`, `admin`, `actualizado`, `observaciones`, `hash`) VALUES
(1, '16407820', '$2a$10$NzxSjApyZ9zhc4qaxazhNuehyeNLdLwDJHAbgUq1CNhykpmyCliuG', 'Alberto', 'Rodriguez', 'M', 'arod.unerg@gmail.com', 1, 2, '2015-06-05 00:40:34', '2016-07-22 16:16:37', '2015-09-08 17:34:52', 'f36f880bad2ebb45e82827a631db999365d7751b.jpg', 1, 1, 1, '', '0351f11b6f2c15f9631536f60b73976699a2c86d'),
(3, '123456', '$2a$10$ccb6iG6ezSCGy3feCGNglu9b3oxceehPysrqGrP6Vv6BzX6kSi6U.', 'Fulano', 'De Tal', 'M', 'fulano@gmail.com', 1, 1, '2016-07-19 19:20:49', '2016-07-19 19:21:16', '0000-00-00 00:00:00', NULL, 1, 0, 1, NULL, 'b6b9e1f2892224cf0821f2155f22321b7373c2e5'),
(4, '111111', '$2a$10$hU/C9yumMNtu2SiEsoh7.OjSSkDNPR8XdhGVS.3Wd1D40DYR7B0MS', 'uno', 'uno', 'F', 'uno@example.com', 1, 1, '2016-07-22 12:23:52', '2016-07-22 13:22:24', '0000-00-00 00:00:00', '50b69bd5d59fc4dfec1f65bc18eb314bb3c2dd14.jpg', 1, 0, 1, NULL, 'd8e6ee1374f492edfd2a9c952d67dc6472e72f65'),
(5, '17062851', '$2a$10$yvkG.xN25DSxhzP5K8Grregiq3tCL/DnYox2BI1zZuoKSMz2pYAyq', 'Aholimar', 'Hernandez', 'F', 'a.hernandez.unerg@gmail.com', 1, 2, '2016-07-24 16:39:22', '2016-07-24 16:40:34', '0000-00-00 00:00:00', NULL, 1, 0, 1, '', '851e5e9431b4c2cd3e1f026aeca4b07ccc769879');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `asuntos`
--
ALTER TABLE `asuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categorias_usuarios`
--
ALTER TABLE `categorias_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `descargas`
--
ALTER TABLE `descargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `descripcion_logs`
--
ALTER TABLE `descripcion_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `descripcion_tutors`
--
ALTER TABLE `descripcion_tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `descripcion_usuarios`
--
ALTER TABLE `descripcion_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `escenarios`
--
ALTER TABLE `escenarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1184;
--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `perfils_usuarios`
--
ALTER TABLE `perfils_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `planillas`
--
ALTER TABLE `planillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `principal_mensajes`
--
ALTER TABLE `principal_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
