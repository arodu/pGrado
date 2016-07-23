<?php
App::uses('AppController', 'Controller');
/**
 * Autors Controller
 *
 * @property Autor $Autor
 * @property PaginatorComponent $Paginator
 */
class AutorsController extends AppController {

	public $uses = array('Autor','Mensaje');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
/*
	public function index() {
		$this->Autor->recursive = 0;
		$this->set('autors', $this->Paginator->paginate());
	} */

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*
	public function view($id = null) {
		if (!$this->Autor->exists($id)) {
			throw new NotFoundException(__('Invalid autor'));
		}
		$options = array('conditions' => array('Autor.' . $this->Autor->primaryKey => $id));
		$this->set('autor', $this->Autor->find('first', $options));
	}
*/

	public function view_proyecto_estudiantes($proyecto_id = null){
		$this->layout = 'ajax';
		$proyecto = $this->Autor->Proyecto->getField(array('id','bloqueado','activo'), $proyecto_id);
		if(!$proyecto){ throw new NotFoundException(__('Invalid proyecto')); }
		$this->allowProyecto($proyecto_id);

		$estudiantes = $this->Autor->find('all',array(
			'conditions'=>array(
				'Autor.proyecto_id'=>$proyecto_id,
				'Autor.tipo_autor_id' => $this->Autor->TipoAutor->findIdByCode('estudiante'),
			),
			'contain'=>array(
				'Usuario'=>array('fields'=>array('id','cedula','nombre_completo','email','avatar')),
			),
		));


		$this->set(compact('estudiantes','proyecto'));
	}

	public function add_estudiante($proyecto_id){
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);
		$success = false;

		$tipo_autor_id_estudiante = $this->Autor->TipoAutor->findIdByCode('estudiante');
		$cant_autores = $this->Autor->find('count', array(
			'conditions'=>array(
				'Autor.proyecto_id'=>$proyecto_id,
				'Autor.tipo_autor_id'=> $tipo_autor_id_estudiante,
			)
		));

		$cant_pos_estudiante = Configure::read('proyectos.cantidad.tipo_autor.estudiante');
		if($cant_autores >= $cant_pos_estudiante){
			$this->Flash->call_error('No se pueden Agregar mas Estudiantes a este Proyecto');
			$success = true;
		}

		if($this->request->is('post') and !$success){

			$estudiante = $this->Autor->Usuario->find('first',array(
				'conditions'=>array(
					'Usuario.cedula'=>$this->request->data['Autor']['cedula'],
					'Usuario.tipo_usuario_id'=>$this->Autor->Usuario->TipoUsuario->findIdByCode('estudiante'),
				)
			));

			if(!empty($estudiante)){
				$proyectos_estudiante = $this->Autor->find('list', array(
					'conditions'=>array(
						'Autor.usuario_id'=>$estudiante['Usuario']['id'],
						'Autor.tipo_autor_id'=> $tipo_autor_id_estudiante,
					),
					'fields'=>array('Autor.proyecto_id', 'Autor.activo'),
				));

				$posiblesPorEstudiante = Configure::read('proyectos.cantidad.posiblesPorEstudiante');
				if( isset($proyectos_estudiante[$proyecto_id]) ){
					$this->Flash->call_info('El estudiante ya es parte del Proyecto');
					$success = true;
				}elseif(count($proyectos_estudiante) < $posiblesPorEstudiante){
					$data['Autor'] = array(
						'proyecto_id'=> $proyecto_id,
						'usuario_id'=> $estudiante['Usuario']['id'],
						'tipo_autor_id'=> $tipo_autor_id_estudiante,
						'activo'=> false,
					);
					$this->Autor->create();
					if( $this->Autor->save($data) ){
						$this->Flash->call_success('Estudiante agregado con exito al Proyecto');
						$success = true;
					}else{
						$this->Flash->call_error('Ha ocurrido un error guardando los datos.');
					}
				}else{
					$this->Flash->call_warning('El/La estudiante ya tiene la máxima cantidad de proyectos/propuestas posibles, comuníquese con el/la para que elimine alguna propuesta anterior antes de solicitarle que sea su compañero/a en este proyecto.');
					$success = true;
				}
			}else{
				$this->Flash->alert_error('Numero de cedula <strong>'.$this->request->data['Autor']['cedula'].'</strong> no se encuentra Registrado');
				$this->request->data = null;
			}
			//debug($this->request->data); exit();
		}

