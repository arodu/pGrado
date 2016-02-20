<?php
App::uses('PanelAdminAppController', 'PanelAdmin.Controller');
class UsuariosController extends PanelAdminAppController {

	public $uses = array('Usuario');

	public $components = array('Paginator','Search');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('logout','login','userMenu');
	}

	public function login() {
		if($this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}

		if ($this->request->is('post')) {
			$this->Session->destroy();
			if ($this->Auth->login()) {
				$this->Session->write('userInfo',$this->Usuario->userInfo($this->Auth->user('id')));
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}

	public function logout() {
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
	}

/*
	public function getPerfiles($user_id){
		$usuario = $this->Usuario->find('first',array(
				'conditions'=>array('Usuario.id'=>$user_id),
				'fields'=>array('Usuario.id'),
				'recursive'=>-1,
				'contain'=>array('Perfil'=>array('fields'=>array('Perfil.id','Perfil.code')))
			));
		$aux = array();
		foreach ($usuario['Perfil'] as $perfil) {
			$aux[$perfil['id']] = $perfil['code'];
		}
		return $aux;
	} */

	public function userMenu(){
		if($this->Auth->loggedIn()){
			Configure::load('PanelAdmin.permisos'); // Cargar Archivo
			$permisos = Configure::read('PermisosAdmin'); // Leer Arreglo de Permisos
			$perfiles = $this->Auth->user('Perfil');
			$data=array();
			foreach ($permisos as $controller => $acceso) {
				foreach ($perfiles as $perfil) {
					if($perfil['code'] == 'root'){
						$data[] = $controller;
						break;
					}
					if( isset($acceso['index']) && is_array($acceso['index'])){
						if(in_array($perfil['code'], $acceso['index']) ){
							$data[] = $controller;
							break;
						}
						if(in_array('public', $acceso['index']) ){
							$data[] = $controller;	
							break;
						}
					}elseif( isset($acceso['index']) && !is_array($acceso['index']) && $acceso['index']=='public'){
						$data[] = $controller;	
						break;
					}
				}
			}
			return array_unique($data);
		}

		return array();

	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usuario->recursive = 0;
		$usuarios = $this->Paginator->paginate('Usuario',$this->Search->getConditions());

		$sedes = $this->Usuario->Sede->find('list');

		$tipoUsuarios = $this->Usuario->TipoUsuario->find('list');

		$this->set(compact('usuarios','sedes','tipoUsuarios'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}

		$usuario = $this->Usuario->find('first', array(
				'conditions' => array('Usuario.id' => $id),
				'contain'=>array(
						'Sede','TipoUsuario',
						'Autor'=>array(
								'TipoAutor',
								'Proyecto'=>array('fields'=>array('id','tema','activo'),'Categoria','Sede'),
								'order'=>array('created'=>'desc','id'=>'desc'),'limit'=>'10',
							),
						'Perfil'=>array('fields'=>array('Perfil.nombre')),
						'Log'=>array('DescripcionLog','order'=>array('created'=>'desc','id'=>'desc'),'limit'=>'10'),
					),
			));

		$this->set(compact('usuario'));

		//$this->set('data',);

	}

	public function viewFoto( $id = null, $tipo_foto = 'user' ){
		
		$path_to_files = Configure::read('sistema.archivos.usuarios');
		$file_name = $this->Usuario->foto( $tipo_foto, $id );

		$file = new File( $path_to_files.$file_name );
			
		if( $file->exists() ){
			$this->response->type('image/png');
			$this->response->file( $path_to_files.$file_name);
		}else{
			$this->response->file($path_to_files.'user.default.png');
		}
		return $this->response;
	}


	public function viewFotoPerfil(){
		$id = $this->Auth->user('id');
		return $this->viewFoto($id);
	}


	public function perfilUsuario() {
		$this->Session->write('userInfo',$this->Usuario->userInfo($this->Auth->user('id')));
		$id = $this->Auth->user('id');
		$this->view($id);
		$this->render('view');
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();

			// debug($this->request->data); exit();

			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		$sedes = $this->Usuario->Sede->find('list');
		$tipoUsuarios = $this->Usuario->TipoUsuario->find('list');
		$perfils = $this->Usuario->Perfil->find('list');
		$this->set(compact('sedes', 'tipoUsuarios', 'perfils'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Usuario->find('first', array('conditions' => array('Usuario.id' => $id),'recursive' => '0'));
		}
		$sedes = $this->Usuario->Sede->find('list');
		$tipoUsuarios = $this->Usuario->TipoUsuario->find('list');
		$perfils = $this->Usuario->Perfil->find('list');
		$this->set(compact('sedes', 'tipoUsuarios', 'perfils'));
	}

	public function editCategorias($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array(
				'conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id),
				'contain'=>array('Categoria',
					));
			$this->request->data = $this->Usuario->find('first', $options);
		}
		$categorias = $this->Usuario->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function editPassword($id = null) {

		$this->Session->setFlash(__('Editar Contraseña: Esta opcion se encuentra desactivada por el administrador del sistema.'));
		return $this->redirect(array('action' => 'index'));

		/*

		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The Password has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.id' => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}

		*/
	}


	public function editData($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {

			debug($this->request->data); exit();

			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
		$sedes = $this->Usuario->Sede->find('list');
		$tipoUsuarios = $this->Usuario->TipoUsuario->find('list');
		$perfils = $this->Usuario->Perfil->find('list');
		$this->set(compact('sedes', 'tipoUsuarios', 'perfils'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {

		//$this->Session->setFlash(__('Eliminar Usuario: Esta opcion se encuentra desactivada por el administrador del sistema.'));
		//return $this->redirect(array('action' => 'index'));

		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}

		return $this->redirect(array('action' => 'index'));
	}
}
