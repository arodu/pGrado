<?php
App::uses('AppModel', 'Model');
/**
 * Mensaje Model
 *
 * @property Usuario $Usuario
 * @property DescripcionMensaje $DescripcionMensaje
 */
class Mensaje extends AppModel {


	private $activo = true;
	public $actsAs = array('Containable');
	private $principal_mensaje_id = null;
	public $noLog = true;

	public $validate = array(
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
		'principal_mensaje_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'leido' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PrincipalMensaje' => array(
			'className' => 'PrincipalMensaje',
			'foreignKey' => 'principal_mensaje_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    public function saveMensaje( $usersId=array(), $codeTipoMensaje, $titulo=null, $enlace=null, $contenido=null){
        $out = true;


    	if($this->activo){
    		$aux = null;
	        $data = array();

	        $tipo_mensaje_id = @$this->PrincipalMensaje->TipoMensaje->findIdByCode($codeTipoMensaje);
			$tipo_mensaje_id = ( $tipo_mensaje_id ? $tipo_mensaje_id : $this->PrincipalMensaje->TipoMensaje->findIdByCode('generico'));

			//debug("asdasdasd");

			$dataMensajeDescripcion['PrincipalMensaje'] = array(
					'tipo_mensaje_id'=>$tipo_mensaje_id,
					'titulo'=>$titulo,
					'contenido'=>$contenido,
					'enlace'=>( is_array($enlace) ? json_encode($enlace) : $enlace ),
				);

			$this->PrincipalMensaje->create();
			if($this->PrincipalMensaje->save($dataMensajeDescripcion)){

				foreach($usersId as $usuario_id){
					$aux = null;
					$aux['Mensaje']=array(
							'usuario_id'=>$usuario_id,
							'principal_mensaje_id'=> $this->PrincipalMensaje->id,
						);
					$dataMensaje[] = $aux;
				}

				$out = ( !empty($dataMensaje) ? $this->saveMany($dataMensaje) : true );

			}else{
				$out = false;
			} 
	    }
	    return $out;
    }
    
	public function beforeDelete($cascade = true) {
		$this->data = $this->find('first',array('conditions'=>array('Mensaje.id'=>$this->id),'recursive'=>-1));
		parent::beforeDelete($cascade);
		return true;
	}

	public function afterDelete() {
		$principal_mensaje_id = $this->data['Mensaje']['principal_mensaje_id'];
		$cant_mens_rest = $this->find('count',array('Mensaje.principal_mensaje_id'=>$principal_mensaje_id));

		if($cant_mens_rest <= 0){
			$this->PrincipalMensaje->id = $principal_mensaje_id;
			if($this->PrincipalMensaje->delete()){

			}else{
				throw new InternalErrorException(__('Invalid Mensaje'));
			}
		}
		parent::afterDelete();
	}




}
