<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 * @property Usuario $Usuario
 * @property DescripcionLog $DescripcionLog
 */
class Log extends AppModel {

	public $noLog = true;

/**
 * Validation rules
 *
 * @var array
 */
/*	public $validate = array(
		'usuario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion_log_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		), 
	); */

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DescripcionLog' => array(
			'className' => 'DescripcionLog',
			'foreignKey' => 'descripcion_log_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function saveLog( $userId=null, $descLogCode = null, $related_id = null,$observacion=null){
		if(is_array($descLogCode)){
			$estructura = implode(".", $descLogCode);
			$descLogCode = $estructura;
			$descripcionLog = $this->DescripcionLog->find('first',array('conditions'=>array('DescripcionLog.estructura'=>$estructura),'fields'=>array('id','prioridad'),'recursive'=>-1));
		}else{
			$descripcionLog = $this->DescripcionLog->find('first',array('conditions'=>array('DescripcionLog.code'=>$descLogCode),'fields'=>array('id','prioridad'),'recursive'=>-1));
		}
		if(empty($descripcionLog)){
			$descripcionLog = $this->DescripcionLog->find('first',array('conditions'=>array('DescripcionLog.code'=>'000'),'fields'=>array('id','prioridad'),'recursive'=>-1));
			$observacion = 'code:'.$descLogCode.';'.$observacion;
		}
		if($descripcionLog['DescripcionLog']['prioridad'] >= 1){
			$data = array('Log'=>array('usuario_id'=>$userId,'descripcion_log_id'=>$descripcionLog['DescripcionLog']['id'],'related_id'=>$related_id,'observacion'=>$observacion));
			$this->create();
			$this->save($data, false);
		}
	}
}
