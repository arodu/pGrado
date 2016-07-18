<?php
App::uses('AppModel', 'Model');
/**
 * Meta Model
 *
 * @property Proyecto $Proyecto
 * @property Meta $ParentMeta
 * @property Asunto $Asunto
 * @property Meta $ChildMeta
 */
class Meta extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titulo';

	public $actsAs = array('Containable','Tree');
	public $recursive = -1;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'proyecto_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'titulo' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'principal' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cerrado' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bloqueado' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'completado' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Proyecto' => array(
			'className' => 'Proyecto',
			'foreignKey' => 'proyecto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentMeta' => array(
			'className' => 'Meta',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Asunto' => array(
			'className' => 'Asunto',
			'foreignKey' => 'meta_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildMeta' => array(
			'className' => 'Meta',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $saveData = array();

	public function review($proyecto_id){
		$metas = $this->find('threaded', array(
			'conditions'=>array('proyecto_id'=>$proyecto_id),
			'fields'=>array('id','cerrado','parent_id'),
			'contain'=>array('Asunto'=>array('fields'=>array('id','cerrado'))),
		));

		foreach ($metas as $meta) {
			$this->_review($meta);
		}

		if($this->saveMany($this->saveData)){
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

		$total_asunto = count($node['Asunto']);
		$close_asunto = 0;
		if( $total_asunto > 0 ){
			foreach ($node['Asunto'] as $asunto) {
				if($asunto['cerrado']){
					$close_asunto++;
				}
			}
		}

		$cerrado = ( $node['Meta']['cerrado'] ? 1 : 0 );

		$this->saveData[]['Meta'] = array(
			'id'=>$node['Meta']['id'],
			'completado'=>( $close_child + $close_asunto + $cerrado ),
			'total'=>( $total_child + $total_asunto + 1 ),
		);

		return array(
			'close_child'=>( $close_child + $close_asunto + $cerrado ),
			'total_child'=>( $total_child + $total_asunto + 1 ),
		);
	}



}
