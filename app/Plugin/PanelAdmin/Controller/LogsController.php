<?php
App::uses('PanelAdminAppController', 'PanelAdmin.Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 * @property PaginatorComponent $Paginator
 */
class LogsController extends PanelAdminAppController {

	public $uses = array('Log');
	
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index($usuario_id = null) {
		$this->Log->recursive = 0;

		$settings = array(
				'order' => array('Log.created' => 'desc','Log.id' => 'desc'),
			);

		if($usuario_id != null){
			$settings = array_merge($settings, array('conditions'=>array('Log.usuario_id'=>$usuario_id)));
		}

		$this->Paginator->settings = $settings;

		$this->set('logs', $this->Paginator->paginate());
	}

	public function chart($code = '002'){

		$this->Log->virtualFields['cantidad'] = 'count(*)';
		$this->Log->virtualFields['ano'] = 'YEAR(created)';
		$this->Log->virtualFields['mes'] = 'MONTH(created)';
		$this->Log->virtualFields['dia'] = 'DAY(created)';

		//SELECT YEAR(created) Año,MONTH(created) Mes,DAY(created) Dia,COUNT(*) Registros FROM logs GROUP BY YEAR(created),MONTH(created),DAY(created) 

		if($this->request->is('post')){
			$code = $this->request->data['Log']['descripcionLogCode'];
		}



		$descripcionLog = $this->Log->DescripcionLog->find('first',array(
				'conditions'=>array('DescripcionLog.code'=>$code),
			));

		$dias7 = date("Y-m-d", strtotime("-15 day"));

		$logs = $this->Log->find('all',array(
				'fields'=>array('Log.ano','Log.mes','Log.dia','Log.cantidad'),
				'group'=>array('Log.ano','Log.mes','Log.dia'),
				'conditions'=>array(
						'Log.descripcion_log_id' => $descripcionLog['DescripcionLog']['id'],
						'Log.created >' => $dias7,
					)
			));

		// debug($logs); exit();

		$data = null;
		foreach ($logs as $log) {
			//strtotime("2002-02-20 UTC") * 1000
			$fecha = strtotime($log['Log']['ano'].'-'.$log['Log']['mes'].'-'.$log['Log']['dia']) * 1000;
			$data[] = array( $fecha, $log['Log']['cantidad']);
		}

		$out = array(
				'color'=>'#3c8dbc',
				'label'=>$descripcionLog['DescripcionLog']['descripcion'],
				'data'=>$data,
			);

		$this->set('data1', $out);


		$descripcionLogs = $this->Log->DescripcionLog->find('list',array(
				'fields'=>array('code','descripcion')
			));
		$this->set('descripcionLogs', $descripcionLogs);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Invalid log'));
		}
		$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
		$this->set('log', $this->Log->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Log->create();
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Log->Usuario->find('list');
		$descripcionLogs = $this->Log->DescripcionLog->find('list');
		$this->set(compact('usuarios', 'descripcionLogs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
			$this->request->data = $this->Log->find('first', $options);
		}
		$usuarios = $this->Log->Usuario->find('list');
		$descripcionLogs = $this->Log->DescripcionLog->find('list');
		$this->set(compact('usuarios', 'descripcionLogs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Log->delete()) {
			$this->Session->setFlash(__('The log has been deleted.'));
		} else {
			$this->Session->setFlash(__('The log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
