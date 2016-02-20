<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Archivo Model
 *
 * @property Proyecto $Proyecto
 * @property Usuario $Usuario
 */
class Archivo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ruta' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function addFile(){
		
		
		
	}


	public function beforeDelete($cascade = true) {
		$this->data = $this->find('first',array('conditions'=>array('Archivo.id'=>$this->id),'recursive'=>-1));
		parent::beforeDelete($cascade);
		return true;
	}

	public function afterDelete() {
		parent::afterDelete();
		$path_to_files = Configure::read('sistema.archivos.proyectos');

		$path_file = $path_to_files.$this->data['Archivo']['proyecto_id'].DS;

		$file = new File( $path_file.$this->data['Archivo']['nombre'] );

		if( $file->delete() ){

			$file_min = new File( $path_file.$this->getNombre($this->data['Archivo']['nombre'],'min') );
			$file_min->delete();

			$cant_archivos_proyecto = $this->find('count',array('conditions'=>array('Archivo.proyecto_id'=>$this->data['Archivo']['proyecto_id'])));
			if($cant_archivos_proyecto <= 0){
				$folder = new Folder($path_to_files.$this->data['Archivo']['proyecto_id'].DS);
				$folder->delete();
			}
		}

	}

	public function getNombre($imagen_nombre, $min_nombre = 'min'){
		$aux = explode(".", $imagen_nombre);
		$ext =  array_pop($aux);
		$aux[] = $min_nombre;
		$aux[] = $ext;
		return implode('.', $aux);
	}



}
