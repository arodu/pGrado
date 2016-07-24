<?php
	$config = array(
		'Permisos'=>array(

				'admin'=>array(
					'proyectos_index'=>array('coordpg','admin','root'),
					'proyectos_edit'=>array('coordpg','admin','root'),
					'proyectos_move'=>array('coordpg','admin','root'),
					'proyectos_move_trans'=>array('coordpg','admin','root'),
					'usuarios_directorio'=>array('coordpg','admin','root'),
				),

				'grupos'=>array(
					'index'=>array('coordpg','admin','root'),
					'add'=>array('coordpg','admin','root'),
					'view'=>array('coordpg','admin','root'),
					'edit'=>array('coordpg','admin','root'),
					'delete'=>array('coordpg','admin','root'),
				),

				//Controladores
				'proyectos'=>array(
						'index'=>array('loged'),
						'verActivo'=>array('estudiante'),

						'add'=>array('estudiante'),
						'getCategoria'=>array('estudiante'),
						'escenario_edit'=>array('estudiante'),
						'delete'=>array('estudiante'),

						'indexTutorAcad'=>array('tutoracad'),
						'indexTutorMetod'=>array('tutormetod'),
						'indexJurado'=>array('tutoracad'),

						'view'=>'loged',
						'info'=>'loged',
						'printView'=>array('estudiante','tutoracad','tutormetod'),
						'view_jurados'=>array('estudiante','tutoracad','tutormetod'),

						'pdf_view'=>'loged',
						'selectlist_programas'=>'loged',
						'selectlist_fases'=>'loged',

						//'admin_index'=>array('admin','coordpg'),
						//'admin_view'=>array('admin','coordpg'),
						//'admin_estados_list'=>array('coordpg'),
						//'admin_edit'=>array('coordpg'),
						'admin_asignacion_jurados'=>array('coordpg'),
						//'admin_edit_batch'=>array('coordpg'),
					),

				'metas'=>array(
					'index'=>array('loged'),
					'add'=>array('loged'),
					'edit'=>array('loged'),
					'change'=>array('loged'),
					//'view'=>array('loged'),
					//'delete'=>array('loged'),
				),

				'asuntos'=>array(
					'index'=>array('loged'),
					'add'=>array('loged'),
					'edit'=>array('loged'),
					'change'=>array('loged'),
					//'view'=>array('loged'),
					//'delete'=>array('loged'),
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

				'escenarios'=>array(
						'view'=>'loged',
						'edit'=>'loged',
				),

				'planillas'=>array(
						'aprobacionPropuesta'=>array('estudiante'),
						'verificar'=>array('coordpg'),
						'asignacion_jurados'=>array('coordpg'),
					),

				'usuarios'=>array(
						'index'=>'loged',
						'view'=>'loged',
						'popover'=>'loged',
						'edit'=>'loged',
						'editpassword'=>'loged',
						'editcategorias'=>'loged',

						'getUpdatedFoto'=>'loged',
						'add_foto'=>'loged',
						'existeFoto'=>'loged',
						'getFoto'=>'loged',

						'foto'=>'public',
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
						'add'=>array('estudiante', 'coordpg', 'admin', 'root'),
						'addCompanero'=>array('estudiante'),
						'solicitud'=>array('estudiante','tutoracad','tutormetod'),
						'delete'=>array('estudiante'),

						'view_proyecto_estudiantes'=>'loged',
						'add_estudiante'=>array('estudiante', 'coordpg', 'admin', 'root'),
						'delete_estudiante'=>array('estudiante', 'coordpg', 'admin', 'root'),

						'view_proyecto_tutors'=>'loged',
						'add_tutor'=>array('estudiante', 'coordpg', 'admin', 'root'),
						'delete_tutor'=>array('estudiante', 'coordpg', 'admin', 'root'),
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
