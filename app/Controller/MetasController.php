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
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);

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

	public $metas = array();
	public $saveData = array();


	public function review($proyecto_id){
		$metas = $this->Meta->find('threaded', array(
			'conditions'=>array('Meta.proyecto_id'=>$proyecto_id),
			'fields'=>array('id','cerrado','parent_id'),
			'contain'=>array('Asunto'=>array('fields'=>array('id','cerrado'))),
		));

		foreach ($metas as $meta) {
			$this->_review($meta);
		}

		//debug($this->saveData); exit();


		if($this->Meta->saveMany($this->saveData)){
			return true;
		}
		return false;
	}

	protected function _review($node){

		$total_child = 0;
		$close_child = 0;
		if( count($node['children']) > 0 ){
			//$close = 0;
			foreach ($node['children'] as $child) {
				$aux = $this->_review($child);
				$total_child += $aux['total_child'];
				$close_child += $aux['close_child'];
			}
		}

		$cerrado = ( $node['Meta']['cerrado'] ? 1 : 0 );

		$this->saveData[]['Meta'] = array(
			'id'=>$node['Meta']['id'],
			'completado'=>( $close_child + $cerrado ),
			'total'=>( $total_child + 1 ),
		);

		return array(
			'close_child'=>( $close_child + $cerrado ),
			'total_child'=>( $total_child + 1 ),
		);
	}


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
			$this->Meta->create();
			if ($this->Meta->save($this->request->data)) {
				$this->review($proyecto_id);
				$this->Session->setFlash(__('Nueva Meta guardada con exito!'), 'alert/success');
				$success = true;
			} else {
				$this->Session->setFlash(__('The meta could not be saved. Please, try again.'), 'alert/error');
			}
		}
		$metas = $this->Meta->generateTreeList(null,null,null,'--- ');
		$this->set(compact('metas','proyecto_id', 'success'));
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
		$proyecto_id = $this->Meta->find('proyecto_id', array('conditions'=>array('Meta.id'=>$id)));
		$this->allowProyecto($proyecto_id);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Meta->save($this->request->data)) {
				$this->review($proyecto_id);
				$this->Session->setFlash(__('The meta has been saved.'), 'alert/success');
				$success = true;
			} else {
				$this->Session->setFlash(__('The meta could not be saved. Please, try again.'), 'alert/danger');
			}
		} else {
			$options = array('conditions' => array('Meta.' . $this->Meta->primaryKey => $id));
			$this->request->data = $this->Meta->find('first', $options);
		}
		$metas = $this->Meta->generateTreeList(null,null,null,'--- ');
		$this->set(compact('metas','proyecto_id', 'success'));
	}

	public function change($id = null){
		$meta = $this->Meta->find('first', array('conditions' => array('Meta.id' => $id)));
		if (!$meta) { throw new NotFoundException(__('Invalid meta')); }
		$this->allowProyecto($meta['Meta']['proyecto_id']);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {

			$cerrado = ( $meta['Meta']['cerrado'] ? false : true );

			$data['Meta'] = array(
				'id'=>$meta['Meta']['id'],
				'cerrado' => $cerrado,
			);

			if ($this->Meta->save($data)) {
				$this->review($meta['Meta']['proyecto_id']);
				$this->Session->setFlash(__('The meta has been saved.'), 'alert/success');
				$success = true;
			} else {
				$this->Session->setFlash(__('The meta could not be saved. Please, try again.'), 'alert/danger');
			}
		} else {
			$this->request->data = $meta;
		}
		$this->set(compact('meta', 'success'));
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
			$this->review($proyecto_id);
			$this->Session->setFlash(__('The meta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The meta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
