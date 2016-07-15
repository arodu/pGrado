<?php
App::uses('AppController', 'Controller');
/**
 * Descargas Controller
 *
 * @property Descarga $Descarga
 * @property PaginatorComponent $Paginator
 */
class DescargasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin() {
		$this->Descarga->recursive = 0;
		$this->set('descargas', $this->Paginator->paginate());
	}

	public function index() {
		$descargas = $this->Descarga->find('all',array(
			'conditions'=>array(
				'Descarga.active'=>true,
			),
		));

		$aux = array();
		foreach ($descargas as $descarga) {
			$aux[$descarga['Descarga']['etiqueta']][] = $descarga;
		}

		$this->set('etiqueta_descargas', $aux);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Descarga->exists($id)) {
			throw new NotFoundException(__('Invalid descarga'));
		}
		$options = array('conditions' => array('Descarga.' . $this->Descarga->primaryKey => $id));
		$this->set('descarga', $this->Descarga->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$path_file = Configure::read('sistema.archivos.descargas');
		if ($this->request->is('post')) {
			$file = $this->request->data['Descarga']['archivo'];
			if ($file['error'] == UPLOAD_ERR_OK) {

				if( !is_dir($path_file) ){
					if( !mkdir($path_file) ){
						$this->Session->setFlash('Error creando Directorio','alert/danger');
						return $this->redirect(array('action' => 'index'));
					}
				}

				if(move_uploaded_file($file['tmp_name'], $path_file.$file['name'])){

					$data['Descarga'] = array(
						'usuario_id' => $this->Auth->user('id'),
						'nombre' => $this->request->data['Descarga']['nombre'],
						'descripcion' => $this->request->data['Descarga']['descripcion'],
						'etiqueta' => $this->request->data['Descarga']['etiqueta'],
						'active' => $this->request->data['Descarga']['active'],
						'archivo' => $file['name'],
						'tipo' => $file['type'],
					);

					$this->Descarga->create();
					if ($this->Descarga->save($data)) {
						$this->Session->setFlash('Archivo guardado correctamente','alert/success');
						return $this->redirect(array('action' => 'admin'));
					}
				}else{
					throw new InternalErrorException(__('Error moviendo Archivo'));
				}
			}else{
				throw new InternalErrorException(__('Error guardando Archivo'));
			}
		}
	}

	public function download($id = null, $descarga = false) {
		$path_file = Configure::read('sistema.archivos.descargas');
		$archivo = $this->Descarga->find('first', array('conditions' => array('Descarga.id' => $id)));

		if (!$archivo) {
			throw new NotFoundException(__('Invalid archivo'));
		}
		$path_file = $path_file.$archivo['Descarga']['archivo'];
		$this->response->type($archivo['Descarga']['tipo']);

		if($descarga){
			$this->response->file($path_file, array('download'=>true,'name'=>$archivo['Descarga']['nombre']));
		}else{
			$this->response->file($path_file);
		}

		return $this->response;
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Descarga->exists($id)) {
			throw new NotFoundException(__('Invalid descarga'));
		}
		if ($this->request->is(array('post', 'put'))) {
			unset($this->request->data['Descarga']['archivo']);
			if ($this->Descarga->save($this->request->data)) {
				$this->Session->setFlash('Cambios realizados correctamente','alert/success');
				return $this->redirect(array('action' => 'admin'));
			} else {
				$this->Flash->error(__('The descarga could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Descarga.' . $this->Descarga->primaryKey => $id));
			$this->request->data = $this->Descarga->find('first', $options);
		}
		$usuarios = $this->Descarga->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Descarga->id = $id;
		if (!$this->Descarga->exists()) {
			throw new NotFoundException(__('Invalid descarga'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Descarga->delete()) {
			//$file = new File(WWW_ROOT.ltrim($video['Video']['ruta'], '/'));
			//$file->delete();
			$this->Session->setFlash('The descarga has been deleted','alert/success');
		} else {
			$this->Session->setFlash('The descarga could not be deleted. Please, try again','alert/error');
		}
		return $this->redirect(array('action' => 'admin'));
	}
}
