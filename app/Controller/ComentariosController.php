<?php
App::uses('AppController', 'Controller');

class ComentariosController extends AppController {

	//public $uses = array('Comentario','Mensaje');
	public $layout = 'ajax';

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
								'Usuario'=>array('fields'=>array('id','nombre_completo','avatar'))
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
		// $this->set('proyecto_bloqueado', $this->Comentario->Proyecto->bloqueado($proyecto_id));
	}

	public function add() {
		$this->layout = 'ajax';
		if ($this->request->is('post')) {
			$this->allowProyecto($this->request->data['proyecto_id']);
			if(!empty($this->request->data['texto'])){
				$comentario['Comentario'] = array(
					'usuario_id'=>$this->Auth->user('id'),
					'texto'=>$this->toLink($this->request->data['texto']),
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
		$this->userOwner($this->Comentario, $id);
		$this->allowProyecto($proyecto_id);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			//$proyecto_id = $this->Comentario->find('proyecto_id', array('conditions'=>array('Comentario.id'=>$id)));
			//$this->revisarProyecto($this->request->data['proyecto_id']); // Revisa si el usuario actual tiene acceso al proyecto
			$this->request->data['Comentario']['texto'] = $this->toLink($this->request->data['Comentario']['texto']);

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
		$this->request->data['Comentario']['texto'] = strip_tags($this->request->data['Comentario']['texto']);
		$this->set(compact('success','proyecto_id'));
	}

	private function toLink($text){
		$text = html_entity_decode($text);
		$text = " ".$text;
		$text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)','<a href="\1" target="_blank">\1</a>', $text);
		$text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_+.~#?&//=]+)','<a href="\1" target="_blank">\1</a>', $text);
		$text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)','\1<a href="http://\2" target="_blank">\2</a>', $text);
		$text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})','<a href="mailto:\1" target="_blank">\1</a>', $text);
		return $text;
	}

	public function delete($id = null) {
		$this->layout = 'ajax';
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Comentario Invalido!'));
		}
		$this->userOwner($this->Comentario, $id);
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
		$this->set(compact('success', 'proyecto_id'));
	}

}
