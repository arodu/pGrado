<?php
App::uses('AppController', 'Controller');
class ProyectosController extends AppController {
  public $uses = array('Proyecto','Mensaje');
	public $components = array('Paginator', 'Session','Search');
	private $adminRouting = false;

	// *************** METODOS PROYECTOS *************************
		public function verActivo(){
			$this->autoRender = false;
			$proyectos_autor = $this->Proyecto->Autor->find('list',array(
					'conditions'=>array(
						'Autor.usuario_id'=>$this->Auth->user('id'),
						'Autor.tipo_autor_id'=> $this->Proyecto->Autor->TipoAutor->findIdByCode('estudiante'),
						),
					'fields'=>array('proyecto_id'),
				));
			$proyecto = $this->Proyecto->find('first',array(
					'conditions'=>array(
							'Proyecto.id'=>$proyectos_autor,
							'Proyecto.activo'=>'1',
						),
					'recursive'=>-1,
				));

			if(!empty($proyecto)){
				return $this->redirect(array('action'=>'view',$proyecto['Proyecto']['id']));
			}

			$this->Session->setFlash('No se ha encontrado ningún proyecto Activo','alert/warning');
			return $this->redirect(array('action'=>'index'));
		}

		public function index() {
			$proyectos_autor = $this->Proyecto->Autor->find('list',array(
					'conditions'=>array(
						'Autor.usuario_id'=>$this->Auth->user('id'),
						'Autor.tipo_autor_id'=> $this->Proyecto->Autor->TipoAutor->findIdByCode('estudiante'),
					),
					'fields'=>array('proyecto_id'),
				));

			$proyectos = $this->Proyecto->find('all',array(
					'conditions'=>array(
							'Proyecto.id'=>$proyectos_autor,
					),
          'order'=>array(
            'Proyecto.created'=>'desc',
          ),
					'contain'=>array(
							'Categoria','Fase','Estado',
							'Autor'=>array('fields'=>array('id','activo'),
								'Usuario'=>array('fields'=>array('id','cedula_nombre_completo','nombre_completo')),
								'TipoAutor'),
							'Revision'=>array('fields'=>array('Revision.titulo'),'order'=>array('Revision.updated'=>'desc'),'limit'=>'1'),
					),
				));

			$aux = null;
			foreach ($proyectos as $proyecto) {
				$proyecto['Categoria']['nombre'] = $this->Proyecto->Categoria->getRuta($proyecto['Categoria']['id']);
				$aux[] = $proyecto;
			}
			$proyectos = $aux;
			$this->set(compact('proyectos'));

			$this->set('menuActive','estudiante');
		}

		public function indexTutorAcad() {
			$proyectos_autor = $this->Proyecto->Autor->find('list',array(
					'conditions'=>array(
						'Autor.usuario_id'=>$this->Auth->user('id'),
						'Autor.tipo_autor_id'=> $this->Proyecto->Autor->TipoAutor->findIdByCode('tutoracad'),
					),
					'fields'=>array('proyecto_id'),
				));

			$proyectos = $this->Proyecto->find('all',array(
					'conditions'=>array(
							'Proyecto.id'=>$proyectos_autor,
					),
          'order'=>array(
            'Proyecto.created'=>'desc',
          ),
					'contain'=>array(
							'Autor'=>array(
								'fields'=>array('id','activo'),
								'Usuario'=>array('fields'=>array('id','cedula_nombre_completo','nombre_completo')),'TipoAutor'),
							'Categoria',
							'Fase',
							'Estado',
							'Revision'=>array('fields'=>array('Revision.titulo'),'order'=>array('Revision.updated'=>'desc'),'limit'=>'1'),
					),
				));

			$this->set(compact('proyectos'));

			$this->set('menuActive','docente');

			$this->render('index');
		}

