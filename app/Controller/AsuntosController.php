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
	public function index($proyecto_id, $view) {
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);

		$asuntos = $this->Asunto->find('all', array(
			'conditions'=>array(
				'Asunto.proyecto_id'=>$proyecto_id,
			),
		));

		$this->set(compact('asuntos', 'proyecto_id'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asunto->exists($id)) {
			throw new NotFoundException(__('Invalid asunto'));
		}
		$options = array('conditions' => array('Asunto.' . $this->Asunto->primaryKey => $id));
		$this->set('asunto', $this->Asunto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Asunto->create();
			if ($this->Asunto->save($this->request->data)) {
				$this->Flash->success(__('The asunto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The asunto could not be saved. Please, try again.'));
			}
		}
		$metas = $this->Asunto->Meta->find('list');
		$proyectos = $this->Asunto->Proyecto->find('list');
		$propietarios = $this->Asunto->Propietario->find('list');
		$responsables = $this->Asunto->Responsable->find('list');
		$this->set(compact('metas', 'proyectos', 'propietarios', 'responsables'));
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asunto->save($this->request->data)) {
				$this->Flash->success(__('The asunto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The asunto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asunto.' . $this->Asunto->primaryKey => $id));
			$this->request->data = $this->Asunto->find('first', $options);
		}
		$metas = $this->Asunto->Metum->find('list');
		$proyectos = $this->Asunto->Proyecto->find('list');
		$propietarios = $this->Asunto->Propietario->find('list');
		$responsables = $this->Asunto->Responsable->find('list');
		$this->set(compact('metas', 'proyectos', 'propietarios', 'responsables'));
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
			$this->Flash->success(__('The asunto has been deleted.'));
		} else {
			$this->Flash->error(__('The asunto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
