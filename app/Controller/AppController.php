<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

	public $components = array(
		'DebugKit.Toolbar',
		'Session',
		/* 'Permisos'=>array(
				'fileConfig'=>'permisos',
				'arreglo'=>'Permisos',
			), */
		'UtilCake.Permit'=>array(
			'userModel'=>'Usuario',
			'profileModel'=>'Perfil',
			//'reload'=>true,
		),
		'Auth' => array(
			'loginRedirect' => array('controller' => 'pages','action' => 'index'),
			'logoutRedirect' => array('controller' => 'usuarios','action' => 'login'),
			'loginAction'=> array('controller' => 'usuarios','action' => 'login'),
			'authorize' => array('Controller'), // Added this line
			'authenticate' => array(
				'Form' => array(
					'userModel'=>'Usuario',
					'contain'=>array(
							//'Perfil'=>array('fields'=>array('id','code')),
							'Sede',
							'TipoUsuario',
						),
					'fields' => array('username' => 'cedula','password'=>'password'),
					'passwordHasher' => 'Blowfish',
					'scope'=>array('Usuario.activo' => '1'),
				)
			)
		),
	);
	//public $helpers = array('General');

	public function beforeFilter(){
		parent::beforeFilter();
		$userInfo = ( $this->Auth->user() ? $this->Session->read('userInfo') : false);
		$this->set('userInfo',$userInfo);
		$this->set('referer', $this->referer());
		$this->userUpdate();

		$this->set('mod_activo', Configure::read('sistema.modulos') );

		$this->Session->write('Log',array(
				'userId'=>$this->Auth->user('id'),
				'controller'=>$this->params['controller'],
				'action'=>$this->params['action'],
			));
	}

	public function afterFilter(){
		parent::afterFilter();
		$this->Session->write('Log',array());
	}

	public function isAuthorized() {
		//return $this->Permisos->autorizado();
		return $this->Permit->isAuthorized();
	}

	public function userUpdate(){
		$redirect = array('controller'=>'usuarios','action'=>'edit');
		$allows   = array(
			array('controller'=>'usuarios','action'=>'logout'),
			array('controller'=>'usuarios','action'=>'getFoto'),
			array('controller'=>'usuarios','action'=>'getUpdatedFoto'),
			array('controller'=>'mensajes','action'=>'lista_mensajes'),
			array('controller'=>'mensajes','action'=>'index'),
		);

		$allows = array_merge($allows, array($redirect));

		if($this->Session->read('userInfo.actualizado') === false){
			$sal = false;
			foreach ($allows as $allow) {
				if($allow['controller']==$this->params['controller'] && $allow['action']==$this->params['action']){
					$sal = true;
					break;
				}
			}

			if($sal === false){
				$this->Session->setFlash(__('Es necesario que actualice sus datos antes de realizar cualquier otra acción.'),'alert/warning');
				return $this->redirect(array('controller'=>$redirect['controller'],'action'=>$redirect['action'],'admin'=>false));
			}elseif($sal === true){
				// NO HACER NADA
				return true;
			}
		}

	}

	public function verificarModulo($nombreModulo){
		$modulos = Configure::read('sistema.modulos');
		if( $modulos[$nombreModulo] ){
			return true;
		}
		throw new NotFoundException();
	}

	protected function genCodeVerificacion($code){
		return hash('crc32', $code, false);
	}

}
