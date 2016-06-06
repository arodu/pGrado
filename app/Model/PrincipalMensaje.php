<?php
App::uses('AppModel', 'Model');
/**
 * DescripcionMensaje Model
 *
 * @property TipoMensaje $TipoMensaje
 * @property Mensaje $Mensaje
 */
class PrincipalMensaje extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titulo';
	public $noLog = true;
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tipo_mensaje_id' => array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TipoMensaje' => array(
			'className' => 'TipoMensaje',
			'foreignKey' => 'tipo_mensaje_id',
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
		'Mensaje' => array(
			'className' => 'Mensaje',
			'foreignKey' => 'principal_mensaje_id',
			'dependent' => true,
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

}
