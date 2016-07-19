<?php
App::uses('AppModel', 'Model');
/**
 * Categoria Model
 *
 * @property Proyecto $Proyecto
 */
class Categoria extends AppModel {


	public $displayField = 'nombre';

	public $actsAs = array('Tree');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Proyecto' => array(
			'className' => 'Proyecto',
			'foreignKey' => 'categoria_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'joinTable' => 'categorias_usuarios',
			'foreignKey' => 'categoria_id',
			'associationForeignKey' => 'usuario_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	public $belongsTo = array(
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'programa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function getRuta($id){
		$parents = $this->getPath( $id, array('Categoria.nombre'));
		$aux = array();
		foreach ($parents as $parent) {
			$aux[] = $parent['Categoria']['nombre'];
		}
		return implode(' / ',$aux);
	}

}
