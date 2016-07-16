<?php
App::uses('AppController', 'Controller');
class PanelAdminAppController extends AppController {

	public $components = array(
		'Session',
		/*'Permisos'=>array(
				'fileConfig'=>'PanelAdmin.permisos',
				'arreglo'=>'PermisosAdmin',
			), */
		'UtilCake.Permit'=>array(
			'config' => array(
	      'file' => 'PanelAdmin.permisos',
	      'name' => 'PermisosAdmin',
	    ),
			'userModel'=>'Usuario',
			'profileModel'=>'Perfil',
			//'reload'=>true,
		),
		'Auth' => array(
			'loginRedirect' => array('plugin'=>'panel_admin','controller' => 'pages','action' => 'index'),
			'logoutRedirect' => array('plugin'=>'panel_admin','controller' => 'usuarios','action' => 'login',),
			'loginAction'=> array('plugin'=>'panel_admin','controller' => 'usuarios','action' => 'login',),
			'authorize' => array('Controller'), // Added this line
			'authenticate' => array(
				'Form' => array(
					'userModel'=>'Usuario',
					'contain'=>array(
							'Perfil'=>array('fields'=>array('id','code')),
							'Sede',
							'TipoUsuario',
						),
					'fields' => array('username' => 'cedula','password'=>'password'),
					'passwordHasher' => 'Blowfish',
					'scope'=>array('Usuario.activo' => '1','Usuario.admin' => '1'),
				)
			)
		),
	);

	public function isAuthorized() {
		//return $this->Permisos->autorizado();
		return $this->Permit->isAuthorized();
	}

	public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('index', 'view');

		if( $this->Auth->user() && $this->Auth->user('admin')===false ){
			return $this->redirect(array('controller'=>'pages','action'=>'error','403','plugin'=>false));
		}

		if($this->Auth->loggedIn()){
			$this->set('userInfo',$this->Session->read('userInfo'));
		}

	}

}

?>
