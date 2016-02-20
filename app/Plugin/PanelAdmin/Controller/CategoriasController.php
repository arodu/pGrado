<?php
App::uses('PanelAdminAppController', 'PanelAdmin.Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 */
class CategoriasController extends PanelAdminAppController {

	public $uses = array('Categoria');

	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->Paginator->paginate());

		$categorias_list = $this->Categoria->find('threaded',array(
				'recursive'=>-1,
				'fields'=>array('id','parent_id','programa_id','nombre'),
			));
		$this->set('categorias_list',$categorias_list);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));

		$categorias_ruta = $this->Categoria->getRuta($id);
		$this->set('categorias_ruta', $categorias_ruta);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		}

		$categorias_list = $this->Categoria->generateTreeList(null,null,null,'|---');
		$usuarios = $this->Categoria->Usuario->find('list');

		$this->set(compact('categorias_list','usuarios'));

	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}

		$categorias_list = $this->Categoria->generateTreeList(null,null,null,'|---');
		$usuarios = $this->Categoria->Usuario->find('list',array(
				'conditions'=>array('Usuario.tipo_usuario_id'=> $this->Categoria->Usuario->TipoUsuario->findIdByCode('profesor') ),
				'fields'=>array('id','cedula_nombre_completo'),
			));

		$this->set(compact('categorias_list','usuarios'));

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('The categoria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categoria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function recrearArbol(){
		$this->Categoria->recover('parent');
		//$this->Session->setFlash(__('Ar'));
		return $this->redirect( array('action'=>'index') );
	}


}