		public function indexTutorMetod() {
			$proyectos_autor = $this->Proyecto->Autor->find('list',array(
					'conditions'=>array(
						'Autor.usuario_id'=>$this->Auth->user('id'),
						'Autor.tipo_autor_id'=> $this->Proyecto->Autor->TipoAutor->findIdByCode('tutormetod'),
					),
					'fields'=>array('proyecto_id'),
				));

			$proyectos = $this->Proyecto->find('all',array(
					'conditions'=>array(
							'Proyecto.id'=>$proyectos_autor,
					),
          'order'=>array(
            'Proyecto.created'=>'desc',
          ),
					'contain'=>array(
							'Autor'=>array(
								'fields'=>array('id','activo'),
								'Usuario'=>array('fields'=>array('id','cedula_nombre_completo','nombre_completo')),'TipoAutor'),
							'Categoria',
							'Fase',
							'Estado',
							'Revision'=>array('fields'=>array('Revision.titulo'),'order'=>array('Revision.updated'=>'desc'),'limit'=>'1'),
					),
				));
			$this->set(compact('proyectos'));

			$this->set('menuActive','docente');

			$this->render('index');
		}

		public function indexJurado() {

      $this->verificarModulo('proyecto.jurados');

			$proyectos_jurado = $this->Proyecto->Jurado->find('list',array(
					'conditions'=>array(
						'Jurado.usuario_id'=>$this->Auth->user('id'),
					),
					'fields'=>array('proyecto_id'),
				));

			$proyectos = $this->Proyecto->find('all',array(
					'conditions'=>array(
							'Proyecto.id'=>$proyectos_jurado,
					),
          'order'=>array(
            'Proyecto.created'=>'desc',
          ),
					'contain'=>array(
							'Categoria','Grupo','Fase','Programa','Estado',
							'Autor'=>array(
								'fields'=>array('id','activo'),
								'Usuario'=>array('fields'=>array('id','cedula_nombre_completo','nombre_completo')),'TipoAutor'),
							'Revision'=>array('fields'=>array('Revision.titulo'),'order'=>array('Revision.updated'=>'desc'),'limit'=>'1'),
					),
				));
			$this->set(compact('proyectos'));

			$this->set('menuActive','docente');

			$this->render('new_index');
		}

