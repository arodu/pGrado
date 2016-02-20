<?php
App::uses('AppController', 'Controller');
/**
 * Metas Controller
 *
 * @property Meta $Meta
 * @property PaginatorComponent $Paginator
 */
class MetasController extends AppController {

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
	public function index( $proyecto_id ) {
		if( $this->Meta->Proyecto->acceso( $this->Auth->user('id'), $proyecto_id) != true ){
			throw new NotFoundException(__('Acceso Denegado'));
		}

		$metas = $this->Meta->find('threaded',array(
			'conditions'=>array('Meta.proyecto_id'=>$proyecto_id)
		));

		$this->set( compact('metas','proyecto_id') );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Meta->exists($id)) {
			throw new NotFoundException(__('Invalid meta'));
		}
		$options = array('conditions' => array('Meta.' . $this->Meta->primaryKey => $id));
		$this->set('meta', $this->Meta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($proyecto_id) {
		$this->layout = 'default';

		if( $this->Meta->Proyecto->acceso( $this->Auth->user('id'), $proyecto_id) != true ){
			throw new NotFoundException(__('Acceso Denegado'));
		}

		if ($this->request->is('post')) {
			$this->Meta->create();

			debug($this->request->data);

			if ($this->Meta->save($this->request->data)) {
				$this->Session->setFlash(__('The meta has been saved.'));
				return $this->redirect(array('action' => 'index',$proyecto_id));
			} else {
				$this->Session->setFlash(__('The meta could not be saved. Please, try again.'));
			}
		}
		$metas = $this->Meta->generateTreeList(null,null,null,'|---');
		$this->set(compact('metas','proyecto_id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Meta->exists($id)) {
			throw new NotFoundException(__('Invalid meta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Meta->save($this->request->data)) {
				$this->Session->setFlash(__('The meta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Meta.' . $this->Meta->primaryKey => $id));
			$this->request->data = $this->Meta->find('first', $options);
		}
		$proyectos = $this->Meta->Proyecto->find('list');
		$parentMetas = $this->Meta->ParentMetum->find('list');
		$this->set(compact('proyectos', 'parentMetas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Meta->id = $id;
		if (!$this->Meta->exists()) {
			throw new NotFoundException(__('Invalid meta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Meta->delete()) {
			$this->Session->setFlash(__('The meta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The meta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
