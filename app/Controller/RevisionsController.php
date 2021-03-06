<?php
App::uses('AppController', 'Controller');
/**
 * Revisions Controller
 *
 * @property Revision $Revision
 * @property PaginatorComponent $Paginator
 */
class RevisionsController extends AppController {


	public $uses = array('Revision','Mensaje');
	public $layout = 'adminlte';
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter(){
		$this->verificarModulo('proyecto.revisions');
		parent::beforeFilter();
	}


/**
 * index method
 *
 * @return void
 */
	public function index($proyecto_id) {

		$this->allowProyecto($proyecto_id);

		$this->Revision->recursive = 0;
		$ultima = $this->Revision->find('first',array('conditions'=>array('Revision.proyecto_id'=>$proyecto_id),'order'=>array('Revision.updated DESC')));

		$this->Paginator->settings = array(
			'limit' => 1,
			'order'=>array('Revision.updated'=>'DESC'),
			);

		$revisions =  $this->Paginator->paginate('Revision',array('Revision.proyecto_id'=>$proyecto_id, 'Revision.id <>'=>$ultima['Revision']['id']));

		$this->set(compact('revisions','ultima'));

	}

	public function view( $proyecto_id ) {

		$revision = $this->Revision->find('first',array(
				'conditions'=>array(
						'Revision.proyecto_id'=>$proyecto_id,
					),
				'limit'=>'1',
				'order'=>array('updated'=>'DESC'),
			));

		$this->set(compact('revision'));

	}

/**
 * add method
 *
 * @return void
 */
/* public function add() {

		if ($this->request->is('post')) {
			debug($this->request->data); exit();
			$this->Revision->create();
			if ($this->Revision->save($this->request->data)) {
				$this->Session->setFlash(__('The revision has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The revision could not be saved. Please, try again.'));
			}
		}
		$proyectos = $this->Revision->Proyecto->find('list');
		//$usuarios = $this->Revision->Usuario->find('list');

		$categorias = $this->Revision->Proyecto->Categoria->find('list');
		$grupos = $this->Revision->Proyecto->Grupo->find('list',array('conditions'=>array('Grupo.activo'=>'1')));

		$this->set(compact('proyectos', 'usuarios', 'categorias','grupos'));
	} */

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$revision = $this->Revision->find('first',array('conditions'=>array('Revision.id'=>$id),'recursive'=>-1));
		if(!$revision){ throw new NotFoundException(__('Invalid revision')); }

		$this->allowProyecto($revision['Revision']['proyecto_id']);

		if ($this->request->is(array('post', 'put'))) {
			unset($this->request->data['Revision']['id']);
			$this->request->data['Revision']['usuario_id'] = $this->Auth->user('id');
			$this->request->data['Revision']['proyecto_id'] = $revision['Revision']['proyecto_id'];
			$this->Revision->create();
			if ($this->Revision->save($this->request->data)) {
				$this->Session->setFlash(__('The revision has been saved.'),'alert/success');

			/**/ // MENSAJES
			// Guardar Mensaje
			$proyecto_id = $revision['Revision']['proyecto_id'];
			$usuarios_id = $this->Revision->Proyecto->Autor->find( 'list', array(
				'conditions'=>array(
						'Autor.proyecto_id'=>$proyecto_id,
						'Autor.activo'=>'1',
						'Autor.usuario_id <>'=> $this->Auth->user('id')),
				'fields'=>array('usuario_id')));
			$this->Mensaje->saveMensaje( $usuarios_id, 'proy-edit', $this->Auth->user('nombre_completo').' ha actualizado la revision del Proyecto #'.$proyecto_id, array('controller'=>'proyectos','action'=>'view',$proyecto_id) );
			/**********************/

				return $this->redirect(array('controller'=>'proyectos','action' => 'view',$revision['Revision']['proyecto_id']));
			} else {
				$this->Session->setFlash(__('The revision could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Revision.' . $this->Revision->primaryKey => $id));
			$this->request->data = $this->Revision->find('first', $options);
		}

		$this->set('proyecto_id',$revision['Revision']['proyecto_id']);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function delete($id = null) {
		$this->Revision->id = $id;
		if (!$this->Revision->exists()) {
			throw new NotFoundException(__('Invalid revision'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Revision->delete()) {
			$this->Session->setFlash(__('The revision has been deleted.'));
		} else {
			$this->Session->setFlash(__('The revision could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	} */
}