		$this->set(compact('proyecto_id', 'success'));
	}

	public function delete_estudiante($id){
		$this->layout = 'ajax';
		$autor = $this->Autor->getField(array('proyecto_id','usuario_id', 'activo'), $id);
		$this->allowProyecto($autor['Autor']['proyecto_id']);
		$success = false;

		if( $autor['Autor']['usuario_id'] == $this->Auth->user('id')){
			$this->Flash->call_warning(__('¿Esta seguro que desea renunciar al Proyecto?'));
		}elseif($autor['Autor']['activo']){
			$this->Flash->call_error(__('No se puede eliminar a un Estudiante Activo en el Proyecto'));
			$success = true;
		}

		$tipo_autor_id_estudiante = $this->Autor->TipoAutor->findIdByCode('estudiante');
		$cant_autores = $this->Autor->find('count', array(
			'conditions'=>array(
				'Autor.proyecto_id'=>$autor['Autor']['proyecto_id'],
				'Autor.tipo_autor_id'=> $tipo_autor_id_estudiante,
			)
		));

		if($cant_autores <= 1){
			$this->Flash->call_error(__('No se puede eliminar a todos los estudiantes del Proyecto'));
			$success = true;
		}

		if($this->request->is('post') and !$success){
			$this->Autor->id = $id;
			if($this->checkUserPassword($this->request->data['Autor']['user_password'])){
				if ($this->Autor->delete()) {
					$this->Flash->call_success(__('Estudiante Eliminado con exito'));
					$success = true;
				}else{
					$this->Flash->alert_error(__('Ha ocurrido un error elimiando al Estudiante.'));
				}
			}else{
				$this->Flash->alert_error(__('Contraseña de usuario Incorrecta.'));
			}
		}

		$this->set('autor_id', $id);
		$this->set('proyecto_id', $autor['Autor']['proyecto_id']);
		$this->set(compact('success'));
	}

	public function view_proyecto_tutors($proyecto_id = null){
		$this->layout = 'ajax';
		$proyecto = $this->Autor->Proyecto->getField(array('id','bloqueado','activo'), $proyecto_id);
		if(!$proyecto){ throw new NotFoundException(__('Invalid proyecto')); }
		$this->allowProyecto($proyecto_id);

		$tutors = $this->Autor->find('all',array(
			'conditions'=>array(
				'Autor.proyecto_id'=>$proyecto_id,
				 // Diferente de Estudiante
				'Autor.tipo_autor_id <>' => $this->Autor->TipoAutor->findIdByCode('estudiante'),
			),
			'contain'=>array(
				'Usuario'=>array('fields'=>array('id','cedula','nombre_completo','email','avatar')),
				'TipoAutor',
			),
		));

		$this->set(compact('tutors','proyecto'));
	}

	public function add_tutor($proyecto_id, $tipo_autor){
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);
		$success = false;

		$tipoAutor = $this->Autor->TipoAutor->find('first',array('conditions'=>array('TipoAutor.code'=>$tipo_autor)));
		$cant_tipo_autor = $this->Autor->find('count', array(
			'conditions'=>array(
				'Autor.proyecto_id'=>$proyecto_id,
				'Autor.tipo_autor_id' => $tipoAutor['TipoAutor']['id'],
			),
		));
		$cant_pos_tipo_autor = Configure::read('proyectos.cantidad.tipo_autor');

		if($cant_tipo_autor >= $cant_pos_tipo_autor[$tipo_autor]){
			$this->Flash->call_error('No se puede agregar otro '.$tipoAutor['TipoAutor']['nombre'].' a este Proyecto');
			$success = true;
		}
		$usuarios_proyecto = $this->Autor->find('list',array('fields'=>array('usuario_id'),'conditions'=>array('Autor.proyecto_id'=>$proyecto_id)));

		if ($this->request->is('post') and !$success){

				if(isset($usuarios_proyecto[ $this->request->data['Autor']['usuario_id'] ])){
					$this->Flash->call_error('El '.$tipoAutor['TipoAutor']['nombre'].' ya es parte de este Proyecto');
					$success = true;
				}else{
					$this->request->data['Autor']['activo'] = false;
					$this->request->data['Autor']['proyecto_id'] = $proyecto_id;
					$this->Autor->create();
					if( $this->Autor->save($this->request->data) ){
						$this->Flash->call_success($tipoAutor['TipoAutor']['nombre'].' agregado con exito al Proyecto');
						$success = true;
					}else{
						$this->Flash->call_error('Ha ocurrido un error guardando los datos.');
					}
				}
		}else{
			$usuarios = $this->Autor->Usuario->listPerfil($tipo_autor, $usuarios_proyecto);
			$this->set(compact('usuarios'));
		}
		$this->set(compact('proyecto_id','success', 'tipoAutor'));
	}

	public function delete_tutor($id){
		$this->layout = 'ajax';
		$autor = $this->Autor->getField(array('proyecto_id','usuario_id', 'activo', 'tipo_autor_id'), $id);
		$tipoAutor = $this->Autor->TipoAutor->getField(array('id','nombre','code'), $autor['Autor']['tipo_autor_id']);
		$this->allowProyecto($autor['Autor']['proyecto_id']);
		$success = false;

		if( $autor['Autor']['usuario_id'] == $this->Auth->user('id')){
			$this->Flash->call_warning(__('¿Esta seguro que desea renunciar al Proyecto?'));
		}elseif($autor['Autor']['activo']){
			$this->Flash->call_error(__('No se puede eliminar a un '.$tipoAutor['TipoAutor']['nombre'].' activo en el Proyecto'));
			$success = true;
		}

		if($this->request->is('post') and !$success){
			$this->Autor->id = $id;
			if($this->checkUserPassword($this->request->data['Autor']['user_password'])){
				if ($this->Autor->delete()) {
					$this->Flash->call_success($tipoAutor['TipoAutor']['nombre'].__(' eliminado con exito'));
					$success = true;
				}else{
					$this->Flash->alert_error(__('Ha ocurrido un error elimiando al '.$tipoAutor['TipoAutor']['nombre'].'.'));
				}
			}else{
				$this->Flash->alert_error(__('Contraseña de usuario Incorrecta.'));
			}
		}

		$this->set('autor_id', $id);
		$this->set('proyecto_id', $autor['Autor']['proyecto_id']);
		$this->set(compact('success','tipoAutor'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function edit($id = null) {
		if (!$this->Autor->exists($id)) {
			throw new NotFoundException(__('Invalid autor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Autor->save($this->request->data)) {
				$this->Session->setFlash(__('The autor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The autor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Autor.' . $this->Autor->primaryKey => $id));
			$this->request->data = $this->Autor->find('first', $options);
		}
		$proyectos = $this->Autor->Proyecto->find('list');
		$usuarios = $this->Autor->Usuario->find('list');
		$tipoAutors = $this->Autor->TipoAutor->find('list');
		$this->set(compact('proyectos', 'usuarios', 'tipoAutors'));
	}
*/

	public function solicitud($id = null,$resp = null) {
		$this->Autor->id = $id;
		if (!$this->Autor->exists()) {
			throw new NotFoundException(__('Invalid autor'));
		}

		if($resp == null){
			return $this->redirect(array('controller'=>'proyectos','action' => 'index'));
		}

		$autor = $this->Autor->find('first',array('conditions'=>array('Autor.id'=>$id),
				'contain'=>array('TipoAutor',
					'Usuario'=>array(
							'fields'=>array('id','nombre_completo'),
						),
				)
			));

		if($autor['Autor']['usuario_id'] != $this->Auth->user('id')){
			throw new NotFoundException(__('Usuario Invalido'));
		}

		$proyecto_id = $autor['Autor']['proyecto_id'];
		$usuarios_id = $this->Autor->find( 'list', array(
			'conditions'=>array(
					'Autor.proyecto_id'=>$proyecto_id,
					'Autor.activo'=>'1',
					'Autor.usuario_id <>'=> $this->Auth->user('id')),
			'fields'=>array('usuario_id')));


		if($resp == 'si'){
			$autor['Autor']['activo'] = true;

			$data['Autor']['id'] = $autor['Autor']['id'];
			$data['Autor']['activo'] = '1';

			if ($this->Autor->save($data)) {
				$this->Session->setFlash(__('Ha aceptado la solicitud, ya puede ingresar al proyecto.'),'alert/success');


				/**/ // MENSAJES
				// Guardar Mensaje
				//$this->Mensaje->saveMensaje( $usuarios_id, 'autor-solsi', $autor['Usuario']['nombre_completo'].' ha aceptado la solicitud de pertenecer al Proyecto #'.$proyecto_id, array('controller'=>'proyectos','action'=>'view',$proyecto_id) );

			} else {
				$this->Session->setFlash(__('The autor could not be saved. Please, try again.'));
			}

		}elseif($resp == 'no'){

			$delete = true;
			if($autor['TipoAutor']['code'] == 'estudiante'){
				$cant_estudiantes = $this->Autor->find('count', array(
					'conditions'=>array(
						'Autor.proyecto_id'=>$autor['Autor']['proyecto_id'],
						'Autor.tipo_autor_id'=>$autor['Autor']['tipo_autor_id'],
					),
				));
				if($cant_estudiantes <= 1){
					$delete = false;
				}
			}

			if($delete){
				$this->Autor->id = $id;
				if ($this->Autor->delete()) {
					$this->Flash->alert_warning(__('No ha aceptado la solicitud, el proyecto se ha borrado de su listado de proyectos.'));

					/**/ // MENSAJES
					// Guardar Mensaje
					//$this->Mensaje->saveMensaje( $usuarios_id, 'autor-solno', $autor['Usuario']['nombre_completo'].' NO ha aceptado la solicitud de pertenecer al Proyecto #'.$proyecto_id, array('controller'=>'proyectos','action'=>'view',$proyecto_id) );

				} else {
					$this->Flash->alert_error(__('The autor could not be deleted. Please, try again.'));
				}
			}else{
				$this->Flash->alert_error(__('Ha ocurrido un error eliminando la solicitud'));
			}
		}

		if($autor['TipoAutor']['code'] == 'estudiante'){
			return $this->redirect(array('controller'=>'proyectos','action' => 'index'));
		}elseif($autor['TipoAutor']['code'] == 'tutoracad'){
			return $this->redirect(array('controller'=>'proyectos','action' => 'indexTutorAcad'));
		}elseif($autor['TipoAutor']['code'] == 'tutormetod'){
			return $this->redirect(array('controller'=>'proyectos','action' => 'indexTutorMetod'));
		}else{
			return $this->redirect(array('controller'=>'pages','action' => 'index'));
		}
	}


}
