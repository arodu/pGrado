<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * Usuario Model
 *
 * @property Sede $Sede
 * @property TipoUsuario $TipoUsuario
 * @property Autor $Autor
 * @property Log $Log
 * @property Revision $Revision
 * @property Perfil $Perfil
 */
class Usuario extends AppModel {

	public $useTable = 'usuarios';
	public $displayField = 'cedula';
	public $actsAs = array('Containable',
			//'Captcha' => array(
      //  'field' => array('captcha'),
      //  'error' => 'Código Captcha Incorrecto'
    	//)
	);

	public $virtualFields = array(
			'nombre_completo' => 'CONCAT(Usuario.nombres," ",Usuario.apellidos)',
			'cedula_nombre_completo' => 'CONCAT(Usuario.cedula," - ",Usuario.nombres," ",Usuario.apellidos)',
			'foto' => 'CONCAT(Usuario.updated_foto,"$",Usuario.id)',
		);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cedula' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength',6),
				'message' => 'La Contraseña debe tener un minimo de %d caracteres',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
		'password_confirm' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'equalToField' => array(
				'rule' => array('equalToField','password'),
				'message' => 'Contraseña y Confirmacion de Contraseña diferentes',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password_check' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'passwordCheck' => array(
				'rule' => array('passwordCheck'),
				'message' => 'Contraseña actual incorrecta',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombres' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apellidos' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Correo electronico ya registrado',
			)
		),
		'email_confirm' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'equalTofield' => array(
				'rule' => array('equalTofield','email'),
				'message' => 'email y Confirmacion de email diferentes',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sede_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_usuario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'activo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'uuid' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	function equalToField($check,$otherfield){
		$field = $this->_firstKey($check);
		return ($this->data[$this->name][$field] === $this->data[$this->name][$otherfield]);
	}

	function passwordCheck($check){
		$field = $this->_firstKey($check);
		$user = $this->find('first',array('conditions'=>array($this->name.'.id'=>$this->data[$this->name]['id'])));
		$blowfish = new BlowfishPasswordHasher();
		return $blowfish->check($this->data[$this->name][$field], $user[$this->name]['password']);
	}

	private function _firstKey($array = array()){
		foreach ($array as $key => $value){
			return $key;
		}
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'DescripcionUsuario' => array(
			'className' => 'DescripcionUsuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent' => true,
		),
		'DescripcionTutor' => array(
			'className' => 'DescripcionTutor',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent' => true,
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sede' => array(
			'className' => 'Sede',
			'foreignKey' => 'sede_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoUsuario' => array(
			'className' => 'TipoUsuario',
			'foreignKey' => 'tipo_usuario_id',
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
		'Autor' => array(
			'className' => 'Autor',
			'foreignKey' => 'usuario_id',
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
		'Log' => array(
			'className' => 'Log',
			'foreignKey' => 'usuario_id',
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
		'Revision' => array(
			'className' => 'Revision',
			'foreignKey' => 'usuario_id',
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
		'Propietario' => array(
			'className' => 'Asunto',
			'foreignKey' => 'propietario_id',
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
		'Responsable' => array(
			'className' => 'Asunto',
			'foreignKey' => 'responsable_id',
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
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'joinTable' => 'categorias_usuarios',
			'foreignKey' => 'usuario_id',
			'associationForeignKey' => 'categoria_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Perfil' => array(
			'className' => 'Perfil',
			'joinTable' => 'perfils_usuarios',
			'foreignKey' => 'usuario_id',
			'associationForeignKey' => 'perfil_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	public function beforeSave($options = array()){
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}

		$codigo = date('now') . $this->data[$this->alias]['id'];
		$this->data[$this->alias]['hash'] = hash( 'sha1' , $codigo );
		return true;
	}

	public function getPerfiles($user_id){
		$usuario = $this->find('first',array(
				'conditions'=>array('Usuario.id'=>$user_id),
				'fields'=>array('Usuario.id'),
				'recursive'=>-1,
				'contain'=>array('Perfil'=>array('fields'=>array('Perfil.id','Perfil.code')))
			));
		$aux = array();
		foreach ($usuario['Perfil'] as $perfil) {
			$aux[$perfil['code']] = true;
		}
		return $aux;
	}

	public function userInfo($user_id){

		$usuario = $this->find('first',array('conditions'=>array('Usuario.id'=>$user_id),
			'contain'=>array(
					'Sede','TipoUsuario',
					'Perfil'=>array('fields'=>array('id','code')))));

		$out['id'] = $usuario['Usuario']['id'];
		$out['nombre'] = $usuario['Usuario']['nombres'].' '.$usuario['Usuario']['apellidos'];
		$out['updated_foto'] = $usuario['Usuario']['updated_foto'];
		$out['foto'] = $usuario['Usuario']['foto'];

		//$out['sede'] = $usuario['Sede']['nombre'];
		$out['Sede'] = $usuario['Sede'];

		$out['tipo'] = $usuario['TipoUsuario']['nombre'];
		$out['created'] = $usuario['Usuario']['created'];
		$out['actualizado'] = $usuario['Usuario']['actualizado'];


		// Perfiles
			$aux = null;
			foreach ($usuario['Perfil'] as $perfil) {
				$aux[$perfil['code']] = true;
			}
			$out['perfil'] = $aux;

		// Menu de Usuario
			$out['userMenu'] = false;
			if($usuario['Usuario']['admin']){
				$out['userMenu']['paneladmin'] = array('label'=>'PanelAdmin','url'=>'/panel_admin/usuarios/login','title'=>'Panel Administrativo');
			}

		return $out;
	}

	public function foto($tipo_foto, $id = null, $ext='jpg'){

		if($id == null){
			$id = $this->id;
		}

		if($tipo_foto == 'md'){
			$file_name = 'avatar'.DS.'md'.DS.$id.'.'.$ext;
		}elseif($tipo_foto == 'xs'){
			$file_name = 'avatar'.DS.'xs'.DS.$id.'.'.$ext;
		}elseif($tipo_foto == 'xxs'){
			$file_name = 'avatar'.DS.'xxs'.DS.$id.'.'.$ext;
		}else{
			$file_name = 'avatar'.DS.$id.'.'.$ext;
		}

		return $file_name;

	}

	public function listPerfil($perfil = 'tutoracad', $notUser = array()){
		$lista = $this->PerfilsUsuario->find('all',array(
			'fields'=>array('Usuario.id','Usuario.nombres', 'Usuario.apellidos'),
			'order'=>array('Usuario.nombres','Usuario.apellidos'),
			'conditions'=>array(
				'PerfilsUsuario.perfil_id' => $this->Perfil->findIdByCode($perfil),
				'NOT'=>array(
					'PerfilsUsuario.usuario_id'=>$notUser,
				),
			),
			'joins'=>array(
				array(
					'table' => 'usuarios',
					'alias' => 'Usuario',
					'type' => 'LEFT',
					'conditions' => array(
						'Usuario.id = PerfilsUsuario.usuario_id',
					)
				)
			),
		));

		$out = array();
		foreach ($lista as $usuario) {
			$out[$usuario['Usuario']['id']] = $usuario['Usuario']['nombres'].' '.$usuario['Usuario']['apellidos'];
		}

		return $out;
	}


	//$r = hash('sha1', $clave);


}