		public function view($id = null) {

			if (!$this->Proyecto->exists($id)) {
				throw new NotFoundException(__('Invalid proyecto'));
			}

			$proyecto_autor = $this->Proyecto->Autor->find('first',array(
					'conditions'=>array('Autor.proyecto_id'=>$id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
					'contain'=>array('TipoAutor')
				));

			if($this->adminRouting == false){
				if(empty($proyecto_autor)){
					throw new NotFoundException(__('Proyecto no Pertenece al Usuario Actual'));
				}
			}
			//debug($proyecto_autor); exit();

			$options = array(
				'conditions' => array('Proyecto.id' => $id),
				'contain'=>array(
						'Categoria','Sede','Fase','Grupo','Estado','Escenario','Programa',
						'Autor'=>array(
							'TipoAutor',

							'Usuario'=>array('fields'=>array('cedula','cedula_nombre_completo','nombre_completo','id','email','foto'),
								'DescripcionUsuario'
							)
						),
						'Revision'=>array('limit'=>'1','order'=>array('Revision.updated DESC'),'Usuario'=>array('fields'=>array('nombre_completo','id')))
					)
				);

			$proyecto = $this->Proyecto->find('first', $options);

			//$cant_revisiones = $this->Proyecto->Revision->find('count',array('conditions'=>array('Revision.proyecto_id'=>$id)));
			$proyecto['Datos'] = array('cant_revisiones'=>$this->Proyecto->Revision->find('count',array('conditions'=>array('Revision.proyecto_id'=>$id))));


			// Actualiza nombre de la categoria y lo remplaza por la ruta de la linea y el proyecto de la linea
			$proyecto['Categoria']['nombre'] = $this->Proyecto->Categoria->getRuta($proyecto['Categoria']['id']);

			$cant_archivos = $this->Proyecto->Archivo->find('count',array('conditions'=>array('Archivo.proyecto_id' => $id)));

			$this->set(compact('proyecto','proyecto_autor','cant_archivos'));


			$revisionEditable = true;
			$proyectoEditable = false;

			if($proyecto['Proyecto']['activo']){
				$proyectoEditable = false;
			}else{
				if(@$proyecto_autor['TipoAutor']['code'] == 'estudiante'){
					$proyectoEditable = true;
				}
			}

			if($this->adminRouting == true){
				$revisionEditable = false;
				$proyectoEditable = false;
			}

			$cant_comentarios = $this->Proyecto->Comentario->find('count',array(
						'conditions'=>array('Comentario.proyecto_id'=>$id)
					));

			$this->set(compact('proyectoEditable','revisionEditable','cant_comentarios'));


			if(@$proyecto_autor['TipoAutor']['code'] == 'estudiante'){
				$this->set('menuActive','estudiante');
			}elseif(@$proyecto_autor['TipoAutor']['code'] == 'tutormetod'){
				$this->set('menuActive','docente');
			}elseif(@$proyecto_autor['TipoAutor']['code'] == 'tutoracad'){
				$this->set('menuActive','docente');
			}
		}

		public function printView($id = null){
			$this->layout = 'print';
			$this->view($id);
            //$this->render("Planillas/print_proyecto");
		}

    public function printPdf($id = null){
			$this->layout = 'printPdf';
			$this->view($id);
            $this->response->type('application/pdf');
            $this->set('title_for_layout', 'planilla001_'.$id);

            //$this->set( 'verificacion', $this->genCodeVerificacion('001/'.$proyecto['Revision'][0]['id'] ));

            //$this->render("Planillas/print_proyecto");
		}

		public function add() {
			$cant_pos_proyectos = Configure::read('proyectos.cantidad.posiblesPorEstudiante');

			$cant_proyectos = $this->Proyecto->Autor->find('count',array(
				'conditions'=>array(
					'Autor.usuario_id'=>$this->Auth->user('id'),
					'Autor.tipo_autor_id'=> $this->Proyecto->Autor->TipoAutor->findIdByCode('estudiante'),
				)));

			if($cant_proyectos >= $cant_pos_proyectos){
				$this->Session->setFlash(__('Ya se ha encontrado la máxima cantidad de proyectos/propuestas posibles. Si desea, puede eliminar alguna propuesta anterior antes de crear una nueva propuesta.'),'alert/danger');
				return $this->redirect(array('action' => 'index'));
			}

			if ($this->request->is('post')) {
				$this->Proyecto->set($this->request->data);
				$this->Proyecto->Revision->set($this->request->data);
				if($this->Proyecto->validates() && $this->Proyecto->Revision->validates())	{

					$grupo = $this->Proyecto->Grupo->find('first',array(
							'conditions'=>array('Grupo.id'=>$this->request->data['Proyecto']['grupo_id']),
							'fields'=>array('id','fase_id'),
							'recursive'=>'-1',
						));

					$fase_id = ( $grupo['Grupo']['fase_id'] ? $grupo['Grupo']['fase_id'] : $this->Proyecto->Fase->findIdByCode('propuesta') );

					$estado_id = $this->Proyecto->Estado->findIdByCode('espera');

					$pre_proyecto = array('sede_id'=> $this->Session->read('userInfo.Sede.id') ,'fase_id'=>$fase_id, 'estado_id'=>$estado_id,'activo'=>'0');

					$proyecto['Proyecto'] = array_merge($this->request->data['Proyecto'],$pre_proyecto);

					$this->Proyecto->create();
					if($this->Proyecto->save($proyecto)){
						$guardar = true;

						$this->Proyecto->Autor->create();
						$autor['Autor'] = array('proyecto_id' => $this->Proyecto->id,'usuario_id' =>$this->Auth->user('id'),'tipo_autor_id' => $this->Proyecto->Autor->TipoAutor->findIdByCode('estudiante'),'activo' => '1');
						if( !$this->Proyecto->Autor->save($autor) ){ $guardar = false; }


						if($this->request->data['Autor']['tutor_id'] != ''){
							$this->Proyecto->Autor->create();
							$tutor['Autor'] = array('proyecto_id' => $this->Proyecto->id, 'usuario_id' =>$this->request->data['Autor']['tutor_id'], 'tipo_autor_id' => $this->Proyecto->Autor->TipoAutor->findIdByCode('tutoracad'), 'activo' => '0');
							if( !$this->Proyecto->Autor->save($tutor) ){ $guardar = false; }
						}

						$this->Proyecto->Revision->create();
						$revision['Revision'] = array_merge($this->request->data['Revision'],array('proyecto_id'=>$this->Proyecto->id,'usuario_id'=>$this->Auth->user('id')));
						if( !$this->Proyecto->Revision->save($revision) ){ $guardar = false; }

						$this->Proyecto->Escenario->create();
						$escenario['Escenario'] = array('proyecto_id'=>$this->Proyecto->id);
						if( !$this->Proyecto->Escenario->save($escenario) ){ $guardar = false; }

						if( $guardar ){
							$this->Session->setFlash(__('Su Propuesta ha sido guardada correctamente.'),'alert/success');

							if( $this->request->data['Autor']['tutor_id'] != '' ){
								$proyecto_id = $this->Proyecto->id;
								$usuarios_id = array($this->request->data['Autor']['tutor_id']);
								$action = 'indexTutorAcad';
								$this->Mensaje->saveMensaje( $usuarios_id, 'autor-inv', 'Lo han invitado a ser parte de un Proyecto, #'.$proyecto_id, array('controller'=>'proyectos','action'=>$action) );
							}

							return $this->redirect(array('action' => 'index'));
						}else{
							$this->Proyecto->delete();
							$this->Session->setFlash(__('La Propuesta no se pudo guardar correctamente. Por favor, inténtelo nuevamente.'),'alert/danger');
						}

					}

				} else {
				  	$this->Session->setFlash(__('La Propuesta no se pudo guardar correctamente. Por favor, inténtelo nuevamente.'),'alert/danger');
				}
			}

			$tipo_usuario_id = '2';
			$usuarios_proyecto = array( $this->Auth->user('id') );

      $tutors = $this->Proyecto->Autor->Usuario->listPerfil('tutoracad', $usuarios_proyecto);

			//$categorias = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'1'),null,null,'|---');

			$programas = $this->Proyecto->Programa->find('list', array(
					'fields'=>array('Programa.id','Programa.nombre','TipoPrograma.nombre'),
					'conditions'=>array('activo'=>'1'),
					'order'=>array('Programa.nombre'),
					'recursive'=>0,
				));
			$sedes = $this->Proyecto->Sede->find('list');

			$grupos = $this->Proyecto->Grupo->find('list',array('conditions'=>array('activo'=>'1')));

			$fases = $this->Proyecto->Fase->find('list');
			$estados = $this->Proyecto->Estado->find('list');

			$this->set(compact('sedes', 'grupos', 'fases', 'estados', 'programas','tutors'));

			$this->set('menuActive','estudiante');
		}

		public function getCategoria($programa_id = null){
			$this->layout = 'ajax';
			$categorias = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'1','programa_id'=>$programa_id),null,null,'|---');
			$this->set(compact('categorias'));
		}

		public function escenarioEdit($proyecto_id = null) {
			$this->verificarModulo('proyecto.escenarios');

			$proyecto_autor = $this->Proyecto->Autor->find('first',array(
					'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
					'contain'=>array('Proyecto'=>array('fields'=>array('id','tema','activo'))),
					'recursive'=>-1,
				));

			$this->set('proyecto',$proyecto_autor['Proyecto']);

			if(empty($proyecto_autor) || $proyecto_autor['Proyecto']['activo']){
				throw new NotFoundException(__('Invalid proyecto'));
			}

			if ($this->request->is(array('post', 'put'))) {
				if ($this->Proyecto->Escenario->save($this->request->data)) {
					$this->Session->setFlash(__('The escenario has been saved.'),'alert/success');

					/**/ // MENSAJES
					// Guardar Mensaje
					$usuarios_id = $this->Proyecto->Autor->find('list',array(
						'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.activo'=>'1','Autor.usuario_id <>'=>$this->Auth->user('id')),
						'fields'=>array('usuario_id')));
					$this->Mensaje->saveMensaje( $usuarios_id, 'proy-edit', $this->Auth->user('nombre_completo').' ha modificado el escenario del Proyecto', array('controller'=>'proyectos','action'=>'view',$proyecto_id) );
					/**/

					return $this->redirect(array('action' => 'view',$proyecto_id));
				} else {
					$this->Session->setFlash(__('The escenario could not be saved. Please, try again.'),'alert/danger');
				}

			} else {
				$options = array('conditions' => array('Escenario.proyecto_id' => $proyecto_id));
				$this->request->data = $this->Proyecto->Escenario->find('first', $options);
			}
		}

		public function view_jurados($proyecto_id = null) {

			$this->layout = 'ajax';

			$proyecto_autor = $this->Proyecto->Autor->find('first',array(
				'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
				'recursive'=>-1,
			));

			if(empty($proyecto_autor)){
				throw new NotFoundException(__('Invalid proyecto'));
			}

			$jurados_data = $this->Proyecto->Jurado->find('all',array(
					'conditions'=>array('Jurado.proyecto_id'=>$proyecto_id),
					'contain'=>array(
						'TipoJurado',
						'Usuario'=>array('fields'=>array('id','nombre_completo','email','foto')),
					),
				));


			$aux = null;
			foreach ($jurados_data as $jurado_data) {
				$aux[$jurado_data['Jurado']['fase_id']][] = $jurado_data;
			}

			$this->set('jurados',$aux);

			$fases = $this->Proyecto->Fase->find('list',array('order'=>array('orden'=>'DESC')));

			$this->set('fases',$fases);
		}


		public function delete($id = null) {
			$this->Proyecto->id = $id;
			if (!$this->Proyecto->exists()) {
				throw new NotFoundException(__('Invalid proyecto'));
			}

			$proyecto_autor = $this->Proyecto->find('first',array(
				'conditions'=>array('Proyecto.id'=>$id,'Proyecto.activo'=>'0'),
				'contain'=>array(
						'Autor'=>array('conditions'=>array('Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>'1')),
					)
				));

			$proyecto_id = $id;
			$usuarios_id = $this->Proyecto->Autor->find('list',array(
				'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.activo'=>'1','Autor.usuario_id <>'=>$this->Auth->user('id')),
				'fields'=>array('usuario_id')));

			if(empty($proyecto_autor) || empty($proyecto_autor['Autor'])){
				throw new ForbiddenException('Acceso Denegado.');
			}


			/* Revisar fecha de creacion del proyecto*/
				$total_seconds = strtotime('now') - strtotime($proyecto_autor['Proyecto']['created']);
				$total_horas = floor ( $total_seconds / 3600 );
				$tiempo_eliminacion = Configure::read('proyectos.tiempo.eliminacion');
				if($total_horas <= $tiempo_eliminacion){
					$this->Session->setFlash(__('Solo se puede eliminar un Proyecto '.$tiempo_eliminacion.' horas despues de ser creado'),'alert/danger');
					return $this->redirect(array('action'=>'view',$id));
				}
			/* FIN Revisar fecha de creacion del proyecto*/


			$this->request->allowMethod('post', 'delete');
			if ($this->Proyecto->delete()) {
				$this->Session->setFlash(__('Proyecto eliminado correctamente.'),'alert/success');

				/**/ // MENSAJES
				// Guardar Mensaje
				$this->Mensaje->saveMensaje( $usuarios_id, 'proy-delet', $this->Auth->user('nombre_completo').' ha eliminado el Proyecto #'.$proyecto_id);
				/**/

			} else {
				$this->Session->setFlash(__('El Proyecto no se ha eliminado correctamente. Por favor, inténtelo de nuevo.'),'alert/danger');
			}


			return $this->redirect(array('action' => 'index'));
		}


	// *************** BLOQUE ADMIN ROUTING **********************
		public function admin_index(){
			$this->Proyecto->recursive = 0;

			$this->Paginator->settings = array(
				'limit' => ( isset($this->request->query['limit']) ? $this->request->query['limit'] : 20 ),
				'contain'=>array(
						'Categoria','Fase','Grupo','Estado','Sede','Programa',
						'Revision'=>array(
								'order'=>array('updated'=>'DESC'),'limit'=>'1',
								'fields'=>array('id','titulo'),
							),
						'Autor'=>array('TipoAutor',
								'Usuario'=>array('fields'=>array('cedula_nombre_completo','cedula','nombre_completo','sexo'))
							)
					),
				'order'=>array('Proyecto.created'=>'DESC'),
			);

			$proyectos = $this->Paginator->paginate('Proyecto',$this->Search->getConditions());
			$this->set(compact('proyectos'));

			if(isset($this->request->query['tipo']) && $this->request->query['tipo'] == 'csv'){
				$this->layout = 'vacio';
				$this->response->download("export_".date('YmdHms').".csv");
				$this->render('export/admin_csv');
				return;
			}else if(isset($this->request->query['tipo']) && $this->request->query['tipo'] == 'pdf'){
				$this->layout = 'vacio';
				$this->render('export/admin_pdf');
				return;
			}else{

				//$aux_categorias = $this->Proyecto->Categoria->find('list',array('fields'=>array('id','nombre','activo')));
				$categorias_activo = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'1'),null,null,'|---');
				$categorias_inactivo = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'0'),null,null,'|---');

				$categorias = array();
					if( !empty($categorias_activo) ){ $categorias['Activos'] = $categorias_activo; }
					if( !empty($categorias_inactivo) ){ $categorias['Inactivo'] = $categorias_inactivo; }

				$fases = $this->Proyecto->Fase->find('list');
				$estados = $this->Proyecto->Estado->find('list');
				$sedes = $this->Proyecto->Sede->find('list');
				$programas = $this->Proyecto->Programa->find('listActivo');

				$grupos = $this->Proyecto->Grupo->find('listActivo');

				$this->set(compact('fases','estados','categorias','grupos','sedes','programas'));
			}
		}

		public function admin_view($id = null){
			$this->adminRouting = true;
			$this->view($id);
			$this->set('adminView',true);
			$this->set('menuActive','admin');
			$this->render('view');
		}

		public function admin_estados_list($fase_id){
			$this->layout = 'ajax';
			$estados = $this->Proyecto->Estado->find('list',array(
					'conditions'=>array(
						'or'=>array(
								array('Estado.fase_id'=>'0'),
								array('Estado.fase_id'=>$fase_id),
							)
						),
					'order'=>array('Estado.orden'=>'ASC'),
				));
			$this->set(compact('estados'));
		}

		public function admin_reporte(){
			$this->Proyecto->recursive = 0;

			$this->Paginator->settings = array(
				'limit' => 20,
				'contain'=>array(
					'Categoria','Fase','Grupo','Estado','Sede',
					'Autor'=>array('TipoAutor','Usuario'=>array('fields'=>array('cedula_nombre_completo','nombre_completo')))),
			);

			$proyectos = $this->Paginator->paginate('Proyecto',$this->Search->getConditions());

			$aux_categorias = $this->Proyecto->Categoria->find('list',array('fields'=>array('id','nombre','activo')));
				$categorias = array();
				if(isset($aux_categorias[1])){ $categorias['Activos'] =$aux_categorias[1]; }
				if(isset($aux_categorias[0])){ $categorias['Inactivos'] =$aux_categorias[0]; }


			$fases = $this->Proyecto->Fase->find('list');
			$estados = $this->Proyecto->Estado->find('list');
			$sedes = $this->Proyecto->Sede->find('list');

			$aux_grupos = $this->Proyecto->Grupo->find('list',array('fields'=>array('id','nombre','activo')));
				$grupos = array();
				if(isset($aux_grupos[1])){ $grupos['Activos'] =$aux_grupos[1]; }
				if(isset($aux_grupos[0])){ $grupos['Inactivos'] =$aux_grupos[0]; }

			$this->set(compact('proyectos','fases','estados','categorias','grupos','sedes'));
		}

		public function admin_edit($id = null) {
			if (!$this->Proyecto->exists($id)) {
				throw new NotFoundException(__('Invalid proyecto'));
			}

			/*$proyecto_autor = $this->Proyecto->Autor->find('first',array(
				'conditions'=>array('Autor.proyecto_id'=>$id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
				'recursive'=>-1,
				)); */

			if ($this->request->is(array('post', 'put'))) {
				if ($this->Proyecto->save($this->request->data)) {
	                $this->Session->setFlash('El Proyecto ha sido modificado correctamente.','alert/success');

					/**/ // MENSAJES
					// Guardar Mensaje
					$usuarios_id = $this->Proyecto->Autor->find('list',array(
						'conditions'=>array('Autor.proyecto_id'=>$id,'Autor.activo'=>'1'),
						'fields'=>array('usuario_id')));
					$this->Mensaje->saveMensaje( $usuarios_id, 'proy-edit', 'La Coordinación ha modificado su Proyecto', array('controller'=>'proyectos','action'=>'view',$id) );
					/**/

	                return $this->redirect(array('action' => 'view','admin'=>true,$id));

				} else {
					$this->Session->setFlash(__('The proyecto could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Proyecto.' . $this->Proyecto->primaryKey => $id));
				$this->request->data = $proyecto = $this->Proyecto->find('first', $options);
			}

			$programas = $this->Proyecto->Programa->find('list',array(
					'fields'=>array('Programa.id','Programa.nombre','TipoPrograma.nombre'),
					'conditions'=>array('Programa.activo'=>'1'),
					'recursive'=>0,
				));

			$grupos = $this->Proyecto->Grupo->find('list');


			$programa_id = $proyecto['Proyecto']['programa_id'];
			$categorias = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'1','programa_id'=>$programa_id),null,null,'|---');

			$sedes = $this->Proyecto->Sede->find('list');
			$fases = $this->Proyecto->Fase->find('list');
			$fase_id = $proyecto['Proyecto']['fase_id'];
			$estados = $this->Proyecto->Estado->find('list',array(
					'conditions'=>array(
						'or'=>array(
								array('Estado.fase_id'=>'0'),
								array('Estado.fase_id'=>$fase_id),
							)
						),
					'order'=>array('Estado.orden'=>'ASC'),
				));

			$this->set(compact('categorias','programas', 'grupos','sedes', 'fases', 'estados'));
		}



		public function admin_edit_batch() {

			if ($this->request->is(array('post', 'put'))) {



			}

			$programas = $this->Proyecto->Programa->find('list',array(
					'fields'=>array('Programa.id','Programa.nombre','TipoPrograma.nombre'),
					'recursive'=>0,
				));

			$categorias = array();

			$sedes = $this->Proyecto->Sede->find('list');
			$fases = $this->Proyecto->Fase->find('list');
			$grupos = $this->Proyecto->Grupo->find('list');
			$estados = array();

			$this->set(compact('categorias','programas', 'grupos','sedes', 'fases', 'estados'));
		}

		public function admin_asignacion_jurados($id = null, $fase_id = null){

			$proyecto = $this->Proyecto->find('first',array(
				'conditions'=>array(
						'Proyecto.id'=>$id,
					),
			));

			if (!$proyecto) {
				throw new NotFoundException(__('Invalid proyecto'));
			}

			if( $fase_id == null){
				$fase_id = $proyecto['Proyecto']['fase_id'];
			}

			$fases = $this->Proyecto->Fase->find('list',array('conditions'=>array('Fase.tiene_jurados'=>true)));

			if( !isset( $fases[$fase_id] )){
				throw new NotFoundException(__('Invalid fase'));
			}

			if ($this->request->is(array('post', 'put'))) {

				ksort($this->request->data['Jurado']);
				$jurados = $this->request->data['Jurado'];
				$proyecto_id = $this->request->data['Proyecto']['id'];


				//debug($jurados); exit();

				$jurados_data = null;
				$jurados_id = null;
				foreach ($jurados as $jurado) {
					$aux = null;
					$aux['proyecto_id'] = $proyecto_id;
					$aux['fase_id'] = $fase_id;

					$jurados_data[]['Jurado'] = array_merge($jurado,$aux);
					if ( $jurado['id'] != '' ){ $jurados_id[] =  $jurado['id']; }
				}

				$jurados_rmv = $this->Proyecto->Jurado->find('list',array(
					'conditions'=>array(
							'Jurado.proyecto_id'=>$proyecto_id,
							'Jurado.fase_id'=>$fase_id,
							'NOT'=>array('Jurado.id' => $jurados_id),
						)
				));

				if( !empty($jurados_rmv) ){
					$this->Proyecto->Jurado->deleteAll( array('Jurado.id'=>$jurados_rmv) );
				}

				if($this->Proyecto->Jurado->saveMany($jurados_data)){
					$this->Session->setFlash(__('Asignación de Jurados en la fase <strong>'.$fases[$fase_id].'</strong> realizado con exito'),'alert/success');
					return $this->redirect(array('action'=>'asignacion_jurados',$id,$fase_id,'admin'=>true));
				}

			}else{

				$jurados = $this->Proyecto->Jurado->find('all',array(
						'conditions'=>array(
								'Jurado.proyecto_id' => $proyecto['Proyecto']['id'],
								'Jurado.fase_id' => $fase_id,
							),
					));

				$this->set('jurados',$jurados);

			}

			$proyecto = $this->Proyecto->find('first',array(
						'conditions'=>array('Proyecto.id'=>$id),
						'contain'=>array(
								'Fase','Estado',
								'Revision'=>array(
										'limit'=>'1','order'=>array('Revision.updated'=>'DESC'),
										'fields'=>array('id','titulo')
									),
								'Autor'=>array(
									'conditions'=>array(
										'Autor.tipo_autor_id'=>$this->Proyecto->Autor->TipoAutor->findIdByCode( array('estudiante','tutoracad') ),
									),
									'Usuario'=>array(
										'fields'=>array('cedula_nombre_completo'),
									)
								),
							),
					));

			$usuarios = $this->Proyecto->Autor->Usuario->find('list',array(
					'conditions'=>array('Usuario.tipo_usuario_id' =>  $this->Proyecto->Autor->Usuario->TipoUsuario->findIdByCode('profesor') ),
					'fields'=>array('id','nombre_completo'),
					'order'=>array('nombres','apellidos'),
				));

			$tipo_jurados = $this->Proyecto->Jurado->TipoJurado->find('list');

			$fase = $this->Proyecto->Fase->find('first',array(
					'conditions'=>array('Fase.id'=>$fase_id),
				));

			$this->set(compact('proyecto','usuarios','tipo_jurados','fases','fase_id','fase'));
		}


}
