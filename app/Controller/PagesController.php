<?php
App::uses('AppController', 'Controller');
App::uses('File', 'Utility');

class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	public $components = array('Paginator','Search');

	public function beforeFilter() {
		parent::beforeFilter();
		// $this->Auth->allow('creditos');
	}

	public function chat(){
		if($this->request->is('post')){
			//$file = Configure::read('sistema.archivos.misc') . 'info.txt';
			//debug(file_get_contents($filename));
			//exit();
		}
		//debug(date('now').': Mensaje nuevo');
	}

	public function pull( $last = 0 ){ // Rescatar Info
		$file = Configure::read('sistema.archivos.misc') . 'info.txt';

		$lastAccess = filemtime($file);
		while($lastAccess <= $last){
		    clearstatcache();
			$lastAccess = filemtime($file);
			sleep(1);
			//flush();
			session_write_close();
		}

		$list = array('success'=>true, 'msg'=>'mensaje', 'last'=>$lastAccess);

		$this->response->type('json');
		$this->response->body(json_encode($list));
		return $this->response;
	}

	public function messages(){
		$this->layout = 'ajax';
		$file = Configure::read('sistema.archivos.misc') . 'info.txt';

		if($this->request->is('post')){
			//debug($this->Auth->user());
			debug($this->request->data);
		
			$mensaje = '['.date('Y-m-d H:i:s').'] '.$this->Auth->user('nombre_completo').': '.$this->request->data['add'].'<br/>';
			//echo $mensaje;
			file_put_contents($file, $mensaje, FILE_APPEND | LOCK_EX);
			flush();
			exit();
		}
		$out = file_get_contents($file);
		$out = str_replace(" ", "&nbsp;", $out);
		$out = str_replace("\n", "<br/>", $out);
		echo $out;
		exit();
	}

	public function test(){


		// $this->layout = 'ajax';

		/*
		$old_article = "a b c d e \n a b c d e \nk l m n ñ \na b c d e \na b c d e \nk l m n ñ";
		$new_article = "a b c d e \n a b c d e \na b c d e \na b c d e \na b c d e \nf g h i jk l m n ñ";

		//$diff = xdiff_string_diff($old_article, $new_article);
		$diff = xdiff_string_rabdiff($new_article, $old_article);



		if (is_string($diff)) {
			// echo "Diferencias entre los dos artículos:\n";


			$string = xdiff_string_patch ($new_article , $diff );



			debug($old_article);
			debug($new_article);

			debug($diff);
			debug($string);
		}

		exit(); */

	}

	public function index(){

	}

	public function creditos(){
		$aplicacion = Configure::read('sistema.nombre').' v'.Configure::read('sistema.version.larga');
	}


	public function error($num=null){
		switch ($num) {
			case '403':
				throw new ForbiddenException(); break;

			case '404':
				throw new NotFoundException(); break;

			case '500':
				throw new InternalErrorException(); break;

			default:
				throw new InternalErrorException(); break;
		}
	}


}
