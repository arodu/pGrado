<?php
App::uses('PanelAdminAppController', 'PanelAdmin.Controller');
/**
 * Documentos Controller
 *
 * @property Documento $Documento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DocumentosController extends PanelAdminAppController {

	public $uses = array('Documento');

	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Documento->recursive = 0;
		$this->set('documentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Documento->exists($id)) {
			throw new NotFoundException(__('Invalid documento'));
		}
		$options = array('conditions' => array('Documento.' . $this->Documento->primaryKey => $id));
		$documento = $this->Documento->find('first', $options);
		$this->set('documento', $documento);

		if($documento['TipoDocumento']['code'] == 'aprob-prop'){

			$data = (array)json_decode($documento['Documento']['data']);
			$this->loadModel('Usuario');

			$new_data = $this->Usuario->find('list',array(
				'conditions'=>array('Usuario.id'=>$data['jurados_id']),
				'fields'=>array('id','nombre_completo'),
				));
			$this->set('new_data',$new_data);
		}




	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Documento->create();
			if ($this->Documento->save($this->request->data)) {
				$this->Session->setFlash(__('The documento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The documento could not be saved. Please, try again.'));
			}
		}
		$tipoDocumentos = $this->Documento->TipoDocumento->find('list');
		$proyectos = $this->Documento->Proyecto->find('list');
		$this->set(compact('tipoDocumentos', 'proyectos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Documento->exists($id)) {
			throw new NotFoundException(__('Invalid documento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Documento->save($this->request->data)) {
				$this->Session->setFlash(__('The documento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The documento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Documento.' . $this->Documento->primaryKey => $id));
			$this->request->data = $this->Documento->find('first', $options);
		}
		$tipoDocumentos = $this->Documento->TipoDocumento->find('list');
		$proyectos = $this->Documento->Proyecto->find('list');
		$this->set(compact('tipoDocumentos', 'proyectos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Documento->id = $id;
		if (!$this->Documento->exists()) {
			throw new NotFoundException(__('Invalid documento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Documento->delete()) {
			$this->Session->setFlash(__('The documento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The documento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
