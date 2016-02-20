<?php
App::uses('AppController', 'Controller');
/**
 * Archivos Controller
 *
 * @property Archivo $Archivo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArchivosController extends AppController {

	public $components = array('Session','Imagen');

	private $sufijo = '.min';

	public function beforeFilter(){
		$this->verificarModulo('proyecto.archivos');
		parent::beforeFilter();
	}

	private function revisarProyecto($proyecto_id){
		// Revisa si el usuario actual tiene acceso al proyecto
		$proyecto_autor = $this->Archivo->Proyecto->Autor->find('first',array(
			'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
			//'contain'=>array('TipoAutor')
		));

		if(empty($proyecto_autor)){
			throw new NotFoundException(__('Proyecto no Pertenece al Usuario Actual'));
		}else{
			return true;
		}
	}

	public function index($proyecto_id) {
		$this->layout = 'ajax';

		$this->revisarProyecto($proyecto_id); // Revisa si el usuario actual tiene acceso al proyecto

		$archivos = $this->Archivo->find('all',array(
				'conditions'=>array('Archivo.proyecto_id'=>$proyecto_id),
				'order'=>array('Archivo.id'=>'DESC')
			));

		$this->set(compact('archivos','proyecto_id'));
	}

	public function view($proyecto_id){
		$this->layout = 'ajax';
		$this->index($proyecto_id);
	}

	public function view2($proyecto_id){
		$this->layout = 'ajax';
		$this->index($proyecto_id);
	}

	public function download($id = null, $descarga = false) {
		$path_to_files = Configure::read('sistema.archivos.proyectos');

		$archivo = $this->Archivo->find('first', array('conditions' => array('Archivo.id' => $id)));

		if (!$archivo) {
			throw new NotFoundException(__('Invalid archivo'));
		}

		$this->revisarProyecto($archivo['Archivo']['proyecto_id']); // Revisa si el usuario actual tiene acceso al proyecto

		$path_file = $path_to_files.$archivo['Archivo']['proyecto_id'].DS.$archivo['Archivo']['nombre'];

		//debug($path_file); exit();

		$this->response->type($archivo['Archivo']['tipo']);

		if($descarga)
			$this->response->file($path_file, array('download'=>true,'name'=>$archivo['Archivo']['nombre']));
		else
			$this->response->file($path_file);

		return $this->response;
	}


	public function miniatura($id = null){
		return $this->imagen($id,true);
	}

	public function imagen($id = null, $miniatura = false){
		$path_to_files = Configure::read('sistema.archivos.proyectos');

		$archivo = $this->Archivo->find('first', array('conditions' => array('Archivo.id' => $id)));

		if (!$archivo) {
			throw new NotFoundException(__('Invalid archivo'));
		}

		$this->revisarProyecto($archivo['Archivo']['proyecto_id']); // Revisa si el usuario actual tiene acceso al proyecto

		$path_file = $path_to_files.$archivo['Archivo']['proyecto_id'].DS;

		if($miniatura){
			$path_file = $path_file . $this->Imagen->addSufijo( $archivo['Archivo']['nombre'], $this->sufijo);
		}else{
			$path_file = $path_file . $archivo['Archivo']['nombre'];
		}

		$this->response->type($archivo['Archivo']['tipo']);
		$this->response->file($path_file);

		return $this->response;
	}

	public function add($proyecto_id) {
		$this->revisarProyecto($proyecto_id); // Revisa si el usuario actual tiene acceso al proyecto

		$path_to_files = Configure::read('sistema.archivos.proyectos');

		if ($this->request->is('post')) {
			$file = $this->params['form']['file'];

			//debug($file); exit();


			if ($file['error'] == UPLOAD_ERR_OK) {

				$cant_pos_archivos = Configure::read('proyectos.archivos.cantidad');

				$archivos = $this->Archivo->find('list',array(
						'conditions'=>array('Archivo.proyecto_id'=>$proyecto_id),
						'fields'=>array('Archivo.id','Archivo.nombre'),
					));

				if(count($archivos) >= $cant_pos_archivos){
					$this->Session->setFlash('Ya se han guardado la cantidad maxima de archivos permitida','alert/danger');
					return $this->redirect(array('action' => 'view2',$proyecto_id));
				}

				foreach ($archivos as $archivo) {
					if($archivo == $file['name']){
						$this->Session->setFlash('Ya existe un archivo con este nombre','alert/warning');
						return $this->redirect(array('action' => 'view2',$proyecto_id));
					}
				}


				$path_file = $path_to_files.$proyecto_id.DS;
				if( !is_dir($path_file) ){
					if( !mkdir($path_file) ){
						//throw new InternalErrorException(__('Error creando Directorio'));
						$this->Session->setFlash('Error creando Directorio','alert/danger');
						return $this->redirect(array('action' => 'view2',$proyecto_id));
					}
				}

				//debug($file); exit();

				if(move_uploaded_file($file['tmp_name'], $path_file.$file['name'])){


					$min_nombre = $this->Imagen->addSufijo( $file['name'], $this->sufijo );

					$this->Imagen->miniatura($path_file.$file['name'], $path_file.$min_nombre, array(
							'miniatura_ancho'=>198, 'miniatura_alto'=>100,
						));

					$data_archivo['Archivo'] = array(
							'nombre'=>$file['name'],
							'tamano'=>$file['size'],
							'tipo'=>$file['type'],
							'ruta'=>$path_file.DS.$file['name'],
							'proyecto_id'=>$proyecto_id,
							'usuario_id'=>$this->Auth->user('id'),
						);

					$this->Archivo->create();
					if ($this->Archivo->save($data_archivo)) {
						//return $this->redirect(array('action' => 'index',$proyecto_id));
						return $this->redirect(array('action' => 'view2',$proyecto_id));
					}
				}else{
					throw new InternalErrorException(__('Error moviendo Archivo'));
				}
			}

			throw new InternalErrorException(__('Error guardando Archivo'));

		}
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function edit($id = null) {
		if (!$this->Archivo->exists($id)) {
			throw new NotFoundException(__('Invalid archivo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Archivo->save($this->request->data)) {
				$this->Session->setFlash(__('The archivo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archivo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Archivo.' . $this->Archivo->primaryKey => $id));
			$this->request->data = $this->Archivo->find('first', $options);
		}
		$proyectos = $this->Archivo->Proyecto->find('list');
		$usuarios = $this->Archivo->Usuario->find('list');
		$this->set(compact('proyectos', 'usuarios'));
	} */

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Archivo->id = $id;

		$path_to_files = Configure::read('sistema.archivos.proyectos');

		$archivo = $this->Archivo->find('first',array('conditions'=>array('Archivo.id'=>$id)));

		if (!$archivo) {
			throw new NotFoundException(__('Invalid archivo'));
		}

		$this->revisarProyecto($archivo['Archivo']['proyecto_id']); // Revisa si el usuario actual tiene acceso al proyecto

		$this->request->allowMethod('post', 'delete');

		if ($this->Archivo->delete()) {

		}else{
			$this->Session->setFlash(__('The archivo could not be deleted. Please, try again.'),'alert/warning');
		}
		return $this->redirect(array('action' => 'view2',$archivo['Archivo']['proyecto_id']));
	}

}
