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

/**
 * index method
 *
 * @return void
 */
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
				'Propietario'=>array(
					'fields'=>array('id', 'nombres', 'apellidos', 'updated_foto'),
				),
				'Responsable'=>array(
					'fields'=>array('id', 'nombres', 'apellidos', 'updated_foto'),
				),
			)
		));

		$metas = $this->Asunto->Meta->generateTreeList(null,null,null,'&nbsp;&nbsp;&nbsp;&nbsp;');
		$usuarios_proyecto = $this->Asunto->Proyecto->Autor->usuarios($proyecto_id);
		$this->set(compact('asuntos', 'proyecto_id', 'metas', 'usuarios_proyecto'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 /*
	public function view($id = null) {
		if (!$this->Asunto->exists($id)) {
			throw new NotFoundException(__('Invalid asunto'));
		}
		$options = array('conditions' => array('Asunto.' . $this->Asunto->primaryKey => $id));
		$this->set('asunto', $this->Asunto->find('first', $options));
	}
	*/

/**
 * add method
 *
 * @return void
 */
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
			$this->request->data['Asunto']['propietario_id'] = $this->Auth->user('id');

			$this->Asunto->create();
			if ($this->Asunto->save($this->request->data)) {
				$this->Flash->call_success(__('The asunto has been saved.'));
				$success = true;
			} else {
				$this->Flash->call_error(__('The asunto could not be saved. Please, try again.'));
			}
		}
		$metas = $this->Asunto->Meta->generateTreeList(null,null,null,'--- ');
		$responsables = $this->Asunto->Proyecto->Autor->usuarios($proyecto_id);
		$this->set(compact('metas', 'responsables','proyecto_id', 'success'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Asunto->exists($id)) {
			throw new NotFoundException(__('Invalid asunto'));
		}
		$this->layout = 'ajax';
		$proyecto_id = $this->Asunto->find('proyecto_id', array('conditions'=>array('Asunto.id'=>$id)));
		$this->allowProyecto($proyecto_id);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asunto->save($this->request->data)) {
				$this->Flash->call_success(__('The asunto has been saved.'));
				$success = true;
			} else {
				$this->Flash->call_error(__('The asunto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asunto.id' => $id));
			$this->request->data = $this->Asunto->find('first', $options);
		}
		$metas = $this->Asunto->Meta->generateTreeList(null,null,null,'--- ');
		$responsables = $this->Asunto->Proyecto->Autor->usuarios($proyecto_id);
		$this->set(compact('metas', 'responsables','proyecto_id', 'success'));
	}

	public function change($id = null){
		


	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Asunto->id = $id;
		if (!$this->Asunto->exists()) {
			throw new NotFoundException(__('Invalid asunto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Asunto->delete()) {
			$this->Flash->call_success(__('The asunto has been deleted.'));
		} else {
			$this->Flash->call_error(__('The asunto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
