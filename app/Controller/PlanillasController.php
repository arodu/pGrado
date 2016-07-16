<?php
App::uses('AppController', 'Controller');
class PlanillasController extends AppController {

	public $uses = array('Planilla','Proyecto');

	//public function beforeFilter(){
	//	parent::beforeFilter();
	//}

	public function verificar($id=null, $verf=null){

	}

	private function crearPlanilla($proyecto_id, $tipo_planilla, $data){
		$data = ( is_array($data) ? json_encode($data) : $data );
		$tipo_planilla_id = $this->Planilla->TipoPlanilla->findIdByCode($tipo_planilla);

		$guardar['Planilla'] = array(
			'tipo_planilla_id'=>$tipo_planilla_id,
			'proyecto_id'=>$proyecto_id,
			'data'=>$data
		);

		$this->Planilla->create();
		if ($this->Planilla->save($guardar)) {
			return true;
		}else{
			return false;
		}
	}

	public function demoPdf(){
		$this->layout = 'vacio';
		$this->response->type('application/pdf');
		$this->set('title_for_layout','Demostracion');
	}

	public function aprobacionPropuesta($proyecto_id){
		$this->layout = 'vacio';
		$this->response->type('application/pdf');
		$this->set('title_for_layout','aprobacionPropuesta');

		if (!$this->Proyecto->exists($proyecto_id)) {
			throw new NotFoundException(__('Invalid proyecto'));
		}

		$proyecto_autor = $this->Proyecto->Autor->find('first',array(
				'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
				'contain'=>array('TipoAutor')
			));

		$userInfo = $this->Permit->user();

		if(empty($proyecto_autor) || !$userInfo['coordpg'] || !$userInfo['root']){
			throw new ForbiddenException(); // Proyecto no Pertenece al Usuario Actual
		}

		$planilla = $this->Planilla->find('first',array(
			'conditions'=>array(
					'Planilla.proyecto_id'=>$proyecto_id,
					'Planilla.tipo_planilla_id'=>$this->Planilla->TipoPlanilla->findIdByCode('aprob-prop')
				),
			'order'=>array('Planilla.created'=>'DESC'),
			'recursive'=>-1,
			)
		);

		if(empty($planilla)){
			$this->crearPlanillaAprobacionPropuesta($proyecto_id);
		}

		$planillaData = json_decode($planilla['Planilla']['data']);

		$jurados = $this->Proyecto->Autor->Usuario->find('all',array(
				'conditions'=>array( 'Usuario.id' => $planillaData->jurados_id ),
				'fields'=>array('id','cedula','nombre_completo'),
				'recursive'=>-1
,			));

		$options = array(
			'conditions' => array('Proyecto.id' => $proyecto_id),
			'contain'=>array(
					'Categoria','Sede','Fase','Grupo','Estado','Escenario','Programa',
					'Autor'=>array(
						'TipoAutor',
						'Usuario'=>array('fields'=>array('cedula_nombre_completo','nombre_completo','id','email'),
							'DescripcionUsuario'
						)
					),
					'Revision'=>array('limit'=>'1','order'=>array('Revision.updated DESC'),'Usuario'=>array('fields'=>array('nombre_completo','id')))
				)
			);
		$proyecto = $this->Proyecto->find('first', $options);

		$this->set(compact('proyecto','jurados','planilla'));

		$this->set( 'verificacion', $this->genCodeVerificacion($proyecto['Revision'][0]['id'] ));

	}


	private function crearPlanillaAprobacionPropuesta($proyecto_id){
		$cant_jurados = 3;

		$proyecto = $this->Proyecto->find('first',array(
				'conditions'=>array('Proyecto.id'=>$proyecto_id),
				'contain'=>array(
					'Categoria'=>array(
						'fields'=>array('id','nombre'),
						'Usuario'=>array('fields'=>array('id')),
						),
					),
			));

		$cant_pos_jurados = count($proyecto['Categoria']['Usuario']);

		$jurados = null;
		if( $cant_pos_jurados > $cant_jurados ){
			$claves_aleatorias = array_rand($proyecto['Categoria']['Usuario'], $cant_jurados);
			foreach ($claves_aleatorias as $clave) {
				$jurados[] = $proyecto['Categoria']['Usuario'][$clave];
			}
		}else{
			$jurados = $proyecto['Categoria']['Usuario'];
		}

		$aux=null;
		foreach ($jurados as $jurado) {
			$aux[] = $jurado['id'];
		}

		$data['jurados_id'] = $aux;

		if($this->crearPlanilla($proyecto_id, 'aprob-prop', $data)){
			return $this->redirect(array('action' => 'aprobacionPropuesta',$proyecto_id));
		}else{
			throw new InternalErrorException(__('Error en Creacion de Planilla'));
		}
	}


}
