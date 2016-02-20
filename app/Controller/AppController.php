<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {

	public $components = array(
		'DebugKit.Toolbar',
		'Session',
		'Permisos'=>array(
				'fileConfig'=>'permisos',
				'arreglo'=>'Permisos',
			),
		'Auth' => array(
			'loginRedirect' => array('controller' => 'pages','action' => 'index'),
			'logoutRedirect' => array('controller' => 'usuarios','action' => 'login',),
			'loginAction'=> array('controller' => 'usuarios','action' => 'login',),
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
					'scope'=>array('Usuario.activo' => '1'),
				)
			)
		),
	);

	//public $helpers = array('General');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('userInfo',$this->Permisos->userInfo());
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
		return $this->Permisos->autorizado();
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
