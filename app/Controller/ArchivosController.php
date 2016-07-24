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
	public $layout = 'ajax';

	public function beforeFilter(){
		$this->verificarModulo('proyecto.archivos');
		parent::beforeFilter();
	}

	public function index($proyecto_id) {
		$this->layout = 'ajax';
		$this->allowProyecto($proyecto_id);
		$archivos = $this->Archivo->find('all',array(
				'conditions'=>array('Archivo.proyecto_id'=>$proyecto_id),
				'order'=>array('Archivo.id'=>'DESC')
			));
		$this->set(compact('archivos','proyecto_id'));
	}

	public function download($id = null, $descarga = false) {
		$path_to_files = Configure::read('sistema.archivos.proyectos');
		$archivo = $this->Archivo->find('first', array('conditions' => array('Archivo.id' => $id)));

		if (!$archivo) {
			throw new NotFoundException(__('Invalid archivo'));
		}
		$this->allowProyecto($archivo['Archivo']['proyecto_id']);

		$path_file = $path_to_files.$archivo['Archivo']['proyecto_id'].DS.$archivo['Archivo']['nombre'];
		$this->response->type($archivo['Archivo']['tipo']);

		if($descarga) $this->response->file($path_file, array('download'=>true,'name'=>$archivo['Archivo']['nombre']));
		else $this->response->file($path_file);

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
		$this->allowProyecto($archivo['Archivo']['proyecto_id']);
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
		$this->allowProyecto($proyecto_id);
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
					return $this->redirect(array('action' => 'index',$proyecto_id));
				}

				foreach ($archivos as $archivo) {
					if($archivo == $file['name']){
						$this->Session->setFlash('Ya existe un archivo con este nombre','alert/warning');
						return $this->redirect(array('action' => 'index',$proyecto_id));
					}
				}


				$path_file = $path_to_files.$proyecto_id.DS;
				if( !is_dir($path_file) ){
					if( !mkdir($path_file) ){
						//throw new InternalErrorException(__('Error creando Directorio'));
						$this->Session->setFlash('Error creando Directorio','alert/danger');
						return $this->redirect(array('action' => 'index',$proyecto_id));
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
						return $this->redirect(array('action' => 'index',$proyecto_id));
					}
				}else{
					throw new InternalErrorException(__('Error moviendo Archivo'));
				}
			}
			throw new InternalErrorException(__('Error guardando Archivo'));
		}
	}

	public function delete($id = null) {
		$this->layout = 'ajax';
		$archivo = $this->Archivo->find('first', array('conditios'=>array('Archivo.id'=>$id)));
		if (!$archivo) { throw new NotFoundException(__('Invalid archivo')); }
		$this->allowProyecto($archivo['Archivo']['proyecto_id']);
		$success = false;
		if ($this->request->is(array('post', 'put'))) {
			$this->Archivo->id = $id;
			$path_to_files = Configure::read('sistema.archivos.proyectos');
			if ($this->Archivo->delete()) {
				$this->Flash->call_success(__('Archivo Eliminado.'));
				$success = true;
				//$file = new File(WWW_ROOT.ltrim($video['Video']['ruta'], '/'));
				//$file->delete();
			}else{
				$this->Flash->call_error(__('No se ha podido eliminar el Archivo.'));
			}
		} else {
			$this->request->data = $archivo;
		}
		$this->set('proyecto_id',$archivo['Archivo']['proyecto_id']);
		$this->set(compact('success'));
	}

}
