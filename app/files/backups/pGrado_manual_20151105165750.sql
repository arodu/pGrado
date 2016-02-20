-- Database: `grados_postgrado`
-- Generation time: Thu 5th Nov 2015 16:57:50


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO autors VALUES('1','1','1','1','2015-06-11 15:11:37','2015-06-11 15:11:37','1');
INSERT INTO autors VALUES('8','1','2','2','2015-06-24 22:39:22','2015-06-24 22:42:14','1');
INSERT INTO autors VALUES('9','1','8','3','2015-06-24 22:40:36','2015-06-24 22:40:36','');



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
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

INSERT INTO categorias VALUES('7','7',NULL,'Uso y necesidad de medicación preanestésica','','13','14','1');
INSERT INTO categorias VALUES('8','7',NULL,'Uso y necesidad de técnicas de relajación y programas utilizados en la preparación del paciente pedi','','15','16','1');
INSERT INTO categorias VALUES('9','7',NULL,'Diferentes técnicas de inducción y mantenimiento anestésico del paciente pediátrico sometido a cirug','','17','18','1');
INSERT INTO categorias VALUES('10','7',NULL,'Terapia del dolor','','19','20','1');
INSERT INTO categorias VALUES('11','7',NULL,'Circulación extracorpórea. Protección de órganos y sistemas medio interno','','21','22','1');
INSERT INTO categorias VALUES('12','8',NULL,'Uso y necesidad de medicación pre-anestésica','','23','24','1');
INSERT INTO categorias VALUES('13','8',NULL,'Uso y necesidad de técnicas de relajación y programas utilizados en la preparación del paciente some','','25','26','1');
INSERT INTO categorias VALUES('14','8',NULL,'Diferentes técnicas de inducción y mantenimiento anestésico del paciente sometido a cirugía.','','27','28','1');
INSERT INTO categorias VALUES('15','8',NULL,'Protección de órganos y sistemas medio interno','','29','30','1');
INSERT INTO categorias VALUES('16','8',NULL,'Terapia del dolor','','31','32','1');
INSERT INTO categorias VALUES('17','9',NULL,'Curva de sobrevida actuarial y actual en diferentes patologías y ante determinados procedimientos qu','','33','34','1');
INSERT INTO categorias VALUES('18','9',NULL,'Protección miocárdica en pacientes de edad pediátrica','','35','36','1');
INSERT INTO categorias VALUES('19','9',NULL,'Nuevas técnicas quirúrgicas','','37','38','1');
INSERT INTO categorias VALUES('20','9',NULL,'Sangrado postoperatorio','','39','40','1');
INSERT INTO categorias VALUES('21','9',NULL,'Incidencia y prevalencia de fiebre reumática en Venezuela y Latinoamérica','','41','42','1');
INSERT INTO categorias VALUES('22','9',NULL,'Valvulopatías mitrales en niños. Reemplazos valvulares en  niños','','43','44','1');
INSERT INTO categorias VALUES('23','10',NULL,'Derecho Procesal Penal y Multiculturalidad','','45','46','1');
INSERT INTO categorias VALUES('24','10',NULL,'Dogmática Penal','','47','48','1');
INSERT INTO categorias VALUES('25','10',NULL,'Derecho Penal Juvenil','','49','50','1');
INSERT INTO categorias VALUES('26','10',NULL,'Género y Derecho Penal','','51','52','1');
INSERT INTO categorias VALUES('27','10',NULL,'Política Criminal','','53','54','1');
INSERT INTO categorias VALUES('28','10',NULL,'Sistema Penitenciario','','55','56','1');
INSERT INTO categorias VALUES('29','10',NULL,'Sociología Criminal','','57','58','1');
INSERT INTO categorias VALUES('30','10',NULL,'Filosofía del Derecho Penal','','59','60','1');
INSERT INTO categorias VALUES('31','11',NULL,'La Reforma Constitucional y la Actividad Administrativa','','61','62','1');
INSERT INTO categorias VALUES('32','11',NULL,'Análisis Crítico de la Doctrina jurisprudencial de la Sala Constitucional en Materia de Procedimient','','63','64','1');
INSERT INTO categorias VALUES('33','11',NULL,'Análisis Crítico de la Doctrina jurisprudencial de la Sala Política en Materia de Procedimientos Adm','','65','66','1');
INSERT INTO categorias VALUES('34','11',NULL,'La Constitucionalidad de la Ley de Defensa Popular contra el Acaparamiento y la Especulación en Mate','','67','68','1');
INSERT INTO categorias VALUES('35','12',NULL,'Las Transformaciones del Derecho del Trabajo en el Siglo XX y XXI.','','69','70','1');
INSERT INTO categorias VALUES('36','12',NULL,'La Aplicación Judicial del Derecho del Trabajo y de la Seguridad Social. ','','71','72','1');
INSERT INTO categorias VALUES('37','12',NULL,'Configuración Actual y Perspectivas de Futuro del Sistema de Protección Social. ','','73','74','1');
INSERT INTO categorias VALUES('38','12',NULL,'Las políticas activas y pasivas de empleo.','','75','76','1');
INSERT INTO categorias VALUES('39','12',NULL,'Contrato de Trabajo y Cláusula de Conciencia.','','77','78','1');
INSERT INTO categorias VALUES('40','12',NULL,'Medidas Laborales en la Empresa en Crisis','','79','80','1');
INSERT INTO categorias VALUES('41','12',NULL,'Ley de Alimentación para los Trabajadores','','81','82','1');
INSERT INTO categorias VALUES('42','13',NULL,'La Legislación Mercantil','','83','84','1');
INSERT INTO categorias VALUES('43','13',NULL,'Argumentación, Discrecionalidad y Decisión Judicial.','','85','86','1');
INSERT INTO categorias VALUES('44','13',NULL,'Organización Jurisdiccional. ','','87','88','1');
INSERT INTO categorias VALUES('45','13',NULL,'Derecho Procesal Civil y Probatorio.','','89','90','1');
INSERT INTO categorias VALUES('46','14',NULL,'Dermatosis Ocupacional','','91','92','1');
INSERT INTO categorias VALUES('47','14',NULL,'Linfomas Cutáneos','','93','94','1');
INSERT INTO categorias VALUES('48','14',NULL,'Micología Dermatológica','','95','96','1');
INSERT INTO categorias VALUES('49','14',NULL,'Inmunodermatología','','97','98','1');
INSERT INTO categorias VALUES('50','14',NULL,'Enfermedades Virales de Piel y Mucosas','','99','100','1');
INSERT INTO categorias VALUES('51','15',NULL,'Desarrollo Humano','','101','102','1');
INSERT INTO categorias VALUES('52','15',NULL,'Bioética docente','','103','104','1');
INSERT INTO categorias VALUES('53','15',NULL,'Evaluación de los resultados de la formación en Docencia Universitaria','','105','106','1');
INSERT INTO categorias VALUES('54','15',NULL,'Evaluación Educativa','','107','108','1');
INSERT INTO categorias VALUES('55','15',NULL,'Implicaciones pedagógicas de la profesionalidad docente','','109','110','1');
INSERT INTO categorias VALUES('56','15',NULL,'La didáctica como fundamento para el logro de aprendizajes significativos','','111','112','1');
INSERT INTO categorias VALUES('57','15',NULL,'Aspectos socio y psicopedagógicos del proceso educativo','','113','114','1');
INSERT INTO categorias VALUES('58','15',NULL,'Innovaciones tecnológicas aplicadas a la docencia universitaria','','115','116','1');
INSERT INTO categorias VALUES('59','17',NULL,'Gestión de Banco de Sangre','','117','118','1');
INSERT INTO categorias VALUES('60','17',NULL,'Hemoterapia y Riesgos Ocupacionales','','119','120','1');
INSERT INTO categorias VALUES('61','17',NULL,'Salud Pública y Donación','','121','122','1');
INSERT INTO categorias VALUES('62','17',NULL,'Trasfusiones en Hemoterapia','','123','124','1');
INSERT INTO categorias VALUES('63','18',NULL,'Calidad de vida del usuario','','125','126','1');
INSERT INTO categorias VALUES('64','18',NULL,'Gestión y Práctica de enfermería','','127','128','1');
INSERT INTO categorias VALUES('65','18',NULL,'Cuidado humano de la salud renal','','129','130','1');
INSERT INTO categorias VALUES('66','18',NULL,'Educación para la salud al usuario, familia y población en general','','131','132','1');
INSERT INTO categorias VALUES('67','19',NULL,'Ética en Enfermería','','133','134','1');
INSERT INTO categorias VALUES('68','19',NULL,'Administración  de los Recursos en Enfermería','','135','136','1');
INSERT INTO categorias VALUES('69','19',NULL,'Cuidado Humano','','137','138','1');
INSERT INTO categorias VALUES('70','20',NULL,'Control biomédico del entrenamiento deportivo','','139','140','1');
INSERT INTO categorias VALUES('71','20',NULL,'Perfeccionamiento y desarrollo de nuevos métodos para el diagnóstico, tratamiento y la rehabilitació','','141','142','1');
INSERT INTO categorias VALUES('72','20',NULL,'Control biomédico del entrenamiento y el  rendimiento deportivo.','','143','144','1');
INSERT INTO categorias VALUES('73','20',NULL,'La práctica de actividad física sistemática y la calidad de vida en la tercera edad.','','145','146','1');
INSERT INTO categorias VALUES('74','20',NULL,'La evaluación funcional del rendimiento neuromuscular en el deporte','','147','148','1');
INSERT INTO categorias VALUES('75','20',NULL,'Desarrollo de normativas dietéticas para deportistas','','149','150','1');
INSERT INTO categorias VALUES('76','20',NULL,'La repercusión de ejercicios físicos en las capacidades morfofuncionales del niño, adultos y embaraz','','151','152','1');
INSERT INTO categorias VALUES('77','20',NULL,'Personalidad, motivación y rendimiento deportivo','','153','154','1');
INSERT INTO categorias VALUES('78','20',NULL,'Moduladores de respuesta emocional para el rendimiento deportivo','','155','156','1');
INSERT INTO categorias VALUES('79','20',NULL,'Estudio de los conocimientos y actitudes ante el dopaje en deportistas de alto rendimiento','','157','158','1');
INSERT INTO categorias VALUES('80','21',NULL,'Medicina Familiar y la Práctica Clínica ','','159','160','1');
INSERT INTO categorias VALUES('81','21',NULL,'Educación para la Salud y Desarrollo Comunitario','','161','162','1');
INSERT INTO categorias VALUES('82','21',NULL,'Bioética en Atención Primaria','','163','164','1');
INSERT INTO categorias VALUES('83','22',NULL,'Prevención primaria y secundaria en hipertensión arterial.','','165','166','1');
INSERT INTO categorias VALUES('84','22',NULL,'Prevención primaria y secundaria en enfermedades pulmonares','','167','168','1');
INSERT INTO categorias VALUES('85','22',NULL,'Prevención primaria y secundaria en Diabetes Mellitus','','169','170','1');
INSERT INTO categorias VALUES('86','22',NULL,'Detección de problemas y necesidades de las comunidades','','171','172','1');
INSERT INTO categorias VALUES('87','22',NULL,'Trastornos mentales en atención primaria.','','173','174','1');
INSERT INTO categorias VALUES('88','23',NULL,'Medicina Legal General. Elaboración de documentos médico-legales','','175','176','1');
INSERT INTO categorias VALUES('89','23',NULL,'Uso y necesidad adecuada de técnicas de apertura, abordaje y colección de muestras en la realización','','177','178','1');
INSERT INTO categorias VALUES('90','23',NULL,'Diferentes técnicas de estudio y análisis en caso de intoxicaciones','','179','180','1');
INSERT INTO categorias VALUES('91','23',NULL,'Alteraciones anatómicas y funcionales causadas por una fuerza exterior que son de interés para la ju','','181','182','1');
INSERT INTO categorias VALUES('92','23',NULL,'Estudios de los indicios de naturaleza médica que deja un delincuente en la escena del hecho o sobre','','183','184','1');
INSERT INTO categorias VALUES('93','24',NULL,'Control biomédico del entrenamiento deportivo','','185','186','1');
INSERT INTO categorias VALUES('94','24',NULL,'Control médico del entrenamiento  a través de pruebas cardiovasculares','','187','188','1');
INSERT INTO categorias VALUES('95','24',NULL,'Control biomédico del entrenamiento y el rendimiento deportivo en deportes de resistencia','','189','190','1');
INSERT INTO categorias VALUES('96','24',NULL,'Sobreentrenamiento en el deporte','','191','192','1');
INSERT INTO categorias VALUES('97','24',NULL,'Personalidad, motivación y rendimiento deportivo','','193','194','1');
INSERT INTO categorias VALUES('98','24',NULL,'Estudio de los conocimientos y actitudes ante el dopaje en deportistas de alto rendimiento','','195','196','1');
INSERT INTO categorias VALUES('99','24',NULL,'Mujer y deporte','','197','198','1');
INSERT INTO categorias VALUES('100','24',NULL,'Detección y selección de talentos','','199','200','1');
INSERT INTO categorias VALUES('101','24',NULL,'Antropometría y nutrición deportiva','','201','202','1');
INSERT INTO categorias VALUES('102','25',NULL,'Sistemas de Información Geográfica','','203','204','1');
INSERT INTO categorias VALUES('103','25',NULL,'Evaluación de Recursos Alimentarios Tropicales Alternativos','','205','206','1');
INSERT INTO categorias VALUES('104','25',NULL,'Sistemas de Producción Animal (Rumiantes y no Rumiantes)','','207','208','1');
INSERT INTO categorias VALUES('105','25',NULL,'Sistemas Agroforestales','','209','210','1');
INSERT INTO categorias VALUES('106','25',NULL,'Generación de Indicadores de Sostenibilidad en el Medio Rural','','211','212','1');
INSERT INTO categorias VALUES('107','25',NULL,'Manejo de Pasturas y Forrajes','','213','214','1');
INSERT INTO categorias VALUES('108','26',NULL,'Sociología de la educación comunitaria','','215','216','1');
INSERT INTO categorias VALUES('109','26',NULL,'Psicología social del desarrollo comunitario','','217','218','1');
INSERT INTO categorias VALUES('110','26',NULL,'Educación en valores en Venezuela','','219','220','1');
INSERT INTO categorias VALUES('111','26',NULL,'Investigación aplicada al desarrollo comunitario','','221','222','1');
INSERT INTO categorias VALUES('112','26',NULL,'Tecnologías alternativas en desarrollo comunitario','','223','224','1');
INSERT INTO categorias VALUES('113','26',NULL,'Cultura y saber popular','','225','226','1');
INSERT INTO categorias VALUES('114','26',NULL,'Ciudadanía y seguridad','','227','228','1');
INSERT INTO categorias VALUES('115','26',NULL,'Economía social y participativa','','229','230','1');
INSERT INTO categorias VALUES('116','27',NULL,'Innovaciones Tecnológicas para la Enseñanza y el Aprendizaje   de la Matemática','','231','232','1');
INSERT INTO categorias VALUES('117','27',NULL,'Resolución de Problemas en Matemática','','233','234','1');
INSERT INTO categorias VALUES('118','27',NULL,'Evaluación de los Aprendizajes en Matemática','','235','236','1');
INSERT INTO categorias VALUES('119','28',NULL,'La Cotidianidad como Fuente de Investigación  Social','','237','238','1');
INSERT INTO categorias VALUES('120','28',NULL,'Epistemología y Educación','','239','240','1');
INSERT INTO categorias VALUES('121','28',NULL,'Educación y Desarrollo Humano','','241','242','1');
INSERT INTO categorias VALUES('122','28',NULL,'Investigación en Metodología de la Investigación Educativa','','243','244','1');
INSERT INTO categorias VALUES('123','28',NULL,'Las Tecnologías de la Información, Educación e Investigación','','245','246','1');
INSERT INTO categorias VALUES('124','28',NULL,'Ciudadanía y  Educación','','247','248','1');
INSERT INTO categorias VALUES('125','29',NULL,'Orientación Familiar y Sexual','','249','250','1');
INSERT INTO categorias VALUES('126','29',NULL,'Orientación Educativa','','251','252','1');
INSERT INTO categorias VALUES('127','30',NULL,'Gestión y Participación en Salud','','253','254','1');
INSERT INTO categorias VALUES('128','30',NULL,'Cuidado Humano a la Persona, Familia y/o Comunidad','','255','256','1');
INSERT INTO categorias VALUES('129','31',NULL,'Promoción de la Salud en la Embarazada durante el Ciclo Reproductivo','','257','258','1');
INSERT INTO categorias VALUES('130','32',NULL,'Creación de nuevas teorías de las relaciones gerenciales con la sociedad en general','','259','260','1');
INSERT INTO categorias VALUES('131','32',NULL,'Los modelos gerenciales y los cambios recientes en las organizaciones bajo la innovación tecnológica','','261','262','1');
INSERT INTO categorias VALUES('132','32',NULL,'Evolución reciente de la gerencia estratégica ante la problemática administrativa','','263','264','1');
INSERT INTO categorias VALUES('133','32',NULL,'El mercado global ante el avance tecnológico','','265','266','1');
INSERT INTO categorias VALUES('134','32',NULL,'Políticas gerenciales del Estado venezolano','','267','268','1');
INSERT INTO categorias VALUES('135','32',NULL,'Gerencia moderna en las instituciones públicas venezolanas','','269','270','1');
INSERT INTO categorias VALUES('136','33',NULL,'Epidemiología y evaluación de servicios y programas de salud pública','','271','272','1');
INSERT INTO categorias VALUES('137','33',NULL,'Reforma sectorial y políticas de salud','','273','274','1');
INSERT INTO categorias VALUES('138','33',NULL,'Participación comunitaria en los servicios de salud pública','','275','276','1');
INSERT INTO categorias VALUES('139','33',NULL,'Equidad y calidad en la atención en salud','','277','278','1');
INSERT INTO categorias VALUES('140','33',NULL,'Gerencia de programas de salud pública','','279','280','1');
INSERT INTO categorias VALUES('141','34',NULL,'Historia Nacional','','281','282','1');
INSERT INTO categorias VALUES('142','34',NULL,'Historia Regional y Local','','283','284','1');
INSERT INTO categorias VALUES('143','34',NULL,'Historia Social de la Educación','','285','286','1');
INSERT INTO categorias VALUES('144','34',NULL,'Historia del Pensamiento Político Venezolano','','287','288','1');
INSERT INTO categorias VALUES('145','35',NULL,'Educación para la Participación y Producción Social','','289','290','1');
INSERT INTO categorias VALUES('146','35',NULL,'Educación  para el Desarrollo Humano Sustentable','','291','292','1');



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
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `proyecto_id` (`proyecto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO comentarios VALUES('1','1','sdwqdqwdq','2015-06-12 23:24:49','2015-06-12 23:24:49','1');
INSERT INTO comentarios VALUES('2','1','asdasdasdas\n','2015-06-16 02:29:40','2015-06-16 02:29:40','1');
INSERT INTO comentarios VALUES('3','1','ewefwefwef\n','2015-06-18 01:08:16','2015-06-18 01:08:16','1');
INSERT INTO comentarios VALUES('4','1','asdasweqwe\n','2015-06-18 03:28:49','2015-06-18 03:28:49','1');
INSERT INTO comentarios VALUES('5','1','adasdas\nasdas','2015-06-18 03:38:08','2015-06-18 03:38:08','1');
INSERT INTO comentarios VALUES('6','1','asdasdasdasdasdasdasdasd qwd qwd','2015-06-21 23:32:43','2015-06-21 23:32:43','1');
INSERT INTO comentarios VALUES('7','1','w','2015-06-21 23:32:44','2015-06-21 23:32:44','1');
INSERT INTO comentarios VALUES('13','2','sdsfsdfsdfsdf','2015-06-23 23:37:20','2015-06-23 23:37:20','1');
INSERT INTO comentarios VALUES('14','2','asdasdasd','2015-06-23 23:37:22','2015-06-23 23:37:22','1');
INSERT INTO comentarios VALUES('15','1','asasd','2015-06-24 03:39:09','2015-06-24 03:39:09','1');
INSERT INTO comentarios VALUES('16','1','assadas','2015-06-24 03:39:11','2015-06-24 03:39:11','1');
INSERT INTO comentarios VALUES('17','1','asdasdasd','2015-06-24 03:39:14','2015-06-24 03:39:14','1');
INSERT INTO comentarios VALUES('18','1','asdasdasda\nas\ndas\nda\nsdasdasdas','2015-06-24 03:39:17','2015-06-24 03:39:17','1');
INSERT INTO comentarios VALUES('19','1','asdasdasdasd','2015-06-24 03:39:19','2015-06-24 03:39:19','1');
INSERT INTO comentarios VALUES('20','1','asdasda\nsa\ndasdasd','2015-06-24 03:39:22','2015-06-24 03:39:22','1');
INSERT INTO comentarios VALUES('21','1','rthrththrthrthrth','2015-11-05 15:38:46','2015-11-05 15:38:46','1');



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

INSERT INTO config VALUES('1','asignacion_jurados.firma.nombre','Dra. Nellys Chirinos','impresion');
INSERT INTO config VALUES('2','asignacion_jurados.firma.cargo','Directora Académica de Postgrado','impresion');



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

INSERT INTO descripcion_tutors VALUES('1','1','1','2','4',NULL,'2015-06-25 23:21:53');
INSERT INTO descripcion_tutors VALUES('2','2','1','2','4',NULL,'2015-06-23 20:31:21');



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO descripcion_usuarios VALUES('1','1','(2232)342-3423',NULL,'(2342)342-3423','wdqwdqwd',NULL,NULL,NULL,NULL,NULL,'2015-06-25 23:21:53');
INSERT INTO descripcion_usuarios VALUES('2','11','(2234)234-2343',NULL,'(2342)342-3423','qwdqwd',NULL,NULL,NULL,NULL,NULL,'2015-06-23 18:55:15');
INSERT INTO descripcion_usuarios VALUES('3','2','(3423)423-4234',NULL,'(2342)342-3423','rqr',NULL,NULL,NULL,NULL,NULL,'2015-06-23 20:31:21');



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO escenarios VALUES('1','1','','','','','','','','2015-06-11 15:11:37');



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

INSERT INTO fases VALUES('1','Propuesta','propuesta','1','1');
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

INSERT INTO grupos VALUES('1','Cohorte 2015-1','1','1','{\"fases\":{\"5\":null,\"1\":{\"no_consj_area\":\"3\",\"fecha_consj_area\":\"14-06-2015\",\"fecha_comun\":\"14-06-2015\"}}}');



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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO jurados VALUES('10','2','5','1','5');
INSERT INTO jurados VALUES('11','2','1','1','5');
INSERT INTO jurados VALUES('12','2','10','1','5');
INSERT INTO jurados VALUES('16','2','2','1','5');
INSERT INTO jurados VALUES('18','2','1','1','1');
INSERT INTO jurados VALUES('19','2','4','1','1');
INSERT INTO jurados VALUES('20','2','9','1','1');



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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

INSERT INTO logs VALUES('1','1','3',NULL,'2015-07-05 18:25:48',NULL);
INSERT INTO logs VALUES('2','1','1','145','2015-07-05 18:39:01','code:Archivo.created.add;');
INSERT INTO logs VALUES('3','1','1','146','2015-07-05 19:55:58','code:Archivo.created.add;');
INSERT INTO logs VALUES('4','1','1','147','2015-07-05 19:56:15','code:Archivo.created.add;');
INSERT INTO logs VALUES('5','1','1','1','2015-07-05 20:44:13','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('6','1','3',NULL,'2015-07-05 22:21:33',NULL);
INSERT INTO logs VALUES('7','1','3',NULL,'2015-07-06 19:13:28',NULL);
INSERT INTO logs VALUES('8','1','3',NULL,'2015-07-06 19:40:21',NULL);
INSERT INTO logs VALUES('9','1','16','6','2015-07-06 19:41:16',NULL);
INSERT INTO logs VALUES('10','1','16','7','2015-07-06 19:42:51',NULL);
INSERT INTO logs VALUES('11','1','3',NULL,'2015-07-06 20:57:30',NULL);
INSERT INTO logs VALUES('12','1','1','1','2015-07-06 22:44:46','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('13','1','3',NULL,'2015-07-07 18:37:58',NULL);
INSERT INTO logs VALUES('14','1','19','5','2015-07-07 18:43:47',NULL);
INSERT INTO logs VALUES('15','1','19','7','2015-07-07 18:43:47',NULL);
INSERT INTO logs VALUES('16','1','20','3','2015-07-07 18:43:48',NULL);
INSERT INTO logs VALUES('17','1','1','8','2015-07-07 18:43:48','code:Comentario.delete;');
INSERT INTO logs VALUES('18','1','1','9','2015-07-07 18:43:48','code:Comentario.delete;');
INSERT INTO logs VALUES('19','1','1','10','2015-07-07 18:43:48','code:Comentario.delete;');
INSERT INTO logs VALUES('20','1','1','11','2015-07-07 18:43:48','code:Comentario.delete;');
INSERT INTO logs VALUES('21','1','1','12','2015-07-07 18:43:48','code:Comentario.delete;');
INSERT INTO logs VALUES('22','1','1','140','2015-07-07 18:43:48','code:Archivo.delete;');
INSERT INTO logs VALUES('23','1','1','141','2015-07-07 18:43:49','code:Archivo.delete;');
INSERT INTO logs VALUES('24','1','1','144','2015-07-07 18:43:49','code:Archivo.delete;');
INSERT INTO logs VALUES('25','1','1','21','2015-07-07 18:43:49','code:Jurado.delete;');
INSERT INTO logs VALUES('26','1','1','22','2015-07-07 18:43:49','code:Jurado.delete;');
INSERT INTO logs VALUES('27','1','1','23','2015-07-07 18:43:49','code:Jurado.delete;');
INSERT INTO logs VALUES('28','1','21','3','2015-07-07 18:43:49',NULL);
INSERT INTO logs VALUES('29','1','18','3','2015-07-07 18:43:49',NULL);
INSERT INTO logs VALUES('30','1','1','1','2015-07-13 16:23:02','code:Usuario.updated.recover;');
INSERT INTO logs VALUES('31','1','3',NULL,'2015-07-13 16:24:57',NULL);
INSERT INTO logs VALUES('32','1','3',NULL,'2015-07-13 17:28:36',NULL);
INSERT INTO logs VALUES('33','1','3',NULL,'2015-07-14 11:31:22',NULL);
INSERT INTO logs VALUES('34','1','3',NULL,'2015-07-14 11:33:04',NULL);
INSERT INTO logs VALUES('35','1','3',NULL,'2015-07-14 11:40:32',NULL);
INSERT INTO logs VALUES('36','1','16','8','2015-07-14 11:46:39',NULL);
INSERT INTO logs VALUES('37','1','16','9','2015-07-14 11:48:01',NULL);
INSERT INTO logs VALUES('38','1','16','10','2015-07-14 11:50:04',NULL);
INSERT INTO logs VALUES('39','1','16','11','2015-07-14 11:52:02',NULL);
INSERT INTO logs VALUES('40','1','16','12','2015-07-14 11:53:04',NULL);
INSERT INTO logs VALUES('41','1','16','13','2015-07-14 11:54:52',NULL);
INSERT INTO logs VALUES('42','1','10','2','2015-07-14 11:56:32',NULL);
INSERT INTO logs VALUES('43','1','11','10','2015-07-14 11:56:32',NULL);
INSERT INTO logs VALUES('44','1','11','11','2015-07-14 11:56:32',NULL);
INSERT INTO logs VALUES('45','1','12','14','2015-07-14 11:56:32',NULL);
INSERT INTO logs VALUES('46','1','13','2','2015-07-14 11:56:32',NULL);
INSERT INTO logs VALUES('47','1','16','15','2015-07-14 12:00:16',NULL);
INSERT INTO logs VALUES('48','1','16','16','2015-07-14 12:02:50',NULL);
INSERT INTO logs VALUES('49','1','3',NULL,'2015-07-14 16:44:05',NULL);
INSERT INTO logs VALUES('50','1','16','17','2015-07-14 17:19:42',NULL);
INSERT INTO logs VALUES('51','1','5','1','2015-07-14 18:22:28',NULL);
INSERT INTO logs VALUES('52','1','1','7','2015-07-14 18:27:46','code:Perfil.created.add;');
INSERT INTO logs VALUES('53','1','1','8','2015-07-14 18:51:24','code:Perfil.created.add;');
INSERT INTO logs VALUES('54','1','1','3','2015-07-14 18:51:59','code:Perfil.updated.edit;');
INSERT INTO logs VALUES('55','1','1','5','2015-07-14 18:52:44','code:Perfil.updated.edit;');
INSERT INTO logs VALUES('56','1','1','147','2015-09-05 12:09:17','code:Archivo.delete;');
INSERT INTO logs VALUES('57','1','3',NULL,'2015-09-05 12:12:39',NULL);
INSERT INTO logs VALUES('58','1','1','1','2015-09-05 12:17:32','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('59','1','1','1','2015-09-05 12:18:23','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('60','1','3',NULL,'2015-09-06 17:37:10',NULL);
INSERT INTO logs VALUES('61','1','3',NULL,'2015-09-07 10:08:08',NULL);
INSERT INTO logs VALUES('62','1','1','1','2015-09-07 10:08:46','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('63','1','3',NULL,'2015-09-08 16:53:40',NULL);
INSERT INTO logs VALUES('64','1','3',NULL,'2015-09-08 17:34:30',NULL);
INSERT INTO logs VALUES('65','1','1','1','2015-09-08 17:34:52','code:Usuario.updated.add_foto;');
INSERT INTO logs VALUES('66','1','1','145','2015-09-08 17:38:15','code:Archivo.delete;');
INSERT INTO logs VALUES('67','1','3',NULL,'2015-09-08 18:36:00',NULL);
INSERT INTO logs VALUES('68','1','5','1','2015-09-08 18:39:14',NULL);
INSERT INTO logs VALUES('69','1','3',NULL,'2015-09-15 15:49:27',NULL);
INSERT INTO logs VALUES('70','1','3',NULL,'2015-09-30 14:50:14',NULL);
INSERT INTO logs VALUES('71','1','19','10','2015-09-30 14:55:28',NULL);
INSERT INTO logs VALUES('72','1','19','11','2015-09-30 14:55:28',NULL);
INSERT INTO logs VALUES('73','1','20','14','2015-09-30 14:55:29',NULL);
INSERT INTO logs VALUES('74','1','20','15','2015-09-30 14:55:29',NULL);
INSERT INTO logs VALUES('75','1','20','16','2015-09-30 14:55:29',NULL);
INSERT INTO logs VALUES('76','1','21','2','2015-09-30 14:55:29',NULL);
INSERT INTO logs VALUES('77','1','18','2','2015-09-30 14:55:29',NULL);
INSERT INTO logs VALUES('78','1','1','146','2015-09-30 14:55:55','code:Archivo.delete;');
INSERT INTO logs VALUES('79','1','3',NULL,'2015-10-03 18:45:33',NULL);
INSERT INTO logs VALUES('80','1','3',NULL,'2015-11-05 15:30:28',NULL);
INSERT INTO logs VALUES('81','1','1','21','2015-11-05 15:38:46','code:Comentario.created.add;');
INSERT INTO logs VALUES('82','1','1','1','2015-11-05 15:44:16','code:Grupo.updated.datos_impresion;');
INSERT INTO logs VALUES('83','1','3',NULL,'2015-11-05 16:57:35',NULL);



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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO mensajes VALUES('1','2','1','','2015-06-11 15:11:38');
INSERT INTO mensajes VALUES('2','10','2','','2015-06-12 00:46:50');
INSERT INTO mensajes VALUES('3','2','4','','2015-06-16 01:20:04');
INSERT INTO mensajes VALUES('4','2','8','','2015-06-23 21:11:02');
INSERT INTO mensajes VALUES('5','5','10','','2015-06-23 21:11:08');
INSERT INTO mensajes VALUES('6','1','11','','2015-06-23 23:37:13');
INSERT INTO mensajes VALUES('7','2','13','','2015-06-24 22:39:22');
INSERT INTO mensajes VALUES('8','8','15','','2015-06-24 22:40:37');
INSERT INTO mensajes VALUES('9','1','16','','2015-06-24 22:42:14');
INSERT INTO mensajes VALUES('10','2','17','','2015-06-24 22:50:06');
INSERT INTO mensajes VALUES('11','11','18','','2015-06-24 22:50:06');
INSERT INTO mensajes VALUES('12','2','19','','2015-06-24 22:50:12');
INSERT INTO mensajes VALUES('13','11','20','','2015-06-24 22:50:12');
INSERT INTO mensajes VALUES('14','2','21','','2015-06-24 22:50:31');
INSERT INTO mensajes VALUES('15','11','22','','2015-06-24 22:50:31');
INSERT INTO mensajes VALUES('16','2','23','','2015-06-25 18:54:04');
INSERT INTO mensajes VALUES('17','11','24','','2015-06-25 18:54:04');
INSERT INTO mensajes VALUES('18','2','25','','2015-06-25 18:54:12');
INSERT INTO mensajes VALUES('19','11','26','','2015-06-25 18:54:12');
INSERT INTO mensajes VALUES('20','2','27','','2015-06-26 00:45:53');
INSERT INTO mensajes VALUES('21','11','28','','2015-06-26 00:45:53');
INSERT INTO mensajes VALUES('22','2','29','','2015-07-06 19:41:16');
INSERT INTO mensajes VALUES('23','2','30','','2015-07-06 19:42:51');
INSERT INTO mensajes VALUES('24','2','32','','2015-07-14 11:46:39');
INSERT INTO mensajes VALUES('25','2','33','','2015-07-14 11:48:02');
INSERT INTO mensajes VALUES('26','2','34','','2015-07-14 11:50:04');
INSERT INTO mensajes VALUES('27','2','35','','2015-07-14 11:52:02');
INSERT INTO mensajes VALUES('28','2','36','','2015-07-14 11:53:04');
INSERT INTO mensajes VALUES('29','2','37','','2015-07-14 11:54:53');
INSERT INTO mensajes VALUES('30','2','38','','2015-07-14 11:56:33');
INSERT INTO mensajes VALUES('31','2','41','','2015-07-14 17:19:42');



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
INSERT INTO perfils VALUES('5','Root','debug','root',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO perfils_usuarios VALUES('1','1','1');
INSERT INTO perfils_usuarios VALUES('2','2','1');
INSERT INTO perfils_usuarios VALUES('3','3','1');
INSERT INTO perfils_usuarios VALUES('4','4','1');
INSERT INTO perfils_usuarios VALUES('5','6','1');
INSERT INTO perfils_usuarios VALUES('6','1','11');
INSERT INTO perfils_usuarios VALUES('7','2','2');



-- Table:  `planillas`

DROP TABLE IF EXISTS planillas;

CREATE TABLE `planillas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) NOT NULL,
  `principal_planilla_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `principal_planilla_id` (`principal_planilla_id`),
  KEY `proyecto_id` (`proyecto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

