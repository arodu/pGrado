<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsuariosController extends AppController {

	public $components = array('Paginator', 'Session','Imagen','CropImagen');

	public $options = array(
		'pos_inst'   => array( 1=>'Profesor Ordinario', 2=>'Profesor Contratado', 3=>'Profesor Jubilado', 4=>'Invitado', 5=>'Otro' ),
		'escalafon'  => array( 1=>'Instructor', 2=>'Asistente', 3=>'Agregado', 4=>'Asociado', 5=>'Titular' ),
		'dedicacion' => array( 1=>'Tiempo Convencional', 2=>'Medio Tiempo', 3=>'Tiempo Completo', 4=>'Dedicación Exclusiva' )
	);

	// ************** CALLBACKS **********************************
		public function beforeFilter() {
			parent::beforeFilter();
			// Allow users to register and logout.
			$this->Auth->allow('register','recover','logout','login');
		}

		public function beforeRender(){
			parent::beforeRender();
			$this->set('menuActive','usuario');
		}


	// ************** METODOS **********************************
		public function index() {
			$this->Session->write('userInfo', $this->Usuario->userInfo( $this->Auth->user('id') ));
			$this->redirect(array('action'=>'view'));
		}

		public function view_pop($id){
			$this->layout = 'ajax';
			$usuario = $this->Usuario->find('first',array(
					'conditions'=>array('Usuario.id'=>$id),
					'contain'=>array(
							'Sede','TipoUsuario','DescripcionUsuario'
						),
				));
			
			// debug($usuario);

			$this->set('usuario',$usuario);
		}


		public function view() {
			//$this->writeUserInfo();
			$id = $this->Auth->user('id');
			$options = array('conditions' => array('Usuario.id' => $id),
					'contain'=>array('Sede','TipoUsuario','Perfil','DescripcionUsuario','DescripcionTutor')
				);
			$this->set('usuario', $this->Usuario->find('first', $options));

			// debug($this->Usuario->userInfo($this->Auth->user('id')));
			$this->set('options',$this->options);

			$tipo_usuario = $this->Usuario->TipoUsuario->find('first',array('conditions'=>array('TipoUsuario.id'=>$this->Auth->user('tipo_usuario_id')),'fields'=>array('id','code'),'recursive' => -1 ));
			$this->set('tipo_usuario',$tipo_usuario['TipoUsuario']);
			

			$this->render('view_'.Configure::read('Sistema.tipo'));
		}

		public function edit() {
			$id = $this->Auth->user('id');
			if ($this->request->is(array('post', 'put'))) {

				$this->Usuario->set($this->request->data);
				$this->Usuario->DescripcionUsuario->set($this->request->data);

				if($this->Usuario->validates() && $this->Usuario->DescripcionUsuario->validates()){

						$this->request->data['Usuario']['actualizado'] = '1';
						if ($this->Usuario->save($this->request->data)) {

							$descripcionUsuario['DescripcionUsuario'] = $this->request->data['DescripcionUsuario'];
							$descripcionUsuario['DescripcionUsuario']['usuario_id'] = $this->Usuario->id;

							$todo_ok = true;
							if(isset( $this->request->data['DescripcionTutor'] )){

								//debug($this->request->data['DescripcionTutor']); exit();
								$descripcionTutor['DescripcionTutor'] = $this->request->data['DescripcionTutor'];
								$descripcionTutor['DescripcionTutor']['usuario_id'] = $this->Usuario->id;

								if( !$this->Usuario->DescripcionTutor->save($descripcionTutor) ){
									$todo_ok = false;
								}
							}

							if($this->Usuario->DescripcionUsuario->save($descripcionUsuario) && $todo_ok==true){
								$this->Session->write('userInfo', $this->Usuario->userInfo( $this->Auth->user('id') ));
								$this->Session->setFlash(__('Los datos del Usuario han sido guardados con exito!'),'alert/save');
								return $this->redirect(array('action' => 'index'));

							}else{
								$this->Session->setFlash(__('Ha ocurrido un error actualizando los datos del Usuario.'),'alert/warning');

							}

						} else {
							$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'),'alert/danger');
						}

				}else{
					$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'),'alert/danger');
				}

			} else {
				$options = array(
						'conditions' => array('Usuario.id' => $id),
						'contain'=>array('DescripcionUsuario','DescripcionTutor')
					);
				$this->request->data = $this->Usuario->find('first', $options);

			}

			$sedes = $this->Usuario->Sede->find('list');
			$this->set(compact('sedes'));

			$tipo_usuario = $this->Usuario->TipoUsuario->find('first',array('conditions'=>array('TipoUsuario.id'=>$this->Auth->user('tipo_usuario_id')),'fields'=>array('id','code'),'recursive' => -1 ));
			$this->set('tipo_usuario',$tipo_usuario['TipoUsuario']);

			$this->set('options',$this->options);

			//exit();

			$this->render('edit_'.Configure::read('Sistema.tipo'));
		}


		// Editar Categorias -- revisar para despues
		/*public function editcategorias(){
			$id = $this->Auth->user('id');
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Usuario->save($this->request->data)) {
					$this->Session->setFlash(__('Categorias').' guardado con Éxito','alert/success');
					return $this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'),'alert/danger');
				}
			}

			$this->request->data = array('Usuario'=>array('id'=>$id));
			$categorias = $this->Usuario->Categoria->generateTreeList(array('activo'=>'1'),null,null,'|---');
			$this->set(compact('categorias'));
		} */


		public function editpassword() {
			$id = $this->Auth->user('id');
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Usuario->save($this->request->data)) {
					$this->Session->setFlash(__('Contraseña Guardada con exito, vuelva a ingresar al Sistema'),'alert/save');
					return $this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'),'alert/danger');
				}
			}
			$this->request->data = array('Usuario'=>array('id'=>$id));
		}


		public function add_foto(){

			$id = $this->Auth->user('id');
			$path_file = Configure::read('sistema.archivos.usuarios');

			if ($this->request->is('post')) {

				$file = $this->params['form']['avatar_file'];

				if ($file['error'] == UPLOAD_ERR_OK) {

					if( $this->Imagen->esImagen($file['name'])){
						$ext = $this->Imagen->getExtension($file['name']);
						$tmp_nombre = $id.'.'.$ext;
					}else{
						return $this->redirect(array('action'=>'add_foto'));
					}

					if(move_uploaded_file($file['tmp_name'], $path_file.$tmp_nombre)){

						$fuente = $path_file.$tmp_nombre;
						$crop = $path_file.'crop'.$id.'.png';

						$avatar_data = $this->request->data['avatar_data'];

						$this->CropImagen->create($fuente, $crop, $avatar_data );

						$this->Imagen->miniatura($crop, $path_file.$this->Usuario->foto('user',$id), array(
									'miniatura_alto'=>200,'miniatura_ancho'=>200,
								));

						$this->Imagen->miniatura($crop, $path_file.$this->Usuario->foto('md',$id), array(
									'miniatura_alto'=>100,'miniatura_ancho'=>100,
								));

						$this->Imagen->miniatura($crop, $path_file.$this->Usuario->foto('xs',$id), array(
									'miniatura_alto'=>50,'miniatura_ancho'=>50,
								));

						$this->Imagen->miniatura($crop, $path_file.$this->Usuario->foto('xxs',$id), array(
									'miniatura_alto'=>25,'miniatura_ancho'=>25,
								));

						$this->Imagen->remover( $fuente );
						$this->Imagen->remover( $crop );

						$this->Usuario->id = $id;
						$this->Usuario->saveField("updated_foto", date("Y-m-d H:i:s") );

						return $this->redirect(array('action'=>'index'));
					}
				}
			}
		}

		public function existeFoto($tipo_foto = null, $id = null){

			if($id == null) $id = $this->Auth->user('id');

			$name = $id.'.png';
			$path_to_files = Configure::read('sistema.archivos.usuarios');

			$file_name = $this->Usuario->foto($tipo_foto,$id);

			$file = new File( $path_to_files.$file_name );
			
			if( $file->exists() ){
				return $path_to_files.$file_name;
			}else{
				return false;
			}
		}

		public function getUpdatedFoto($id = null){
			if(!$id){ $id = $this->Auth->user('id'); }
			$usuario = $this->Usuario->find('first',array(
					'conditions'=>array('Usuario.id'=>$id),
				));
			return $usuario['Usuario']['updated_foto'];
		}

		public function getFoto($clave = null){

			if($clave==null){
				throw new NotFoundException(__('Invalid archivo'));
			}else{

				$code = @convert_uudecode( urldecode($clave) );

				@list($uf, $tipo_foto, $id) = @explode("$", $code);

				if( $ruta_foto = $this->existeFoto($tipo_foto,$id) ){
					$this->response->type('image/png');
					$this->response->file( $ruta_foto );
				}else{
					$path_to_files = Configure::read('sistema.archivos.usuarios');
					$this->response->file($path_to_files.'user.default.png');
				}

				return $this->response;

			}
		}


		/* public function add_default_foto(){

			$id = $this->Auth->user('id');
			$path_to_files = Configure::read('sistema.archivos.usuarios');

			$usuario = $this->Usuario->find('first',array(
					'conditions'=>array('Usuario.id'=>$id),
					'fields'=>array('nombres','apellidos'),
				));


			$text =  substr( trim($usuario['Usuario']['nombres']), 0, 1 ) . substr( trim($usuario['Usuario']['apellidos']), 0, 1 );
			$text =  mb_strtoupper($text, 'UTF-8');


			$url = 'https://placeholdit.imgix.net/~text?txtsize=50&bg=CCCCCC&txtclr=333333&w=100&h=100&txt='.$text;
			$file_name = 'u'.$id.'.png';
			copy($url, $path_to_files.$id.DS.$file_name);


			$url = 'https://placeholdit.imgix.net/~text?txtsize=25&bg=CCCCCC&txtclr=333333&w=40&h=40&txt='.$text;
			$file_name_xs = 'u'.$id.'.xs.png';
			copy($url, $path_to_files.$id.DS.$file_name_xs);

			debug($url);
			exit();
		} */



	// ************** LOGIN **********************************
		public function login() {
			$this->set('title_for_layout',false);
			$this->layout = 'login';
			
			if($this->Auth->user()){
				return $this->redirect($this->Auth->redirectUrl());
			}

			if ($this->request->is('post')) {
				$this->Session->destroy();
				if ($this->Auth->login()) {
					$this->Session->write('userInfo',$this->Usuario->userInfo($this->Auth->user('id')));
					$this->Usuario->Log->saveLog($this->Auth->user('id'),'002');
					return $this->redirect($this->Auth->redirectUrl());
				}
				$this->Session->setFlash(__('Nombre de Usuario o Contraseña Invalido.'),'alert/danger');
			}
		}

		public function admin_login() {
			return $this->redirect(array('action'=>'login','admin'=>false));
		}

		public function logout() {
			$this->Session->destroy();
			return $this->redirect($this->Auth->logout());
		}

		public function register() {
			$this->set('title_for_layout','Registro de Usuarios');
			$this->layout = 'login';
			
			if($this->Auth->user()){
				return $this->redirect($this->Auth->redirectUrl());
			}

			if ($this->request->is('post')) {
				$this->Usuario->set($this->request->data);

				if(Configure::read('google_recaptcha')){
					$this->ReCaptcha = $this->Components->load('ReCaptcha');
					$reCaptcha_valido = $this->ReCaptcha->verificar($this->request->data['g-recaptcha-response']);
				}else{
					$reCaptcha_valido = true;
				}

				if( $reCaptcha_valido ) {

					if($this->Usuario->validates())	{

						$usuario = $this->Usuario->find('first',array(
							'conditions'=>array('Usuario.cedula'=>$this->request->data['Usuario']['nueva_cedula']),
							'fields'=>array('id','cedula','activo','tipo_usuario_id'),
							'contain'=>array('Perfil'),
							'recursive'=>-1,
							));

						if(!empty($usuario) && $usuario['Usuario']['activo']){
							$this->Session->setFlash('Cedula ya Registrada','alert/danger');
							return $this->redirect(array('action'=>'login'));
						}else{

							$configUsuario = Configure::read('sistema.usuario');

							if(empty($usuario)){

								if($configUsuario['soloUsuariosPreRegistrados'] == true){
									// Usuario vacio, soloUsuariosPreRegistrados true

									$this->Session->setFlash('Su numero de cedula no se encuentra registrada, si esto es un error comuniquese con el administrador del sistema.','alert/danger');
									return $this->redirect(array('action'=>'login'));

								}else{
									// Usuario vacio, soloUsuariosPreRegistrados false

									$data_usuario = array(
										'Usuario'=>array(
											'cedula'=>$this->request->data['Usuario']['nueva_cedula'],
											'email'=>$this->request->data['Usuario']['email'],
											'password'=>$this->request->data['Usuario']['password'],
											'activo'=> ( $configUsuario['activacionPorCorreo'] ? '0' : '1' ),
											// TipoUsuario Predefinido como estudiante
											'tipo_usuario_id' => $this->Usuario->TipoUsuario->findIdByCode('estudiante'),
										),
										'Perfil'=>array(
												// Perfil usuario Predefinido como estudiante
												'Perfil'=>array('1'),
											),
										);
								}
							}else{

								if($usuario['Usuario']['tipo_usuario_id'] == $this->Usuario->TipoUsuario->findIdByCode('estudiante')){
									$perfilUsuario = array( $this->Usuario->Perfil->findIdByCode('estudiante') ); // Perfil de Estudiante

								}elseif($usuario['Usuario']['tipo_usuario_id'] == $this->Usuario->TipoUsuario->findIdByCode('profesor')){
									$perfilUsuario = array( $this->Usuario->Perfil->findIdByCode('tutoracad') );  // Perfil de Tutor Academico

								}else{
									$perfilUsuario = array();  // Sin Perfiles
								}

								// -----------------------------------
								// ------- Si el ususario ya tiene un perfil asignado, lo deja igual, y le suma el correspondiente.
									$aux=array();
									if(!empty($usuario['Perfil'])){
										foreach ($usuario['Perfil'] as $perfil) {
											$aux[] = $perfil['id'];
										}
									}

									if ( in_array($perfilUsuario[0], $aux) ) {
										$perfilUsuario = $aux;
									}else{
										$perfilUsuario = array_merge($perfilUsuario,$aux);	
									}
								// -----------------------------------

								$data_usuario = array(
									'Usuario'=>array(
										'id'=>$usuario['Usuario']['id'],
										'email'=>$this->request->data['Usuario']['email'],
										'password'=>$this->request->data['Usuario']['password'],
										'activo'=> ( $configUsuario['activacionPorCorreo'] ? '0' : '1' ),
									),
									'Perfil'=>array('Perfil'=>$perfilUsuario,),
									);

								$this->Session->write('Log.userId',$usuario['Usuario']['id']);
							}

							if ($this->Usuario->save($data_usuario)){
								if($configUsuario['activacionPorCorreo']){

									// FALTA ENVIO DE CORREO DE ACTIVACION 

									$mensaje = 'Se le ha enviado un correo para la activacion de la su cuenta';
									$element = 'alert/warning';
								}else{
									$mensaje = 'Usuario registrado con exito.';
									$element = 'alert/success';
								}
								$this->Session->setFlash($mensaje,$element);
								return $this->redirect(array('action' => 'login'));
							} else {
								$this->Session->setFlash(__('Usuario no ha podido ser guardado.'),'alert/danger');
							}
						}
					}else{
						$this->Session->setFlash('El registro no se ha hecho efectivo','alert/danger');
					}
				}else{
					$this->Session->setFlash('Please re-enter your reCAPTCHA','alert/danger');
				}
			}
		}


		public function recover(){
			$this->set('title_for_layout','Recuperación de Contraseña');
			$this->layout = 'login';

			if($this->Auth->user()){
				return $this->redirect($this->Auth->redirectUrl());
			}

			if ($this->request->is('post')) {
				$this->Usuario->set($this->request->data);

				if( Configure::read('google_recaptcha') ){
					$this->ReCaptcha = $this->Components->load('ReCaptcha');
					$reCaptcha_valido = $this->ReCaptcha->verificar($this->request->data['g-recaptcha-response']);
				}else{
					$reCaptcha_valido = true;
				}

				if( $reCaptcha_valido ) {
					if($this->Usuario->validates()) {
						$user_email = $this->request->data['Usuario']['recover_email'];

						$usuario = $this->Usuario->find('first',array('conditions'=>array('Usuario.email'=>$user_email),'recursive'=>-1));

						if(!empty($usuario)){

							$new_password = $this->genPassword();
							$usuario['Usuario']['password'] = $new_password;
							$usuario['Usuario']['activo'] = '1';

							//$email = new CakeEmail('gmail');
							$email = new CakeEmail('default');
							
							//$email->from(array('noresponder@aisdevs.com.ve'=>'pGrado'));
							$email->emailFormat('html');
							$email->to($user_email);
							$email->subject('Notificación: recuperación de contraseña');
						
							$text_email['appNombre'] = Configure::read('sistema.nombre');
							$text_email['appDescripcion'] = Configure::read('sistema.descripcion');
							$text_email['usuario'] = $usuario['Usuario']['cedula_nombre_completo'];
							$text_email['new_password'] = $new_password;

							$email->template('password_recover')->viewVars( array('text_email' => $text_email) );

							if($email->send()){

								$this->Session->write('Log.userId',$usuario['Usuario']['id']);

								if($this->Usuario->save($usuario)){
									$this->Session->setFlash('Se le ha enviado un correo para la recuperación de su contraseña','alert/info');
									return $this->redirect(array('action'=>'login'));
								}
							}
						}
					}else{
						$this->Session->setFlash('Ha ocurrido un error recuperando la contraseña, por favor intentelo de nuevo','alert/danger');
					}
				}else{
					$this->Session->setFlash('Please re-enter your reCAPTCHA','alert/danger');
				}




				
			}
		}

		private function genPassword( $len=8 ){
			$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$password = "";
			for ($i=0; $i<$len; $i++){
				$password .= $string{ rand() % strlen($string) };
			}
			return $password;
		}

}
