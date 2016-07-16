<?php
	$config = array(
		'Permisos'=>array(
				//Controladores
				'proyectos'=>array(
						'index'=>array('estudiante'),
						'verActivo'=>array('estudiante'),
						'add'=>array('estudiante'),
						'getCategoria'=>array('estudiante'),
						'escenarioEdit'=>array('estudiante'),
						'delete'=>array('estudiante'),

						'indexTutorAcad'=>array('tutoracad'),
						'indexTutorMetod'=>array('tutormetod'),
						'indexJurado'=>array('tutoracad'),

						'view'=>array('estudiante','tutoracad','tutormetod'),
						'printView'=>array('estudiante','tutoracad','tutormetod'),
						'view_jurados'=>array('estudiante','tutoracad','tutormetod'),

						'admin_index'=>array('admin','coordpg'),
						'admin_view'=>array('admin','coordpg'),
						'admin_estados_list'=>array('coordpg'),
						'admin_edit'=>array('coordpg'),
						'admin_asignacion_jurados'=>array('coordpg'),
						'admin_edit_batch'=>array('coordpg'),
					),

				'metas'=>array(
					'index'=>array('estudiante','tutoracad','tutormetod'),
					'add'=>array('estudiante','tutoracad','tutormetod'),
					'view'=>array('estudiante','tutoracad','tutormetod'),
					'edit'=>array('estudiante','tutoracad','tutormetod'),
					'delete'=>array('estudiante','tutoracad','tutormetod'),
				),

				'asuntos'=>array(
					'index'=>array('estudiante','tutoracad','tutormetod'),
					'add'=>array('estudiante','tutoracad','tutormetod'),
					'view'=>array('estudiante','tutoracad','tutormetod'),
					'edit'=>array('estudiante','tutoracad','tutormetod'),
					'delete'=>array('estudiante','tutoracad','tutormetod'),
				),

				'administrator'=>array(
						//'print_asignacion_jurados'=>array('coordpg'),
					),

				'jurados'=>array(
						'datos_impresion'=>array('coordpg'),
						'grupo_meta'=>array('coordpg'),
						'buscar_proyectos'=>array('coordpg'),


						// Imresiones PDF
							'cartas_asignacion_defensa'=>array('coordpg'),
							'actas_evaluacion_defensa'=>array('coordpg'),
					),

				'archivos'=>array(
						'index'=>'loged',
						'view'=>'loged',
						'view2'=>'loged',
						'add'=>'loged',
						'download'=>'loged',
						'imagen'=>'loged',
						'miniatura'=>'loged',
						'delete'=>'loged',
					),

				'comentarios'=>array(
						'index'=>'loged',
						'add'=>'loged',
						'edit'=>'loged',
						'delete'=>'loged',
					),

				'planillas'=>array(
						'aprobacionPropuesta'=>array('estudiante'),
						'verificar'=>array('coordpg'),
						'asignacion_jurados'=>array('coordpg'),
					),

				'usuarios'=>array(
						'index'=>'loged',
						'view'=>'loged',
						'view_pop'=>'loged',
						'edit'=>'loged',
						'editpassword'=>'loged',
						'editcategorias'=>'loged',

						'getUpdatedFoto'=>'loged',
						'add_foto'=>'loged',
						'existeFoto'=>'loged',
						'getFoto'=>'loged',
					),

				'mensajes'=>array(
						'index'=>'loged',
						'view'=>'loged',
						'lista_mensajes'=>'loged',
						'delete'=>'loged',
						'deleteAll'=>'loged',
					),

				'revisions'=>array(
						'index'=>array('estudiante','tutoracad','tutormetod'),
						'edit'=>array('estudiante','tutoracad','tutormetod'),
					),

				'autors'=>array(
						'add'=>array('estudiante'),
						'addCompanero'=>array('estudiante'),
						'solicitud'=>array('estudiante','tutoracad','tutormetod'),
						'delete'=>array('estudiante'),
					),

				'pages'=>array(
						'index'=>'loged',
						'test'=>array('loged'),
						'creditos'=>'loged',
						'descargas'=>'loged',
						'file_upload'=>'loged',
						'error'=>'loged',
						'directorio'=>array('coordpg'),
					),

					'descargas'=>array(
						'index'=>'loged',
						'download'=>'loged',
						'admin'=> array('coordpg'),
						'add'=>array('coordpg'),
						'edit'=> array('coordpg'),
						'delete'=>array('coordpg'),
					),

				)
			);
