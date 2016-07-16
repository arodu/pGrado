<?php
	// Lenguaje de i18n
	Configure::write('Config.language', 'esp_inf');
	//$config['Config']['language'] = 'esp_inf';


	// GENERALES
		$config['sistema']['info']['icono'] = '<i class="fa fa-check-square-o fa-fw"></i>';
		$config['sistema']['info']['nombre'] = 'pGrado';
		$config['sistema']['info']['descripcion'] = 'Sistema de Gestión y Seguimiento de Proyectos Académicos';
		$config['sistema']['info']['institucion']['largo'] = 'Área de Ingeniería de Sistemas, UNERG';
		$config['sistema']['info']['institucion']['corto'] = 'AIS UNERG';
		$config['sistema']['info']['fecha'] = '2014 - 2016';

		// VERSION
			$mayor	= '0';
			$minor	= '3';
			$update	= '';
			$bdd	= '3';
			$state	= 'alfa';
			$coment = '';

			$versionLargo = $mayor.'.'.$minor.( ( $update=='' ? '' : '.'.$update) ).'-'.$bdd.' '.( ( $state=='' ? '' : $state) ).' '.( $coment=='' ? '' : '('.$coment.')') ; // 0.3.1-3 alfa (designer)
			$versionCorto = $mayor.'.'.$minor.( ( $update=='' ? '' : '.'.$update) ).' '.( ( $state=='' ? '' : $state) ); // 0.3.1 alfa

		// format 0.1-1 beta
		$config['sistema']['version']['largo'] = $versionLargo;
		$config['sistema']['version']['corto'] = $versionCorto;

	// USUARIO
		$config['sistema']['usuario']['soloUsuariosPreRegistrados'] = false;
		$config['sistema']['usuario']['soloUsuariosAdmin'] = false; 			// Solo pueden acceder usuarios de tipo admin
		$config['sistema']['usuario']['activacionPorCorreo'] = false;

		$config['sistema']['usuario']['avatar_default'] = array(
				'25'  => 'avatar.default.25.png',
				'50'  => 'avatar.default.50.png',
				'90'  => 'avatar.default.90.png',
				'320' => 'avatar.default.320.png',
			);

	// ARCHIVOS
		$config['sistema']['archivos']['descargas'] = ROOT.DS.APP_DIR.DS.'files'.DS.'descargas'.DS;
		$config['sistema']['archivos']['proyectos'] = ROOT.DS.APP_DIR.DS.'files'.DS.'proyectos'.DS;
		$config['sistema']['archivos']['usuarios'] = ROOT.DS.APP_DIR.DS.'files'.DS.'usuarios'.DS;
		$config['sistema']['archivos']['backups'] = ROOT.DS.APP_DIR.DS.'files'.DS.'backups'.DS;


	// CONTACTOS
		$config['sistema']['contactos']['unerg']['network'] = 'http://aisunerg.net.ve';
		$config['sistema']['contactos']['unerg']['url'] = 'http://ais.unerg.edu.ve';
		$config['sistema']['contactos']['facebook']['url'] = 'https://www.facebook.com/pgrado.aisunerg';
		$config['sistema']['contactos']['email'] = 'aisunerg.pg@gmail.com';


	// PROYECTOS
		$config['proyectos']['cantidad']['posiblesPorEstudiante'] = 2;
		//$config['proyectos']['cantidad']['proyectosActivosPosiblesPorEstudiante'] = 1;

		$config['proyectos']['cantidad']['tipo_autor']['estudiante'] = 2;
		$config['proyectos']['cantidad']['tipo_autor']['tutoracad'] = 1;
		$config['proyectos']['cantidad']['tipo_autor']['tutormetod'] = 1;

		$config['proyectos']['archivos']['cantidad'] = 5; // Cantidad de archivos que se pueden guardar por cada proyecto

		$config['proyectos']['tiempo']['eliminacion'] = 24; //Tiempo para poder eliminar un Proyecto, cantidad en HORAS


	// FORMATOS PARA DESCARGAR
		$config['sistema']['descargas'] = array(
				'carta_aceptacion'=>'formato_carta_de_aceptacion.pdf',
				'carta_implementacion'=>'formato_carta_de implementacion.pdf',
				'manual_usuario'=>'Manual_de_ayuda_al_usuario_pGrado.pdf',
				'cronograma_20142'=>'CRONOGRAMA DE PREDEFENSAS 2014-II PROYECTO DE GRADO II.pdf',
				'reglamento_predefensas'=>'Reglamento_Predefensas.pdf',
			);

	// Activar/Desactivar Modulos
		$config['sistema']['modulos'] = array(
				'main.mensajes' => false,
				'main.descargas' => true,

				'proyecto.imprimir' => true,
				'proyecto.revisions' => true,
				'proyecto.archivos' => true,
				'proyecto.escenarios' => true,
				'proyecto.comentarios' => true,
				'proyecto.jurados' => false,
				'proyecto.metas' => false,
				'proyecto.asuntos' => false,

				'external.google_analytics' => false,
				'external.google_recaptcha' => false,
				'external.facebook_page' => false,   // true only if twitter_timeline is false
				'external.twitter_timeline' => false,   // true only if facebook_page is false
			);

/**
  *	Estados - code
  *		 En Espera - espera
  *		 Solicitud - solicitud
  *		 Aprobado - aprobado
  *		 Rechazado - rechazado
  *		 Retirado - retirado
  *		 Cursando - cursando
  *		 Descartado - descartado
  *
  *	Fases - code
  *		Propuesta - propuesta
  *		Proyecto de Grado I - grado1
  *		Proyecto de Grado II - grado2
  *		PreDefensa - predefensa
  *		Defensa - defensa
  *		Publicado - publicado
  *
  *	Perfiles - code
  *		Estudiante - estudiante
  *		Administrador - admin
  *		Tutor Academino - tutoracad
  *		Tutor Metodologico - tutormetod
  *
  *	TipoAutors - code
  *		Estudiante - estudiante
  *		Tutor Academino - tutoracad
  *		Tutor Metodologico - tutormetod
  */