INSERT INTO principal_mensajes VALUES('1','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('2','5','Lo han invitado a ser parte de un Proyecto, #2',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('3','3','Alberto Rodriguez ha eliminado el Proyecto #2',NULL,NULL);
INSERT INTO principal_mensajes VALUES('4','5','Lo han invitado a ser parte de un Proyecto, #3',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('5','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('6','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('7','9','Alberto Rodriguez ha revocado la invitacion al Proyecto #3 de un Tutor Académico',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"3\"}');
INSERT INTO principal_mensajes VALUES('8','9','Su invitación al Proyecto #3 ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('9','4','Alberto Rodriguez ha agregado un Tutor Académico al Proyecto #3',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"3\"}');
INSERT INTO principal_mensajes VALUES('10','5','Lo han invitado a ser parte de un Proyecto, #3',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('11','7','Aholimar Hernandez ha aceptado la solicitud de pertenecer al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('12','4','Alberto Rodriguez ha agregado un Tutor Académico al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('13','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('14','4','Alberto Rodriguez ha agregado un Tutor Académico al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('15','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('16','7','Aholimar Hernandez ha aceptado la solicitud de pertenecer al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('17','4','Alberto Rodriguez ha agregado un Estudiante al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('18','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"index\"}');
INSERT INTO principal_mensajes VALUES('19','9','Alberto Rodriguez ha revocado la invitacion al Proyecto #1 de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('20','9','Su invitación al Proyecto #1 ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('21','4','Alberto Rodriguez ha agregado un Estudiante al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('22','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"index\"}');
INSERT INTO principal_mensajes VALUES('23','9','Alberto Rodriguez ha revocado la invitacion al Proyecto #1 de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('24','9','Su invitación al Proyecto #1 ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('25','4','Alberto Rodriguez ha agregado un Estudiante al Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('26','5','Lo han invitado a ser parte de un Proyecto, #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"index\"}');
INSERT INTO principal_mensajes VALUES('27','9','Alberto Rodriguez ha revocado la invitacion al Proyecto #1 de un Estudiante',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('28','9','Su invitación al Proyecto #1 ha sido revocada',NULL,NULL);
INSERT INTO principal_mensajes VALUES('29','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('30','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('31','3','Alberto Rodriguez ha eliminado el Proyecto #3',NULL,NULL);
INSERT INTO principal_mensajes VALUES('32','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('33','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('34','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('35','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('36','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('37','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('38','5','Lo han invitado a ser parte de un Proyecto, #2',NULL,'{\"controller\":\"proyectos\",\"action\":\"indexTutorAcad\"}');
INSERT INTO principal_mensajes VALUES('39','2','Alberto Rodriguez ha actualizado la revision del Proyecto #2',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"2\"}');
INSERT INTO principal_mensajes VALUES('40','2','Alberto Rodriguez ha actualizado la revision del Proyecto #2',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"2\"}');
INSERT INTO principal_mensajes VALUES('41','2','Alberto Rodriguez ha actualizado la revision del Proyecto #1',NULL,'{\"controller\":\"proyectos\",\"action\":\"view\",\"0\":\"1\"}');
INSERT INTO principal_mensajes VALUES('42','3','Alberto Rodriguez ha eliminado el Proyecto #2',NULL,NULL);



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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO programas VALUES('2','Curso Ampliación Enfermería Técnicas Quirúrgicas','Curso Ampliación Enfermería Técnicas Quirúrgicas','1','2');
INSERT INTO programas VALUES('3','Curso de Implantología Dental','Curso de Implantología Dental','1','2');
INSERT INTO programas VALUES('4','Curso de Ortodoncia','Curso de Ortodoncia','1','2');
INSERT INTO programas VALUES('5','Curso Medio en Salud Pública','Curso Medio en Salud Pública','1','2');
INSERT INTO programas VALUES('6','Cursos No Conducentes del Cardiológico Infantil','Cursos No Conducentes del Cardiológico Infantil','1','2');
INSERT INTO programas VALUES('7','Especialización en Anestesia Cardiovascular Pediátrica','Especialización en Anestesia Cardiovascular Pediátrica','1','3');
INSERT INTO programas VALUES('8','Especialización en Anestesiología','Especialización en Anestesiología','1','3');
INSERT INTO programas VALUES('9','Especialización en Cardiología Infantil','Especialización en Cardiología Infantil','1','3');
INSERT INTO programas VALUES('10','Especialización en Ciencias Penales y Criminológicas','Especialización en Ciencias Penales y Criminológicas','1','3');
INSERT INTO programas VALUES('11','Especialización en Derecho Administrativo','Especialización en Derecho Administrativo','1','3');
INSERT INTO programas VALUES('12','Especialización en Derecho  Laboral','Especialización en Derecho  Laboral','1','3');
INSERT INTO programas VALUES('13','Especialización en Derecho Procesal Civil','Especialización en Derecho Procesal Civil','1','3');
INSERT INTO programas VALUES('14','Especialización en Dermatología','Especialización en Dermatología','1','3');
INSERT INTO programas VALUES('15','Especialización en Docencia Universitaria','Especialización en Docencia Universitaria','1','3');
INSERT INTO programas VALUES('16','Especializacion en Ecosonografia Diagnóstica','Especializacion en Ecosonografia Diagnóstica','','3');
INSERT INTO programas VALUES('17','Especialización en Enfermería en Hemoterapia','Especialización en Enfermería en Hemoterapia','1','3');
INSERT INTO programas VALUES('18','Especialización en Enfermería en Nefrología','Especialización en Enfermería en Nefrología','1','3');
INSERT INTO programas VALUES('19','Especialización en Enfermería UCIPN','Especialización en Enfermería UCIPN','1','3');
INSERT INTO programas VALUES('20','Especialización en Medicina del Deporte y la Actividad Física','Especialización en Medicina del Deporte y la Actividad Física','1','3');
INSERT INTO programas VALUES('21','Especialización en Medicina Familiar','Especialización en Medicina Familiar','1','3');
INSERT INTO programas VALUES('22','Especialización en Medicina Interna','Especialización en Medicina Interna','1','3');
INSERT INTO programas VALUES('23','Especialización en Medicina Legal','Especialización en Medicina Legal','1','3');
INSERT INTO programas VALUES('24','Maestría en Control Médico del Entrenamiento Deportivo','Maestría en Control Médico del Entrenamiento Deportivo','1','4');
INSERT INTO programas VALUES('25','Maestría en Desarrollo de Sistemas de Producción Animal','Maestría en Desarrollo de Sistemas de Producción Animal','1','4');
INSERT INTO programas VALUES('26','Maestría en Educación Mención Desarrollo Comunitario','Maestría en Educación Mención Desarrollo Comunitario','1','4');
INSERT INTO programas VALUES('27','Maestría en Educación Mención Enseñanza de la Matemática','Maestría en Educación Mención Enseñanza de la Matemática','1','4');
INSERT INTO programas VALUES('28','Maestría en Educación Mención Investigación Educativa','Maestría en Educación Mención Investigación Educativa','1','4');
INSERT INTO programas VALUES('29','Maestría en Educación Mención  Orientación','Maestría en Educación Mención  Orientación','1','4');
INSERT INTO programas VALUES('30','Maestría en Enfermería Mención Salud Comunitaria','Maestría en Enfermería Mención Salud Comunitaria','1','4');
INSERT INTO programas VALUES('31','Maestría en Enfermermería Materno-Infantil Mención Obstetricia','Maestría en Enfermermería Materno-Infantil Mención Obstetricia','1','4');
INSERT INTO programas VALUES('32','Maestría en Gerencia Administrativa','Maestría en Gerencia Administrativa','1','4');
INSERT INTO programas VALUES('33','Maestría en Gerencia de la Salud Publica','Maestría en Gerencia de la Salud Publica','1','4');
INSERT INTO programas VALUES('34','Maestría en Historia de Venezuela','Maestría en Historia de Venezuela','1','4');
INSERT INTO programas VALUES('35','Doctorado en Ciencias de la Educación','Doctorado en Ciencias de la Educación','1','5');



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
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fase_id` (`fase_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `estado_id` (`estado_id`),
  KEY `programa_id` (`programa_id`),
  KEY `grupo_id` (`grupo_id`),
  KEY `sede_id` (`sede_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO proyectos VALUES('1','consectetur, adipisci velit','1','1','1','1','1','2015-06-11 15:11:37','2015-06-11 15:11:37','','1');



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO revisions VALUES('1','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','1','2015-06-11 15:11:37','1',NULL);
INSERT INTO revisions VALUES('4','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','1','2015-06-16 02:31:40','1',NULL);
INSERT INTO revisions VALUES('5','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-06-16 02:32:18','1',NULL);
INSERT INTO revisions VALUES('6','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-06 19:41:16','1',NULL);
INSERT INTO revisions VALUES('7','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-06 19:42:51','1',NULL);
INSERT INTO revisions VALUES('8','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 11:46:39','1',NULL);
INSERT INTO revisions VALUES('9','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 11:48:01','1',NULL);
INSERT INTO revisions VALUES('10','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 11:50:04','1',NULL);
INSERT INTO revisions VALUES('11','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 11:52:02','1',NULL);
INSERT INTO revisions VALUES('12','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 11:53:04','1',NULL);
INSERT INTO revisions VALUES('13','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 11:54:52','1',NULL);
INSERT INTO revisions VALUES('17','Neque porro quisquam est qui qwdqwd  dolorem ipsum quia dolor sit amet, consectetur, adipisci velit dwdqw dqwd qwd qwdq wd','<p>Lorem ipsum ad his asdad asd as scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><p>sadasdasdasdasd<br></p><br>','<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan \r\neuripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, \r\nquo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, \r\nlegimus senserit definiebas an eos. Eu sit tincidunt incorrupte \r\ndefinitionem, vis mutat affert percipit cu, eirmod consectetuer \r\nsigniferumque eu per. In usu latine equidem dolores. Quo no falli viris \r\nintellegam, ut fugit veritus placerat per.</p>\r\n<p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos\r\n debet libris consulatu. No mei ferri graeco dicunt, ad cum veri \r\naccommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore.\r\n Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi\r\n nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas \r\nqualisque. Eos vocibus deserunt quaestio ei.</p>\r\n<p>Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no \r\nnullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus \r\nphaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus \r\noratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, \r\nid cum ignota senserit intellegat. Sit inani ubique graecis ad, quando \r\ngraecis liberavisse et cum, dicit option eruditi at duo. Homero \r\nsalutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, \r\nnobis feugiat similique usu ex.</p><br>','dolor sit amet, consectetur, adipisci velit','','1','2015-07-14 17:19:42','1',NULL);



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES('1','16407820','$2a$10$NzxSjApyZ9zhc4qaxazhNuehyeNLdLwDJHAbgUq1CNhykpmyCliuG','Alberto','Rodriguez','M','arod.unerg@gmail.com','1','2','2015-06-05 00:40:34','2015-09-08 18:39:14','2015-09-08 17:34:52','1','1','1','','356a192b7913b04c54574d18c28d46e6395428ab');
INSERT INTO usuarios VALUES('2','17062851','$2a$10$kMf12j8pokK3RmDZeF1dLuZ3i0HTnbYrzSRSdBIcWbZ2MzRwImPAO','Aholimar','Hernandez','F','asd4@gmail.com','1','2','2015-01-01 00:00:00','2015-06-25 23:34:17','0000-00-00 00:00:00','1','1','1','','3f1c8e7fbe7c1f3e3045f4d5f5f9811663d07870');
INSERT INTO usuarios VALUES('3','18803696','$2a$10$TqvXbJLU.HERuTBg7ZAWL.5CRvt.pVg8zs0OFAQT63EvYleQf8soW','Francisco','Guedez','M','fguedez@outlook.com','3','2','2015-01-07 18:45:31','2015-01-25 15:44:30','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('4','18044586','$2a$10$QT0d741tV9CgzaLtM6/ykuzPwY2kPkv4VNVmLVJCjHl7P34gM8LT6','Carlos Luis','Ruiz Ramirez','M','ruiz.carlos18@gmail.com','3','2','2015-01-07 18:46:00','2015-03-13 12:08:54','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('5','19473280','$2a$10$WpSIWZ5y8Saio0rIjhJmWuXBBRHOHQ4cEpnopfOAM0.eZNEnTf3ZW','Elso','Marquez','M','elmoro653@hotmail.com','3','2','2015-01-07 18:46:33','2015-01-10 21:18:58','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('6','19473305','$2a$10$sMztw.UBbGZHB0CY1c27XeVwBXfD6rJFiyO4Nv3MYzwCeDNgCyRsS','Celso','Marquez','M','celso.marquez@gmail.com','3','2','2015-01-07 18:46:55','2015-03-13 12:09:25','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('7','16364246','$2a$10$eb64wgXxkIcAVrg9oa16HuGSpHiqjDOrS0OdkuKEIRu/2tpYPindW','Mayra','Rodriguez','F','gymery5@hotmail.com','3','2','2015-01-07 18:47:17','2015-01-10 14:19:28','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('8','9438276','$2a$10$hDMnleQKYSNkAFNE66L.DuYG/e5YeV1nZcS4gBx.X9HcFaY/I.dp6','Johyce','Navas','F','jnavas@unerg.edu.ve','1','2','2015-01-10 11:37:46','2015-01-11 18:57:40','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('9','16074823','$2a$10$ByzAFszPKzmK6CTKW5UXPeYRerFjIqlxCKk/ouKXsnQfjINw/FZpu','Jomar','Matos','M','jmatos@unerg.edu.ve','1','2','2015-01-11 00:00:00','2015-02-19 08:45:46','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('10','16346601','$2a$10$2GuFZJzf0dVV0Ox6y//PceKZNEBW6o59Zkz2SlSzoHQuS09h1D9pS','Soleidy','Peña','F','sapena@unerg.edu.ve','1','2','2015-01-11 00:00:00','2015-03-13 12:09:33','0000-00-00 00:00:00','1','','','','');
INSERT INTO usuarios VALUES('11','123456','$2a$10$XnWtE.oDrYf9ai7gezC8SemRAZDm16ssWcw2TNCGX.H.IC0ufuaHO','Fulano','De Tal','M','asd@gmail.com','1','1','2015-06-23 18:52:46','2015-06-24 22:56:27','2015-06-24 22:56:27','1','','1',NULL,'');



-- Activar la comprobación de la integridad referencial
SET FOREIGN_KEY_CHECKS = 1;


