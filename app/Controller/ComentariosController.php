<?php
App::uses('AppController', 'Controller');

class ComentariosController extends AppController {

	//public $uses = array('Comentario','Mensaje');

	public function beforeFilter(){
		$this->verificarModulo('proyecto.comentarios');
		parent::beforeFilter();
	}

	public function index($proyecto_id, $tipo = null) {
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);
		$options = array(
						'conditions'=>array('Comentario.proyecto_id'=>$proyecto_id),
						'order'=>array('Comentario.created'=>'DESC'),
						'contain'=>array(
								'Usuario'=>array('fields'=>array('id','nombre_completo','foto'))
							),
					);

		if($tipo == 'coment-users'){
			$options['conditions'] = array_merge($options['conditions'], array('Comentario.usuario_id >'=>0));
		}elseif($tipo == 'coment-system'){
			$options['conditions'] = array_merge($options['conditions'], array('Comentario.usuario_id'=>0));
		}
		$comentarios = $this->Comentario->find('all',$options);
		$this->set('comentarios',$comentarios);
		$this->set('proyecto_id',$proyecto_id);
	}

	public function add() {
		$this->layout = 'ajax';
		if ($this->request->is('post')) {
			$this->allowProyecto($this->request->data['proyecto_id']);
			if(!empty($this->request->data['texto'])){
				$comentario['Comentario'] = array(
					'usuario_id'=>$this->Auth->user('id'),
					'texto'=>$this->request->data['texto'],
					'proyecto_id'=>$this->request->data['proyecto_id'],
				);

				$this->Comentario->create();
				if ($this->Comentario->save($comentario)) {
					return $this->redirect(array('action' => 'index',$this->request->data['proyecto_id']));
				}
			}else{
				return $this->redirect(array('action' => 'index',$this->request->data['proyecto_id']));
			}
		}
		throw new InternalErrorException();
	}

	public function edit($id = null) {
		$this->layout = 'ajax';
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Comentario Invalido!'));
		}

		$proyecto_id = $this->Comentario->find('proyecto_id', array('conditions'=>array('Comentario.id'=>$id)));
		$this->allowProyecto($proyecto_id);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			//$proyecto_id = $this->Comentario->find('proyecto_id', array('conditions'=>array('Comentario.id'=>$id)));
			//$this->revisarProyecto($this->request->data['proyecto_id']); // Revisa si el usuario actual tiene acceso al proyecto

			if ($this->Comentario->save($this->request->data)) {
				$this->Flash->call_success('Comentario Editado');
				$success = true;
			}else{
				$this->Flash->call_error('Ha Ocurrido un error editando el comentario.');
			}
		} else {
			$options = array('conditions' => array('Comentario.id' => $id));
			$this->request->data = $this->Comentario->find('first', $options);
		}
		$this->set(compact('success'));
	}

	public function delete($id = null) {
		$this->layout = 'ajax';
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Comentario Invalido!'));
		}

		$proyecto_id = $this->Comentario->find('proyecto_id', array('conditions'=>array('Comentario.id'=>$id)));
		$this->allowProyecto($proyecto_id);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Comentario']['eliminado'] = true;
			if ($this->Comentario->save($this->request->data)) {
				$this->Flash->call_success('Comentario Eliminado');
				$success = true;
			}else{
				$this->Flash->call_error('Ha Ocurrido un error eliminando el comentario.');
			}
		} else {
			$options = array('conditions' => array('Comentario.id' => $id));
			$this->request->data = $this->Comentario->find('first', $options);
		}
		$this->set(compact('success'));
	}


}
