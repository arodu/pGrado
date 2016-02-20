<?php
App::uses('PanelAdminAppController', 'PanelAdmin.Controller');
App::uses('Folder', 'Utility');

class BackupController extends PanelAdminAppController {

	public $uses = array( 'MysqlBackup' );

	public function index(){
		$ruta = rtrim(Configure::read('sistema.archivos.backups'), '/');

		$dir = new Folder($ruta);

		$files = $dir->find('.*\.sql');

		$archivos = null;
		foreach ($files as $file) {
			$file = new File($dir->pwd() . DS . $file);
			//$archivos[] = $file->info();

			$archivos[] = array_merge( $file->info(), array( 'lastChange' => $file->lastChange() ));

			$file->close(); // Be sure to close the file when you're done
		}

		//debug($archivos); exit();

		$archivos = $this->array_sort($archivos, 'lastChange', SORT_DESC);

		$this->set('archivos',$archivos);

	}

	public function download($fileName){
		$path_to_files = Configure::read('sistema.archivos.backups');

		$path_file = $path_to_files.$fileName;

		$file = new File($path_file);

		if( $file->exists() ){
			$fileinfo = $file->info();
			$this->response->type($fileinfo['mime']);
			$this->response->file($path_file, array('download'=>true,'name'=>$fileinfo['basename']));
			return $this->response;
		}

		$this->Session->setFlash(__('Archivo Invalido'));
		return $this->redirect(array('action'=>'index'));

	}

	public function view($fileName){

		if($this->request->is('ajax')){
			$this->layout = 'ajax';
		}

		$path_to_files = Configure::read('sistema.archivos.backups');

		$path_file = $path_to_files.$fileName;

		$file = new File($path_file);

		if( $file->exists() ){
			$fileinfo = $file->read();
			$this->set('fileinfo',$fileinfo);
		}else{
			$this->Session->setFlash(__('Archivo Invalido'));
			return $this->redirect(array('action'=>'index'));	
		}

		
	}

	public function crear(){
		$ruta = Configure::read('sistema.archivos.backups');
		$archivo = $ruta.$this->MysqlBackup->generateName('pGrado','manual');
		$this->MysqlBackup->generateToFile($archivo);

		return $this->redirect(array('action'=>'index'));
	}

	public function recrear(){

		if($this->request->is('post')){
			$ruta = Configure::read('sistema.archivos.backups');
			$archivo = $this->request->data['Backup']['archivo'];

			//debug( $this->request->data );

			$this->request->data['Usuario']['id'] = $this->Auth->user('id');

			$this->loadModel('Usuario');
			$this->Usuario->set($this->request->data);
			if( $this->Usuario->validates() ){

					$auto_archivo = $ruta . $this->MysqlBackup->generateName('pGrado','auto');
					if($this->MysqlBackup->generateToFile($auto_archivo)){

						if($this->MysqlBackup->restoreToFile( $ruta . $archivo )){
							$this->Session->setFlash(__('Restauracion de archivo SQL realizada'));
						}

					}
			}else{
				$this->Session->setFlash(__('Contraseña de Usuario Invalida'));
			}
		}

		return $this->redirect(array('action'=>'index'));

	}


	/*function mysql($tables = '*'){
		Configure::write('debug', 0);
		//$this->loadModel('MysqlBackup');
		$return = $this->MysqlBackup->create($tables);

		$database_name = $this->MysqlBackup->dbName();
		// Set the default file name
		$fileName = $database_name.'_backup_'.date('YmdHis').'.sql';

		// Serve the file as a download
		$this->autoRender = false;
		$this->response->type('Content-Type: text/x-sql');
		$this->response->charset('utf8');
		$this->response->download($fileName);
		$this->response->body($return);
	}*/

	function array_sort($array, $on, $order=SORT_ASC){
		$new_array = array();
		$sortable_array = array();

		if (count($array) > 0) {
			foreach ($array as $k => $v) {
				if (is_array($v)) {
					foreach ($v as $k2 => $v2) {
						if ($k2 == $on) {
							$sortable_array[$k] = $v2;
						}
					}
				} else {
					$sortable_array[$k] = $v;
				}
			}

			switch ($order) {
				case SORT_ASC: asort($sortable_array); break;
				case SORT_DESC: arsort($sortable_array); break;
			}

			foreach ($sortable_array as $k => $v) {
				$new_array[$k] = $array[$k];
			}
		}

		return $new_array;
	}


}
