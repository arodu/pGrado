<?php
App::uses('AppController', 'Controller');
class EscenariosController extends AppController {

	public $components = array('Paginator','Session');
	public $layout = 'ajax';

	public function beforeFilter(){
		$this->verificarModulo('proyecto.escenarios');
		parent::beforeFilter();
	}

	public function view($proyecto_id = null){
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);

		$proyecto = $this->Escenario->Proyecto->getField(array('id','bloqueado','activo'), $proyecto_id);
		$escenario = $this->Escenario->find('first', array('conditions'=>array('Escenario.proyecto_id' => $proyecto_id)));

		$this->set(compact('escenario', 'proyecto'));
	}

	public function edit($proyecto_id = null){
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);
		$success = false;

		if($this->request->is(array('post', 'put')) and !$success){
			if ($this->Escenario->save($this->request->data)) {
				$this->Flash->call_success('Escenario guardado con exito');
				$success = true;
			}else{
				$this->Flash->alert_error('No se ha podido guardar el Escenario');
			}
		} else {
			$options = array('conditions' => array('Escenario.proyecto_id' => $proyecto_id));
			$this->request->data = $this->Escenario->find('first', $options);
		}

		$this->set(compact('success','proyecto_id'));
	}

}
