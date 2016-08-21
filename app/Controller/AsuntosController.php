<?php
App::uses('AppController', 'Controller');
/**
 * Asuntos Controller
 *
 * @property Asunto $Asunto
 * @property PaginatorComponent $Paginator
 */
class AsuntosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $layout = 'ajax';

	public function index($proyecto_id) {
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);

		$asuntos = $this->Asunto->find('all', array(
			'conditions'=>array(
				'Asunto.proyecto_id'=>$proyecto_id,
			),
			'order'=>array('Asunto.num_secuencia'=>'desc'),
			'contain'=>array(
				'Meta',
				'Usuario'=>array(
					'fields'=>array('id', 'nombres', 'apellidos', 'nombre_completo', 'avatar'),
				),
				'Responsable'=>array(
					'fields'=>array('id', 'nombres', 'apellidos', 'avatar'),
				),
			)
		));

		$metas = $this->Asunto->Meta->generateTreeList(array('Meta.proyecto_id'=>$proyecto_id),null,null,'&nbsp;&nbsp;&nbsp;&nbsp;');
		$usuarios_proyecto = $this->Asunto->Proyecto->Autor->usuarios($proyecto_id);
		$this->set(compact('asuntos', 'proyecto_id', 'metas', 'usuarios_proyecto'));
		$this->set('proyecto_bloqueado',$this->Asunto->Proyecto->bloqueado($proyecto_id));
	}

	public function add($proyecto_id) {
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);
		$success = false;
		if ($this->request->is('post')) {

			$ultimo_asunto = $this->Asunto->find('first',array(
				'conditions'=>array('Asunto.proyecto_id'=>$proyecto_id),
				'order'=>array('Asunto.num_secuencia'=>'desc'),
				'limit'=>1,
			));

			$this->request->data['Asunto']['num_secuencia'] = @$ultimo_asunto['Asunto']['num_secuencia'] + 1;
			$this->request->data['Asunto']['usuario_id'] = $this->Auth->user('id');

			$this->Asunto->create();
			if ($this->Asunto->save($this->request->data)) {
				$this->Asunto->Meta->review($proyecto_id);
				$this->Flash->call_success(__('The asunto has been saved.'));
				$this->sistemaComentario($proyecto_id, 'Nuevo asunto creado <span class="sub-comment">#'.$this->request->data['Asunto']['num_secuencia'].'</span>');
				$success = true;
			} else {
				$this->Flash->call_error(__('The asunto could not be saved. Please, try again.'));
			}
		}
		$metas = $this->Asunto->Meta->generateTreeList(array('Meta.proyecto_id'=>$proyecto_id),null,null,'--- ');
		$responsables = $this->Asunto->Proyecto->Autor->usuarios($proyecto_id);
		$this->set(compact('metas', 'responsables','proyecto_id', 'success'));
	}

	public function edit($id = null) {
		$this->layout = 'ajax';
		if (!$this->Asunto->exists($id)) { throw new NotFoundException(__('Invalid asunto')); }
		$proyecto_id = $this->Asunto->find('proyecto_id', array('conditions'=>array('Asunto.id'=>$id)));
		$this->allowProyecto($proyecto_id);
		$this->userOwner($this->Asunto, $id);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asunto->save($this->request->data)) {
				$this->Asunto->Meta->review($proyecto_id);
				$this->Flash->call_success(__('The asunto has been saved.'));
				$this->sistemaComentario($proyecto_id, 'Asunto editado <span class="sub-comment">#'.$this->request->data['Asunto']['num_secuencia'].'</span>');
				$success = true;
			} else {
				$this->Flash->call_error(__('The asunto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asunto.id' => $id));
			$this->request->data = $this->Asunto->find('first', $options);
		}
		$metas = $this->Asunto->Meta->generateTreeList(array('Meta.proyecto_id'=>$proyecto_id),null,null,'--- ');
		$responsables = $this->Asunto->Proyecto->Autor->usuarios($proyecto_id);
		$this->set(compact('metas', 'responsables','proyecto_id', 'success'));
	}

	public function change($id = null){
		$asunto = $this->Asunto->find('first', array('conditions' => array('Asunto.id' => $id)));
		if (!$asunto) { throw new NotFoundException(__('Invalid asunto')); }
		$this->allowProyecto($asunto['Asunto']['proyecto_id']);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {

			$cerrado = ( $asunto['Asunto']['cerrado'] ? false : true );

			$data['Asunto'] = array(
				'id'=>$asunto['Asunto']['id'],
				'cerrado' => $cerrado,
			);

			if ($this->Asunto->save($data)) {
				$this->Asunto->Meta->review($asunto['Asunto']['proyecto_id']);
				$this->Flash->call_success(__('The asunto has been saved.'));

				if($cerrado){
					$this->sistemaComentario($asunto['Asunto']['proyecto_id'], 'Asunto cerrado <span class="sub-comment">#'.$asunto['Asunto']['num_secuencia'].'</span>');
				}else{
					$this->sistemaComentario($asunto['Asunto']['proyecto_id'], 'Asunto abierto <span class="sub-comment">#'.$asunto['Asunto']['num_secuencia'].'</span>');
				}

				$success = true;
			} else {
				$this->Flash->call_error(__('The asunto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $asunto;
		}
		$this->set('proyecto_id', $asunto['Asunto']['proyecto_id']);
		$this->set(compact('asunto', 'success'));
	}

	public function delete($id = null) {
		if (!$this->Asunto->exists($id)) { throw new NotFoundException(__('Invalid asunto')); }
		$this->request->allowMethod('post', 'delete');
		if ($this->Asunto->delete()) {
			//$this->Asunto->Meta->review($asunto['Asunto']['proyecto_id']);
			$this->Flash->call_success(__('The asunto has been deleted.'));
		} else {
			$this->Flash->call_error(__('The asunto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
