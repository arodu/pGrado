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
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'ajax';

		if ($this->request->is('post')) {
			$error = '';
			$guardar = true;

			$cant_tipo_autor = Configure::read('proyectos.cantidad.tipo_autor');

			$proyecto = $this->Autor->Proyecto->find('first',array(
					'conditions'=>array('Proyecto.id'=>$this->request->data['Autor']['proyecto_id']),
					'contain'=>array(
							//'Autor'=>array('TipoAutor')
						),
					'recursive'=>-1,
				));

			if($proyecto['Proyecto']['activo']===true){
				$guardar = false;
				$error = 'No se puede Agregar un '.$this->request->data['Autor']['tipoAutorNombre'].' a un Proyecto Activo.';
			}

			$cant_actual = $this->Autor->find('count',array(
					'conditions'=>array(
						'Autor.proyecto_id'=>$this->request->data['Autor']['proyecto_id'],
						'Autor.tipo_autor_id'=>$this->request->data['Autor']['tipo_autor_id'],
					),
				));

			// ---------------------- REVISAR QUE ESTUDIANTE PUEDE AGREGAR
			// ----------------------
			// FALTA AGREGAR QUE NO BUSQUE ESTUDIANTEs QUE YA TENGAN OTROS PROYECTOS, O QUE TENGAN OTROS PROYECTOS ACTIVOS
				$autors_proyecto2 = $this->Autor->find('list',array(
					'conditions'=>array(
						'Autor.proyecto_id'=>$this->request->data['Autor']['proyecto_id'],
					),'fields'=>array('usuario_id'),
				));

				foreach ($autors_proyecto2 as $autor_usuario_id) {
					if($autor_usuario_id == $this->request->data['Autor']['usuario_id']){
						$guardar = false;
						$error = 'El '.$this->request->data['Autor']['tipoAutorNombre'].' ya es parte del Proyecto';
					}
				}

				//debug($this->request->data);
				if($this->request->data['Autor']['tipoAutorNombre'] == 'Estudiante'){

					$cant_proyectos = $this->Autor->find('count',array(
						'conditions'=>array(
							'Autor.usuario_id'=>$this->request->data['Autor']['usuario_id'],
							'Autor.tipo_autor_id'=>$this->Autor->TipoAutor->findIdByCode('estudiante'))));

					$cant_proyectos_posibles = Configure::read('proyectos.cantidad.posiblesPorEstudiante');

					if( $cant_proyectos >= $cant_proyectos_posibles ){
						$guardar = false;

						$estudiante = $this->Autor->Usuario->find('first',array(
								'conditions'=>array('Usuario.id'=>$this->request->data['Autor']['usuario_id']),
								'recursive'=>-1,
								'fields'=>'nombre_completo',
							));

						$error = 'El/La estudiante <strong>'.$estudiante['Usuario']['nombre_completo'].'</strong> ya tiene la máxima cantidad de proyectos/propuestas posibles, comuníquese con el/la para que elimine alguna propuesta anterior antes de solicitarle que sea su compañero/a en este proyecto.';
					}
				}


			// ---------------------- REVISAR QUE ESTUDIANTE PUEDE AGREGAR

			$code = $this->Autor->TipoAutor->find('first',array('conditions'=>array('TipoAutor.id'=>$this->request->data['Autor']['tipo_autor_id']),'recursive'=>-1));

			if($cant_actual >= $cant_tipo_autor[$code['TipoAutor']['code']]){
				$guardar = false;
				$error = "No se pueden agregar otro ".$code['TipoAutor']['nombre']." en este proyecto";
			}


			if($guardar){
				$this->Autor->create();
				if ($this->Autor->save($this->request->data)) {
					$this->Session->setFlash($this->request->data['Autor']['tipoAutorNombre'].' ha sido Guardado', 'alert/success');

						/**/ // MENSAJES
						// Guardar Mensaje
						$proyecto_id = $this->request->data['Autor']['proyecto_id'];
						$usuarios_id = $this->Autor->find( 'list', array(
							'conditions'=>array(
									'Autor.proyecto_id'=>$proyecto_id,
									'Autor.activo'=>'1',
									'Autor.usuario_id <>'=> $this->Auth->user('id')),
							'fields'=>array('usuario_id')));

						$this->Mensaje->saveMensaje( $usuarios_id, 'autor-add', $this->Auth->user('nombre_completo').' ha agregado un '.$this->request->data['Autor']['tipoAutorNombre'].' al Proyecto #'.$proyecto_id, array('controller'=>'proyectos','action'=>'view',$proyecto_id) );

						$usuarios_id = array($this->request->data['Autor']['usuario_id']);

						$action = 'index';
						if($code['TipoAutor']['code'] == 'tutoracad'){
							$action = 'indexTutorAcad';
						}elseif($code['TipoAutor']['code'] == 'tutormetod'){
							$action = 'indexTutorMetod';
						}
						$this->Mensaje->saveMensaje( $usuarios_id, 'autor-inv', 'Lo han invitado a ser parte de un Proyecto, #'.$proyecto_id, array('controller'=>'proyectos','action'=>$action) );
						/**/

				} else {
					$this->Session->setFlash('Error al Guardar:<br/>'.$error, 'alert/danger');
				}
			}else{
				$this->Session->setFlash('Error al Guardar:<br/>'.$error, 'alert/danger');
			}
			return $this->redirect(array('controller'=>'proyectos','action' => 'view',$this->request->data['Autor']['proyecto_id']));
		}


		if ($this->request->is('get')) {

			$tipoAutorCode = $this->request->query['tipoAutor'];
			$proyecto_id = $this->request->query['proyecto_id'];

			$tipoAutor = $this->Autor->TipoAutor->find('first',array('conditions'=>array('TipoAutor.code'=>$tipoAutorCode),'recursive'=>-1));
			$usuarios_proyecto = $this->Autor->find('list',array('fields'=>array('usuario_id'),'conditions'=>array('Autor.proyecto_id'=>$proyecto_id)));

			if($tipoAutor['TipoAutor']['code'] == 'estudiante'){
				return $this->redirect(array('action'=>'addCompanero',$proyecto_id));
			}elseif($tipoAutor['TipoAutor']['code'] == 'tutoracad'){
				$usuarios = $this->Autor->Usuario->listPerfil('tutoracad', $usuarios_proyecto);
			}elseif($tipoAutor['TipoAutor']['code'] == 'tutormetod'){
				$usuarios = $this->Autor->Usuario->listPerfil('tutormetod', $usuarios_proyecto);
			}else{
				$usuarios = array();
			}
			$this->set(compact('proyecto_id', 'tipoAutor','usuarios'));
		}
	}

	public function addCompanero($proyecto_id){
		$this->layout = 'ajax';

		if ($this->request->is('post')) {

			$proyecto_autor = $this->Autor->find('first',array(
					'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
					'recursive'=>-1,
				));

			if(empty($proyecto_autor)){
				throw new NotFoundException(__('Invalid proyecto'));
			}

			$tipo_usuario_id = '1';
			$companero = $this->Autor->Usuario->find('first',array(
				'conditions'=>array(
					'Usuario.cedula'=>$this->request->data['Autor']['cedula'],
					'Usuario.tipo_usuario_id'=>$tipo_usuario_id,
					)
				));

			if(!empty($companero)){

				//debug($this->request->data); exit();

				/*array(
					'Autor' => array(
						'proyecto_id' => '7',
						'usuario_id' => '3',
						'tipo_autor_id' => '3',
						'tipoAutorNombre' => 'Tutor Metodologico'
					)
				)*/
				$data['Autor']['proyecto_id'] = $this->request->data['Autor']['proyecto_id'];
				$data['Autor']['usuario_id'] = $companero['Usuario']['id'];
				$data['Autor']['tipo_autor_id'] = '1';
				$data['Autor']['tipoAutorNombre'] = 'Estudiante';

				$this->request->data = $data;

				$this->add();

			}else{
				$this->Session->setFlash('Numero de Cedula <strong>'.$this->request->data['Autor']['cedula'].'</strong> no se encuentra Registrado','alert/danger');
			}
			return $this->redirect(array('controller'=>'proyectos','action' => 'view',$this->request->data['Autor']['proyecto_id']));

		}

		$this->set('proyecto_id',$proyecto_id);

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
				$this->Mensaje->saveMensaje( $usuarios_id, 'autor-solsi', $autor['Usuario']['nombre_completo'].' ha aceptado la solicitud de pertenecer al Proyecto #'.$proyecto_id, array('controller'=>'proyectos','action'=>'view',$proyecto_id) );

			} else {
				$this->Session->setFlash(__('The autor could not be saved. Please, try again.'));
			}

		}elseif($resp == 'no'){
			$this->Autor->id = $id;
			if ($this->Autor->delete()) {
				$this->Session->setFlash(__('No ha aceptado la solicitud, el proyecto se ha borrado de su listado de proyectos.'),'alert/warning');

				/**/ // MENSAJES
				// Guardar Mensaje
				$this->Mensaje->saveMensaje( $usuarios_id, 'autor-solno', $autor['Usuario']['nombre_completo'].' NO ha aceptado la solicitud de pertenecer al Proyecto #'.$proyecto_id, array('controller'=>'proyectos','action'=>'view',$proyecto_id) );

			} else {
				$this->Session->setFlash(__('The autor could not be deleted. Please, try again.'));
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


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Autor->id = $id;

		$autor = $this->Autor->find('first',array('conditions'=>array('Autor.id'=>$id),
			'contain'=>array(
					'Proyecto','TipoAutor',
				)
			));

		$usuario_auth = $this->Autor->find('first',array(
				'conditions'=>array(
					'Autor.proyecto_id'=>$autor['Proyecto']['id'],
					'Autor.usuario_id'=>$this->Auth->user('id'),
					'Autor.activo'=>'1',
				),'recursive'=>-1
			));

		if (!$autor || $autor['Autor']['activo'] || $autor['Proyecto']['activo'] || !$usuario_auth) {
			throw new NotFoundException(__('Invalid autor'));
		}

		$this->request->allowMethod('post', 'delete');

		if ($this->Autor->delete()) {
			$this->Session->setFlash(__('El '.$autor['TipoAutor']['nombre'].' seleccionado ha sido eliminado correctamente.'),'alert/success');

			$proyecto_id = $autor['Proyecto']['id'];
			$usuarios_id = $this->Autor->find( 'list', array(
				'conditions'=>array(
						'Autor.proyecto_id'=>$proyecto_id,
						'Autor.activo'=>'1',
						'Autor.usuario_id <>'=> $this->Auth->user('id')),
				'fields'=>array('usuario_id')));
			$this->Mensaje->saveMensaje( $usuarios_id, 'autor-delet', $this->Auth->user('nombre_completo').' ha revocado la invitacion al Proyecto #'.$proyecto_id.' de un '.$autor['TipoAutor']['nombre'], array('controller'=>'proyectos','action'=>'view',$proyecto_id) );

			$usuarios_id = array( $autor['Autor']['usuario_id'] );
			$this->Mensaje->saveMensaje( $usuarios_id, 'autor-delet', 'Su invitación al Proyecto #'.$proyecto_id.' ha sido revocada');



		} else {
			$this->Session->setFlash(__('El '.$autor['TipoAutor']['nombre'].' seleccionado NO ha sido eliminado correctamente. Por favor, intentelo de nuevo.'),'alert/danger');
		}

		return $this->redirect(array('controller'=>'proyectos','action' => 'view',$autor['Autor']['proyecto_id']));

	}

}
